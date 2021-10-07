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
			              <h4 class="box-title">Edit Fee Amount</h4>
			            </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="row">
                      <div class="col">
                        <form method="post" action="{{ route('update.fee.amount', $editData[0]->fee_category_id) }}">
                          @csrf
                          <div class="row">
                            <div class="col-md-12">
                              <div class="add_item">

                             
                              <div class="form-group">
                                <h5>Fee Category <span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <select name="fee_category_id" required class="form-control">
                                      <option value="" selected disabled>Select Fee Category</option>
                                      @foreach($fee_categories as $category)
                                          <option value="{{ $category->id }}" {{ ($editData['0']->fee_category_id == $category->id) ? "selected" : "" }}>{{ $category->name }}</option>
                                      @endforeach
                                  </select>
                                </div>
                              </div>
                              {{-- End form Group --}}

                              @foreach($editData as $edit)
                              <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

                              <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                      <h5>Student Class <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <select name="class_id[]" required class="form-control">
                                              <option value="" selected disabled>Select Fee Category</option>
                                              @foreach($classes as $class)
                                                  <option value="{{ $class->id }}" {{ ($edit->class_id == $class->id) ? 'selected' : ''  }}>{{ $class->name }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                    </div>
                                      {{-- End form Group --}}    
                                  </div>
                                  {{-- End Col md 5 --}}
                                
                                  <div class="col-md-5">
                                      <div class="form-group">
                                        <h5>Fee Amount <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="amount[]" value="{{ $edit->amount }}" class="form-control" required> 
                                        </div>
                                      </div>
                                      {{-- End Form Group --}}
                                  </div>
                                    {{-- End Col md 5 --}}
                                  <div class="col-md-2" style="padding-top: 25px;">
                                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>

                                  </div>
                              </div><!--End Row-->
                            </div><!--End delete row icon-->
                              @endforeach
                            </div>  <!--End add_item div-->

                              <div class="text-xs-right">
                                <input type="submit" value="Update Category Fee" class="btn btn-rounded btn-info mb-5">
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
              {{-- END COL12 --}}
          </div>
      </section>
        
    </div>
</div>

<div style="visibility: hidden;">
  <div class="whole_extra_item_add" id="whole_extra_item_add">
    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
      <div class="form-row">
        <div class="col-md-5">
          <div class="form-group">
            <h5>Student Class <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="class_id[]" required class="form-control">
                    <option value="" selected disabled>Select Fee Category</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
          </div>
            {{-- End form Group --}}    
        </div>
        {{-- End Col md 5 --}}
      
        <div class="col-md-5">
            <div class="form-group">
              <h5>Fee Amount <span class="text-danger">*</span></h5>
              <div class="controls">
                  <input type="text" name="amount[]" class="form-control" required> 
              </div>
            </div>
            {{-- End Form Group --}}
        </div>
          {{-- End Col md 5 --}}
        <div class="col-md-2" style="padding-top: 25px;">
          <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
          <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    let counter = 0;
    $(document).on("click", ".addeventmore", function () {
      let whole_extra_item_add = $('#whole_extra_item_add').html();
      $(this).closest(".add_item").append(whole_extra_item_add);
      counter++;
    });
    $(document).on("click", ".removeeventmore", function (event) {
      $(this).closest(".delete_whole_extra_item_add").remove();
      counter -= 1;
    });
  });
</script>
  @endsection