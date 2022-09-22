<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
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

    public function locations()
    {
        $locations = $this->_modal->all();

        return view('admin.locations.all', compact('locations'));
    }

    public function add_location()
    {
        $this->validate($this->_request, [
            'name' => 'required',
        ]);

        $data = $this->_request->all();

        $this->_modal->create($data);

        return redirect()->back();
    }

    public function delete_location($id)
    {
        try {
            $this->_modal->find($id)->delete();

            return redirect()->back();
        } catch (\Exception $ex) {
            dd($ex);
        }
    }

    public function edit_location_response()
    {
        $location = $this->_modal->find($this->_request->id);

        $response = view('response.edit_location', compact('location'))->render();

        return response()->json($response);
    }

    public function edit_location($id)
    {
        $location = $this->_modal->find($id);
        $location->name = $this->_request->name;
        $location->update();

        return redirect()->route('locations');
    }
}
