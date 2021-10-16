@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
          <div class="row">
              <div class="col-12">
                		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Employee Leave</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('update.employee.leave', $editData->id) }}">
                        @csrf
                       
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Employee Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="employee_id" id="employee_id" required class="form-control">
                                            <option value="" selected disabled>Select Employee Name</option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}" {{ ($editData->employee_id == $employee->id) ? "selected" : "" }}>{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div><!--End col md 6-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Start Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="start_date" value="{{ $editData->start_date }}" class="form-control" required> 
                                    </div>
							    </div>
                                
                            </div><!--End col md 6-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Leave Purpose <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="leave_purpose_id" id="leave_purpose_id" required class="form-control">
                                            <option value="" selected disabled>Select Leave Purpose</option>
                                            @foreach($leave_purpose as $purpose)
                                                <option value="{{ $purpose->id }}" {{ ($editData->leave_purpose_id == $purpose->id) ? "selected" : "" }}>{{ $purpose->name }}</option>
                                            @endforeach
                                            <option value="0">New Purpose</option>
                                        </select>
                                        <input type="text" name="name" id="add_another" class="form-control mt-3" placeholder="Write Purpose" style="display: none;">
                                    </div>
                                </div>
                                
                            </div><!--End col md 6-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>End Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="end_date" value="{{ $editData->end_date }}" class="form-control" required> 
                                    </div>
							    </div>
                            </div><!--End col md 6-->
                        </div><!--End row-->

                               
						<div class="text-xs-right">
							<input type="submit" value="Update Leave" class="btn btn-rounded btn-info mb-5">
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
<script>
    $(document).ready(function() {
        $(document).on('change', '#leave_purpose_id', function() {
            let leave_purpose_id = $(this).val();
            if(leave_purpose_id == '0') {
                $('#add_another').show();
            } else {
                $('#add_another').hide();
            }
        });
    });
</script>
  @endsection
