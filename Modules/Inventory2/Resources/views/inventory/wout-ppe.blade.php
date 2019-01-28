@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Purchase Order
      </h1>
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchase Order List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <table id="purchase_order_list" class="table table-bordered table-hover">
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
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td></td>
                        </tr>
                        <tr>
                          <th>No</th>
                          <th>Description</th>
                          <th>PO Dept</th>
                          <th>PO Sub-Dept</th>
                          <th>PO Date.</th>
                          <th>Qty</th>
                          <th>Unit</th>
                          <th>PO Total</th>
                          <th>OBR DATE</th>
                          <th>OBR Control No.</th>
                          <th>action</th>
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

<div class="modal fade" id="add_purchase_order_modal" tabindex="-1" role="dialog" aria-labelledby="add_purchase_order_modalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_purchase_order_modalLabel"> <span></span></h4>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <div id="contents-menu">
            <form class="form-horizontal" id="add_inventory_control_number">
              <div class="box-body">
                <div id="statusC"></div>

              <h4>Purchase INFO</h4>
                <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">DEPT : </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="pr_dept_desc"  disabled="disabled"  placeholder="Dept" />
                        <input type="hidden" class="form-control" id="pr_dept_id"  disabled="disabled" name="pr_dept_id" placeholder="Dept" />
                    </div>
                </div>

                <div class="form-group">
                 <label for="pr_no" class="col-sm-2 control-label">PR DATE : </label>
                  <div class="col-sm-10">
                    <div class="col-sm-4">
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="pr_no_date"  disabled="disabled" name="pr_no_date" placeholder="PR NO DATE" />
                          </div>
                    </div>
                     <div class="col-sm-8">
                        <label for="obr_date" class="col-sm-3 control-label">PO Date : </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="po_date"  name="po_date" disabled="disabled" placeholder="PO Date">
                        </div>
                  </div>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="obr_date" class="col-sm-2 control-label">OBR Date : </label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="obr_date" disabled="disabled" name="obr_date" placeholder="OBR Date">
                  </div>

                   <label for="obr_no" class="col-sm-2 control-label">OBR No. : </label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="obr_no"  disabled="disabled" name="obr_no" placeholder="OBR No.">
                  </div>
                </div>

                <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">Supplier : </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="supplier" name="supplier"  disabled="disabled"  placeholder="Supplier" />
                        <input type="hidden" class="form-control" id="supplier_id" name="supplier_id"   placeholder="Supplier" />
                    </div>
                </div>
              <hr />

              <h4>Inventory INFO</h4>

              <table class="table table-hover" id="inventory_info">
                <tbody>
                  <tr>
                    <td>
                         <label for="inv_date" class="control-label"> Date :</label>
                    </td>
                    <td>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="inv_date"  name="inv_date"    placeholder="Date" />
                        </div>
                    </td>
                    <td>
                         <label for="inv_control_no" class="control-label">Control No. :</label>
                    </td>
                    <td>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="inv_control_no"  name="inv_control_no"    placeholder="Control No." />
                        </div>
                    </td>

                  </tr>
                    <td>
                         <label for="inv_ppe_invoice_no" class="control-label">Invoice NO :</label>
                    </td>
                    <td>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="inv_ppe_invoice_no"  name="inv_ppe_invoice_no"     placeholder="Invoice NO " />
                        </div>
                    </td>
                    <td>
                         <label for="inv_invoice_date" class="control-label">Invoice Date :</label>
                    </td>
                    <td>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="inv_invoice_date"  name="inv_invoice_date"     placeholder="Invoice Date" />
                        </div>
                    </td>
                  <tr>

                  </tr>
                    <td>
                         <label for="accountable_name" class="control-label">ACCOUNTABLE PERSON :</label>
                    </td>
                    <td>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="accountable_name"  name="accountable_name"     placeholder="ACCOUNTABLE PERSON" />
                          <input type="hidden" class="form-control" id="accountable_id"  name="accountable_id"     placeholder="ACCOUNTABLE PERSON" />
                        </div>
                    </td>
                    <td>
                         <label for="accountable_position" class="control-label">Position :</label>
                    </td>
                    <td>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="accountable_position"  name="accountable_position" disabled="disabled"    placeholder="No." />
                        </div>
                    </td>
                  <tr>

                  </tr>
                </tbody>
              </table>
 <button type="button" class="btn btn-success btn-sm pull-right" id="add_items"><i class="fa fa-plus"></i></button>


                <table class="table table-striped" id="items_list">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th id="item_description">Description</th>
                      <th id="item_remarks">Remarks</th>
                      <th>Property Category</th>
                      <th>Property Item Code</th>
                      <th>Life Span</th>
                      <th>date aquired</th>
                      <th>Qty</th>
                      <th>unit</th>
                      <th>price</th>
                      <th>total price</th>
                    </tr>
                  </thead>

                  <tbody>
                  <tr id="item_1">
                      <td>1</td>
                      <td><textarea class="form-control" placeholder="Description" name="item_desc[1]"></textarea></td>
                      <td><textarea class="form-control" placeholder="Remarks" name="item_remarks[1]"></textarea></td>
                      <td>
                            <input class="form-control item_propcatcode" type="text" data-item="1" name="item_propcatcode[1]" />
                            <input class="form-control item_propcatcode" type="hidden" data-item="1" id="item_propcatcode_hide_1" name="item_propcatcode_hide[1]" />
                      </td>
                      <td><input class="form-control item_propitemcode" type="text" data-item="1" name="item_propitemcode[1]" /></td>
                      <td><input class="form-control" type="number" min="0" data-item="1" name="item_lifespan[1]" /></td>
                      <td><input class="form-control item_date_aquired" type="text" data-item="1" name="item_date_aquired[1]" /></td>
                      <td><input class="form-control" type="text" data-item="1" name="item_qty[1]" /></td>
                      <td><input class="form-control" type="text" data-item="1" name="item_unit[1]" /></td>
                      <td><input class="form-control" type="text" data-item="1" name="item_price[1]" /></td>
                      <td><input class="form-control" type="text" data-item="1" name="item_ttalprice[1]" /></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>



              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="button" class="btn btn-info pull-right" onclick="$(this).sentInventoryControlNumber();">Submit</button>
              </div>
              <!-- /.box-footer -->
              <input type="hidden" id="pono_id" name="pono_id" />
              <input type="hidden" id="pr_dept_id" />
              {{csrf_field()}}
            </form>

        </div>
      </div>

    </div>
  </div>
