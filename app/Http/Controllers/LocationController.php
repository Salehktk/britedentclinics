<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    private $_request = null;
    private $_modal = null;

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
        
        $this->_modal->name = $data['name'];
        $this->_modal->save();

        return redirect()->back();
    }

    public function delete_location($id)
    {
        try{
            $this->_modal->find($id)->delete();
            
            return redirect()->back();
        }
        catch(\Exception $ex) {
            dd($ex);
        }
    }

    public function __construct(Request $request, Location $modal)
    {
        $this->_request = $request;
        $this->_modal = $modal;
    }
}
