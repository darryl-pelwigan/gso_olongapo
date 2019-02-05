@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Supplier List
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-success ">
          <div class="box-header">
            <button class="btn btn-success pull-right" data-toggle="modal" data-target="#add_suuplier_modal" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i></button>
          </div>


          <div class="box-body">

          <table id="example1">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th>Description</th>

                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                {{count($supplier)}}
                @for($x = 0 ; $x < count($supplier);$x++)
                  <tr>
                      <td>{{$x}}</td>
                      <td>{{$supplier[$x]->title}}</td>
                      <td>{{$supplier[$x]->desc}}</td>
                      <td>{{$supplier[$x]->details}}</td>
                  </tr>
                @endfor
            </tbody>
          </table>
          </div>

          <div class="box-footer">
          </div>

      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal -->
<div class="modal fade" id="add_suuplier_modal" tabindex="-1" role="dialog" aria-labelledby="add_suuplier_modalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_suuplier_modalLabel"> <span></span></h4>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <div id="contents-menu">
            <form class="form-horizontal" id="new_supplier">
              <div class="box-body">
                <div id="statusC"></div>

                <div class="form-group">
                  <label for="cmpny_name" class="col-sm-3 control-label">Company Name : </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="cmpny_name"  name="cmpny_name" placeholder="Company Name" />
                  </div>
                </div>

                <div class="form-group">
                  <label for="cmpny_desc" class="col-sm-3 control-label">Company Description : </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="cmpny_desc"  name="cmpny_desc" placeholder="Company Description" />
                  </div>
                </div>


                <div class="form-group">
                  <label for="cmpny_address" class="col-sm-3 control-label">Address : </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="cmpny_address"  name="cmpny_address" placeholder="Address" />
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="button" class="btn btn-info pull-right" id="submit_empl" onclick="$(this).sentNewSupplier();">Submit</button>
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

   @stop

@section('plugins-css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.css">
@stop



@section('plugins-script')
<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $('#example1').DataTable();

  $('[data-toggle="tooltip"]').tooltip();

$.fn.sentNewSupplier = function(){
console.log($('#new_supplier').serialize());

 var el = $('#submit_empl');
        el.attr('disabled',true);
      $.ajax({
            type: "POST",
            url: "{{route('inv.new_suppplier')}}",
            data : $('#new_supplier').serialize(),
            dataType: "json",
            error: function(){
               el.attr('disabled',false);
            },
            success: function(data){
                 el.attr('disabled',false);
                    var errors = '';
                    if(data['status']==0){
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                        }
                      $('#statusC').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(10000).fadeOut();
                    }else{
                      $('#statusC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                       location.reload();
                   }
            }
     });
};
</script>
@stop
