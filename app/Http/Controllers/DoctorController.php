<?php

namespace App\Http\Controllers;

use App\Helper\BaseQuery;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    use BaseQuery;

    private $_request = null;
    private $_modal = null;
    private $_role = 'doctor';

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(Request $request, Doctor $modal)
    {
        $this->_request = $request;
        $this->_modal = $modal;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = $this->all_user_with_role('doctor');
        return view('doctor.all', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if ($this->_request->user_id == null) {
            $this->validate($this->_request, [
                'name' => 'required',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'unique:users'],
                'title' => 'required',
                'short_description' => 'required',
                'location_id' => 'required|integer',
                'experience' => 'required',
                'degree' => 'required',
            ]);

            $personal = $this->_request->except('_token', 'location_id', 'experience', 'degree', 'title', 'short_description', 'user_id');

            if ($this->_request->hasFile('profile')) {
                $file = $this->_request->file('profile');
                $name = $file->getClientOriginalName();

                $destinationPath = public_path('assets/img/doctor');
                $file->move($destinationPath, $name);

                $personal['profile'] = $name;
            }

            $user = $this->add_user($personal, $this->_role);
            $user_id = $user->id;
        } else {
            $this->validate($this->_request, [
                'location_id' => 'required|integer',
                'experience' => 'required',
                'title' => 'required',
                'short_description' => 'required',
                'degree' => 'required',
            ]);
            $user_id = $this->_request->user_id;

            $this->update_user_status($user_id, 1);
        }

        $doctor_data = $this->_request->except('_token', 'name', 'email', 'password', 'phone', 'profile');
        $doctor_data['user_id'] = $user_id;

        $var = $this->add($this->_modal, $doctor_data);

        return redirect()->route('add_availability_view', $user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  {{ model }}  $modal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->get_by_id($this->_modal, $id);
        return view('{{view_name}}', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  {{ model }}  $modal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->get_by_id($this->_modal, $id);
        return view('{{view_name}}', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  {{ model }}  $modal
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->validate($this->_request, [
            'name' => 'required',
        ]);

        $data = $this->_request->except('_token', '_method');

        $data = $this->get_by_id($this->_modal, $id)->update($data);

        return redirect()->route('{{routeName}}.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  {{ model }}  $modal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->delete_user($id);
        return redirect()->route('doctor.index');
    }
}
