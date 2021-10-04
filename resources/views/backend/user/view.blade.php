@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
          <div class="row">
              <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Registered Users</h3>
                      <a href="{{ route('users.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add User</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">Id</th>
                                    <th>Role</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Profile Photo</th>
                                    <th>Created At</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><img src="{{ (!empty($user->profile_photo_path)) ? url('/image/profile/' . $user->profile_photo_path) : url('/image/no_image.jpg') }}" class="img-circle text-center mb-2" alt="User Image" style="width: 75px; border-radius: 50%;"/></td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-rounded btn-primary">Edit</a>
                                        <a href="{{ route('users.delete', $user->id) }}" class="btn btn-rounded btn-danger" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="5%">Id</th>
                                    <th>Role</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Profile Photo</th>
                                    <th>Created At</th>
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