@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          GSO Procurement Settings

      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
               @include('template::admin-layouts.includes.message')
            </div>

            <!-- /.box-header -->
            <div class="box-body">
            <form class="form-horizontal" method="POST" action="{{route('gso.proc_methods_save')}}">
            {{csrf_field()}}
               <div class="form-group">
                  <label class="control-label col-sm-2" for="proc_type">Description:</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="proc_type" name="proc_type" placeholder="Enter Description" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="min_value">MIN VALUE:</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" id="min_value" name="min_value" placeholder="MIN VALUE" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="max_value">MAX VALUE:</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" id="max_value" name="max_value" placeholder="MAX VALUE" />
                  </div>
                </div>


            <div class="box-footer">
             <div class="col-md-10 col-md-offset-1">
                <button class="btn" type="button" onclick="$(this).resetform()">Cancel</button>
                <button class="pull-right btn btn-info btn-sm">Submit</button>
              </div>
            </div>

            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>

        </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">

            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover" id="proc_methods">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Max Value</th>
                      <th>Min Value</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- update modal -->
      <div class="modal fade" id="proc_method_modal" tabindex="-1" role="dialog" aria-labelledby="new_employee_modalLabel">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="proc_method_modalLabel"> Update Procurement Type<span></span></h4>
            </div>
            <div class="modal-body">
              <div id="status"></div>
              <div id="contents-menu">
                  <form class="form-horizontal" id="proc_method" method="post" action="{{ route('gso.proc_methods_update') }}">
                    <div class="box-body">
                      <div id="statusCI"></div>
                      <div class="form-group">
                         <label class="control-label col-sm-3" for="proc_type">Description:</label>
                         <div class="col-sm-9">
                           <input type="text" class="form-control" id="proc_type2" name="proc_type" placeholder="Enter Description" />
                         </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-sm-3" for="min_value">MIN VALUE:</label>
                         <div class="col-sm-9">
                           <input type="number" class="form-control" id="min_value2" name="min_value" placeholder="MIN VALUE" />
                         </div>
                       </div>

                       <div class="form-group">
                         <label class="control-label col-sm-3" for="max_value">MAX VALUE:</label>
                         <div class="col-sm-9">
                           <input type="number" class="form-control" id="max_value2" name="max_value" placeholder="MAX VALUE" />
                         </div>
                       </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                      <button type="submit" class="btn btn-info pull-right">Submit</button>
                    </div>
                    <!-- /.box-footer -->
                    <input type="hidden" id="rec_id" name="rec_id" />
                    {{csrf_field()}}
                  </form>

              </div>
            </div>

          </div>
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
<script src="{{asset('adminlte/plugins/daterangepicker/')}}/moment.min.js"></script>
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="{{asset('adminlte')}}/plugins/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(function() {
    $.fn.showProc = function () {
      if ( $.fn.dataTable.isDataTable( '#proc_methods' ) ) {
          $('#proc_methods').dataTable().fnDestroy();
      }
      $('#proc_methods').dataTable({
       processing: true,
       serverSide: true,
       ajax:{
         "type": 'POST',
         "url" : '{!! route('gso.set_datatables') !!}',
         data : {
                 dataTables : 'gso_proc_methods',
                 "_token" : '{{csrf_token()}}'
         }
       },
       columns: [
           { data: 'proc_title' , name: 'olongapo_procurement_method.proc_title'
           },
            { data: 'proc_min_value' , name: 'olongapo_procurement_method.proc_min_value'
           },
           { data: 'proc_max_value' , name: 'olongapo_procurement_method.proc_max_value'
           },
           { data: null , name: 'olongapo_procurement_method.delete',
           render: function (data, type, row, meta) {
              if(data.deleted_at == null){
                return '<button onclick="$(this).method_update('+data.id+')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#proc_method_modal" data-backdrop="static" data-keyboard="false">update</button><button class="btn btn-danger btn-sm " data-toggle="modal" data-target="#deleteModal">delete</button>'+

                '<div id="deleteModal" class="modal fade" role="dialog">'+
                '<div class="modal-dialog">'+
                '<div class="modal-content">'+
                '<div class="modal-header">'+
                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                '<h4 class="modal-title">Modal Header</h4>'+
                '</div>'+
                '<div class="modal-body">'+
                '<p>Are you sure you want to delete this record?</p>'+
                '</div>'+
                '<div class="modal-footer">'+
                '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'+
                '<button type="button" class="btn btn-default" data-dismiss="modal" onclick="$(this).deleteMethod(\''+data.id+'\');">Delete</button>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>'
                ;
              }else{
                return '';
              }
            }
          },




       ],
       columnDefs: [
         {
             orderable: false, targets: [0,-1]
          }
       ],
       "order": [[ 0, 'asc' ]],

   });
    }
    $.fn.showProc();

    $.fn.deleteMethod = function (id) {
      $.ajax({
        type: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          id: id
        },
        dataType: 'JSON',
        url: '{{ route("gso_proc_methods_delete") }}',
        success: function (data){
          $.fn.showProc();
        },
        error: function () {
          alert('error');
        }
      });
    }

    $.fn.method_update = function(id) {
      $.ajax({
        type: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          id: id
        },
        dataType: 'JSON',
        url: '{{ route("gso.proc_methods_get") }}',
        success: function(data) {
          $('#proc_type2').val(data.proc_title);
          $('#min_value2').val(data.proc_min_value);
          $('#max_value2').val(data.proc_max_value);
          $('#rec_id').val(id);
        },
        error: function () {
          alert('error');
        }
      });
    }
    $.fn.resetform = function() {
      $('form')[0].reset();
    }
    
  });

</script>
@stop


@section('plugins-css')
 <!-- Bootstrap time Picker -->
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

table>thead>tr#test>th>input,table>tfoot>tr>th>input{
  width: 100%;
}
/*
.modal.in .modal-dialog{
  width: 95%;
  margin: 10px auto;
  }*/
  </style>


@stop
