<?php

namespace App\Http\Controllers;

use App\Helper\BaseQuery;
use App\Models\AvailableTime;
use Illuminate\Http\Request;

class AvailableTimeController extends Controller
{
    use BaseQuery;

    private $_request = null;
    private $_modal = null;
    private $_time = null;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(Request $request, AvailableTime $modal, TimeSlotController $time)
    {
        $this->_request = $request;
        $this->_modal = $modal;
        $this->_time = $time;
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
            'user_id' => 'required|integer',
            'to' => 'required',
            'from' => 'required',
            'day' => 'required',
        ]);

        $user = $this->user_by_id_with_role($this->_request->user_id, 1, 'doctor', ['single_doctor']);

        if ($user != null) {
            $doctor_id = $user->single_doctor->id;

            $available_time = $this->_request->except('_token', 'to', 'from', 'user_id');
            $available_time['doctor_id'] = $doctor_id;

            $time_slots = $this->_request->except('_token', 'user_id', 'day');

            $check = $this->_modal->with('DoctorReverse')->where('doctor_id', $doctor_id)->where('day', $this->_request->day)->first();

            if ($check == null) {
                $okk = $this->add($this->_modal, $available_time);
                $ok = $this->_modal->with('DoctorReverse')->find($okk->id);
            } else {
                $ok = $check;
            }

            $this->_time->add_time($time_slots, $ok->id);

            if ($ok->DoctorReverse->DoctorAvailableTime->count() >= 1 && $ok->DoctorReverse->DoctorSpecialization->count() >= 1) {
                $this->update_user_status($ok->DoctorReverse->user_id, 2);
            }
        }

        return redirect()->route('add_availability_view', $this->_request->user_id);
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
        $delete = $this->delete($this->_modal, $id);
        return redirect()->route('{{ routeName }}');
    }
}
