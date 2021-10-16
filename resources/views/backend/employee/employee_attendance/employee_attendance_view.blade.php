@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
          <div class="row">
              <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Employee Attendance</h3>
                      <a href="{{ route('employee.attendance.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Employee Attendance</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">Id</th>
                                    <th>Date</th>                                  
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allData as $key => $value)
                                <tr>
                                  <td>{{ $key+1 }}</td>                                   
                                  <td>{{ date('m-d-Y', strtotime($value->date)) }}</td>                                  
                                    <td>
                                        <a href="{{ route('employee.attendance.edit', $value->date) }}" class="btn btn-rounded btn-primary">Edit</a>
                                        <a href="{{ route('employee.attendance.details', $value->date) }}" class="btn btn-rounded btn-info">Details</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="5%">Id</th>                                
                                    <th>Date</th>                                    
                                    <th width="20%">Action</th>
                                </tr>
                            </tfoot>
                          </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
              </div>
          </div>
      </section>
        
    </div>
</div>
  @endsection