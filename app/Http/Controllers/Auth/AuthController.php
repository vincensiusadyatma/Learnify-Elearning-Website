<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }


    public function handleRegister(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);


            DB::table('role_ownerships')->insert([
                'user_id' => $user->id,
                'role_id' => 2,
            ]);

            DB::commit();

            return redirect()->route('main')->with('success', 'Registration successful. You can now log in.');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th->getMessage());
            Log::error('Registration Error: ' . $th->getMessage());
            return redirect()->route('show-register')->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }

    public function handleLogin(Request $request){
        $input = $request->input('email'); 
        $password = $request->input('password');

        // Tentukan apakah input adalah email
        $fieldType = filter_var($input, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Validasi input berdasarkan tipe
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

       
        if (Auth::attempt([$fieldType => $input, 'password' => $password])) {
            $request->session()->regenerate();

            $user = Auth::user();
            $role = $user->roles->pluck('name')->first(); 

            notify()->success('You have successfully logged in');

           
            if ($role === 'admin') {
                return redirect()->route('show-dashboard-admin')->with('success', 'Welcome, Admin!');
            } elseif ($role === 'user') {
                return redirect()->route('show-dashboard')->with('success', 'Welcome, User!');
            }

            // Logout jika role tidak valid
            Auth::logout();
            return redirect()->route('main')->with('error', 'Your account does not have the required access.');
        }

        return redirect()->route('show-register')->with('error', 'Login gagal');
    }

    

    public function handleLogOut(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
       
        notify()->success('You have successfully logged out.');
        return redirect()->route('main')->with('success', 'Anda telah berhasil logout.');
    }


    public function googleRedirect(){
        return Socialite::driver('google')->redirect();
    }


    public function googleCallback(){
        // Mendapatkan data pengguna dari Google melalui Socialite
        $googleUser = Socialite::driver('google')->user();

        
        $user = User::updateOrCreate(
            [
                'google_id' => $googleUser->getId()
            ],
            [
                'username' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
            ]
        );

       
        $roleExists = DB::table('role_ownerships')
            ->where('user_id', $user->id)
            ->where('role_id', 2) 
            ->exists();

    
        if (!$roleExists) {
            DB::table('role_ownerships')->insert([
                'user_id' => $user->id,
                'role_id' => 2,
            ]);
        }

       
        Auth::login($user);

        // Redirect ke halaman dashboard dengan notifikasi sukses
        notify()->success('You have successfully logged in');
        return redirect('/dashboard');
    }


}
