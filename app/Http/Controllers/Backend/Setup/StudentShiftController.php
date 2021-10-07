<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentShiftController extends Controller
{
    public function ViewShift() {
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift', $data);
    }
    
    public function AddShift() {
        return view('backend.setup.shift.add_shift');
    }

    public function StudentShiftStore(Request $request) {
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name',         
        ]);
        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Shift Successfully Added',
            'alert-type' => 'success'
        );

        return Redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentShiftEdit($id) {
        $editData = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift', compact('editData'));
    }

    public function StudentShiftUpdate(Request $request, $id) {
        $data =  StudentShift::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$data->id     
        ]);
        
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Shift Successfully Updated',
            'alert-type' => 'success'
        );

        return Redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentShiftDelete($id) {
        $shift = StudentShift::find($id);
        $shift->delete();
        $notification = array(
            'message' => 'Student Shift Successfully Deleted',
            'alert-type' => 'info'
        );

        return Redirect()->route('student.shift.view')->with($notification);
    }
}
