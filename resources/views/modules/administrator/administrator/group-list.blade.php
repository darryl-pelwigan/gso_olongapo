@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Group List
      </h1>
    </section>

    @if(count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- Main content -->
    <section class="content">


      <div class="box">
            <div class="box-header">
              <h3 class="box-title">GROUP</h3>
              <button type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#add_groupModal" title="ADD USER"><i class="fa fa-user-plus"></i></button>
              <div class="modal fade" id="add_groupModal" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">
                        <strong>ADD GROUP</strong>
                      </h4>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('admin.group_store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="">Group Name</label>
                          <input type="text" class="form-control" name="ugrp_name" value="">
                        </div>

                        <div class="form-group">
                          <label for="">Homepage</label>
                          <input type="text" class="form-control" name="ugrp_homepage" value="">
                        </div>

                        <div class="form-group">
                          <label for="">Description</label>
                          <textarea class="form-control" name="ugrp_description" rows="8" cols="80"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-lg btn-info">ADD</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Homepage</th>
                  <th>Description</th>
                 <th></th>

                </tr>
                </thead>

                <tbody>
                    @foreach($result as $results)
                  <tr>
                    <td>{{ $results->ugrp_name }}</td>
                    <td>{{ $results->ugrp_homepage }}</td>
                    <td>{{ $results->ugrp_description }}</td>
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_groupModal{{ $results->id }}" title="UPDATE"><i class="fa fa-pencil"></i></button>
                         <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal{{ $results->id }}" title="DELETE"><i class="fa fa-times"></i></button>
                         </td>
                  </tr>
                        <div class="modal fade" id="edit_groupModal{{ $results->id }}" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">
                                  <strong>UPDATE GROUP</strong>
                                </h4>
                              </div>
                              <div class="modal-body">
                              <div class="col-sm-12">
                               <form action="{{ route('admin.group_update', $results->id) }}" class="form-horizontal" method="post">
                                  {{ csrf_field() }}
                                  <div class="form-group">
                                    <label for="ugrp_name" class="col-sm-4 control-label">Group Name</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control"  name="ugrp_name" placeholder="Group Name" value="{{ $results->ugrp_name }}" required />
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="ugrp_homepage" class="col-sm-4 control-label">Group Homepage</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control"  name="ugrp_homepage" placeholder="Group Homepage" value="{{ $results->ugrp_homepage }}" required />
                                    </div>
                                  </div>

                                   <div class="form-group">
                                    <label for="ugrp_description" class="col-sm-4 control-label">Group Description</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control"  name="ugrp_description" placeholder="Group Description" value="{{ $results->ugrp_description }}" required />
                                    </div>
                                  </div>
                              </div>
                              </div>

                              <div class="modal-footer">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-info">SAVE</button>
                                </div>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>


                        <div class="modal fade" id="myModal{{ $results->id }}" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">
                                  <strong>READ ME</strong>
                                </h4>
                              </div>
                              <div class="modal-body">
                                <h4>
                                  <p>Are you sure you want to Delete this?</p>
                                </h4>
                              </div>
                              <div class="modal-footer">
                                  <a href="{{ route('admin.group_delete', $results->id) }}" class="btn btn-lg btn-danger" title="DELETE"><i class="fa fa-trash"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>

                    @endforeach()
                </tbody>

                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal -->


   @stop

@section('plugins-css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/dataTables.bootstrap.css">
@stop



@section('plugins-script')
<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
  $('#example1').DataTable();

  $('[data-toggle="tooltip"]').tooltip();

</script>
@stop
