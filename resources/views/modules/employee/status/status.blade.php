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
              <h3 class="box-title">STATUS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <table id="status_list" class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>PR No</th>
                          <th>DATE</th>
                          <th>STATUS</th>
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


   @stop





@section('plugins-script')
<script src="{{asset('adminlte/plugins/autocomplete/')}}/jquery.autocomplete.min.js"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/')}}/moment.min.js"></script>
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/accounting/accounting.min.js"></script>
<script type="text/javascript">

$(function() {
       $('#status_list').dataTable({
        processing: true,
        serverSide: true,
        ajax:{
          "type": 'POST',
          "url" : '{!! route('bac.set_datatables') !!}',
          data : {
                   dataTables : 'status_list',
                  "_token" : '{{csrf_token()}}'
          }
        },
        columns: [
            { data: 'pr_id' , name: 'olongapo_purchase_request_no.id' ,
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { data: 'pr_no', name: 'olongapo_purchase_request_no.pr_no' },
            { data: null, name: 'olongapo_purchase_request_no.pr_date',
              render: function(data, type, row){
                var pr_date = moment(data.pr_date).format("MMM DD, YYYY");
                  return pr_date;
              }

            },
            // { data: 'po_no', name: 'olongapo_purchase_order_no.po_no' }
            // { data: 'sup_title', name: 'supplier_info.title' },

            { data: null, name: 'any' ,
              render : function(data , type , row){
                     if(data.pr_no == null && data.ppmp_no == null && data.abstrct_date == null && data.bac_control_no == null && data.po_no == null){
                          return 'Pending for Purchase Request No. Setting';
                       }else if(data.ppmp_no == null && data.abstrct_date == null && data.bac_control_no == null && data.po_no == null ){
                          return 'Pending for PPMP No. Setting';
                       } else if(data.abstrct_date == null && data.bac_control_no == null && data.po_no == null){
                          return 'Pending for Abstract No. Setting';
                       } else if(data.bac_control_no == null && data.po_no == null){
                          return 'Pending for Bac Contronl No. Setting';
                       } else if(data.po_no == null){
                          return 'Pending for PO No. Setting';
                       } else{
                        return 'Done';
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


  });


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