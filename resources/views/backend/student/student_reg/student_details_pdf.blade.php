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
        <p><strong>Student Details</strong></p>
      </td>
    </tr>
  </table>

<table id="customers">
  <tr>
    <th width="10%">Item</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Student Name</td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Student ID Number</td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Student Roll</td>
    <td>{{ $details->roll }}</td>
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
    <td>Mobile Number</td>
    <td>{{ $details['student']['mobile'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td>Student Address</td>
    <td>{{ $details['student']['address'] }}</td>
  </tr>
  <tr>
    <td>8</td>
    <td>Student Gender</td>
    <td>{{ $details['student']['gender'] }}</td>
  </tr>
  <tr>
    <td>9</td>
    <td>Student's D.O.B.</td>
    <td>{{ $details['student']['dob'] }}</td>
  </tr>
  <tr>
    <td>10</td>
    <td>Discount</td>
    <td>{{ $details['discount']['discount'] }}%</td>
  </tr>
  <tr>
    <td>11</td>
    <td>Year</td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>
  <tr>
    <td>12</td>
    <td>Class</td>
    <td>{{ $details['student_class']['name'] }}</td>
  </tr>
  <tr>
    <td>13</td>
    <td>Group</td>
    <td>{{ $details['group']['name'] }}</td>
  </tr>
  <tr>
    <td>14</td>
    <td>Shift</td>
    <td>{{ $details['shift']['name'] }}</td>
  </tr>
</table>
<br><br>
<i style="font-size: 10px;float: right;">Print Data {{ date("M d Y") }}</i>
</body>
</html>


