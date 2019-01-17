@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Department Code
      </h1>
    </section>



    <!-- Main content -->
    <section class="content">
<div class="row">
  <div class="col-md-12">
      <div class="box">
          <div class="info-box">
            <div class="box-content">
              <table class="table table-stripped table-bordered" id="department_odes">
                  <thead>
                    <tr>
                      <th>Dept</th>
                      <th>Dept-Code</th>
                      <th>Title</th>
                      <th>Sub Depts</th>
                    </tr>
                  </thead>

                  <tbody>

                    @for( $x = 0; $x < count($dept) ; $x++ )
                          <tr>
                            <td>{{ ($dept[$x]->id) }}</td>
                            <td>{{ ($dept[$x]->dept_code) }}</td>
                            <td>{{ ($dept[$x]->dept_desc) }}</td>
                            <td>{{ ($dept[$x]->subdept_code) }}</td>
                          </tr>
                    @endfor
                  </tbody>
              </table>




            </div>
            <!-- /.info-box-content -->
          </div>
          </div>
          <!-- /.info-box -->


  </div>

    <div class="col-md-12">
        <div class="info-box">
            <div class="box-content">
                 <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Department CODE</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="add_deptcode">
            {{csrf_field()}}
              <div class="box-body">
              <div id="statusC"></div>
                <div class="form-group">
                  <label for="gso_code_desc" class="col-sm-4 control-label">Code</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="dept_code" min="1" name="dept_code" placeholder="Code">
                  </div>
                </div>

                <div class="form-group">
                  <label for="gso_code_desc" class="col-sm-4 control-label">Desc</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="dept_desc" name="dept_desc" placeholder="Description">
                  </div>
                </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default">Cancel</button>
                <button type="button" onclick="$(this).addDeptCode();" class="btn btn-info pull-right">SAVE</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->


            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->


             <div class="box box-info">
            <div class="box-content">
                 <!-- Horizontal Form -->

            <div class="box-header with-border">
              <h3 class="box-title">Add Sub-Department CODE</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="add_subdeptcode">
            {{csrf_field()}}
              <div class="box-body">
              <div id="statusC"></div>
                <div class="form-group">
                  <label for="gso_code_desc" class="col-sm-4 control-label">Department</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="dept_code" name="dept_code" placeholder="Department">
                  </div>
                </div>

                <div class="form-group">
                  <label for="gso_code_desc" class="col-sm-4 control-label">Sub-Department Code</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="subdept_code" min="1"  name="subdept_code" placeholder="Sub-Department Code">
                  </div>
                </div>

                <div class="form-group">
                  <label for="gso_code_desc" class="col-sm-4 control-label">Desc</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="subdept_desc" name="subdept_desc" placeholder="Description">
                  </div>
                </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default">Cancel</button>
                <button type="button" onclick="$(this).addSubDeptCode();" class="btn btn-info pull-right">SAVE</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->


            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->


    </div>
</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal -->
@stop

@section('plugins-script')
<script src="{{asset('adminlte/plugins/autocomplete/')}}/jquery.autocomplete.min.js"></script>

<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">

$('#department_odes').dataTable();

  $('#add_subdeptcode #dept_code').autocomplete({
        serviceUrl: '{{route("dept.get_deptcodes")}}',
        dataType: 'json',
        type: 'POST',
        params : {
                  _token : '{{csrf_token()}}'
        },
        onSelect: function (suggestion) {

        }
  });



  $.fn.addDeptCode = function(){
    $.ajax({
          type : 'POST',
          url : '{{route('dept.add_deptcode')}}',
          dataType : 'json',
          data : $('#add_deptcode').serialize(),
          error : function(){
            console.log('error');
          },
          success : function(data){
            var errors = '';
                    if(data['status']==0){
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                        }
                      $('#statusC').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn();
                    }else{
                      $('#statusC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn();
                    }
          }
    });

  };

  $.fn.addSubDeptCode = function(){
    $.ajax({
          type : 'POST',
          url : '{{route('dept.add_subdeptcode')}}',
          dataType : 'json',
          data : $('#add_subdeptcode').serialize(),
          error : function(){
            console.log('error');
          },
          success : function(data){
            var errors = '';
                    if(data['status']==0){
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                        }
                      $('#add_subdeptcode #statusC').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn();
                    }else{
                      $('#add_subdeptcode  #statusC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn();
                    }
          }
    });

  };


</script>
@stop


@section('plugins-css')
  <!-- DataTables -->
 <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.css">

<style type="text/css">
 li.gso-codes {
       margin-bottom: 25px;
    }
    ul.list-unstyled > li.blue > a{
        color:#58020d;
    }
    li.gso-codes > a {
       color:#0e4202;
    }
    .bg-yellow{
      color:#000 !important;
    }


.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
.select2-container{ width:100% !important; }
</style>
@stop