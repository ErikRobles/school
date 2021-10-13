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
			  <h4 class="box-title">Edit Employee</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('update.employee.registration', $editData->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">

                                <div class="row"><!--First Row-->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Employee Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{ $editData->name }}" class="form-control" required> 
                                            </div>
                                        </div>
                                    </div><!--End col md 3-->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" value="{{ $editData->email }}" class="form-control"> 
                                            </div>
                                        </div>
                                    </div><!--End col md 3-->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Mobile Number <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" value="{{ $editData->mobile }}" class="form-control"> 
                                            </div>
                                        </div>
                                    </div><!--End col md 3-->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Address <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address" value="{{ $editData->address }}" class="form-control"> 
                                            </div>
                                        </div>
                                    </div><!--End col md 3-->
                                    
                                </div><!--End 1st row-->

                                <div class="row"><!--Second Row-->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Date of Birth <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="dob" value="{{ $editData->dob }}" class="form-control"> 
                                            </div>
                                        </div>
                                    </div><!--End col md 3-->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Designation <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="designation_id" class="form-control">
                                                    <option selected disabled>Select Designation</option>
                                                    @foreach($designation as $ds)
                                                        <option value="{{ $ds->id }}" {{ ($editData->designation_id == $ds->id ) ? 'selected' : '' }}>{{ $ds->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div><!--End col md 3-->
                                    @if(!@editData)
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Salary <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="salary" value="{{ $editData->salary }}" class="form-control"> 
                                                </div>
                                            </div>
                                        </div><!--End col md 3-->
                                    @endif
                                    @if(!@editData)
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Joining Date <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" name="join_date" value="{{ $editData->join_date }}"class="form-control"> 
                                                </div>
                                            </div>
                                        </div><!--End col md 3-->
                                    @endif
                                </div><!--End 2nd row-->

                                

                                <div class="row"><!--Third Row-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Profile Image </h5>
                                            <div class="controls">
                                                <input type="file" name="image" id="image" class="form-control"> 
                                            </div>
                                         </div>
                                    </div><!--End col md 6-->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls" style="padding-top: 10px;">
                                                <div style="width:75px;height:75px;position:relative;overflow: hidden;border-radius:50%;border: 3px solid #bdd1f8">
                                                    <img src="{{ (!empty($editData->image)) ? url('/upload/employee_images/' . $editData->image) : url('/upload/no_image.jpg') }}" style=" display:inline;margin: 0 auto;height: 100%;width: auto;" class="img-circle text-center mb-2" alt="User Image" style="width: 75px; border-radius: 50%;" id="showImage" alt="">
                                                </div>
                                            </div>
                                         </div>
                                    </div><!--End col md 6-->

                                </div><!--End 3rd row-->

                                <div class="text-xs-right">
                                    <input type="submit" value="Update Employee" class="btn btn-rounded btn-info mb-5">
                                </div>
                            </div>
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
        $('#image').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
  @endsection
