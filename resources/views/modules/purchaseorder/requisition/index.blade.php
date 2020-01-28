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
              <h3 class="box-title">PURCHASE ORDER LIST (ADD REQUISITION AND ISSUE SLIP)</h3>
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
                          <th>OBR DATE</th>
                          <th>OBR Control No.</th>
                          <th></th>
                        </tr>

                      </thead>
                      <tbody>

                      </tbody>

                </table>
            </div>
             <div class="box-header">
              <h3 class="box-title">PURCHASE ORDER LIST (ADD REQUISITION AND ISSUE SLIP) PURELY CONSUMPTION</h3>
            </div>
             <div class="box-body">
                 <table id ="purchase_request_list"class="table table-striped table-bordered table-hover">
                      <thead>

                        <tr>
                          <th>No</th>
                          <th>PR Dept</th>
                          <th>PR Date.</th>
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

<div class="modal fade" id="add_requisition_modal" tabindex="-1" role="dialog" aria-labelledby="add_purchase_order_modalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_purchase_order_modalLabel"> <span>Add Requisition and Issue Slip</span></h4>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <div id="contents-menu">
            <form class="form-horizontal" id="add_requisition_number">
              <div class="box-body">
                <div id="statusC"></div>

                <div class="form-group">
                  <label for="obr_date" class="col-sm-2 control-label">RIS No : </label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="ris_no" name="ris_no" placeholder="RIS NUMBER" >
                  </div>
                   <label for="pr_no" class="col-sm-2 control-label">Date : </label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" id="ris_date" name="ris_date" placeholder="DATE" />
                        <input type="hidden"  id="po_id" name="po_id" />


                    </div>
                </div>

                <div class="form-group">
                  <label for="obr_date" class="col-sm-2 control-label">PO Date : </label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="po_date"  name="po_date" placeholder="PO Date" readonly="">
                  </div>
                   <label for="pr_no" class="col-sm-2 control-label">PO No. : </label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" id="po_no"  readonly="" name="po_no" placeholder="PO No." />
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
                     <label for="pr_no" class="col-sm-2 control-label">Suplier : </label>
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
                <button type="button" class="btn btn-info pull-right" onclick="$(this).sentRequisitionNo(0);">Submit</button>
              </div>
              <!-- /.box-footer -->

              {{csrf_field()}}
            </form>

        </div>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="add_requisition_pc_modal" tabindex="-1" role="dialog" aria-labelledby="add_purchase_order_modalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_purchase_order_modalLabel"> <span>Add Requisition and Issue Slip</span></h4>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <div id="contents-menu">
            <form class="form-horizontal" id="add_requisition_number_pc">
              <div class="box-body">
                <div id="statusC"></div>
                {{csrf_field()}}
                <div class="form-group">
                  <label for="obr_date" class="col-sm-2 control-label">RIS No : </label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="ris_no2"  name="ris_no" placeholder="RIS NUMBER" >
                         <input type="hidden"  id="pr_dept_id2"   name="pr_dept_id"  />
                      </div>
                   <label for="pr_no" class="col-sm-2 control-label">Date : </label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" id="ris_date2" name="ris_date" placeholder="DATE" />
                        <input type="hidden"  id="po_id1" name="po_id" />
                        <input type="hidden"  id="po_date1" name="po_date" />


                    </div>
                </div>

                </div>
                <table class="table table-striped" id="items_list">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Description</th>
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
                <button type="button" class="btn btn-info pull-right" onclick="$(this).sentRequisitionNo(1);">Submit</button>
              </div>
              <!-- /.box-footer -->

              {{csrf_field()}}
            </form>

        </div>
      </div>

    </div>
  </div>



  <div class="modal fade" id="add_requisition" tabindex="-1" role="dialog" aria-labelledby="add_purchase_order_modalLabel">
  <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="add_purchase_order_modalLabel"> <span>Requisition and Issue Slip
              </span></h4>
            </div>
            <div class="modal-body">
              <div id="status"></div>
                <div id="contents-menu">
                    <form class="form-horizontal" id="set_prop" method="post" action="{{route('po.po_requisition_pc_pdf')}}">
                      <div class="box-body">
                        <div id="statusC"></div>
                          <!-- DATE RECEIVED -->
                         <input type="hidden" class="form-control" id="prid" name="prid"/>
                         <input type="hidden" name="requisition_id" id="requisition_id" />
                            
                            <div class="form-group">
                              <label for="pr_no" class="col-sm-2 control-label">Requested By: </label>
                              <div class="col-sm-4" id="req2">
                                 <input type="text" class="form-control" id="name_req" name="name_req" placeholder="Name" />
                                 <input type="text" class="form-control" id="designation_req" name="designation_req"   placeholder="Designation" />
                              </div>
                            </div>


                            <div class="form-group">
                               <label for="pr_no" class="col-sm-2 control-label">Approved By: </label>
                                  <div class="col-sm-4">
                                   <input type="text" class="form-control" id="name_app1" name="name_app1"   placeholder="Name" />
                                   <input type="text" class="form-control" id="designation_app1" name="designation_app1"   placeholder="Position" />
                                  </div>

                                  <div class="col-sm-1">
                                     <p>/</p>
                                     <p>/</p>
                                  </div>  

                                  <div class="col-sm-4">
                                     <input type="text" class="form-control" id="name_app2" name="name_app2"   placeholder="Name" />
                                     <input type="text" class="form-control" id="designation_app2" name="designation_app2"   placeholder="Position" />
                                  </div>
                              </div>


                            <div class="form-group">
                              <label for="pr_no" class="col-sm-2 control-label">Issued By: </label>
                                <div class="col-sm-4" id="avail2">
                                 <input type="text" class="form-control" id="issued_by" name="issued_by"   placeholder="Name" />
                                 <input type="text" class="form-control" id="issued_by_des" name="issued_by_des"   placeholder="Position" />
                                </div>
                            </div>


                            <div class="form-group">
                              <label for="pr_no" class="col-sm-2 control-label">Received By: </label>
                                <div class="col-sm-4" id="avail2">
                                 <input type="text" class="form-control" id="received_by" name="received_by"   placeholder="Name" />
                                 <input type="text" class="form-control" id="received_by_des" name="received_by_des"   placeholder="Position" />
                                </div>
                            </div>


                              <div class="col-sm-12">
                                <button type="submit" class="btn btn-info pull-right">Submit</button>
                              </div>
                      <!-- /.box-footer -->

                      {{csrf_field()}}
                    </form>

                </div>
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
        serverSide: true,
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
                var prno_date = moment(data.pr_date).format("YY-MM-DD");
                  return prno_date;
              }
            },
            { data: 'po_no', name: 'olongapo_purchase_order_no.po_no' },
            { data: null, name: 'olongapo_purchase_order_no.po_date',
              render: function(data, type, row){
                var po_date = moment(data.po_date).format("YY-MM-DD");
                  return po_date;
              }
            },
            {
              data: null, name: 'olongapo_bac_control_info.amount',
              render : function(data,type,row){
                return accounting.formatMoney(data.amount,'Php ');
              }
             },
             { data: 'obr_no', name: 'olongapo_obr.obr_no' },
             { data: 'obr_date', name: 'olongapo_obr.obr_date' },
              { data: null, name: 'olongapo_bac_control_info.id' ,
              render : function(data , type , row){
                  if(data.requisition_id){
                    return '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_requisition" onclick="$(this).updateRequisition('+data.pono_id+');" >Update RIS</button>\
                       <form method="post" action="{{route('po.po_requisition_pdf')}}">{{csrf_field()}}<input type="hidden" name="requisition_id" value="'+data.requisition_id+'" /><input type="submit" class="btn btn-sm btn-default" name="pdf" value="PDF" /> </form> ';
                  }else{
                     return '<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#add_requisition" onclick="$(this).addRequisition('+data.pono_id+');" >Add RIS</button>\ ';
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

$(function() {
       $('#purchase_request_list').dataTable({
        processing: true,
        serverSide: true,
        ajax:{
          "type": 'POST',
          "url" : '{!! route('bac.set_datatables') !!}',
          data : {
                   dataTables : 'bac_list_po_pc',
                  "_token" : '{{csrf_token()}}'
          }
        },
        columns: [
            { data: 'item_id' , name: 'olongapo_purchase_request_items.id' ,
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { data: 'dept_desc', name: 'olongapo_subdepartment.dept_desc' },
            {
            data: null,
              name: 'olongapo_purchase_request_no.pr_date',
              render: function(data, type, row){
                var prno_date = moment(data.pr_date).format("YY-MM-DD");
                  return prno_date;
              }
            },
              { data: null, name: 'olongapo_bac_control_info.id' ,
              render : function(data , type , row){
                      if(data.requisition_id){
                        return '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_requisition_pc_modal" onclick="$(this).updateRequisition_pc('+data.prno_id+');" >Update RIS</button>\
                        <button type="button" class="btn  btn-sm" data-toggle="modal" data-target="#add_requisition" onclick="$(this).setReq(\''+data.requested_by+'\',\''+data.designated_req+'\',\''+data.name_app+'\',\''+data.designation_app+'\',\''+data.requisition_id+'\',\''+data.issued_by+'\',\''+data.issued_des+'\',\''+data.received_by+'\',\''+data.received_des+'\');" >PDF</button>';
                      }else{
                         return '<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#add_requisition_pc_modal" onclick="$(this).addRequisition_pc('+data.prno_id+');">Add RIS</button>\ ';
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

$.fn.setReq = function(requested_by,designated_req,name_app,designation_app,req_id,issued,issued_des,receive,receive_des){

  console.log(designated_req);


    var vars = name_app;
    var arrVars = vars.split("/");
    var lastVar = arrVars.pop();
    var restVar = arrVars.join("/");

    var vars2 = designation_app;
    var arrVars2 = vars2.split("/");
    var lastVar2 = arrVars2.pop();
    var restVar2 = arrVars2.join("/");
    $('#name_app1').val(restVar);
    $('#designation_app1').val(restVar2);
    $('#name_app2').val(lastVar);
    $('#designation_app2').val(lastVar2);

    $('#requisition_id').val(req_id);


    if(requested_by == 'null')
    {
        $('#name_req').val('-');
    }else{
        $('#name_req').val(requested_by);
    }

    if(designated_req == 'null')
    {
        $('#designation_req').val('-');
    }else{
        $('#designation_req').val(designated_req);
    }

    if(issued == 'null')
    {
        $('#issued_by').val('-');
    }else{
        $('#issued_by').val(issued);
    }

    if(issued_des == 'null')
    {
        $('#issued_by_des').val('-');
    }else{
        $('#issued_by_des').val(issued_des);
    }


    if(receive == 'null')
    {
        $('#received_by').val('-');
    }else{
        $('#received_by').val(receive);
    }


    if(receive_des == 'null')
    {
        $('#received_by_des').val('-');
    }else{
        $('#received_by_des').val(receive_des);
    }
  };




$.fn.addRequisition = function(pono_id){
   $("#add_requisition_number")[0].reset();
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
                            '     <td style="font-size:10px;">'+data.itemsx[x].description+'<input type="hidden" name="po_item_id[]" value="'+data.itemsx[x].po_item_id+'"/></td>'+
                            '     <td>'+data.itemsx[x].qty+'</td>'+
                            '     <td>'+data.itemsx[x].unit+'</td>'+
                            '     <td>'+data.itemsx[x].po_amount+'</td>'+
                            '     <td>'+data.itemsx[x].po_total+'</td>'+
                            '   </tr>';
                            count++;
                  fintotal += parseFloat(data.itemsx[x].abs_total_price);
                }

                $('#items_list tbody').html(tr);


              $('#add_requisition_modal').modal({
                      backdrop: 'static',
                      keyboard: false
              });

            }
     });

  };

  $.fn.updateRequisition = function(pono_id){
     $("#add_requisition_number")[0].reset();
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
                            '     <td style="font-size:10px;">'+data.itemsx[x].description+'<input type="hidden" name="po_item_id[]" value="'+data.itemsx[x].po_item_id+'"/></td>'+
                            '     <td>'+data.itemsx[x].qty+'</td>'+
                            '     <td>'+data.itemsx[x].unit+'</td>'+
                            '     <td>'+data.itemsx[x].po_amount+'</td>'+
                            '     <td>'+data.itemsx[x].po_total+'</td>'+
                            '   </tr>';
                            count++;
                  fintotal += parseFloat(data.itemsx[x].abs_total_price);
                }

                $('#ris_no').val(data['info'].ris_no);
                $('#ris_date').val(data['info'].ris_date);
                $('#requisition_id').val(data['info'].requisition_id);

                $('#items_list tbody').html(tr);


              $('#add_requisition_modal').modal({
                      backdrop: 'static',
                      keyboard: false
              });

            }
     });
  };

$.fn.addRequisition_pc = function(prno_id){
   $("#add_requisition_number_pc")[0].reset();
    $.ajax({
            type: "POST",
             url: "{{route('po.get-pc')}}",
            data : {
              pono_id : prno_id,
              _token : '{{csrf_token()}}'
            },
            dataType: "json",
            error: function(){
              console.log('error');
            },
            success: function(data){

                $('#pr_dept_desc1').val(data['info'].dept_desc);
                $('#pr_dept_id2').val(data['info'].dept_id);
                $('#prno_id1').val(data['info'].prno_id);
                $('#po_id1').val(data['info'].prno_id);
                $('#po_date1').val(data['info'].pr_date);

                var total_amount = 0;
                var count = 1;
                var appvd_id = 0;
                var fintotal = 0;
                var tr = "";
                 for(var x = 0; x<data.itemsx.length;x++){
                  total_amount = total_amount + parseInt(data.itemsx[x].total_price);
                  tr +=  '   <tr>'+
                            '     <td>'+count+'</td>'+
                            '     <td style="font-size:10px;">'+data.itemsx[x].description+'<input type="hidden" name="po_item_id[]" value="'+data.itemsx[x].po_item_id+'"/></td>'+
                            '     <td>'+data.itemsx[x].qty+'</td>'+
                            '     <td>'+data.itemsx[x].unit+'</td>'+
                            '     <td>'+data.itemsx[x].unit_price+'</td>'+
                            '     <td>'+data.itemsx[x].total_price+'</td>'+
                            '   </tr>';
                            count++;
                  fintotal += parseFloat(data.itemsx[x].total_price);
                }

                $('#items_list tbody').html(tr);

              $('#add_requisition_pc_modal').modal({
                      backdrop: 'static',
                      keyboard: false
              });

            }
     });

  };

  $.fn.updateRequisition_pc = function(prno_id){
     $("#add_requisition_number_pc")[0].reset();
    $.ajax({
            type: "POST",
             url: "{{route('po.get-pc')}}",
            data : {
              pono_id : prno_id,
              _token : '{{csrf_token()}}'
            },
            dataType: "json",
            error: function(){
              console.log('error');
            },
            success: function(data){

                $('#pr_dept_desc1').val(data['info'].dept_desc);
                $('#pr_dept_id2').val(data['info'].dept_id);
                $('#prno_id1').val(data['info'].prno_id);
                $('#po_id1').val(data['info'].prno_id);
                $('#po_date1').val(data['info'].pr_date);

                $('#ris_no2').val(data['record'].ris_no);
                $('#ris_date2').val(data['record'].ris_date);
                $('#requisition_id1').val(data['record'].id);
                console.log(data['info']);
                var total_amount = 0;
                var count = 1;
                var appvd_id = 0;
                var fintotal = 0;
                var tr = "";
                console.log(data.itemsx);
                 for(var x = 0; x<data.itemsx.length;x++){
                  total_amount = total_amount + parseInt(data.itemsx[x].total_price);
                  tr +=  '   <tr>'+
                            '     <td>'+count+'</td>'+
                            '     <td style="font-size:10px;">'+data.itemsx[x].description+'<input type="hidden" name="po_item_id[]" value="'+data.itemsx[x].po_item_id+'"/></td>'+
                            '     <td>'+data.itemsx[x].qty+'</td>'+
                            '     <td>'+data.itemsx[x].unit+'</td>'+
                            '     <td>'+data.itemsx[x].unit_price+'</td>'+
                            '     <td>'+data.itemsx[x].total_price+'</td>'+
                            '   </tr>';
                            count++;
                  fintotal += parseFloat(data.itemsx[x].total_price);
                }

                $('#items_list tbody').html(tr);

              $('#add_requisition_pc_modal').modal({
                      backdrop: 'static',
                      keyboard: false
              });

            }
     });
  };

  //Date picker
    $('#ris_date').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd',
    });
    $('#ris_date2').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd',
    });

