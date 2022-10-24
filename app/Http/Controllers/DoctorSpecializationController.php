<?php

namespace App\Http\Controllers;

use App\Helper\BaseQuery;
use App\Models\DoctorSpecialization;
use Illuminate\Http\Request;

class DoctorSpecializationController extends Controller
{
    use BaseQuery;

    private $_request = null;
    private $_modal = null;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(Request $request, DoctorSpecialization $modal)
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
        $all = $this->get_all($this->_modal);

        return view('{{ routeName }}', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view({{ view_name }});
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate($this->_request, [
            'specialization_id' => 'required|integer',
            'service_id' => 'required|integer',
            'fees' => 'required|integer',
            'time_slots' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $user = $this->user_by_id_with_role($this->_request->user_id, 1, 'doctor', ['single_doctor']);

        if ($user == null) {
            $doctor = 'Select correct doctor';
        } else {
            $doctor_id = $user->single_doctor->id;

            $doctor_s = $this->_request->except('_token', 'service_id', 'fees', 'user_id', 'time_slots');
            $doctor_s['doctor_id'] = $doctor_id;

            $d_s_fields = $this->_request->except('_token', 'specialization_id', 'user_id');

            $check_doctor_service = $this->_modal->where('specialization_id', $this->_request->specialization_id)->where('doctor_id', $doctor_id)->first();

            if ($check_doctor_service == null) {
                $d_service = $this->add($this->_modal, $doctor_s);
            } else {
                $d_service = $check_doctor_service;
            }
            $d_s_fields['doctor_specialization_id'] = $d_service->id;

            $d_service->DoctorSpecializationServices()->create($d_s_fields);

            if ($d_service->Doctor->DoctorAvailableTime->count() >= 1 && $d_service->count() >= 1) {
                $this->update_user_status($d_service->Doctor->user_id, 2);
            }

            $doctor = $this->response_doctor_specialization_services_list($doctor_id);
        }

        return response()->json($doctor);
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
        dd($id);
        $delete = $this->delete($this->_modal, $id);
        return redirect()->route('{{ routeName }}');
    }

    public function specialization_destroy($id)
    {
        $this->delete($this->_modal, $id);
        $doctor = $this->response_doctor_specialization_services_list($id);
        return response()->json($doctor);
    }

    public function response_doctor_specialization_services_list($id)
    {
        $doctor_specialization = $this->get_by_column($this->_modal, 'doctor_id', $id);
        return view('response.response_doctor_specialization_services_list', compact('doctor_specialization'))->render();
    }
}
