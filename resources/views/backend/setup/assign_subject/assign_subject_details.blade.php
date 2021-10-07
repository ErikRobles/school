@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
          <div class="row">
              <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Subject Assignment Details</h3>
                      <a href="{{ route('assign.subject.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Subject Assignment</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h4><strong>Subject Assignment : </strong>{{ $detailsData['0']['student_class']['name'] }}</h4>
                        <div class="table-responsive">
                          <table class="table table-bordered table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5%">Id</th>
                                    <th width="15%">Subject</th>
                                    <th width="15%">Full Mark</th>
                                    <th width="15%">Pass Mark</th>
                                    <th width="15%">Subjective Mark</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detailsData as $key => $detail)
                                <tr>
                                    <td>{{ $key+1 }}</td>                                   
                                    <td>{{ $detail['school_subject']['name'] }}</td>
                                    <td>{{ $detail->full_mark }}</td>
                                    <td>{{ $detail->pass_mark }}</td>
                                    <td>{{ $detail->subjective_mark }}</td>
                                </tr>
                                @endforeach
                            </tbody>
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