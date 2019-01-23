<?php $__env->startSection('content'); ?>
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
              <h3 class="box-title">Employee  List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <table id="employee_list" class="table table-bordered table-hover">
                      <thead>
                      <tr id="test">
                              <td></td>
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
                              <th>Department</th>
                              <th>Position</th>
                              
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
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
                <div id="statusC"></div>

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
                  <label for="obr_date" class="col-sm-3 control-label">Mobile : </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control position" id="mobile"  name="mobile"   placeholder="mobile" />
                  </div>
                </div>


                 <div class="form-group">
                  <label for="obr_date" class="col-sm-3 control-label">Email : </label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control position" id="emailx"  name="emailx"   placeholder="Email" />
                  </div>
                </div>

                <div class="form-group">
                  <label for="obr_date" class="col-sm-3 control-label">Position : </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control position" id="position"  name="position"   placeholder="Position" />
                  </div>
                </div>

                <div class="form-group">
                  <label for="obr_date" class="col-sm-3 control-label">Department : </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control department " id="dept"   name="dept"   placeholder="Department" />
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
              <?php echo e(csrf_field()); ?>

            </form>

        </div>
      </div>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('plugins-script'); ?>
<script src="<?php echo e(asset('adminlte/plugins/autocomplete/')); ?>/jquery.autocomplete.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript">
 $('#employee_list').dataTable({
        processing: true,
        serverSide: true,
        ajax:{
          "type": 'POST',
         "url" : '<?php echo route('gso.set_datatables'); ?>',
          data : {
              "_token" : '<?php echo e(csrf_token()); ?>',
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
            { data: 'dept_desc', name: 'olongapo_subdepartment.dept_desc'},
            { data: 'title', name: 'olongapo_position.title'},
           
            // { data: null, name: 'olongapo_user_logging.logout_time',
            //   "searchable": false,
            //   render : function(data , type , row){
            //     return '<button type="button" class="btn bg-light-blue btn-sm" data-toggle="modal" data-target="#new_employee_modal" data-backdrop="static" data-keyboard="false" onclick="$(this).showaccessLogs('+data.id+');" ><i class="fa fa-pencil"></i> Access logs </button> ';
            //   }
            // },
            // {
            //   data:null,
            //   "searchable" : false,
            //   render:function(data, type, row){
            //     return '<input type="checkbox" name="emp_id[]" class="emp_ids" value="'+data.id+'"/> Delete';
            //   },className : 'delete_column hide'
            // }
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



  //Date picker
    $('#bdate').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd',
       endDate : '-15y',
    });


   $('.position').autocomplete({
        serviceUrl: '<?php echo e(route("emp.get_position")); ?>',
        dataType: 'json',
        type: 'POST',
        params : {
                  _token : '<?php echo e(csrf_token()); ?>'
        },
        onSelect: function (suggestion) {
            $('#position2').val(suggestion.data);
        }
  });

  $('.department').autocomplete({
        serviceUrl: '<?php echo e(route("emp.get_department")); ?>',
        dataType: 'json',
        type: 'POST',
        params : {
                  _token : '<?php echo e(csrf_token()); ?>'
        },
        onSelect: function (suggestion) {
            $('#dept2').val(suggestion.data);
        }
  });



$.fn.loadPPEmnthly = function(){
if ( $.fn.dataTable.isDataTable( '#job-request' ) ) {
    $('#job-request').dataTable().fnDestroy();
}
}

$.fn.loadPPEmnthly();

$.fn.editEmployee = function(emp_id){
        var el = $('#submit_empl');
        el.attr('disabled',true);
      $.ajax({
            type: "POST",
            url: "<?php echo e(route('emp.get_employee')); ?>",
            data : {
                emp_id : emp_id,
                _token : '<?php echo e(csrf_token()); ?>',
            },
            dataType: "json",
            error: function(){
              console.log('error');
               el.attr('disabled',false);
            },
            success: function(data){
                 el.attr('disabled',false);
               $('#emp_id').val(emp_id);
               $('#fname').val(data['errors'].fname);
               $('#mname').val(data['errors'].mname);
               $('#lname').val(data['errors'].lname);
               $('#ename').val(data['errors'].ename);
               $('#bdate').val(data['errors'].bdate);
               $('#mobile').val(data['errors'].mobile);
               $('#emailx').val(data['errors'].email);
               $('#position').val(data['errors'].title);
               $('#dept').val(data['errors'].dept_desc);
               if(data['errors'].sex!=''){

                   if(data['errors'].sex=='m'){
                       $('#sex_m').attr('checked',true);
                    }else{
                         $('#sex_f').attr('checked',true);
                    }
               }
//               $('#submit_empl').attr('onclick','$(this).sentEditEmployeeInfo('+emp_id+')');
            }
     });
};

$.fn.sentNewEmployee = function(){
    var el = $(this);
    el.attr('disabled',true);
  $.ajax({
            type: "POST",
            url: "<?php echo e(route('emp.new_employee')); ?>",
            data : $('#new_employee').serialize(),
            dataType: "json",
            error: function(){
              console.log('error');
              el.attr('disabled',false);
            },
            success: function(data){
               var errors = '';
                    if(data['status']==0){
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                        }
                        el.attr('disabled',false);
                      $('#statusC').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(10000).fadeOut();
                    }else{
                      $('#statusC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                       location.reload();
                   }
            }
     });
};

</script>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/table-header-search.js"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('plugins-css'); ?>
 <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/datepicker3.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datatables/jquery.dataTables.min.css">

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template::admin-pages.menus.'.$template['menu'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>