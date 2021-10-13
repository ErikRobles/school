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
        <p><strong>Employee Details</strong></p>
      </td>
    </tr>
  </table>

<table id="customers">
  <tr>
    <th width="10%">Item</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Employee Name</td>
    <td>{{ $details->name }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Employee ID Number</td>
    <td>{{ $details->id_no }}</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Email</td>
    <td>{{ $details->email }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Mobile Number</td>
    <td>{{ $details->mobile }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Employee Address</td>
    <td>{{ $details->address }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td>Employee Designation</td>
    <td>{{ $details['designation']['name'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td>Employee's D.O.B.</td>
    <td>{{ date('m-d-Y', strtotime($details->dob)) }}</td>
  </tr>
  <tr>
    <td>8</td>
    <td>Employee's Joining Date</td>
    <td>{{ date('m-d-Y', strtotime($details->join_date)) }}</td>
  </tr>
  <tr>
    <td>9</td>
    <td>Employee Salary</td>
    <td>${{ $details->salary }}</td>
  </tr>
</table>
<br><br>
<i style="font-size: 10px;float: right;">Print Data {{ date("M d Y") }}</i>
</body>
</html>


