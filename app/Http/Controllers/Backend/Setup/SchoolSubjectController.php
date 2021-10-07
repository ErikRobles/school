<?php

namespace App\Http\Controllers\Backend\Setup;

use Illuminate\Http\Request;
use App\Models\SchoolSubject;
use App\Http\Controllers\Controller;

class SchoolSubjectController extends Controller
{
    public function ViewSubject() {
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject', $data);
    }
    
    public function AddSubject() {
        return view('backend.setup.school_subject.add_school_subject');
    }

    public function SubjectStore(Request $request) {
        $validateData = $request->validate([
            'name' => 'required|unique:school_subjects,name',         
        ]);
        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Subject Successfully Added',
            'alert-type' => 'success'
        );

        return Redirect()->route('school.subject.view')->with($notification);
    }

    public function SubjectEdit($id) {
        $editData = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject', compact('editData'));
    }

    public function SubjectUpdate(Request $request, $id) {
        $data =  SchoolSubject::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:school_subjects,name,'.$data->id     
        ]);
        
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Subject Successfully Updated',
            'alert-type' => 'success'
        );

        return Redirect()->route('school.subject.view')->with($notification);
    }
 
    public function SubjectDelete($id) {
        $year = SchoolSubject::find($id);
        $year->delete();
        $notification = array(
            'message' => 'Subject Successfully Deleted',
            'alert-type' => 'info'
        );

        return Redirect()->route('school.subject.view')->with($notification);
    }
}
