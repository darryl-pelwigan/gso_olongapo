@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         BIDS AND AWARDS COMMITTEE
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                  <h4>Project Procurement Management Plan (PPMP)</h4>
                  <h4>For the Year {{date('Y')}}</h4>
                  <button class="btn btn-success pull-right" onclick="$(this).addHoliday();" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i></button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover" id="" width="85%">
                  <thead>
                    <tr>
                      <th>Holiday</th>
                      <th>Description</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($holidays as $data)
                      <tr>
                        <td>{{$data->holiday}}</td>
                        <td>{{$data->description}}</td>
                        <td><button class="btn btn-danger btn-xs" onclick="$(this).deleteHoliday({{$data->id}});" >Delete</button></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<div class="modal fade" id="addHoliday" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="item_group_header"></h4>
        </div>
        <div class="modal-body">
          <div id="status"></div>
          <div id="contents-menu">
            <form class="form-horizontal" method="POST" id="addHolidayForm">
            {{csrf_field()}}
              <div class="form-group">
                <label for="employee_name" class="col-sm-3 control-label">Holiday : </label>
                <div class="col-sm-8">
                      <input type="text" name="holiday" id="holiday" class="form-control" />
                      <input type="hidden" name="holiday_id" id="holiday_id" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label for="employee_name" class="col-sm-3 control-label">Description : </label>
                <div class="col-sm-8">
                      <input type="text" name="description" id="description" class="form-control" />
                </div>
              </div>
              <div class="box-footer">
                  <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                  <button type="button" class="btn btn-info pull-right" id="submit_bac_committee" onclick="$(this).submitHoliday();">Submit</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>


@stop
@section('plugins-script')
<script src="{{asset('adminlte/plugins/autocomplete/')}}/jquery.autocomplete.min.js"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/')}}/moment.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="">
  $.fn.addHoliday = function(){
    $('#addHoliday').modal('show');
  }
  $.fn.submitHoliday = function(){
    var datax = $('#addHolidayForm').serialize();
    $.ajax({
          type: "POST",
          url: "{{route('admin.add-holiday')}}",
          data : datax,
          dataType: "json",
          error: function(){
              console.log('error');
          },
          success: function(data){
              var errors = '';
              $('#addHoliday').modal('hide');
              $('#tbl_holiday').DataTable().ajax.reload();
          }
    });
  }

  $("#holiday").datepicker({
     format: 'MM dd',
     autoclose: true,  
  });

  $.fn.deleteHoliday = function(id){
    var x = confirm("Are you sure to delete this holiday?");
    if(x){
      $.ajax({
            type: "POST",
            url: "{{route('admin.delete-holiday')}}",
            data : {
                id : id,
                _token : '{{csrf_token()}}'
            },
            dataType: "json",
            error: function(){
                console.log('error');
            },
            success: function(data){
                 location.reload();
            }
      });
    }
  };

</script>

@stop
@section('plugins-css')
<link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datepicker/datepicker3.css">
<link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.css">
<style type="text/css">
  .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
  .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
  .autocomplete-selected { background: #F0F0F0; }
  .autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
  .autocomplete-group { padding: 2px 5px; }
  .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
  .select2-container{ width:100% !important; }
</style>
@stop