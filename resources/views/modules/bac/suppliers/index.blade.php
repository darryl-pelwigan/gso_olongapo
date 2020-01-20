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
          <button class="btn btn-success pull-right" onclick="$(this).addSupp();" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Supplier</button>
        </div>

        <div class="box-body">
          <form action="" id="supplies_delete_form" >
            <table id="supplier_list" class="table table-bordered table-striped table-hover dataTable no-footer">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Action</th>
                      <th class="delete_column hide">Delete</th>
                  </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
            {{csrf_field()}}
            <button type="button" class="btn btn-default"><input type="checkbox" id="delete_checkbutton"><b> Enabled Supplier Delete</b></button>
            <button type="button" class="btn btn-danger delete_column hide" name="delete" id="delete_supplier" disabled="" onclick="$(this).deleteSupllierRecord();"> <i class="fa fa-trash"></i> Delete Supplier Record</button>
          </form>
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
              <input type="hidden" id="supp_id" name="supp_id" />
              {{csrf_field()}}
            </form>

        </div>
      </div>

    </div>
  </div>
</div>

   @stop




@section('plugins-script')
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>

<script type="text/javascript">
   $.fn.getALL = function(){

  if ( $.fn.dataTable.isDataTable( '#supplier_list' ) ) {
      $('#supplier_list').dataTable().fnDestroy();
  }

   $(document).on('click', '.supplier_id', function(){
      if($('.supplier_id:checked').length){
        $('#delete_supplier').prop('disabled', '');
      }else{
        $('#delete_supplier').prop('disabled', 'disabled');
      }
    });

    $('#delete_checkbutton').click(function(){
      if($(this).is(':checked')){
        $('.delete_column').removeClass('hide');
      }else{
        $('.delete_column').addClass('hide');
      }
    });

    $('#supplier_list').dataTable({
        processing: true,
        serverSide: true,
        ajax:{
          "type": 'POST',
          "url" : '{!! route('bac.set_datatables') !!}',
            data : {
              "_token" : '{{csrf_token()}}',
              dataTables : 'supplier_list'
            }
          },
          columns: [
              { data: 'id' , name: 'supplier_info.id' },
              { data: 'title' , name: 'supplier_info.id' },
              { data: 'details' , name: 'supplier_address.details' },
              {
                data: null, name: '', searchable : false, orderable : false,
                render : function(data,type,row){
                  return '<button type="button" class="btn btn-info btn-xs" onclick="$(this).viewSupplier('+data.id+');" > <i class="fa fa-search"></i> View</button>';
                }
              },
              {
                data: null, name: '', searchable : false, orderable : false,
                render : function(data,type,row){
                  return '<input type="checkbox" name="supplier_id[]" class="supplier_id" value="'+data.id+'"/> Delete';
                },className : 'delete_column hide'
              }
          ],
          'fnDrawCallback':function(){
            $('#delete_checkbutton').click(function(){
                if($(this).is(':checked')){
                  $('.delete_column').removeClass('hide');
                }else{
                  $('.delete_column').addClass('hide');
                }
            });

            if($('#delete_checkbutton').is(':checked')){
              $('.delete_column').removeClass('hide');
            }else{
              $('.delete_column').addClass('hide');
            }
        }
    });
  };
$.fn.getALL();

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

$.fn.viewSupplier  = function(supp_id){

  $.ajax({
            type: "POST",
            url: "{{route('bac.supplier')}}",
            data : {
              supp_id:supp_id,
              "_token" : '{{csrf_token()}}',
            },
            dataType: "json",
            error: function(){
               el.attr('disabled',false);
            },
            success: function(data){
             $('#cmpny_name').val(data.title);
             $('#cmpny_desc').val(data.desc);
             $('#cmpny_address').val(data.details);
             $('#supp_id').val(supp_id);
             $('#submit_empl').attr('onclick','$(this).updateSupplier();');
             $('#add_suuplier_modal').modal('show');
            }
          });
};

$.fn.updateSupplier = function(){
    $.ajax({
            type: "POST",
            url: "{{route('bac.update_supplier')}}",
            data : {
              cmpny_name:$('#cmpny_name').val(),
              cmpny_desc:$('#cmpny_desc').val(),
              cmpny_address:$('#cmpny_address').val(),
              supp_id:$('#supp_id').val(),
              "_token" : '{{csrf_token()}}',
            },
            dataType: "json",
            error: function(){
               el.attr('disabled',false);
            },
            success: function(data){
              $.fn.getALL();
            }
          });

    $('#cmpny_name').val('');
    $('#cmpny_desc').val('');
    $('#cmpny_address').val('');
   $('#add_suuplier_modal').modal('hide');
  $('#submit_empl').attr('onclick','$(this).sentNewSupplier();');
};

$.fn.addSupp = function(){
  $('#cmpny_name').val('');
    $('#cmpny_desc').val('');
    $('#cmpny_address').val('');
  $('#submit_empl').attr('onclick','$(this).sentNewSupplier();');
  $('#add_suuplier_modal').modal('show');
};

$.fn.deleteSupllierRecord = function(){
  var x = confirm("Are you sure to delete record/s?");
  if(x){
    $.ajax({
        type: "POST",
        url: "{{route('bac.delete_supplier')}}",
        data : $('#supplies_delete_form').serialize(),
        dataType: "json",
        error: function(){
            console.log('error');
        },
        success: function(data){
          alert("Record/s deleted successfully.");
          $('#supplier_list').DataTable().ajax.reload();
        }
    });
  }
};


$.fn.addSupp = function(){
  $('#cmpny_name').val('');
    $('#cmpny_desc').val('');
    $('#cmpny_address').val('');
  $('#submit_empl').attr('onclick','$(this).sentNewSupplier();');
  $('#add_suuplier_modal').modal('show');
};

</script>
@stop


@section('plugins-css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.css">
@stop
