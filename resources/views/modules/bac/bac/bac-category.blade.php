@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      </h1>
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">BAC Category LIST</h3>
              <button class="btn btn-info btn-xs pull-right" onclick="$(this).resetForm();" ><i class="fa fa-plus"></i></button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <table id="category_list" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>Description</th>
                          <th>Action</th>
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

<div class="modal fade" id="bac_category_modal" tabindex="-1" role="dialog" aria-labelledby="bac_category_modalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="bac_category_modalLabel"> Add New Category<span></span></h4>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <div id="contents-menu">
         <div class="box-body">
            <form class="form-horizontal" method="POST" id="add_bac_category" >
            <div class="statusC"></div>
            {{csrf_field()}}
            <div class="form-group">
                  <label for="bac_category_desc" class="col-sm-3 control-label">Description : </label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="bac_category_desc" id="bac_category_desc" placeholder="Description" />
                  </div>
                </div>

 <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="button" class="btn btn-info pull-right" id="submit_cat" >Submit</button>
              </div>

              </div>
              <!-- /.box-footer -->
              {{csrf_field()}}
              <input type="hidden" name="categ_id" id="categ_id"   />
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
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/accounting/accounting.min.js"></script>
<script type="text/javascript">

$.fn.resetForm = function(){
    $('#categ_id').val('');
    $('#add_bac_category')[0].reset();
    $('#bac_category_modal').modal('show');
};


$('#submit_cat').click(function(){
     $.ajax({
            type: "POST",
             url: "{{route('bac.category')}}",
            data : $('#add_bac_category').serialize(),
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
                      $('#add_bac_category .statusC').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn();
                    }else{
                      $('#add_bac_category .statusC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn();
                    }
                      $.fn.categ_datatable();
            }
          });
});



  $.fn.categ_datatable = function(){
    if ( $.fn.dataTable.isDataTable( '#category_list' ) ) {
        $('#category_list').dataTable().fnDestroy();
    }

    $('#category_list').dataTable({
        processing: true,
        serverSide: true,
        ajax:{
          "type": 'POST',
          "url" : '{!! route('bac.set_datatables') !!}',
          data : {
                   dataTables : 'category_list',
                  "_token" : '{{csrf_token()}}'
          }
        },
        columns: [
            { data: 'id' , name: 'id' ,
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { data: 'description', name: 'description'},
            { data: null, name: 'olongapo_bac_control_info.id' ,
              render : function(data , type , row){
                    return ' <button type="submit" class="btn btn-success btn-sm" onclick="$(this).updateCategory('+data.id+');" >view</button>';
                }
              },
        ],
        columnDefs: [
          {
              orderable: false, targets: [0,-1]
           }
        ],
        "order": [[ 1, 'asc' ]],

    });
};
  $.fn.categ_datatable();

$.fn.updateCategory = function(id){
  $('#categ_id').val(id);

   $.ajax({
            type: "POST",
             url: "{{route('bac.get_categ')}}",
            data : {
              categ_id:id,
              "_token" : '{{csrf_token()}}'
            },
            dataType: "json",
            error: function(){
              console.log('error');
            },
            success: function(data){
              $('#bac_category_desc').val(data.description);
              $('#bac_category_modal').modal('show');
            }

          });
};

</script>
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

table>thead>tr#test>th>input,table>tfoot>tr>th>input{
  width: 100%;
}


  </style>


@stop