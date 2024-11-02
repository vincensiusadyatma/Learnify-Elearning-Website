<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }

    
    public function handleRegister(Request $request){
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
      
       
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

      
        if (Auth::attempt($credentials)) {
          
            $request->session()->regenerate();
            return redirect()->route('show-register')->with('success', 'Login berhasil!');
        }

        return redirect()->route('show-register')->with('error', 'Login berhasil!');
    }

    public function handleLogOut(Request $request){
        
        Auth::logout();

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        return redirect()->route('main')->with('success', 'Anda telah berhasil logout.');
    }
    
}
