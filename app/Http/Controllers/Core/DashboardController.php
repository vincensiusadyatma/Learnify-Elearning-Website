<?php

namespace App\Http\Controllers\Core;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard(){
        return view('dashboard.main');
    }
}