</div>
   @stop





@section('plugins-script')
<script src="{{asset('adminlte/plugins/autocomplete/')}}/jquery.autocomplete.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="{{asset('adminlte')}}/plugins/accounting/accounting.min.js"></script>


<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/extensions/Buttons/js/buttons.print.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>


<script src="{{asset('adminlte')}}/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/extensions/Buttons/js/buttons.html5.min.js"></script>

<script type="text/javascript">

$(function() {



      $('#accountable_name').autocomplete({
                    serviceUrl: '{{route("emp.get_employee_name")}}',
                    dataType: 'json',
                    type: 'POST',
                    params : {
                              _token : '{{csrf_token()}}'
                    },
                    onSelect: function (suggestion) {
                      $('#accountable_id').val(suggestion.data);
                      $('#accountable_position').val(suggestion.title);
                    },
                    minLength: 0
        });




 $('#add_items').on('click',function(){
    var rowCount = $('#items_list tbody tr').length;
    rowCount +=1;
      $('.item_cancel').remove();
      var add_tr = '<tr id="item_'+rowCount+'" >'+
                    '  <td>'+rowCount+'</td>'+
                    '  <td><textarea class="form-control" placeholder="Description" name="item_desc['+rowCount+']"></textarea></td>'+
                    '  <td><textarea class="form-control" placeholder="Remarks" name="item_remarks['+rowCount+']"></textarea></td>'+
                    '  <td>'+
                    '<input class="form-control item_propcatcode" type="text" data-item="'+rowCount+'" name="item_propcatcode['+rowCount+']" />'+
                    '<input class="form-control item_propcatcode" type="hidden" data-item="1" id="item_propcatcode_hide_'+rowCount+'" name="item_propcatcode_hide['+rowCount+']" />'+
                    '  </td>'+
                    '  <td><input class="form-control item_propitemcode" type="text" data-item="'+rowCount+'" name="item_propitemcode['+rowCount+']" /></td>'+
                    '  <td><input class="form-control" type="number" data-item="'+rowCount+'" min="0" name="item_lifespan['+rowCount+']" /></td>'+
                    '  <td><input class="form-control item_date_aquired" type="text" data-item="'+rowCount+'" name="item_date_aquired['+rowCount+']" /></td>'+
                    '  <td><input class="form-control" type="text" data-item="'+rowCount+'" name="item_qty['+rowCount+']" /></td>'+
                    '  <td><input class="form-control" type="text" data-item="'+rowCount+'" name="item_unit['+rowCount+']" /></td>'+
                    '  <td><input class="form-control" type="text" data-item="'+rowCount+'" name="item_price['+rowCount+']" /></td>'+
                    '  <td><input class="form-control" type="text" data-item="'+rowCount+'" name="item_ttalprice['+rowCount+']" /></td>'+
                    '  <td><button type="button" class="btn btn-danger btn-sm item_cancel"  onclick="$(this).removeTR('+rowCount+');" ><i class="fa fa-minus"></i></button></td>'+
                    '</tr>';

                    $('#items_list tbody').append(add_tr);

                    $('.item_propcatcode').autocomplete({
                    serviceUrl: '{{route("inventory.get_ppesubcodes")}}',
                    dataType: 'json',
                    type: 'POST',
                    params : {
                              _token : '{{csrf_token()}}'
                    },
                    onSelect: function (suggestion) {
                      $('#item_propcatcode_hide_'+$(this).attr('data-item')).val(suggestion.data);
                    },
                    minLength: 0
        });

    $('.item_date_aquired').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd',
    });

       $('.item_propitemcode').on('focus',function(){

           var subcat_id =  $('#item_propcatcode_hide_'+$(this).attr('data-item')).val();
           $(this).autocomplete({
                      serviceUrl: '{{route("inventory.get_ppeitemcodes")}}',
                      dataType: 'json',
                      type: 'POST',
                      params : {
                                subcat_id : subcat_id,
                                _token : '{{csrf_token()}}'
                      },
                      onSelect: function (suggestion) {

                      }
          });
       });

  });
  $.fn.removeTR = function(id){
    $(this).closest('tr').remove();
    id -= 1;
    if(id!=1){
      $('tr#item_'+(id)+' td:last-child').append('<button type="button" class="btn btn-danger btn-sm item_cancel"  onclick="$(this).removeTR('+(id)+');" >remove</button>');
    }
  };

