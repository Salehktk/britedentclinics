<?php

namespace App\Http\Controllers;

use App\Helper\BaseQuery;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    use BaseQuery;

    private $_request = null;
    private $_modal = null;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(Request $request, Location $modal)
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

        return view('locations.all', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.locations.all');
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
        ]);

        $data = $this->_request->except('_token');
        $this->add($this->_modal, $data);

        return redirect()->route('locations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Location  $modal
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
     * @param  Location  $modal
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
     * @param  Location  $modal
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->validate($this->_request, [
            'name' => 'required',
        ]);

        $location = $this->get_by_id($this->_modal, $id);
        $location->name = $this->_request->name;
        $location->update();

        return redirect()->route('locations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Location  $modal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->delete($this->_modal, $id);
        return redirect()->back();
    }

    public function edit_location_response()
    {
        $location = $this->get_by_id($this->_modal, $this->_request->id);

        $response = view('response.edit_location', compact('location'))->render();

        return response()->json($response);
    }
}
