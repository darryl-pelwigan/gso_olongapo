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
              <h3 class="box-title">Purchase Order</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <table id="purchase_order_list" class="table table-striped table-bordered table-hover">
                      <thead>

                        <tr>
                          <th>No</th>
                          <th>PR NO</th>
                          <th>PR Dept</th>
                          <th>PR Date.</th>
                          <th>PO NO</th>
                          <th>PO DATE</th>
                          <th>PR Total</th>
                          {{-- <th>OBR DATE</th> --}}
                      {{--     <th>OBR Control No.</th> --}}
                          <th></th>
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

<div class="modal fade" id="add_purchase_order_modal" tabindex="-1" role="dialog" aria-labelledby="add_purchase_order_modalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_purchase_order_modalLabel"> <span>Add Purchase Order Number</span></h4>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <div id="contents-menu">
            <form class="form-horizontal" id="add_purchase_order">
              <div class="box-body">
                <div id="statusC"></div>

                <div class="form-group">
                  <label for="obr_date" class="col-sm-2 control-label">PO Date : </label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="po_date"  name="po_date" placeholder="PO Date">
                  </div>
                   <label for="pr_no" class="col-sm-2 control-label">PO No. : </label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" id="po_no"   name="po_no" placeholder="PO No." />
                        <input type="hidden"  id="po_id" name="po_id" />
                    </div>
                </div>

                <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">DEPT : </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="pr_dept_desc"  disabled="disabled"  placeholder="Dept" />
                        <input type="hidden"  id="pr_dept_id"   name="pr_dept_id"  />
                    </div>
                </div>

                <!-- PR INFO -->
                <div class="form-group">
                  <label for="obr_date" class="col-sm-2 control-label">PR No. : </label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="prno" placeholder="PR No." disabled="disabled">
                    <input type="hidden" id="prno_id" name="prno_id" />
                  </div>

                   <label for="pr_no" class="col-sm-2 control-label">PR DATE. : </label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" id="pr_no_date"  disabled="disabled" placeholder="PR DATE" />
                    </div>
                </div>


                <!-- BAC INFO -->
                <div class="form-group">
                  <label for="obr_date" class="col-sm-2 control-label">BAC No. : </label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="bac_no" placeholder="BAC No." disabled="disabled">
                  </div>

                   <label for="pr_no" class="col-sm-2 control-label">BAC DATE : </label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" id="bac_date"  disabled="disabled" placeholder="BAC DATE" />
                    </div>
                </div>

                <!-- BAC INFO -->
                <div class="form-group">
                  <label for="obr_date" class="col-sm-2 control-label">BAC MODE : </label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="bac_mode" placeholder="BAC MODE" disabled="disabled">
                  </div>

                   <label for="pr_no" class="col-sm-2 control-label">BAC CAtegory : </label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" id="bac_category"  disabled="disabled" placeholder="BAC CAtegory" />
                    </div>
                </div>


                 <!-- OBR INFO -->
                 <div class="form-group">
                  <label for="obr_date" class="col-sm-2 control-label">OBR Date : </label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="obr_date"  disabled="disabled"  name="obr_date" placeholder="OBR Date">
                  </div>

                   <label for="obr_no" class="col-sm-2 control-label">OBR No. : </label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="obr_no"  disabled="disabled"    name="obr_no" placeholder="OBR No.">
                  </div>
                </div>





                <!-- ABSTRACT INFO -->
                <div class="form-group">
                    <label for="absctrct_no" class="col-sm-2 control-label">ABSTRACT NO.</label>
                      <div class="col-sm-4">
                       <input type="text" class="form-control" id="absctrct_no"  name="absctrct_no"    placeholder="ABSTRACT NO"  disabled="true"  />
                    </div>
                     <label for="absctrct_date" class="col-sm-2 control-label">ABSTRACT DATE : </label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" id="absctrct_date" name="absctrct_date" placeholder="ABSTRACT DATE" disabled="true" />
                    </div>
                </div>

                <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">Supplier : </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="supplier_desc"  disabled="disabled"  placeholder="Suuplier" />
                    </div>
                </div>

                   <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">Total amount : </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="total_amt"  disabled="disabled"  placeholder="Total amount" />
                    </div>
                </div>

                </div>
                <table class="table table-striped" id="items_list">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Description</th>
                      <th>Brand</th>
                      <th>Qty</th>
                      <th>Unit</th>
                      <th>Price</th>
                      <th>Total Price</th>
                    </tr>
                  </thead>

                  <tbody>
                  </tbody>
                </table>



              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="button" class="btn btn-info pull-right" onclick="$(this).sentPurchaseOrder();">Submit</button>
              </div>
              <!-- /.box-footer -->

              {{csrf_field()}}
            </form>

        </div>
      </div>
    </div>
  </div>
