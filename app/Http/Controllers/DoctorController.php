<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    private $_request = null;
    private $_user_modal = null;
    private $_modal = null;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(Request $request, User $user_modal, Doctor $modal)
    {
        $this->_request = $request;
        $this->_user_modal = $user_modal;
        $this->_modal = $modal;
    }

    public function doctors()
    {
        $doctors = $this->_user_modal->whereHas('roles', function ($q) {
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
        $personal = $this->_request->except('_token', 'location_id', 'experience', 'degree');
        $doctor_data = $this->_request->except('_token', 'name', 'email', 'password', 'phone');

        $personal['password'] = Hash::make($personal['name']);
        $user = $this->_user_modal->create($personal);
        $user->assignRole('doctor');

        $doctor_data['user_id'] = $user->id;
        $this->_modal->create($doctor_data);

        return redirect()->route('doctors');
    }

    public function edit_doctor_view($id)
    {
        $doctor = $this->_user_modal->whereHas('roles', function ($q) {
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
