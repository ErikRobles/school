@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
          <div class="row">
              <div class="col-12">
                <div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
					  <h3 class="widget-user-username">Name: {{ $user->name }}</h3>
                      <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Edit Profile</a>
					  <h6 class="widget-user-desc">Role: {{ $user->usertype }}</h6>
                      <h6 class="widget-user-desc">Email: {{ $user->email }}</h6>

					</div>
					<div class="widget-user-image">
						<div style="width:75px;height:75px;position:relative;overflow: hidden;border-radius:50%;border: 3px solid #bdd1f8">
							<img class="" style=" display:inline;margin: 0 auto;height: 75px;width: auto;" src="{{ !empty($user->image) ? url('upload/user_images/' . $user->image) : url('upload/no_image.jpg') }}" alt="User Avatar">
						</div>
					</div>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">Mobile Number</h5>
							<span class="description-text">{{ $user->mobile }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 br-1 bl-1">
						  <div class="description-block">
							<h5 class="description-header">Address</h5>
							<span class="description-text">{{ $user->address }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">Gender</h5>
							<span class="description-text">{{ $user->gender }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
				  </div>
              </div>
          </div>
      </section>
        
    </div>
</div>
  @endsection