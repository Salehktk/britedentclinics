<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    private $_request = null;
    private $_modal = null;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(Request $request, Field $modal)
    {
        $this->_request = $request;
        $this->_modal = $modal;
    }

    public function fields()
    {
        $fields = $this->_modal->all();

        return view('admin.doctor.fields', compact('fields'));
    }

    public function add_field()
    {
        $this->validate($this->_request, [
            'name' => 'required',
        ]);

        $data = $this->_request->all();

        $this->_modal->name = $data['name'];
        $this->_modal->save();

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