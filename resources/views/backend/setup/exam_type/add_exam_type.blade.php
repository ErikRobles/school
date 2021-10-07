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
			  <h4 class="box-title">Add Exam Type</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('store.exam.type') }}">
                        @csrf
                                <div class="form-group">
                                    <h5>Exam Type Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control" required> 
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
							    </div>
						<div class="text-xs-right">
							<input type="submit" value="Add Exam Type" class="btn btn-rounded btn-info mb-5">
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
