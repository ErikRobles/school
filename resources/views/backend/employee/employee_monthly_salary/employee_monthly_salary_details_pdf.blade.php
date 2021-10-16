<!DOCTYPE html>
<html>
<head>
    <title>Details PDF</title>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #eb5858;
  color: white;
}
</style>
</head>
<body>

<h1>Student Details</h1>

<table id="customers">
    <tr>
      <td style="text-align: center;">
        <img style="width: 100px;" src="{{ public_path('/backend/images/textlogored.png') }}" alt=""><br>
        <img style="width: 75px;" src="{{ public_path('/backend/images/greylogo.png') }}" alt="">
      </td>
      <td>
      <h2>Lionsfield School ERP</h2>
        <p><strong>Address:</strong></p>
        <p>Arquímedes 130, Piso 5. Col. Polanco V Sección<br>
            CDMX, C.P. 11560</p>
        <p><strong>Email:</strong> atencion@lionsfield.mx </p>
        <p><strong>Employee Monthly Salary Details</strong></p>
      </td>
    </tr>
  </table>

@php
    $date = date('Y-m', strtotime($details['0']->date));
    if($date != '') {
        $where[] = ['date', 'like', $date.'%'];
    }
    $totalattend = App\Models\EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$details['0']->employee_id)->get();
    $salary = (float)$details['0']['user']['salary'];
    $salaryperday = (float)$salary/30;
    $absentcount = count($totalattend->where('attend_status', 'Absent'));
    $totalsalaryminus = (float)$absentcount * (float)$salaryperday;
    $totalsalary = (float)$salary-(float)$totalsalaryminus;
@endphp

<table id="customers">
  <tr>
    <th width="10%">Item</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Employee Name</td>
    <td>{{ $details['0']['user']['name'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Basic Salary</td>
    <td>${{ $details['0']['user']['salary'] }}</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Total This Month</td>
    <td>{{ $absentcount }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Month</td>
    <td>{{ date('M Y', strtotime($details['0']->date)) }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Salary This Month</td>
    <td>${{ round($totalsalary, 2) }}</td>
  </tr>
</table>
<br>
<i style="font-size: 10px;float: right;">Print Data {{ date("M d Y") }}</i>
<hr style="border: dashed 2px; width: 95%; color: #eb5858;">
<br><br>
<table id="customers">
    <tr>
      <th width="10%">Item</th>
      <th width="45%">Employee Details</th>
      <th width="45%">Employee Data</th>
    </tr>
    <tr>
      <td>1</td>
      <td>Employee Name</td>
      <td>{{ $details['0']['user']['name'] }}</td>
    </tr>
    <tr>
      <td>2</td>
      <td>Basic Salary</td>
      <td>${{ $details['0']['user']['salary'] }}</td>
    </tr>
    <tr>
      <td>3</td>
      <td>Total This Month</td>
      <td>{{ $absentcount }}</td>
    </tr>
    <tr>
      <td>4</td>
      <td>Month</td>
      <td>{{ date('M Y', strtotime($details['0']->date)) }}</td>
    </tr>
    <tr>
      <td>5</td>
      <td>Salary This Month</td>
      <td>${{ round($totalsalary,2) }}</td>
    </tr>
  </table>
  <br>
  <i style="font-size: 10px;float: right;">Print Data {{ date("M d Y") }}</i>

</body>
</html>


