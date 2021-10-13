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
			  <h4 class="box-title">Employee Salary Increment</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('update.increment.store', $editData->id) }}">
                        @csrf
                        <h6>Employee Name: {{ $editData->name }}</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Salary Amount <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="increment_salary" class="form-control" required> 
                                    </div>
							    </div>
                            </div><!--End col md 6-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Effected Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="effected_salary" class="form-control" required> 
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
