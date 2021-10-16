@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
          <div class="row">
              <div class="col-12">
                		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Attendance</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('store.employee.attendance') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Attendance Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="date" class="form-control" required> 
                                    </div>
							    </div>
                            </div><!--End col md 6-->
                            <div class="col-md-6">
                                
                            </div><!--End col md 6-->
                        </div><!--End Row-->
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Id</th>
                                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee List</th>
                                                <th colspan="3" class="text-center" style="vertical-align: middle;width:30%;">Attendance Status</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center btn present_all" style="display:table-cell;background-color: #000;">Present</th>
                                                <th class="text-center btn leave_all" style="display:table-cell;background-color: #000;">Leave</th>
                                                <th class="text-center btn absent_all" style="display:table-cell;background-color: #000;">Absent</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($employees as $key => $employee)
                                            <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                                            <tr id="div{{$employee->id}}" class="text-center">
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $employee->name }}</td>
                                                <td colspan="3">
                                                    <div class="switch-toggle switch-3 switch-candy">
                                                        <input type="radio" name="attend_status{{$key}}" id="present{{$key}}" value="Present" checked="checked">
                                                        <label for="present{{$key}}">Present</label>
                                                        <input type="radio" name="attend_status{{$key}}" id="leave{{$key}}" value="Leave">
                                                        <label for="leave{{$key}}">Leave</label>
                                                        <input type="radio" name="attend_status{{$key}}" id="absent{{$key}}" value="Absent">
                                                        <label for="absent{{$key}}">Absent</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div> <!--End col md 12-->   
                        </div>  <!--End Row 2-->     
						<div class="text-xs-right">
							<input type="submit" value="Add Attendance" class="btn btn-rounded btn-info mb-5">
						</div>
					</form>
				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
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