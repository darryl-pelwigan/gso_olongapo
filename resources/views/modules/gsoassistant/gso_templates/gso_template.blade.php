@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          GSO TEMPLATES
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">GSO TEMPLATE List</h3>


               <a href="{{route('gso.add_template')}}" class="pull-right btn btn-success btn-sm"><i class="fa fa-plus"></i></a>&nbsp; &nbsp;&nbsp; &nbsp;
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <table id="purchase_order_list" class="table table-bordered table-hover">
                      <thead>

                        <tr>
                          <th>No</th>
                          <th>Description</th>
                          <th>Date Created</th>
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

  <!-- Modal -->
   @stop





@section('plugins-script')
<script src="{{asset('adminlte/plugins/autocomplete/')}}/jquery.autocomplete.min.js"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/')}}/moment.min.js"></script>
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript">
<?php $id = ''; ?>
$(function() {
       $('#purchase_order_list').dataTable({
        processing: true,
        serverSide: true,
        ajax:{
          "type": 'POST',
          "url" : '{!! route('gso.set_datatables') !!}',
          data : {
                  dataTables : 'gso_templates',
                  "_token" : '{{csrf_token()}}'
          }
        },
        columns: [
            { data: null , name: 'olongapo_gso_template.id' ,
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { data: 'templ_desc' , name: 'olongapo_gso_template.decription' },
            // { data: 'type_desc' , name: 'olongapo_bac_type.description' },
            { data: 'templ_date' , name: 'olongapo_gso_type.updated_at' },
            { data: null , name: 'olongapo_gso_template.id' ,
              render: function (data, type, row, meta) {
                  return '<a href="" class="btn btn-info btn-xs" >view</a>';
              }
            }
        ],
        columnDefs: [
          {
              orderable: false, targets: [0,-1]
           }
        ],
        "order": [[ 0, 'asc' ]],

    });


  });


//Date picker
    $('#po_date').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd',
    });


  $.fn.processBac = function(prno_id){
    $.ajax({
            type: "POST",
             url: "{{route('pr.get-request')}}",
            data : {
              prno_id : prno_id,
              _token : '{{csrf_token()}}'
            },
            dataType: "json",
            error: function(){
              console.log('error');
            },
            success: function(data){
              $('#obr_date').val(data[0].obr_date);
              $('#obr_no').val(data[0].obr_no);
              $('#pr_dept_desc').val(data[0].desc);
              $('#pr_no_date').val(data[0].prno_date);
               var tr = '';
              for(var x = 0 ; x<data.length;x++){
               tr =  '   <tr>'+
                          '     <td>'+x+'</td>'+
                          '     <td>'+data[x].description+'</td>'+
                          '     <td>'+data[x].remarks+'</td>'+
                          '     <td>'+data[x].qty+'</td>'+
                          '     <td>'+data[x].unit+'</td>'+
                          '     <td>'+accounting.formatMoney(data[x].pr_total,"Php ")+'</td>'+
                          '     <td>'+data[x].title+'</td>'+
                          '   </tr>'+tr;

              }
              $('#items_list tbody').html(tr);
              $('#prno_id').val(prno_id);
              $('#pr_dept_id').val(data[0].prno_dept);

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

.modal.in .modal-dialog{
  width: 95%;
  margin: 10px auto;
  }
  </style>


@stop