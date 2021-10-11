<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="{{ asset('../backend/images/favicon.ico') }}">
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

<table id="customers">
    <tr>
      <td style="text-align: center;">
        <img style="width: 100px;" src="{{ public_path('/backend/images/textlogored.png') }}" alt=""><br>
        <img style="width: 75px;" src="{{ public_path('/backend/images/greylogo.png') }}" alt="">
      </td>
      <td>
      <h3>Lionsfield School ERP</h3>
        <p><strong>Address:</strong></p>
        <p>Arquímedes 130, Piso 5. Col. Polanco V Sección<br>
            CDMX, C.P. 11560</p>
        <p><strong>Email:</strong> atencion@lionsfield.mx </p>
        <p><strong>Student Registration Fee</strong></p>
      </td>
    </tr>
  </table>

  @php
    $registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','4')->where('class_id',$details->class_id)->first();
    $originalfee = $registrationfee->amount;
            $discount = $details['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;
  @endphp

<table id="customers">
  <tr>
    <th width="10%">Item</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Id Number</td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>
  <tr>
    <td>2</td>  
    <td>Roll Number</td>
    @if($details->roll != null)
    <td>{{ $details->roll }}</td>
    @else
    <td>Roll Number not yet assigned</td>
    @endif
  </tr>
  <tr>
    <td>3</td>
    <td>Student Name</td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Father's Name</td>
    <td>{{ $details['student']['fname'] }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Mother's Name</td>
    <td>{{ $details['student']['mname'] }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td>Session</td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td>Class</td>
    <td>{{ $details['student_class']['name'] }}</td>
  </tr>
  <tr>
    <td>8</td>
    <td>Registration Fee</td>
    <td>${{ $originalfee }}</td>
  </tr>
  <tr>
    <td>9</td>
    <td>Discount Fee</td>
    @if($discount != null)
    <td>{{ $discount }}%</td>
    @else
    <td>No Discount Applied</td>
    @endif
  </tr>
  <tr>
    <td>10</td>
    <td>Fee for this student</td>
    <td>${{ $finalfee }}</td>
  </tr>

</table>
<br>
<i style="font-size: 10px;float: right; margin-top: 5px;">Print Data {{ date("M d Y") }}</i>

<hr style="border: dashed 2px; width: 95%; color: #eb5858; margin-bottom: 50px,">
<br><br>
<table id="customers" style="margin-bottom: 10px;">
    <tr>
      <th width="10%">Item</th>
      <th width="45%">Student Details</th>
      <th width="45%">Student Data</th>
    </tr>
    <tr>
      <td>1</td>
      <td>Id Number</td>
      <td>{{ $details['student']['id_no'] }}</td>
    </tr>
    <tr>
      <td>2</td>  
      <td>Roll Number</td>
      @if($details->roll != null)
      <td>{{ $details->roll }}</td>
      @else
      <td>Roll Number not yet assigned</td>
      @endif
    </tr>
    <tr>
      <td>3</td>
      <td>Student Name</td>
      <td>{{ $details['student']['name'] }}</td>
    </tr>
    <tr>
      <td>4</td>
      <td>Father's Name</td>
      <td>{{ $details['student']['fname'] }}</td>
    </tr>
    <tr>
      <td>5</td>
      <td>Mother's Name</td>
      <td>{{ $details['student']['mname'] }}</td>
    </tr>
    <tr>
      <td>6</td>
      <td>Session</td>
      <td>{{ $details['student_year']['name'] }}</td>
    </tr>
    <tr>
      <td>7</td>
      <td>Class</td>
      <td>{{ $details['student_class']['name'] }}</td>
    </tr>
    <tr>
      <td>8</td>
      <td>Registration Fee</td>
      <td>${{ $originalfee }}</td>
    </tr>
    <tr>
      <td>9</td>
      <td>Discount Fee</td>
      @if($discount != null)
      <td>{{ $discount }}%</td>
      @else
      <td>No Discount Applied</td>
      @endif
    </tr>
    <tr>
      <td>10</td>
      <td>Fee for this student</td>
      <td>${{ $finalfee }}</td>
    </tr>
  
  </table> 
   <i style="font-size: 10px;float: right;">Print Data {{ date("M d Y") }}</i>
</body>
</html>


