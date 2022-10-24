<?php

namespace App\Http\Controllers;

use App\Helper\BaseQuery;
use Illuminate\Http\Request;
use Session;
use Auth;

class HomeController extends Controller
{
    use BaseQuery;

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
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('super_dashboard');
        }
        if (Auth::user()->hasRole('doctor')) {
            return redirect()->route('doctor_dashboard');
        }
        if (Auth::user()->hasRole('patient')) {
            return redirect()->route('patient_dashboard');
        } else {
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
        $month['jan'] = $this->get_monthly_user('1');
        $month['feb'] = $this->get_monthly_user('2');
        $month['march'] = $this->get_monthly_user('3');
        $month['april'] = $this->get_monthly_user('4');
        $month['may'] = $this->get_monthly_user('5');
        $month['june'] = $this->get_monthly_user('6');
        $month['july'] = $this->get_monthly_user('7');
        $month['aug'] = $this->get_monthly_user('8');
        $month['sep'] = $this->get_monthly_user('9');
        $month['oct'] = $this->get_monthly_user('10');
        $month['nov'] = $this->get_monthly_user('11');
        $month['dec'] = $this->get_monthly_user('12');

        return view('admin.dashboard', compact('month'));
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
