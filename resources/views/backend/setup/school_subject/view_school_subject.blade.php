@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
          <div class="row">
              <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Subject List</h3>
                      <a href="{{ route('school.subject.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Subject</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">Id</th>
                                    <th>Name</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allData as $key => $school_subject)
                                <tr>
                                    <td>{{ $school_subject->id }}</td>                                   
                                    <td>{{ $school_subject->name }}</td>
                                    <td>
                                        <a href="{{ route('school.subject.edit', $school_subject->id) }}" class="btn btn-rounded btn-primary">Edit</a>
                                        <a href="{{ route('school.subject.delete', $school_subject->id) }}" class="btn btn-rounded btn-danger" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="5%">Id</th>
                                    <th>Name</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </tfoot>
                          </table>
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