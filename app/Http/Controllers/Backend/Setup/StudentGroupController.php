<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\StudentGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentGroupController extends Controller
{
    public function ViewGroup() {
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group', $data);
    }
    
    public function AddGroup() {
        return view('backend.setup.group.add_group');
    }

    public function StudentGroupStore(Request $request) {
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name',         
        ]);
        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Group Successfully Added',
            'alert-type' => 'success'
        );

        return Redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupEdit($id) {
        $editData = StudentGroup::find($id);
        return view('backend.setup.group.edit_group', compact('editData'));
    }

    public function StudentGroupUpdate(Request $request, $id) {
        $data =  StudentGroup::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name,'.$data->id     
        ]);
        
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Group Successfully Updated',
            'alert-type' => 'success'
        );

        return Redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupDelete($id) {
        $group = StudentGroup::find($id);
        $group->delete();
        $notification = array(
            'message' => 'Student Group Successfully Deleted',
            'alert-type' => 'info'
        );

        return Redirect()->route('student.group.view')->with($notification);
    }
}
