<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Marks\MarksController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;
use App\Http\Controllers\Backend\Employee\EmployeeMonthlySalaryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() { 
    Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
    Route::prefix('users')->group(function() { 
        // User Management
        Route::get('/view', [UserController::class, 'ViewUser'])->name('user.view');
        Route::get('/add', [UserController::class, 'AddUser'])->name('users.add');
        Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
        Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');
        

    });
    Route::prefix('profile')->group(function() { 
        Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
        Route::get('/edit/{id}', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
        Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
        Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
        Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
    });

    Route::prefix('setups')->group(function() { 
        Route::get('/student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');
        Route::get('/student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');
        Route::post('/student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('store.student.class');
        Route::get('/student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
        Route::post('/student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('update.student.class');
        Route::get('/student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');
        // Student Year routes
        Route::get('/student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');
        Route::get('/student/year/add', [StudentYearController::class, 'AddYear'])->name('student.year.add');
        Route::post('/student/year/store', [StudentYearController::class, 'StudentYearStore'])->name('store.student.year');
        Route::get('/student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
        Route::post('/student/class/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('update.student.year');
        Route::get('/student/class/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');
        // Student Group routes
        Route::get('/student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');
        Route::get('/student/group/add', [StudentGroupController::class, 'AddGroup'])->name('student.group.add');
        Route::post('/student/group/store', [StudentGroupController::class, 'StudentGroupStore'])->name('store.student.group');
        Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
        Route::post('/student/group/update/{id}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('update.student.group');
        Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');
        // Student Shift Routes
        Route::get('/student/shift/view', [StudentShiftController::class, 'ViewShift'])->name('student.shift.view');
        Route::get('/student/shift/add', [StudentShiftController::class, 'AddShift'])->name('student.shift.add');
        Route::post('/student/shift/store', [StudentShiftController::class, 'StudentShiftStore'])->name('store.student.shift');
        Route::get('/student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');
        Route::post('/student/shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('update.student.shift');
        Route::get('/student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');
        // Fee Category Routes
        Route::get('/fee/category/view', [FeeCategoryController::class, 'ViewFeeCat'])->name('fee.category.view');
        Route::get('/fee/category/add', [FeeCategoryController::class, 'AddFeeCat'])->name('fee.category.add');
        Route::post('/fee/category/store', [FeeCategoryController::class, 'StudentFeeCatStore'])->name('store.fee.category');
        Route::get('/fee/category/edit/{id}', [FeeCategoryController::class, 'StudentFeeCatEdit'])->name('fee.category.edit');
        Route::post('/fee/category/update/{id}', [FeeCategoryController::class, 'StudentFeeCatUpdate'])->name('update.fee.category');
        Route::get('/fee/category/delete/{id}', [FeeCategoryController::class, 'StudentFeeCatDelete'])->name('fee.category.delete');
        // Fee Category Amount Routes
        Route::get('/fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');
        Route::get('/fee/amount/add', [FeeAmountController::class, 'AddFeeAmount'])->name('fee.amount.add');
        Route::post('/fee/amount/store', [FeeAmountController::class, 'StoreFeeAmount'])->name('store.fee.amount');
        Route::get('/fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'FeeAmountEdit'])->name('fee.amount.edit');
        Route::post('/fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'FeeAmountUpdate'])->name('update.fee.amount');
        Route::get('/fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'FeeAmountDetails'])->name('fee.amount.details');
        // Exam Type Routes
        Route::get('/exam/type/view', [ExamTypeController::class, 'ViewExam'])->name('exam.type.view');
        Route::get('/exam/type/add', [ExamTypeController::class, 'AddExam'])->name('exam.type.add');
        Route::post('/exam/type/store', [ExamTypeController::class, 'ExamStore'])->name('store.exam.type');
        Route::get('/exam/type/edit/{id}', [ExamTypeController::class, 'ExamEdit'])->name('exam.type.edit');
        Route::post('/exam/type/update/{id}', [ExamTypeController::class, 'ExamUpdate'])->name('update.exam.type');
        Route::get('/exam/type/delete/{id}', [ExamTypeController::class, 'ExamDelete'])->name('exam.type.delete');
        // School Subject Routes
        Route::get('/school/subject/view', [SchoolSubjectController::class, 'ViewSubject'])->name('school.subject.view');
        Route::get('/school/subject/add', [SchoolSubjectController::class, 'AddSubject'])->name('school.subject.add');
        Route::post('/school/subject/store', [SchoolSubjectController::class, 'SubjectStore'])->name('store.school.subject');
        Route::get('//school/subject/edit/{id}', [SchoolSubjectController::class, 'SubjectEdit'])->name('school.subject.edit');
        Route::post('/school/subject/update/{id}', [SchoolSubjectController::class, 'SubjectUpdate'])->name('update.school.subject');
        Route::get('/school/subject/delete/{id}', [SchoolSubjectController::class, 'SubjectDelete'])->name('school.subject.delete');
        // Assign Subject Routes
        Route::get('/assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');
        Route::get('/assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add');
        Route::post('/assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign.subject');
        Route::get('/assign/subject/edit/{class_id}', [AssignSubjectController::class, 'AssignSubjectEdit'])->name('assign.subject.edit');
        Route::post('/assign/subject/update/{class_id}', [AssignSubjectController::class, 'AssignSubjectUpdate'])->name('update.assign.subject');
        Route::get('/assign/subject/details/{class_id}', [AssignSubjectController::class, 'AssignSubjectDetails'])->name('assign.subject.details');
        // Designation Routes
        Route::get('/designation/view', [DesignationController::class, 'ViewDesignation'])->name('designation.view');
        Route::get('/designation/add', [DesignationController::class, 'AddDesignation'])->name('designation.add');
        Route::post('/designation/store', [DesignationController::class, 'DesignationStore'])->name('store.designation');
        Route::get('/designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');
        Route::post('/designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('update.designation');
        Route::get('/designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');
    });
        // Student Registration
    Route::prefix('students')->group(function() { 
        Route::get('/reg/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');
        Route::get('/reg/add', [StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');
        Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');
        Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');
        Route::get('/reg/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
        Route::post('/reg/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');
        Route::get('/reg/promote/{student_id}', [StudentRegController::class, 'StudentRegPromote'])->name('student.registration.promotion');
        Route::post('/reg/update/promote/{student_id}', [StudentRegController::class, 'StudentUpdatePromote'])->name('promotion.student.registration');
        Route::get('/reg/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');
        // Student Roll Generate Routes
        Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');
        Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');
        Route::post('/role/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');
       // Registration Fee Route
        Route::get('/reg/fee/view', [RegistrationFeeController::class, 'RegFeeView'])->name('registration.fee.view');
        Route::get('/reg/fee/classwisedata', [RegistrationFeeController::class, 'RegFeeClassData'])->name('student.registration.fee.classwise.get');
        Route::get('/reg/fee/payslip', [RegistrationFeeController::class, 'RegFeePayslip'])->name('student.registration.fee.payslip');
        // Monthly Fee Route
        Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');
        Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
        Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');
        // Exam Fee Routes
        Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');
        Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassData'])->name('student.exam.fee.classwise.get');
        Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('student.exam.fee.payslip');
    }); 
    Route::prefix('employees')->group(function() { 
        // Employee Registration Routes
        Route::get('/reg/employee/view', [EmployeeRegController::class, 'EmployeeView'])->name('employee.registration.view');
        Route::get('/reg/employee/add', [EmployeeRegController::class, 'EmployeeAdd'])->name('employee.registration.add');
        Route::post('/reg/employee/store', [EmployeeRegController::class, 'EmployeeStore'])->name('store.employee.registration');
        Route::get('/reg/employee/edit/{id}', [EmployeeRegController::class, 'EmployeeEdit'])->name('employee.registration.edit');
        Route::post('/reg/employee/update/{id}', [EmployeeRegController::class, 'EmployeeUpdate'])->name('update.employee.registration');
        Route::get('/reg/employee/details/{id}', [EmployeeRegController::class, 'EmployeeDetails'])->name('employee.registration.details');
        // Employee salary
        Route::get('/salary/employee/view', [EmployeeSalaryController::class, 'EmployeeSalaryView'])->name('employee.salary.view');
        Route::get('/salary/employee/increment/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryIncrement'])->name('employee.salary.increment');
        Route::post('/update/increment/store/{id}', [EmployeeSalaryController::class, 'EmployeeUpdateIncrement'])->name('update.increment.store');
        Route::get('/salary/employee/details/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryDetails'])->name('employee.salary.details');
        // Employee Leave routes
        Route::get('/leave/employee/view', [EmployeeLeaveController::class, 'EmployeeLeaveView'])->name('employee.leave.view');
        Route::get('/leave/employee/add', [EmployeeLeaveController::class, 'EmployeeLeaveAdd'])->name('employee.leave.add');
        Route::post('/leave/employee/store', [EmployeeLeaveController::class, 'EmployeeLeaveStore'])->name('store.employee.leave');
        Route::get('/leave/employee/edit/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveEdit'])->name('employee.leave.edit');
        Route::post('/leave/employee/update/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveUpdate'])->name('update.employee.leave');
        Route::get('/leave/employee/delete/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveDelete'])->name('employee.leave.delete');
        // Employee Attendance Routes
        Route::get('/attendance/employee/view', [EmployeeAttendanceController::class, 'EmployeeAttendanceView'])->name('employee.attendance.view');
        Route::get('/attendance/employee/add', [EmployeeAttendanceController::class, 'EmployeeAttendanceAdd'])->name('employee.attendance.add');
        Route::post('/attendance/employee/store', [EmployeeAttendanceController::class, 'EmployeeAttendanceStore'])->name('store.employee.attendance');
        Route::get('/attendance/employee/edit/{date}', [EmployeeAttendanceController::class, 'EmployeeAttendanceEdit'])->name('employee.attendance.edit');
        Route::get('/attendance/employee/details/{date}', [EmployeeAttendanceController::class, 'EmployeeAttendanceDetails'])->name('employee.attendance.details');
        // Employee Monthly Salary Routes
        Route::get('/monthly/salary/employee/view', [EmployeeMonthlySalaryController::class, 'EmployeeMonthlySalaryView'])->name('employee.monthly.salary.view');
        Route::get('/monthly/salary/employee/get', [EmployeeMonthlySalaryController::class, 'EmployeeMonthlySalaryGet'])->name('employee.monthly.salary.get');
        Route::get('/employee/monthly/salary/payslip/{employee_id}', [EmployeeMonthlySalaryController::class, 'EmployeeMonthlySalaryPayslip'])->name('employee.monthly.salary.payslip');
    });
    Route::prefix('marks')->group(function() { 
        // User Management
        Route::get('/marks/entry/add', [MarksController::class, 'MarksEntryAdd'])->name('marks.entry.add');
        Route::post('/marks/entry/store', [MarksController::class, 'MarksEntryStore'])->name('marks.entry.store');
        Route::get('/marks/entry/edit', [MarksController::class, 'MarksEdit'])->name('marks.entry.edit');
        Route::get('/marks/getstudents/edit', [MarksController::class, 'MarksEditGetStudents'])->name('student.edit.getstudents');
        Route::post('marks/entry/update', [MarksController::class, 'MarksUpdate'])->name('marks.entry.update');  

    });
    Route::get('/marks/getsubject', [DefaultController::class, 'GetSubject'])->name('marks.getsubject');
    Route::get('/student/marks/getstudents', [DefaultController::class, 'GetStudents'])->name('student.marks.getstudents');

}); // End Middleware Auth Route