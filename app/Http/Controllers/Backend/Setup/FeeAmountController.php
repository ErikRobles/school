<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\FeeCategory;
use App\Models\StudentYear;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\FeeCategoryAmount;
use App\Http\Controllers\Controller;

class FeeAmountController extends Controller
{
   public function ViewFeeAmount() {
    // $data['allData'] = FeeCategoryAmount::all();
    $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
    return view('backend.setup.fee_amount.view_fee_amount', $data);
   }

   public function AddFeeAmount() {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount', $data);
   }

   public function StoreFeeAmount(Request $request) {
    $class_id = count($request->class_id);
    if ($class_id !=NULL)
     {
       for ($i=0; $i<$class_id; $i++)
       {
           FeeCategoryAmount::insert(
                 ['fee_category_id' => $request->fee_category_id,
          'class_id' => $request->class_id[$i],
          'amount' => $request->amount[$i],
          'created_at'=>Carbon::now(),
          'updated_at'=>Carbon::now()
                     ]);
          } // End For Loop
    }// End If Condition
    $notification = array(
       'message' => 'Fee Amount Inserted Successfully',
       'alert-type' => 'success'
    );
           return redirect()->route('fee.amount.view')->with($notification);
   }

   public function FeeAmountEdit($fee_category_id) {
    $data['editData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
    // dd($data['editData']->toArray());
    $data['fee_categories'] = FeeCategory::all();
    $data['classes'] = StudentClass::all();
    return view('backend.setup.fee_amount.edit_fee_amount', $data);
   }

   public function FeeAmountUpdate(Request $request, $fee_category_id) {
      if($request->class_id == NULL) {
         $notification = array(
            'message' => 'Sorry, You have not selected any class amount.',
            'alert-type' => 'error'
         );
                return redirect()->route('fee.amount.edit', $fee_category_id)->with($notification);
      } else { 
         $countClass = count($request->class_id);
         FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete();
         for($i=0; $i < $countClass; $i++) {
            $fee_amount = new FeeCategoryAmount();
            $fee_amount->fee_category_id = $request->fee_category_id;
            $fee_amount->class_id = $request->class_id[$i];
            $fee_amount->amount = $request->amount[$i];
            $fee_amount->save();
         }
      }
      $notification = array(
         'message' => 'Fee Amount Successfully Updated',
         'alert-type' => 'success'
      );
      return redirect()->route('fee.amount.view')->with($notification);
   }

   public function FeeAmountDetails($fee_category_id) {
      $data['detailsData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
      return view('backend.setup.fee_amount.details_fee_amount', $data);
   }
}
