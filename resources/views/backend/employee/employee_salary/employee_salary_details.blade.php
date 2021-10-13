@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
          <div class="row">
              <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Employee Salary Details</h3>
                      <h6><strong>Employee Name:</strong> {{ $details->name }}</h6>
                      <h6><strong>Employee ID Number:</strong> {{ $details->id_no }}</h6>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                          <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">Id</th>                                   
                                    <th>Previous Salary</th>
                                    <th>Increment Salary</th>
                                    <th>Present Salary</th>
                                    <th>Effected Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salary_log as $key => $log)
                                <tr>
                                    <td>{{ $key+1 }}</td>                                   
                                    <td>{{ $log->previous_salary }}</td>
                                    <td>{{ $log->increment_salary }}</td>
                                    <td>{{ $log->present_salary }}</td>
                                    <td>{{ date('d-m-Y', strtotime($log->effected_salary)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="5%">Id</th>                                   
                                    <th>Previous Salary</th>
                                    <th>Increment Salary</th>
                                    <th>Present Salary</th>
                                    <th>Effected Date</th>
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