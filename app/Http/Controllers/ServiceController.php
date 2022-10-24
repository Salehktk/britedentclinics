<?php

namespace App\Http\Controllers;

use App\Helper\BaseQuery;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use BaseQuery;

    private $_request = null;
    private $_modal = null;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(Request $request, Service $modal)
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
        $all = $this->get_all($this->_modal, 'specialization');
        return view('service.all', compact('all'));
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
            'name' => 'required',
            'specialization_id' => 'required|integar'
        ]);

        $data = $this->_request->except('_token');
        $var = $this->add($this->_modal, $data);

        return redirect()->route('service.index');
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
            'specialization_id' => 'required|integer',
        ]);

        $data = $this->_request->except('_token', '_method');

        $data = $this->get_by_id($this->_modal, $id)->update($data);

        return redirect()->route('service.index');
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
        return redirect()->route('service.index');
    }

    public function edit_service_response()
    {
        $service = $this->get_by_id($this->_modal, $this->_request->id);

        $response = view('response.edit_service', compact('service'))->render();

        return response()->json($response);
    }
}
