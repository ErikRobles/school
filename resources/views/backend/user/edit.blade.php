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
			  <h4 class="box-title">Edit User</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('users.update', $editData->id) }}">
                        @csrf
					  <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
								<h5>Select Role <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="role" id="role" required class="form-control">
										<option value="{{ $editData->role }}" selected disabled>{{ $editData->role }}</option>
										<option value="Admin">Admin</option>
										<option value="Teacher">Teacher</option>
										<option value="Student">Student</option>
									</select>
								</div>
							</div>
                          </div>
                           {{-- End Col 6 --}}
                          <div class="col-md-6">
                            <div class="form-group">
								<h5>User Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" value="{{ $editData->name }}" class="form-control" required> 
                                </div>
							</div>
                          </div>
                          {{-- End col 6 --}}
                        </div> 
                        {{-- End Row --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Email <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="email" name="email" value="{{ $editData->email }}" class="form-control" required> 
                                    </div>
							    </div>
                            </div>
                            {{-- End col 6 --}}
                            
                        </div>
                        {{-- End Row --}}
						
					  
						<div class="text-xs-right">
							<input type="submit" value="Update User" class="btn btn-rounded btn-info mb-5">
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
