@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User List
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
              <h3 class="box-title">List of Users</h3>
                <button type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#addUser_modal" title="ADD USER"><i class="fa fa-user-plus"></i></button>
                <div class="modal fade" id="addUser_modal" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">
                          <strong>ADD USER</strong>
                        </h4>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('admin.user_store') }}" method="post">
                          {{ csrf_field() }}
                          <div class="form-group">
                            <label for="">Real Name</label>
                            <input type="text" class="form-control" name="ucrd_realname">
                          </div>

                          <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="ucrd_username">
                          </div>

                          <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password">
                          </div>

                          <div class="form-group">
                            <label for="">Retype Password</label>
                            <input type="password" class="form-control" name="retype_password">
                          </div>

                          <div class="form-group">
                            <label for="">E-Mail</label>
                            <input type="email" class="form-control" name="ucrd_email" required>
                          </div>

                          <div class="form-group">
                            <label for="">Group</label>
                            <select class="form-control" name="group_id" required>
                              <option></option>
                              @foreach($group as $groups)
                              <option value="{{ $groups->id }}">{{ $groups->ugrp_name }}</option>
                              @endforeach
                            </select>
                          </div>

                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-info btn-lg">ADD</button>
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
                  <th>Realname</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Group</th>
                  <th></th>
                </tr>
                </thead>

                <tbody>

                  @foreach($result as $results)
                           <tr>
                    <td>{{ $results->ucrd_realname }}</td>
                    <td>{{ $results->ucrd_username }}</td>
                    <td>{{ $results->ucrd_email }}</td>
                    <td>{{ $results->userGroup->ugrp_name }}</td>
                    <td>
                      <center>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editUser_modal{{ $results->id }}" title="UPDATE"><i class="fa fa-pencil"></i></button>
                        <div class="modal fade" id="editUser_modal{{ $results->id }}" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">
                                  <strong>UPDATE USER</strong>
                                </h4>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('admin.user_update', $results->id) }}" method="post">
                                  {{ csrf_field() }}
                                  <div class="form-group">
                                    <label for="">Real Name</label>
                                    <input type="text" class="form-control" name="ucrd_realname" value="{{ $results->ucrd_realname }}" readonly>
                                  </div>

                                  <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="ucrd_username" value="{{ $results->ucrd_username }}">
                                  </div>

                                  <div class="form-group">
                                    <label for="">Old Password</label>
                                    <input type="password" class="form-control" name="old_password" required>
                                  </div>

                                  <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                  </div>

                                  <div class="form-group">
                                    <label for="">Retype New Password</label>
                                    <input type="password" class="form-control" name="retype_npassword" required>
                                  </div>

                                  <div class="form-group">
                                    <label for="">E-Mail</label>
                                    <input type="email" class="form-control" name="ucrd_email" value="{{ $results->ucrd_email }}">
                                  </div>

                                  <div class="form-group">
                                    <label for="">Group</label>
                                    <select class="form-control" name="group_id" required>
                                      <option value="{{ $results->userGroup->id }}" hidden>{{ $results->UserGroup->ugrp_name }}</option>
                                      @foreach($group as $groups)
                                      <option value="{{ $groups->id }}">{{ $groups->ugrp_name }}</option>
                                      @endforeach
                                    </select>
                                  </div>

                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-info btn-lg"><i class="fa fa-save"></i></button>
                              </div>
                              </form>
                            </div>

                          </div>
                        </div>

                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal{{ $results->id }}" title="DELETE"><i class="fa fa-times"></i></button>
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
                                  <a href="{{ route('admin.user_delete', $results->id) }}" class="btn btn-lg btn-danger" title="DELETE"><i class="fa fa-trash"></i></a>
                              </div>
                            </div>

                          </div>
                        </div>

                      </center>
                    </td>
                  </tr>
                  @endforeach
                </tbody>

                <tfoot>
                <tr>
                  <th>Realname</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Group</th>
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
</script>
@stop