</div>

    <div class="modal fade" id="pdf" tabindex="-1" role="dialog" aria-labelledby="add_purchase_order_modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="add_purchase_order_modalLabel"> <span>Set Authorized Official</span></h4>
                </div>
                <div class="modal-body">
                    <div id="status"></div>
                    <div id="contents-menu">
                        <form class="form-horizontal" id="auth_official_form">
                            <div class="box-body">
                                <div id="statusC"></div>
                                <div class="form-group">
                                    <label for="obr_date" class="col-sm-2 control-label">Authorized Official: </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="auth_official"  name="auth_official" placeholder="Authorized Official" required>
                                        <input type="hidden"  name="pono_id" id="pono_id" />
                                    </div>
                                    <button type="button" class="btn btn-info" id="submit_pdf" onclick="$(this).sentPdf();" disabled>Submit</button>
                                </div>
                                {{csrf_field()}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <div class="modal fade" id="excel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="add_purchase_order_modalLabel"> <span>Set Authorized Official</span></h4>
                </div>
                <div class="modal-body">
                    <div id="status"></div>
                    <div id="contents-menu">
                        <form class="form-horizontal" id="auth_official_form_excel">
                            <div class="box-body">
                                <div id="statusC"></div>
                                <div class="form-group">
                                    <label for="obr_date" class="col-sm-2 control-label">Authorized Official: </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="auth_official_excel"  name="auth_official" placeholder="Authorized Official" required>
                                        <input type="hidden"  name="pono_id" id="pono_id_excel" />
                                    </div>
                                    <button type="button" class="btn btn-info" id="submit_excel" onclick="$(this).sentExcel();" disabled>Submit</button>
                                </div>
                                {{csrf_field()}}
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
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/accounting/accounting.min.js"></script>
<script type="text/javascript">

$(function() {
       $('#purchase_order_list').dataTable({
        processing: true,
        serverSide: false,
        ajax:{
          "type": 'POST',
          "url" : '{!! route('bac.set_datatables') !!}',
          data : {
                   dataTables : 'bac_list_po',
                  "_token" : '{{csrf_token()}}'
          }
        },
        columns: [
            { data: 'item_id' , name: 'olongapo_purchase_request_items.id' ,
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { data: 'pr_no', name: 'olongapo_purchase_request_no.pr_no'},
            { data: 'dept_desc', name: 'olongapo_subdepartment.dept_desc' },
            {
            data: null,
              name: 'olongapo_purchase_request_no.pr_date',
              render: function(data, type, row){
                var prno_date = moment(data.pr_date).format("MMM DD, YYYY");
                  return prno_date;
              }
            },
            { data: 'po_no', name: 'olongapo_purchase_order_no.po_no' },
            { data: null, name: 'olongapo_purchase_order_no.po_date',
              render: function(data, type, row){
                var po_date = moment(data.po_date).format("MMM DD, YYYY");
                  return po_date;
              }
            },
            {
              data: null, name: 'olongapo_bac_control_info.amount',
              render : function(data,type,row){
                return accounting.formatMoney(data.amount,'Php ');
              }
             },
             // { data: 'obr_no', name: 'olongapo_obr.obr_no' },
             // { data: 'obr_date', name: 'olongapo_obr.obr_date' },
              { data: null, name: 'olongapo_bac_control_info.id' ,
              render : function(data , type , row){
                      return '<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_purchase_order_modal" onclick="$(this).addPOnumber('+data.pono_id+');" >Update</button>\
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#pdf" onclick="$(this).pdf('+data.pono_id+');" >PDF</button>\
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#excel" onclick="$(this).excel('+data.pono_id+');" >EXCEL</button> ';
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

$.fn.addPOnumber = function(pono_id){
    $.ajax({
            type: "POST",
             url: "{{route('po.get-po')}}",
            data : {
              pono_id : pono_id,
              _token : '{{csrf_token()}}'
            },
            dataType: "json",
            error: function(){
              console.log('error');
            },
            success: function(data){
              console.log(data['info']);

                $('#pr_dept_desc').val(data['info'].dept_desc);
                $('#pr_dept_id').val(data['info'].dept_id);
                $('#prno').val(data['info'].pr_no);
                $('#prno_id').val(data['info'].prno_id);

                $('#pr_no_date').val(data['info'].pr_date);
                $('#bac_no').val(data['info'].bac_control_no);
                $('#bac_date').val(data['info'].bac_date);
                $('#bac_mode').val(data['info'].bac_mode);
                $('#bac_category').val(data['info'].bac_categ);
                $('#obr_no').val(data['info'].obr_no);
                $('#obr_date').val(data['info'].obr_date);
                $('#absctrct_no').val(data['info'].control_no);
                $('#absctrct_date').val(data['info'].abstrct_date);
                $('#supplier_desc').val(data['info'].suppl_title);
                $('#total_amt').val(data['info'].total_amt);


                $('#po_no').val(data['info'].po_no);
                $('#po_date').val(data['info'].po_date);
                $('#po_id').val(data['info'].pono_id);


                var total_amount = 0;
                var count = 1;
                var appvd_id = 0;
                var fintotal = 0;
                var tr = "";
                console.log(data.itemsx);
                 for(var x = 0; x<data.itemsx.length;x++){
                  total_amount = total_amount + parseInt(data.itemsx[x].abs_total_price);
                  tr +=  '   <tr>'+
                            '     <td>'+count+'</td>'+
                            '     <td>'+data.itemsx[x].description+'<input type="hidden" name="po_item_id[]" value="'+data.itemsx[x].po_item_id+'"/></td>'+
                            '     <td><input type="text" value="'+(data.itemsx[x].po_brand != null ? data.itemsx[x].po_brand : '')+'" name="brand[]" class="form-control"/></td>'+
                            '     <td>'+data.itemsx[x].qty+'</td>'+
                            '     <td>'+data.itemsx[x].unit+'</td>'+
                            '     <td>'+data.itemsx[x].po_amount+'</td>'+
                            '     <td>'+data.itemsx[x].po_total+'</td>'+
                            '   </tr>';
                            count++;
                  fintotal += parseFloat(data.itemsx[x].abs_total_price);
                }

                $('#items_list tbody').html(tr);


              $('#add_purchase_request_modal').modal({
                      backdrop: 'static',
                      keyboard: false
              });

            }
     });
  };

$.fn.pdf = function(pono_id){
    $.ajax({
            type: "POST",
             url: "{{route('po.get-po')}}",
            data : {
              pono_id : pono_id,
              _token : '{{csrf_token()}}'
            },
            dataType: "json",
            error: function(){
              console.log('error');
            },
            success: function(data){
              $('#pono_id').val(data['info'].pono_id);
              $('#pdf').modal({
                      backdrop: 'static',
                      keyboard: false
              });
              var input = $('#auth_official').val();
              var btn =  document.getElementById('submit_pdf');
              if(input != ''){
                  btn.removeAttribute("disabled");
              }else{
                  btn.setAttribute("disabled","");
              }

            }
     });
  };

   $.fn.excel = function(pono_id){
        $.ajax({
                type: "POST",
                 url: "{{route('po.get-po')}}",
                data : {
                  pono_id : pono_id,
                  _token : '{{csrf_token()}}'
                },
                dataType: "json",
                error: function(){
                  console.log('error');
                },
                success: function(data){
                    $('#pono_id_excel').val(data['info'].pono_id);
                    var input = document.getElementById('auth_official_excel').value;
                    var btn =  document.getElementById('submit_excel');
                    if(input != ''){
                        btn.removeAttribute("disabled");
                    }else{
                        btn.setAttribute("disabled","");
                    }
                }
         });
      };

  //Date picker
    $('#po_date').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd',
    });

$('#po_date').on('change',function(){
    $.ajax({
            type: "POST",
            url: "{{route('po.check_po_no')}}",
            data : {
            pr_dept_id : $('#pr_dept_id').val(),
            po_date : $('#po_date').val(),
            prno_id : $('#prno_id').val(),
             _token : '{{csrf_token()}}'
          },
            dataType: "html",
            error: function(){
              console.log('error');
            },
            success: function(data){
              if(data!=''){
                  $('#po_no').val(data);
              }
            }
     });
});

  $.fn.sentPurchaseOrder = function(){
      var form = $('#add_purchase_order').serialize();
      $.ajax({
            type: "POST",
            url: "{{route('po.update_po_records')}}",

              data : form,
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
                       location.reload();
                    }

            }
     });
  };

   $.fn.sentPdf = function(){
      var form = $('#auth_official_form').serialize();
     //  $.ajax({
     //        type: "POST",
     //

     //          data : form,
     //        dataType: "json",
     //        success: function(data){
     //           var errors = '';
     //                if(data['status']==0){
     //                   for(var key in data['errors']){
     //                       errors += data['errors'][key]+'<br />';
     //                    }
     //                  $('#statusC').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
     //                }else{
     //                  $('#statusC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
     //                }

     //        }
     // });
     //
     var route = "{{route('po.po_pdf',['change1','change2'])}}";
     route =route.replace("change1", $('#pono_id').val());
     route =route.replace("change2", $('#auth_official').val());
     window.location.href = route;

  };
   $.fn.sentExcel = function(){

        var form = $('#auth_official_form_excel').serialize();

         var route = "{{route('po.po_excel',['change1','change2'])}}";

         route =route.replace("change1", $('#pono_id_excel').val());

         route =route.replace("change2", $('#auth_official_excel').val());

         window.location.href = route;
    
    };

    $("#auth_official_excel").on("change", function(){
        var input = document.getElementById('auth_official_excel').value;
        var btn =  document.getElementById('submit_excel');

        if(input != ''){
            btn.removeAttribute("disabled");
        }else{
            btn.setAttribute("disabled","");
        }
    });

     $("#auth_official").on("change", function(){
        var input = $('#auth_official').val();
        var btn =  document.getElementById('submit_pdf');
        if(input != ''){
            btn.removeAttribute("disabled");
        }else{
            btn.setAttribute("disabled","");
        }
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