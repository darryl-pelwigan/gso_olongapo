@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Employee List
      </h1>
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchase Order List</h3>
               <button class="btn btn-success pull-right btn bg-light-blue btn-sm" data-toggle="modal" data-target="#new_employee_access_modal" data-backdrop="static" data-keyboard="false" ><i class="fa fa-plus"></i> Add Employee Access</button>
               <button class="btn btn-success pull-right addnewemployee" data-toggle="modal" data-target="#new_employee_modal" data-backdrop="static" data-keyboard="false" ><i class="fa fa-plus"></i> Add Employee</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="" id="employee_delete_form" >
                  <table id="employee_list" class="table table-bordered table-hover">
                    <thead>
                        <tr id="test">
                              <td></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                        </tr>
                        <tr>
                              <th>No</th>
                              <th>Last Name</th>
                              <th>First Name</th>
                              <th>Middle Name</th>
                              <th>User Name</th>
                              <th>Department</th>
                              <th>Position</th>
                              <th>Action</th>
                              <th>Access Logs</th>
                              <th class="delete_column hide">Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                  </table>
                  {{csrf_field()}}
                  <button class="btn btn-default"><input type="checkbox" id="delete_checkbutton"><b> Delete Employee Record</b></button>
                  <button type="button" class="btn btn-danger delete_column hide" name="delete" id="delete_employee" disabled="" onclick="$(this).deleteEmployeeRecord();"> <i class="fa fa-trash"></i> Delete Employee/s Record</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal -->

<div class="modal fade" id="new_employee_modal" tabindex="-1" role="dialog" aria-labelledby="new_employee_modalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="new_employee_modalLabel"> <span></span></h4>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <div id="contents-menu">
            <form class="form-horizontal" id="new_employee">
              <div class="box-body">
                <div id="statusCI"></div>
                <div class="employee_info">
                  <div class="form-group">
                    <label for="obr_date" class="col-sm-3 control-label">First Name : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="fname"  name="fname" placeholder="First Name" />
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="obr_date" class="col-sm-3 control-label">Middle Name : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="mname"  name="mname" placeholder="Middle Name" />
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="obr_date" class="col-sm-3 control-label">Last Name : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lname"  name="lname" placeholder="Last Name" />
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="obr_date" class="col-sm-3 control-label">Extension Name : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="ename"  name="ename" placeholder="Extension Name" />
                    </div>
                  </div>

                  <div class="form-group">
                  <label for="sex" class="col-sm-3 control-label">Gender</label>
                     <div class="col-sm-8">
                    <div class="radio">
                      <label>
                        <input type="radio" name="sex" id="sex_m" value="m"  />
                        Male
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="sex" id="sex_f" value="f"  />
                        Female
                      </label>
                    </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="obr_date" class="col-sm-3 control-label">BirthDate : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="bdate"  name="bdate" placeholder="BirthDate" />
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="obr_date" class="col-sm-3 control-label">Email : </label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="email"  name="email" placeholder="Email Address" />
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="obr_date" class="col-sm-3 control-label">Mobile No. : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="mobile"  name="mobile" placeholder="Mobile Number" />
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="obr_date" class="col-sm-3 control-label">Position : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control position" id="position"  name="position"   placeholder="Position" />
                      <input type="hidden" id="position_id"  name="position_id"  />
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="obr_date" class="col-sm-3 control-label">Department : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control department " id="dept"   name="dept"   placeholder="Department" />
                      <input type="hidden" id="dept_id"  name="dept_id"  />
                    </div>
                  </div>
                </div>

                <hr />
                   <div class="form-group">
                  <label for="uname" class="col-sm-3 control-label">Username : </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control  " id="uname"   name="uname"   placeholder="Username" />
                  </div>
                </div>
                <div id="change_password" class="hide"><input type="checkbox" id="check_change_password"><u><b style="font-size: 15px;"> Change Password</b></u></div>
                <div class="form-group">
                  <label for="password" class="col-sm-3 control-label">Password : </label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="password"   name="password" placeholder="Password"/>
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="col-sm-3 control-label">Confirm Password: </label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"/>
                  </div>
                </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="button" class="btn btn-info pull-right" id="submit_empl" onclick="$(this).sentNewEmployee();">Submit</button>
              </div>
              <!-- /.box-footer -->
              <input type="hidden" id="emp_id" name="emp_id" />
              {{csrf_field()}}
            </form>

        </div>
      </div>

    </div>
  </div>
