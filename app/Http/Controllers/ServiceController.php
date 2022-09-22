<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
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

    public function all_services()
    {
        $services = $this->_modal->all();

        return $services;
    }

    public function services()
    {
        $services = $this->all_services();

        return view('admin.services.all', compact('services'));
    }

    public function add_service()
    {
        $this->validate($this->_request, [
            'name' => 'required',
        ]);

        $data = $this->_request->all();

        $this->_modal->create($data);

        return redirect()->back();
    }

    public function delete_service($id)
    {
        try {
            $this->_modal->find($id)->delete();

            return redirect()->back();
        } catch (\Exception $ex) {
            dd($ex);
        }
    }

    public function edit_service_response()
    {
        $service = $this->_modal->find($this->_request->id);

        $response = view('response.edit_service', compact('service'))->render();

        return response()->json($response);
    }

    public function edit_service($id)
    {
        $service = $this->_modal->find($id);
        $service->name = $this->_request->name;
        $service->update();

        return redirect()->route('services');
    }
}
