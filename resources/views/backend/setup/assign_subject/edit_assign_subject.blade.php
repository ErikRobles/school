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
			              <h4 class="box-title">Edit Assign Subject</h4>
			            </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="row">
                      <div class="col">
                        <form method="post" action="{{ route('update.assign.subject', $editData[0]->class_id) }}">
                          @csrf
                          <div class="row">
                            <div class="col-md-12">
                              <div class="add_item">

                             
                              <div class="form-group">
                                <h5>Class Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <select name="class_id" required class="form-control">
                                      <option value="" selected disabled>Select Class</option>
                                      @foreach($classes as $class)
                                          <option value="{{ $class->id }}" {{ ($editData['0']->class_id) ? "selected" : '' }}>{{ $class->name }}</option>
                                      @endforeach
                                  </select>
                                </div>
                              </div>
                              {{-- End form Group --}}

                              @foreach($editData as $edit)
                              <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

                              <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <h5>Subject <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <select name="subject_id[]" required class="form-control">
                                              <option value="" selected disabled>Select Subject</option>
                                              @foreach($subjects as $subject)
                                                  <option value="{{ $subject->id }}" {{ ($edit->subject_id == $subject->id) ? "selected" : '' }}>{{ $subject->name }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                    </div>
                                      {{-- End form Group --}}    
                                  </div>
                                  {{-- End Col md 4 --}}
                                
                                  <div class="col-md-2">
                                      <div class="form-group">
                                        <h5>Full Mark <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $edit->full_mark }}" name="full_mark[]" class="form-control" required> 
                                        </div>
                                      </div>
                                      {{-- End Form Group --}}
                                  </div>
                                    {{-- End Col md 2 --}}

                                    <div class="col-md-2">
                                        <div class="form-group">
                                          <h5>Pass Mark <span class="text-danger">*</span></h5>
                                          <div class="controls">
                                              <input type="text" value="{{ $edit->pass_mark }}"  name="pass_mark[]" class="form-control" required> 
                                          </div>
                                        </div>
                                        {{-- End Form Group --}}
                                    </div>
                                      {{-- End Col md 2 --}}

                                      <div class="col-md-2">
                                        <div class="form-group">
                                          <h5>Subjective Mark <span class="text-danger">*</span></h5>
                                          <div class="controls">
                                              <input type="text" value="{{ $edit->subjective_mark }}"  name="subjective_mark[]" class="form-control" required> 
                                          </div>
                                        </div>
                                        {{-- End Form Group --}}
                                    </div>
                                      {{-- End Col md 2 --}}


                                  <div class="col-md-2" style="padding-top: 25px;">
                                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>

                                  </div>
                              </div>
                            </div> <!--End delete whole extra item-->
                              @endforeach
                            
                        </div>  <!--End add_item div-->

                              <div class="text-xs-right">
                                <input type="submit" value="Edit Subject Assignment" class="btn btn-rounded btn-info mb-5">
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

        <div class="col-md-4">
            <div class="form-group">
              <h5>Subject <span class="text-danger">*</span></h5>
              <div class="controls">
                  <select name="subject_id[]" required class="form-control">
                      <option value="" selected disabled>Select Subject</option>
                      @foreach($subjects as $subject)
                          <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                      @endforeach
                  </select>
              </div>
            </div>
              {{-- End form Group --}}    
          </div>
          {{-- End Col md 4 --}}

        <div class="col-md-2">
            <div class="form-group">
              <h5>Full Mark <span class="text-danger">*</span></h5>
              <div class="controls">
                  <input type="text" name="full_mark[]" class="form-control" required> 
              </div>
            </div>
            {{-- End Form Group --}}
        </div>
          {{-- End Col md 2 --}}

          <div class="col-md-2">
              <div class="form-group">
                <h5>Pass Mark <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="pass_mark[]" class="form-control" required> 
                </div>
              </div>
              {{-- End Form Group --}}
          </div>
            {{-- End Col md 2 --}}

            <div class="col-md-2">
              <div class="form-group">
                <h5>Subjective Mark <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="subjective_mark[]" class="form-control" required> 
                </div>
              </div>
              {{-- End Form Group --}}
          </div>
            {{-- End Col md 2 --}}


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
