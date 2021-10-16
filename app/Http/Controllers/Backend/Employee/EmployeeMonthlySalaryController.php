<?php

namespace App\Http\Controllers\Backend\Employee;

use PDF;
use App\Models\User;
use App\Models\Designation;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Models\DiscountStudent;
use App\Models\EmployeeSalaryLog;
use App\Models\EmployeeAttendance;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmployeeMonthlySalaryController extends Controller
{
    public function EmployeeMonthlySalaryView() {
        return view('backend.employee.employee_monthly_salary.employee_monthly_salary_view');
    }

    public function EmployeeMonthlySalaryGet(Request $request) {
        $date = date('Y-m', strtotime($request->date));
        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }
        
        $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>ID</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary This Month</th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($data as $key => $attend) {
            $totalattend = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
            $absentcount = count($totalattend->where('attend_status', 'Absent'));
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';
            
            
            $salary = (float)$attend['user']['salary'];
            $salaryperday = (float)$salary/30;
            $totalsalaryminus = (float)$absentcount * (float)$salaryperday;
            $totalsalary = (float)$salary-(float)$totalsalaryminus;

            $html[$key]['tdsource'] .='<td>'. '$'. $totalsalary.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("employee.monthly.salary.payslip", $attend->employee_id).'">Pay Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }  
       return response()->json(@$html);
    }

    public function EmployeeMonthlySalaryPayslip(Request $request, $employee_id) {
        $id = EmployeeAttendance::where('employee_id', $employee_id)->first();
        $date = date('Y-m', strtotime($id->date));
        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }
        $data['details'] = EmployeeAttendance::with(['user'])->where($where)->where('employee_id', $id->employee_id)->get();
        $pdf = PDF::loadView('backend.employee.employee_monthly_salary.employee_monthly_salary_details_pdf', $data);
       return $pdf->stream('document.pdf'); 
    }
}