$('#ris_date').on('change',function(){
    $.ajax({
            type: "POST",
            url: "{{route('po.check_ris_no')}}",
            data : {
            pr_dept_id : $('#pr_dept_id').val(),
            po_date : $('#ris_date').val(),
            prno_id : $('#prno_id').val(),
             _token : '{{csrf_token()}}'
          },
            dataType: "html",
            error: function(){
              console.log('error');
            },
            success: function(data){
              if(data!=''){
                  $('#ris_no').val(data);
              }
            }
     });
});

$('#ris_date2').on('change',function(){
    $.ajax({
            type: "POST",
            url: "{{route('po.check_ris_no')}}",
            data : {
            pr_dept_id : $('#pr_dept_id2').val(),
            po_date : $('#ris_date2').val(),
            prno_id : $('#prno_id1').val(),
             _token : '{{csrf_token()}}'
          },
            dataType: "html",
            error: function(){
              console.log('error');
            },
            success: function(data){
              if(data!=''){
                  $('#ris_no2').val(data);
              }
            }
     });
});

  $.fn.sentRequisitionNo = function(isCnsmp){
    console.log(isCnsmp);
    if(isCnsmp == 1){
      var form = $('#add_requisition_number_pc').serialize();
    }else{
      var form = $('#add_requisition_number').serialize();
    }
    console.log(form);
      $.ajax({
            type: "POST",
            url: "{{route('po.add_requisition')}}",

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