$('.item_propcatcode').autocomplete({
                    serviceUrl: '{{route("inventory.get_ppesubcodes")}}',
                    dataType: 'json',
                    type: 'POST',
                    params : {
                              _token : '{{csrf_token()}}'
                    },
                    onSelect: function (suggestion) {
                      $('#item_propcatcode_hide_'+$(this).attr('data-item')).val(suggestion.data);
                    },
                    minLength: 0
        });

       $('.item_propitemcode').on('focus',function(){

           var subcat_id =  $('#item_propcatcode_hide_'+$(this).attr('data-item')).val();
           $(this).autocomplete({
                      serviceUrl: '{{route("inventory.get_ppeitemcodes")}}',
                      dataType: 'json',
                      type: 'POST',
                      params : {
                                subcat_id : subcat_id,
                                _token : '{{csrf_token()}}'
                      },
                      onSelect: function (suggestion) {

                      }
          });
       });

       $('#purchase_order_list').dataTable({
         dom: 'Bfrtip',
          buttons: [
               'csvHtml5', 'excelHtml5', 'pdfHtml5', 'print'
          ],
        processing: true,
        serverSide: true,
        ajax:{
          "type": 'POST',
          "url" : '{!! route('pr.order-list-with-po') !!}',
          data : {
                  "_token" : '{{csrf_token()}}'
          }
        },

        columns: [
            { data: 'item_id' , name: 'olongapo_purchase_request_items.id' ,
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { data: 'description', name: 'olongapo_purchase_request_items.description'},
            { data: 'dept_code', name: 'olongapo_department.dept_code' },
            { data: 'subdept_code', name: 'olongapo_subdepartment.subdept_code' },
            { data: 'po_date', name: 'olongapo_purchase_order_no.po_date'   },
            { data: 'qty', name: 'olongapo_purchase_request_items.qty' },
            { data: 'unit', name: 'olongapo_purchase_request_items.unit' },
            {
              data: null, name: 'olongapo_purchase_request_items.pr_total',
              render : function(data,type,row){
                return accounting.formatMoney(data.pr_total,'Php ');
              }
             },
             { data: 'obr_date', name: 'olongapo_purchase_request_items.obr_date' },
             { data: 'obr_no', name: 'olongapo_purchase_request_items.obr_no' },
            { data: null, name: 'olongapo_purchase_order_no.po_date' ,
              render : function(data , type , row){
                    return '<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_purchase_order_modal" data-backdrop="static" data-keyboard="false" onclick="$(this).addControlnumber('+data.pono_id+');" >add Control NO.</button> ';
                }
              },
        ],
        columnDefs: [
          {
              orderable: false, targets: [0,-1]
           }
        ],
        "order": [[ 0, 'asc' ]],

    }).dataTableSearch(500);


  });


//Date picker
    $('#inv_date').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd',
    });

    $('.item_date_aquired').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd',
    });

$('#inv_invoice_date').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd',
    });


  $.fn.addControlnumber = function(pono_id){
    $.ajax({
            type: "POST",
             url: "{{route('pr.get-request-po')}}",
            data : {
              prno_id : pono_id,
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
              $('#po_date').val(data[0].po_date);
              $('#supplier').val(data[0].title);
              $('#supplier_id').val(data[0].supplier_id);
              $('#pono_id').val(pono_id);
              $('#pr_dept_id').val(data[0].prno_dept);

            }
     });
  };

  $.fn.sentInventoryControlNumber = function(){
      $.ajax({
            type: "POST",
            url: "{{route('inv.add_control_number')}}",
            data : $('#add_inventory_control_number').serialize(),
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
                      $('#statusC').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                    }else{
                      $('#statusC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                    }

            }
     });
  };
</script>
<script src="{{asset('adminlte')}}/plugins/datatables/table-header-search.js"></script>
@stop


@section('plugins-css')
 <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datepicker/datepicker3.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/extensions/Buttons/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/extensions/Buttons/css/buttons.bootstrap.css">



  <style type="text/css">

.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
.select2-container{ width:100% !important; }

table>thead>tr#test>th>input,table>thead>tr#test>td>input{
  width: 100%;
}

#inventory_info>tbody>tr>td:first-child{
  width: 15%;
}

#items_list th#item_description,#items_list  th#item_remakrs{
  width: 20%;
}
#inventory_info>tbody>tr>td{
  text-align: right;
}


#add_purchase_order_modal .modal-dialog {width: 98%}
  </style>
}

@stop