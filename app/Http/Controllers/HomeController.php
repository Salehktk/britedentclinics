<?php

namespace App\Http\Controllers;
use Session;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin')){
            return redirect()->route('super_dashboard');
        }
        if(Auth::user()->hasRole('doctor')){
            return redirect()->route('doctor_dashboard');
        }
        if(Auth::user()->hasRole('patient')){
            return redirect()->route('patient_dashboard');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

    public function super_dashboard()
    {
        return view('admin.dashboard');
    }

    public function doctor_dashboard()
    {
        return view('doctor.dashboard');
    }

    public function patient_dashboard()
    {
        return view('patient.dashboard');
    }
}
