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
			  <h4 class="box-title">Add Employee Leave</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="">
                        @csrf
                       
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Employee Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="employee_id" id="employee_id" required class="form-control">
                                            <option value="" selected disabled>Select Employee Name</option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div><!--End col md 6-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Leave Purpose <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="leave_purpose_id" required class="form-control">
                                            <option value="" selected disabled>Select Leave Purpose</option>
                                            @foreach($leave_purpose as $purpose)
                                                <option value="{{ $purpose->id }}">{{ $purpose->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div><!--End col md 6-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Start Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="start_date" class="form-control" required> 
                                    </div>
							    </div>
                            </div><!--End col md 6-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>End Datet <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="end_date" class="form-control" required> 
                                    </div>
							    </div>
                            </div><!--End col md 6-->
                        </div><!--End row-->

                               
						<div class="text-xs-right">
							<input type="submit" value="Increase Salary" class="btn btn-rounded btn-info mb-5">
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
