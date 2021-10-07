<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\FeeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeeCategoryController extends Controller
{
    public function ViewFeeCat() {
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_cat', $data);
    }
    
    public function AddFeeCat() {
        return view('backend.setup.fee_category.add_fee_cat');
    }

    public function StudentFeeCatStore(Request $request) {
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name',         
        ]);
        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Fee Category Successfully Added',
            'alert-type' => 'success'
        );

        return Redirect()->route('fee.category.view')->with($notification);
    }

    public function StudentFeeCatEdit($id) {
        $editData = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_cat', compact('editData'));
    }

    public function StudentFeeCatUpdate(Request $request, $id) {
        $data =  FeeCategory::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name,'.$data->id     
        ]);
        
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Fee Category Successfully Updated',
            'alert-type' => 'success'
        );

        return Redirect()->route('fee.category.view')->with($notification);
    }

    public function StudentFeeCatDelete($id) {
        $year = FeeCategory::find($id);
        $year->delete();
        $notification = array(
            'message' => 'Fee Category Successfully Deleted',
            'alert-type' => 'info'
        );

        return Redirect()->route('fee.category.view')->with($notification);
    }
}
