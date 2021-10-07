<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;


class DesignationController extends Controller
{
    public function ViewDesignation() {
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation', $data);
    }

    public function AddDesignation() {
        return view('backend.setup.designation.add_designation');
    }

    public function DesignationStore(Request $request) {
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name',         
        ]);
        $data = new Designation();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Designation Successfully Added',
            'alert-type' => 'success'
        );

        return Redirect()->route('designation.view')->with($notification);
    }

    public function DesignationEdit($id) {
        $editData = Designation::find($id);
        return view('backend.setup.designation.edit_designation', compact('editData'));
    }

    public function DesignationUpdate(Request $request, $id) {
        $data =  Designation::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name,'.$data->id     
        ]);
        
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Designation Successfully Updated',
            'alert-type' => 'success'
        );

        return Redirect()->route('designation.view')->with($notification);
    }

    public function DesignationDelete($id) {
        $designation = Designation::find($id);
        $designation->delete();
        $notification = array(
            'message' => 'Designation Successfully Deleted',
            'alert-type' => 'info'
        );

        return Redirect()->route('designation.view')->with($notification);
    }
}