</div>


<!-- <div class="modal fade" id="new_employee_access_modal" tabindex="-1" role="dialog" aria-labelledby="new_employee_access_modalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="new_employee_access_modalLabel"> <span>Add Employee Credential</span></h4>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <div id="contents-menu">
            <form class="form-horizontal" id="set_employee_creadentials">
              <div class="box-body">
                <div id="statusCI"></div>

                <div class="form-group">
                  <label for="fullname" class="col-sm-3 control-label">Name : </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="fullname"  name="fullname" placeholder="Full Name" />
                  </div>
                </div>



                <div class="form-group">
                  <label for="obr_date" class="col-sm-3 control-label">Department : </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control department departmentx " id=""   name="dept"   placeholder="Department" />
                  </div>
                </div>



                <hr />
                   <div class="form-group">
                  <label for="uname" class="col-sm-3 control-label">Username : </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control  " id="uname"   name="uname"   placeholder="Username" />
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="col-sm-3 control-label">Password : </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control  " id="password"   name="password"   placeholder="Password" />
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="col-sm-3 control-label">Confirm Password:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control  " id="confirmpassword"   name="confirmpassword"   placeholder="Confirm Password" />
                  </div>
                </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="button" class="btn btn-info pull-right" id="submit_empl" onclick="$(this).setmployeeCredentials();">Submit</button>
              </div>
              <!-- /.box-footer -->
              <input type="hidden" id="emp_id" name="emp_id" />
              {{csrf_field()}}
            </form>

        </div>
      </div>

    </div>
  </div>
</div> -->
@stop





@section('plugins-script')
<script src="{{asset('adminlte/plugins/autocomplete/')}}/jquery.autocomplete.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript">

