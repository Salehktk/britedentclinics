<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private $_request = null;
    private $_modal = null;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(Request $request, User $modal)
    {
        $this->_request = $request;
        $this->_modal = $modal;
    }

    public function doctors()
    {
        $doctors = $this->_modal->whereHas('roles', function ($q) {
            $q->where('name', 'doctor');
        })->get();

        return view('admin.doctor.all', compact('doctors'));
    }

    public function add_doctor_view()
    {
        return view('admin.doctor.add');
    }

    public function add_doctor()
    {
        $data = $this->_request->except('_token');
        dd($data);
    }

    public function edit_doctor_view($id)
    {
        $doctor = $this->_modal->whereHas('roles', function ($q) {
            $q->where('name', 'doctor');
        })
            ->where('id', $id)->first();

        if ($doctor == null) {
            return redirect()->route('doctors');
        } else {
            return view('admin.doctor.edit', compact('doctor'));
        }
    }

    public function edit_doctor($id)
    {
        dd($this->_request->except('_token'), $id);
    }
}
