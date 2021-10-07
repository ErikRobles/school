<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\ExamType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamTypeController extends Controller
{
    public function ViewExam() {
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type', $data);
    }

    public function AddExam() {
        return view('backend.setup.exam_type.add_exam_type');
    }

    public function ExamStore(Request $request) {
        $validateData = $request->validate([
            'name' => 'required|unique:exam_types,name',         
        ]);
        $data = new ExamType();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Exam Type Successfully Added',
            'alert-type' => 'success'
        );

        return Redirect()->route('exam.type.view')->with($notification);
    }

    public function ExamEdit($id) {
        $editData = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type', compact('editData'));
    }

    public function ExamUpdate(Request $request, $id) { 
        $data =  ExamType::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:exam_types,name,'.$data->id     
        ]);
        
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Exam Type Successfully Updated',
            'alert-type' => 'success'
        );

        return Redirect()->route('exam.type.view')->with($notification);
    }

    public function ExamDelete($id) {
        $exam = ExamType::find($id);
        $exam->delete();
        $notification = array(
            'message' => 'Exam Type Successfully Deleted',
            'alert-type' => 'info'
        );

        return Redirect()->route('exam.type.view')->with($notification);
    }
}