$(function() {
  //Date picker
  $('#bdate').datepicker({
    autoclose: true,
     format: 'yyyy-mm-dd',
     endDate : '-15y',
  });

  $('.addnewemployee').click(function(){
    $('#new_employee_modalLabel').text('Add Employee Info');
    $('#change_password').addClass('hide');
    $('#new_employee')[0].reset();
    $('#password').prop("disabled", "");
    $('#password_confirmation').prop("disabled", "");
    $('.employee_info').show();
    $('#statusCI').html('');
  });

  $(document).on('click', '.emp_ids', function(){
    if($('.emp_ids:checked').length){
      $('#delete_employee').prop('disabled', '');
    }else{
      $('#delete_employee').prop('disabled', 'disabled');     
    }
  });

  $('#delete_checkbutton').click(function(){
    if($(this).is(':checked')){
      $('.delete_column').removeClass('hide');
    }else{
      $('.delete_column').addClass('hide');      
    }
  });

  $('#check_change_password').click(function(){
    if($(this).is(':checked')){
      $('#password').prop("disabled", "");
      $('#password_confirmation').prop("disabled", "");
    }else{
      $('#password').prop("disabled", "disabled");
      $('#password_confirmation').prop("disabled", "disabled");
    }
  });

  $('#fullname').autocomplete({
      serviceUrl: '{{route("emp.get_employee_name")}}',
      dataType: 'json',
      type: 'POST',
      params : {
                _token : '{{csrf_token()}}'
      },
      onSelect: function (suggestion) {
        $('#employee_id').val(suggestion.data);
        $('.department').val(suggestion.dept_desc);
        $('.departmentx').attr('disabled',true);
        $('.position').val(suggestion.title);
      }
  });

  $('.position').autocomplete({
      serviceUrl: '{{route("emp.get_position")}}',
      dataType: 'json',
      minChars:0,
      type: 'POST',
      params : {
           _token : '{{csrf_token()}}'
      },
      onSelect: function (suggestion) {
          $('#position2').val(suggestion.data);
      },
  }).focus(function() {
      $(this).autocomplete('search', $(this).val());
  });


  $('.department').autocomplete({
      serviceUrl: '{{route("emp.get_department")}}',
      minChars:0,
      dataType: 'json',
      type: 'POST',
      params : {
                _token : '{{csrf_token()}}'
      },
      onSelect: function (suggestion) {
          $('#dept2').val(suggestion.data);
      },
  }).focus(function() {
        $(this).autocomplete('search', $(this).val());
  });

  $('#employee_list').dataTable({
        processing: true,
        serverSide: true,
        ajax:{
          "type": 'POST',
         "url" : '{!! route('gso.set_datatables') !!}',
          data : {
              "_token" : '{{csrf_token()}}',
              dataTables : 'dept_userlist'
          }
        },
        columns: [
            { data: 'id', name: 'olongapo_employee_list.id',
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { data: 'lname', name: 'olongapo_employee_list.lname'},
            { data: 'fname', name: 'olongapo_employee_list.fname'},
            { data: 'mname', name: 'olongapo_employee_list.mname'},
            { data: 'ucrd_username', name: 'olongapo_user_credentials.ucrd_username'},
            { data: 'dept_desc', name: 'olongapo_subdepartment.dept_desc'},
            { data: 'title', name: 'olongapo_position.title'},
            { data: null, name: 'olongapo_position.title',
              "searchable": false,
              render : function(data , type , row){
                return '<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#new_employee_modal" data-backdrop="static" data-keyboard="false" onclick="$(this).editEmployee('+data.id+');" ><i class="fa fa-lock"></i> Edit Employee </button>';
              }
            },
            { data: null, name: 'olongapo_user_logging.logout_time',
              "searchable": false,
              render : function(data , type , row){
                return '<button type="button" class="btn bg-light-blue btn-sm" data-toggle="modal" data-target="#new_employee_modal" data-backdrop="static" data-keyboard="false" onclick="$(this).showaccessLogs('+data.id+');" ><i class="fa fa-pencil"></i> Access logs </button> ';
              }
            },
            {
              data:null,
              "searchable" : false,
              render:function(data, type, row){
                return '<input type="checkbox" name="emp_id[]" class="emp_ids" value="'+data.id+'"/> Delete';
              },className : 'delete_column hide'
            }
        ],
        columnDefs: [
            {
              orderable: false, targets: [-1]
            },
        ],
        "order": [[ 0, 'asc' ]],
        'fnDrawCallback':function(){
            $('#delete_checkbutton').click(function(){
              if($(this).is(':checked')){
                $('.delete_column').removeClass('hide');
              }else{
                $('.delete_column').addClass('hide');      
              }
            });

            if($("#delete_checkbutton").is(':checked')){
              $('.delete_column').removeClass('hide');
            }else{
              $('.delete_column').addClass('hide');      
            }
        }
    }).dataTableSearch(500);
  });


$.fn.sentNewEmployee = function(){
  $.ajax({
      type: "POST",
      url: "{{route('emp.add_employee_creadentials')}}",
      data : $('#new_employee').serialize(),
      dataType: "json",
      error: function(){
          alert('error');
      },
      success: function(data){
        var errors = '';
        if(data['status']==0){
           for(var key in data['errors']){
               errors += data['errors'][key]+'<br />';
            }
          $('#statusCI').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn();
        }else{
          $('#statusCI').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn();
            $('#employee_list').DataTable().ajax.reload();
        }
      }
    });
};

 $.fn.editEmployee = function(emp_id){
    $('form')[0].reset();
    $('#new_employee_modalLabel').text('Update Employee Info');
    $('#change_password').removeClass('hide');
    $('#password').prop("disabled", "disabled");
    $('#password_confirmation').prop("disabled", "disabled");
    $('.employee_info').show();
    $('#statusCI').html('');
    $.ajax({
        type: "POST",
         url: "{{route('emp.get_employee_credentials')}}",
        data : {
          emp_id : emp_id,
          _token : '{{csrf_token()}}'
        },
        dataType: "json",
        error: function(){
          console.log('error');
        },
        success: function(data){
          console.log(data);
          $('#fname').val(data.employee.fname);
          $('#lname').val(data.employee.lname);
          $('#mname').val(data.employee.mname);
          $('#ename').val(data.employee.ename);
          $('#emp_id').val(data.employee.id);
          $('#mobile').val(data.employee.mobile);
          $('#email').val(data.employee.email);
          $("input[name=sex][value=" + data.employee.sex + "]").attr('checked', 'checked');
          $('#uname').val(data.employee.ucrd_username);
          $('#bdate').val(data.employee.bdate);
          $('#dept_id').val(data.employee.dept_id);
          $('#position_id').val(data.employee.position_id);
          $('#dept').val(data.employee.dept_desc);
          $('#position').val(data.employee.title);
          $('#position').val(data.employee.title);
        }
     });
  };

  $.fn.showaccessLogs = function(emp_id){
    $('form')[0].reset();
    $('#new_employee_modalLabel').text('Update Employee Credential');
    $('#change_password').removeClass('hide');
    $('#password').prop("disabled", "disabled");
    $('#password_confirmation').prop("disabled", "disabled");
    $('.employee_info').hide();

    $('#statusCI').html('');
    $.ajax({
        type: "POST",
         url: "{{route('emp.get_employee_credentials')}}",
        data : {
          emp_id : emp_id,
          _token : '{{csrf_token()}}'
        },
        dataType: "json",
        error: function(){
          console.log('error');
        },
        success: function(data){
          console.log(data);
          $('#fname').val(data.employee.fname);
          $('#lname').val(data.employee.lname);
          $('#mname').val(data.employee.mname);
          $('#ename').val(data.employee.ename);
          $('#emp_id').val(data.employee.id);
          $('#mobile').val(data.employee.mobile);
          $('#email').val(data.employee.email);
          $("input[name=sex][value=" + data.employee.sex + "]").attr('checked', 'checked');
          $('#uname').val(data.employee.ucrd_username);
          $('#bdate').val(data.employee.bdate);
          $('#dept_id').val(data.employee.dept_id);
          $('#position_id').val(data.employee.position_id);
          $('#dept').val(data.employee.dept_desc);
          $('#position').val(data.employee.title);
          $('#position').val(data.employee.title);
        }
     });
  }
    

  $.fn.setmployeeCredentials = function(){
    $.ajax({
        type: "POST",
        url: "{{route('emp.set_employee_creadentials')}}",
        data : $('#set_employee_creadentials').serialize(),
        dataType: "json",
        error: function(){
            console.log('error');
        },
        success: function(data){
          var errors = '';
          if(data['status']==0){
             for(var key in data['errors']){
                 errors += data['errors'][key]+'<br />';
              }
            $('#set_employee_creadentials #statusCI').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn();
          }else{
            $('#set_employee_creadentials  #statusCI').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn();
             location.reload();
          }
        }
    });
  }

  $.fn.deleteEmployeeRecord = function(){
    var x = confirm("Are you sure to delete record/s?");
    if(x){
      $.ajax({
          type: "POST",
          url: "{{route('emp.delete_employee_record')}}",
          data : $('#employee_delete_form').serialize(),
          dataType: "json",
          error: function(){
              console.log('error');
          },
          success: function(data){
            alert("Record/s deleted successfully.");
            $('#employee_list').DataTable().ajax.reload();
          }
      });
    }
  };
</script>
<script src="{{asset('adminlte')}}/plugins/datatables/table-header-search.js"></script>
@stop


@section('plugins-css')
 <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datepicker/datepicker3.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.css">

  <style type="text/css">

.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
.select2-container{ width:100% !important; }

table>thead>tr#test>th>input,table>tfoot>tr>th>input,table>thead>tr>td>input{
  width: 100%;
}
  </style>

@stop