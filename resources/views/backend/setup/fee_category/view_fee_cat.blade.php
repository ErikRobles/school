@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
          <div class="row">
              <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Fee Category List</h3>
                      <a href="{{ route('fee.category.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Fee Category</a>
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
                                @foreach($allData as $key => $fee_category)
                                <tr>
                                    <td>{{ $fee_category->id }}</td>                                   
                                    <td>{{ $fee_category->name }}</td>
                                    <td>
                                        <a href="{{ route('fee.category.edit', $fee_category->id) }}" class="btn btn-rounded btn-primary">Edit</a>
                                        <a href="{{ route('fee.category.delete', $fee_category->id) }}" class="btn btn-rounded btn-danger" id="delete">Delete</a>
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