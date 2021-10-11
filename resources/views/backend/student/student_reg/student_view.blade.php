@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
          <div class="row">
            <div class="col-12">
           
            <div class="box bb-3 border-warning">
                <div class="box-header">
                  <h4 class="box-title">Student <strong>Search</strong></h4>
                </div>

                <div class="box-body">
                    <form action="{{ route('student.year.class.wise') }}" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Year </h5>
                                    <div class="controls">
                                        <select name="year_id" class="form-control">
                                            <option selected disabled>Select Year</option>
                                            @foreach($years as $year)
                                                <option value="{{ $year->id }}" {{ (@$year_id == $year->id) ? "selected" : "" }}>{{ $year->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div><!--End col md 4-->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Class </h5>
                                    <div class="controls">
                                        <select name="class_id" class="form-control">
                                            <option selected disabled>Select Class</option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}" {{ (@$class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div><!--End col md 4-->
                            <div class="col-md-4" style="padding-top: 25px;">
                                <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Search">
                            </div><!--End col md 4-->
                        </div><!--End row-->
                    </form>
                </div>
              </div>
     
            </div><!--End col 12-->
              <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Student List</h3>
                      <a href="{{ route('student.registration.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Student</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">

                        @if(!@search)    

                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">Id</th>
                                    <th width="10%">Name</th>
                                    <th width="5%">Id Number</th>
                                    <th>Roll</th>
                                    <th width="5%">Year</th>
                                    <th width="10%">Class</th>
                                    <th width="5%">Image</th>
                                    @if(Auth::user()->role == "Admin")
                                      <th width="5%">Code</th>
                                    @endif
                                    <th width="30%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allData as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>                                   
                                    <td>{{ $value['student']['name'] }}</td>
                                    <td>{{ $value['student']['id_no'] }}</td>
                                    <td>{{ $value->roll }}</td>
                                    <td>{{ $value['student_year']['name'] }}</td>
                                    <td>{{ $value['student_class']['name'] }}</td>
                                    <td>
                                        <div style="width:75px;height:75px;position:relative;overflow: hidden;border-radius:50%;border: 3px solid #bdd1f8">
                                            <img src="{{ (!empty($value['student']['image'])) ? url('/upload/student_images/' . $value['student']['image']) : url('/upload/no_image.jpg') }}" class="text-center" alt="User Image" style="width: 75px; object-fit:cover;" alt="">
                                         </div>
                                    </td>
                                    @if(Auth::user()->role == "Admin")
                                        <td>{{ $value['student']['code'] }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('student.registration.edit', $value->student_id) }}" class="btn btn-rounded btn-primary">Edit</a>
                                        <a href="{{ route('student.registration.edit', $value->student_id) }}" class="btn btn-rounded btn-success">Promote</a>
                                        <a target="_blank" href="{{ route('student.registration.details', $value->student_id) }}" class="btn btn-rounded btn-info">Details</a>
                                        <a href="" class="btn btn-rounded btn-danger" id="delete">Delete</a> 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="5%">Id</th>
                                    <th width="10%">Name</th>
                                    <th width="5%">Id Number</th>
                                    <th>Roll</th>
                                    <th width="5%">Year</th>
                                    <th width="10%">Class</th>
                                    <th width="5%">Image</th>
                                    @if(Auth::user()->role == "Admin")
                                      <th width="5%">Code</th>
                                    @endif
                                    <th width="30%">Action</th>
                                </tr>
                            </tfoot>
                          </table>

                        @else
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">Id</th>
                                    <th width="10%">Name</th>
                                    <th width="5%">Id Number</th>
                                    <th>Roll</th>
                                    <th width="5%">Year</th>
                                    <th width="10%">Class</th>
                                    <th width="5%">Image</th>
                                    @if(Auth::user()->role == "Admin")
                                      <th>Code</th>
                                    @endif
                                    <th width="30%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allData as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>                                   
                                    <td>{{ $value['student']['name'] }}</td>
                                    <td>{{ $value['student']['id_no'] }}</td>
                                    <td>{{ $value->roll }}</td>
                                    <td>{{ $value['student_year']['name'] }}</td>
                                    <td>{{ $value['student_class']['name'] }}</td>
                                    <td>
                                        <div style="width:75px;height:75px;position:relative;overflow: hidden;border-radius:50%;border: 3px solid #bdd1f8">    
                                            <img src="{{ (!empty($value['student']['image'])) ? url('/upload/student_images/' . $value['student']['image']) : url('/upload/no_image.jpg') }}" class="img-circle text-center" alt="User Image" style="width: 75px;object-fit:cover;" alt="">
                                        </div>
                                    </td>
                                    @if(Auth::user()->role == "Admin")
                                        <td width="5%">{{ $value['student']['code'] }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('student.registration.edit', $value->student_id) }}" class="btn btn-rounded btn-primary">Edit</a>
                                        <a href="{{ route('student.registration.promotion', $value->student_id) }}" class="btn btn-rounded btn-success">Promote</a>
                                        <a target="_blank" href="{{ route('student.registration.details', $value->student_id) }}" class="btn btn-rounded btn-info">Details</a>
                                        <a href="" class="btn btn-rounded btn-danger" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="5%">Id</th>
                                    <th width="10%">Name</th>
                                    <th width="5%">Id Number</th>
                                    <th>Roll</th>
                                    <th width="5%">Year</th>
                                    <th width="10%">Class</th>
                                    <th width="5%">Image</th>
                                    @if(Auth::user()->role == "Admin")
                                      <th width="5%">Code</th>
                                    @endif
                                    <th width="30%">Action</th>
                                </tr>
                            </tfoot>
                          </table>
                        @endif

                        </div>
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