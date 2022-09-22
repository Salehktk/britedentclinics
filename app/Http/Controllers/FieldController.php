<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    private $_request = null;
    private $_modal = null;
    private $_services = null;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(Request $request, Field $modal, ServiceController $services)
    {
        $this->_request = $request;
        $this->_modal = $modal;
        $this->_services = $services;
    }

    public function all_fields()
    {
        $fields = $this->_modal->all();

        return $fields;
    }

    public function fields()
    {
        $fields = $this->all_fields();
        $services = $this->_services->all_services();

        return view('admin.doctor.fields', compact('fields', 'services'));
    }

    public function add_field()
    {
        $this->validate($this->_request, [
            'name' => 'required',
            'service_id' => 'required|integer',
        ]);

        $data = $this->_request->except('_token');

        $this->_modal->create($data);

        return redirect()->back();
    }

    public function delete_field($id)
    {
        try {
            $this->_modal->find($id)->delete();

            return redirect()->back();
        } catch (\Exception $ex) {
            dd($ex);
        }
    }

    public function edit_field_response()
    {
        $field = $this->_modal->find($this->_request->id);

        $response = view('response.edit_field', compact('field'))->render();

        return response()->json($response);
    }

    public function edit_field($id)
    {
        $field = $this->_modal->find($id);
        $field->name = $this->_request->name;
        $field->update();

        return redirect()->route('fields');
    }
}
