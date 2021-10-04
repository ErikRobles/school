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
			  <h4 class="box-title">Edit Profile</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                        @csrf
					  <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
								<h5>User Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" value="{{ $editData->name }}" class="form-control" required> 
                                </div>
							</div>
                          </div>
                          {{-- End col 6 --}}
                       
                        
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
                      {{-- End Row  --}}
                      <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>User Mobile <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="mobile" value="{{ $editData->mobile }}" class="form-control" required> 
                                    </div>
                                </div>
                              </div>
                              {{-- End col 6 --}}
                              <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Address <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="address" value="{{ $editData->email }}" class="form-control" required> 
                                    </div>
							    </div>
                            </div>
                            {{-- End col 6 --}}
                        </div>
                        {{-- End Row --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Gender <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="gender" id="role" required class="form-control">
                                            <option value="{{ !empty($editData->gender) ? $editData->gender : '' }}" selected >{{ !empty($editData->gender) ? $editData->gender : 'Select Gender' }}</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Rather Not Say">I'd rather not say.</option>
                                        </select>
                                    </div>
                                </div>
                              </div>
                               {{-- End Col 6 --}}
                            
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Profile Image </h5>
                                        <div class="controls">
                                            <input type="file" name="image" id="image" class="form-control"> 
                                        </div>
                                     </div>
                                     <div class="form-group">
                                        <div class="controls">
                                            <img src="{{ (!empty($editData->image)) ? url('/upload/user_images/' . $editData->image) : url('/upload/no_image.jpg') }}" class="img-circle text-center mb-2" alt="User Image" style="width: 75px; border-radius: 50%;" id="showImage" alt="">
                                        </div>
                                     </div>
                                </div>
                                {{-- End col 6 --}}
                              </div>
                        {{-- End Row --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="text-xs-right">
                                        <input type="submit" value="Update User" class="btn btn-rounded btn-info mb-5">
                                    </div>
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
