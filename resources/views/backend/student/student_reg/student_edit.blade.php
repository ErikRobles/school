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
			  <h4 class="box-title">Edit Student</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('update.student.registration', $editData->student_id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $editData->id }}" />
                        <div class="row">
                            <div class="col-12">


                                <div class="row"><!--First Row-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Student Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" value="{{ $editData['student']['name'] }}" required> 
                                            </div>
                                        </div>
                                    </div><!--End col md 4-->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Father's Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="fname" class="form-control" value="{{ $editData['student']['fname'] }}"> 
                                            </div>
                                        </div>
                                    </div><!--End col md 4-->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Mother's Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mname" class="form-control" value="{{ $editData['student']['mname'] }}"> 
                                            </div>
                                        </div>
                                    </div><!--End col md 4-->
                                </div><!--End 1st row-->

                                <div class="row"><!--Second Row-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Mobile Number <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" class="form-control" value="{{ $editData['student']['mobile'] }}"> 
                                            </div>
                                        </div>
                                    </div><!--End col md 4-->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Address <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address" class="form-control" value="{{ $editData['student']['address'] }}"> 
                                            </div>
                                        </div>
                                    </div><!--End col md 4-->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Gender <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="gender" class="form-control">
                                                    <option selected disabled>Select Gender</option>
                                                    <option value="Male" {{ ($editData['student']['gender'] == "Male") ? "selected" : "" }}>Male</option>
                                                    <option value="Female" {{ ($editData['student']['gender'] == "Female") ? "selected" : "" }}>Female</option>
                                                    <option value="Rather Not Say" {{ ($editData['student']['gender'] == "Rather Not Say") ? "selected" : "" }}>I'd rather not say.</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!--End col md 4-->
                                </div><!--End 2nd row-->

                                <div class="row"><!--Third Row-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Date of Birth <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="dob" class="form-control" value="{{ $editData['student']['dob'] }}"> 
                                            </div>
                                        </div>
                                    </div><!--End col md 6-->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Discount <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="discount" class="form-control" value="{{ $editData['discount']['discount'] }}"> 
                                            </div>
                                        </div>
                                    </div><!--End col md 6-->
                                </div><!--End 3rd row-->

                                <div class="row"><!--Fourth Row-->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Year <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="year_id" class="form-control">
                                                    <option selected disabled>Select Year</option>
                                                    @foreach($years as $year)
                                                        <option value="{{ $year->id }}" {{ ($editData->year_id == $year->id) ? "selected" : "" }}>{{ $year->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div><!--End col md 3-->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Class <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="class_id" class="form-control">
                                                    <option selected disabled>Select Class</option>
                                                    @foreach($classes as $class)
                                                        <option value="{{ $class->id }}" {{ ($editData->class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div><!--End col md 3-->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Group <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="group_id" class="form-control">
                                                    <option selected disabled>Select Group</option>
                                                    @foreach($groups as $group)
                                                        <option value="{{ $group->id }}" {{ ($editData->group_id == $group->id) ? "selected" : "" }}>{{ $group->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div><!--End col md 3-->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Shift <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="shift_id" class="form-control">
                                                    <option selected disabled>Select Group</option>
                                                    @foreach($shifts as $shift)
                                                        <option value="{{ $shift->id }}" {{ ($editData->shift_id == $shift->id) ? "selected" : "" }}>{{ $shift->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div><!--End col md 3-->
                                </div><!--End 4th row-->

                                <div class="row"><!--Fifth Row-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Profile Image </h5>
                                            <div class="controls">
                                                <input type="file" name="image" id="image" class="form-control"> 
                                            </div>
                                         </div>
                                    </div><!--End col md 6-->
                                    {{-- Hello Text --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls" style="padding-top: 10px;">
                                                <div style="width:75px;height:75px;position:relative;overflow: hidden;border-radius:50%;border: 3px solid #bdd1f8;">
                                                    <img src="{{ (!empty($editData['student']['image'])) ? url('/upload/student_images/' . $editData['student']['image']) : url('/upload/no_image.jpg') }}" style=" display:inline;margin: 0 auto;height: 100%;width: auto;" class="img-circle text-center mb-2" alt="User Image" style="width: 75px; border-radius: 50%;" id="showImage" alt="">
                                                </div>
                                            </div>
                                         </div>
                                    </div><!--End col md 6-->

                                </div><!--End 5th row-->

                                <div class="text-xs-right">
                                    <input type="submit" value="Update Student" class="btn btn-rounded btn-info mb-5">
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
