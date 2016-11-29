<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminHomeController extends Controller
{

	public function __construct()
	{				
		$this->middleware('auth:admin');
	}

    public function index()
    {
    	// return dd(Auth::guard()->provider());
    	// Auth::guard('admin');

    	// dd(Auth::guest());
    	// return dd(Auth::guard('web')->check());
    	return view('admin-home');
    }
}
