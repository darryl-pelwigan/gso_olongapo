@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Purchase Purchase List
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <table id="purchase_order_list" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>PR NO</th>
                          <th>PR Date</th>
                          <th>PR Dept</th>
                          <th>PR Sub-Dept</th>
                          <th>Abstract Control No.</th>
                          <th>Abstarct Date</th>
                          <th>Supplier</th>
                          <th>Status</th>
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

  <!-- Modal -->

<div class="modal fade" id="add_purchase_order_modal" tabindex="-1" role="dialog" aria-labelledby="add_purchase_order_modalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_purchase_order_modalLabel"> BAC CONTROL INFO<span></span></h4>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <div id="contents-menu">
            <form class="form-horizontal" id="process_pr">
              <div class="box-body">
                  <div id="statusC"></div>
                  <div class="form-group">
                    <label for="bac_control_no" class="col-sm-2 control-label">CONTROL NO : </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="bac_control_no" name="bac_control_no" placeholder="CONTROL NO">
                    </div>

                    <label for="bac_date" class="col-sm-2 control-label"> BAC DATE: </label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="bac_date"  name="bac_date" placeholder="BAC DATE">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="sof_desc" class="col-sm-2 control-label">SOF : </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="sof_desc"  placeholder="Source of FUND" />
                        <input type="hidden" class="form-control" id="sof_id"  name="sof_id" />
                      </div>
                  </div>

                  <div class="form-group">
                     <label for="sof_desc" class="col-sm-2 control-label">BAC RESOLUTION TYPE : </label>
                      <div class="col-sm-4">
                          <select class="form-control" name="bac_reso_type" id="bac_reso_type">
                            <option value=""></option>
                            @foreach($procurement as $procu)
                              <option value="{{$procu->id}}">{{$procu->proc_title}}</option>
                            @endforeach
                          </select>
                    </div>
                    <label for="bac_categ" class="col-sm-2 control-label">BAC Category : </label>
                      <div class="col-sm-4">
                       <input type="text" class="form-control" id="bac_categ"  placeholder="BAC Category" />
                       <input type="hidden" class="form-control" id="bac_categ_id"  name="bac_categ_id" />
                    </div>
                </div>


                <div class="form-group">
                     <label for="pr_dept_desc" class="col-sm-2 control-label">DEPT : </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="pr_dept_desc"  disabled="disabled"  placeholder="Dept" />
                        <input type="hidden" class="form-control" id="pr_dept_id"  disabled="disabled" name="pr_dept_id" />
                    </div>
                </div>



                <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">PR NO. : </label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="pr_no"  disabled="disabled"  placeholder="PR NO." />
                    </div>
                     <label for="pr_no_date" class="col-sm-2 control-label">PR DATE. : </label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" id="pr_no_date"  disabled="disabled" name="pr_no_date" placeholder="PR NO DATE" />
                    </div>
                </div>
                <table class="table table-striped" id="items_list" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Description</th>
                      <th>Qty</th>
                      <th>Unit</th>
                      <th>Unit price</th>
                      <th>Total price</th>
                    </tr>
                  </thead>

                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="4">Total</td>
                      <td><div class="form-group col-md-12"><textarea name="bac_remarks" id="bac_remarks" class="form-control" placeholder="Remarks" style="width: 100%;max-width: 200px;"></textarea></div></td>
                      <td><input type="text" name="total_amount" id="total_amount" class="form-control"  /></td>
                    </tr>
                  </tfoot>
                </table>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="button" class="btn btn-info pull-right" onclick="$(this).sentBACProcesses();">Submit</button>
              </div>
              <!-- /.box-footer -->
              <input type="hidden"  id="prno_id" name="prno_id" />
              <input type="hidden" id="pr_dept_code" />
              <input type="hidden" id="approved_id" name="supplier_approved_id" />
              <input type="hidden" id="bac_control_id" name="bac_control_id" />

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
<script src="{{asset('adminlte/plugins/daterangepicker/')}}/moment.min.js"></script>
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
{{-- <script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script> --}}
<script src="{{asset('js')}}/bootstrap-datepicker.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/accounting/accounting.min.js"></script>
<script type="text/javascript">

$('#sof_desc').autocomplete({
    serviceUrl: '{{route("bac.a_get_sof")}}',
    dataType: 'json',
    type: 'POST',
    minChars:0,
    params : {
              _token : '{{csrf_token()}}'
    },
    onSelect: function (suggestion) {
      $('#sof_id').val(suggestion.data);
    }
}).focus(function() {
    $(this).autocomplete('search', $(this).val());
});

$('#bac_categ').autocomplete({
    serviceUrl: '{{route("bac.a_get_categ")}}',
    dataType: 'json',
    type: 'POST',
    minChars:0,
    params : {
              _token : '{{csrf_token()}}'
    },
    onSelect: function (suggestion) {
      $('#bac_categ_id').val(suggestion.data);
    }
}).focus(function() {
    $(this).autocomplete('search', $(this).val());
});

$.fn.sentBACProcesses = function(){
  $.ajax({
    type: "POST",
    url: "{{route('bac.process_pr')}}",
    data : $('#process_pr').serialize(),
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
        $('#statusC').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(10000).fadeOut();
    }else{
        $('#statusC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i>  Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
        $('#purchase_order_list').DataTable().ajax.reload();
    }
    }
  });
};




$(function() {
       $('#purchase_order_list').dataTable({
        processing: true,
        serverSide: true,
        ajax:{
          "type": 'POST',
          "url" : '{!! route('bac.set_datatables') !!}',
          data : {
                  "dataTables" : 'bac_pr_list',
                  "_token" : '{{csrf_token()}}'
          }
        },
        columns: [
            { data: 'abstrct_id' , name: 'olongapo_absctrct.id' ,
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { data: 'pr_no', name: 'olongapo_purchase_request_no.pr_no'},
           {
              data: null,
              name: 'olongapo_purchase_request_no.pr_date',
              render: function(data, type, row){
                var prno_date = moment(data.prno_date).format("YY-MM-DD");
                  return prno_date;
              }
            },
            { data: 'dept_desc', name: 'olongapo_department.dept_desc' },
            { data: 'subdept_desc' },
             { data: 'control_no', name: 'olongapo_absctrct.control_no'},
           {
              data: null,
              name: 'olongapo_absctrct.abstrct_date',
              render: function(data, type, row){
                var abs_date = moment(data.abstrct_date).format("YY-MM-DD");
                  return abs_date;
              }
            },
           { data: 'title'},
             { data: null ,
              render : function(data , type , row){
                    return (data.apprved_pubbid_id != null ? '<span class="text-success"><i class="fa fa-check"> Processed</i></span>' : '<span class="text-warning"><i class="fa fa-spinner"> Pending</i></span>');
                }
              },
             { data: null, name: 'olongapo_purchase_order_no.po_date' ,
              render : function(data , type , row){
                    var btn = "";
                    if(data.apprved_pubbid_id != null){
                      btn = '<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_purchase_order_modal" onclick="$(this).addPOnumber('+data.apprved_pubbid_id+');" ><i class="fa fa-pencil"></i> Update</button>\
                      <button type="button" class="btn btn-danger btn-sm" onclick="$(this).deleteBacPONumber('+data.control_id+');" ><i class="fa fa-trash"></i> Delete</button>';
                    }else{
                       btn = '<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_purchase_order_modal" onclick="$(this).addPOnumber('+data.apprved_pubbid_id+');" ><i class="fa fa-plus"></i> Process</button>';
                    }
                    return btn;
                }
              },
        ],
        columnDefs: [
          {
              orderable: false, targets: [0,-1, -2]
           }
        ],
        "order": [[ 0, 'asc' ]],

    });


  });
<?php
  $dates = array();
  foreach($holiday as $d){
      array_push($dates, date('Y').'-'.$d->holiday);
  }
  $h = json_encode($dates);
?>

//Date picker
    $('#bac_date').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd',
       datesDisabled: <?=$h?>,
       daysOfWeekDisabled: [0,6]
    }).on('change',function(){
        $.fn.setControllNumber();
    });

function editDays(date) {
    var disabledDates = ['2017-10-20', '2017-10-21'];
        for (var i = 0; i < disabledDates.length; i++) {
            if (new Date(disabledDates[i]).toString() == date.toString()) {
                 return [false, "akljsdfl;jkaf"];
            }
        }
        return [true];
  }

    $.fn.setControllNumber = function(){
      var bac_date = $('#bac_date').val();
      var bac_datex = bac_date.split('-');
          $.ajax({
            type: "POST",
             url: "{{route('bac.set-bac-control-no')}}",
            data : {
              bac_date : bac_date,
              pr_dept_code : $('#pr_dept_code').val(),
              _token : '{{csrf_token()}}'
            },
            dataType: "json",
            error: function(){
              console.log('error');
            },
            success: function(data){
              $('#bac_control_no').val(data);
            }
        });

    };


  $.fn.addPOnumber = function(abstrct_id){
    $('#process_pr')[0].reset();
    $.ajax({
            type: "POST",
             url: "{{route('bac.get-pr-supplier')}}",
            data : {
              abstrct_id : abstrct_id,
              _token : '{{csrf_token()}}'
            },
            dataType: "json",
            error: function(){
              console.log('error');
            },
            success: function(data){
                console.log(data);

              if(data.info != null){
                $('#pr_no').val(data.info.pr_no);
                $('#pr_dept_desc').val(data.info.dept_desc);
                $('#pr_no_date').val(data.info.prno_date);
                 var tr = '';
                var total_amount = 0;
                var count = 1;
                var appvd_id = 0;
                var fintotal = 0;
                for(var x = 0; x<data.itemsx.length;x++){
                  total_amount = total_amount + parseInt(data.itemsx[x].abs_total_price);
                  tr +=  '   <tr>'+
                            '     <td>'+count+'</td>'+
                            '     <td>'+data.itemsx[x].description+'</td>'+
                            '     <td>'+data.itemsx[x].qty+'</td>'+
                            '     <td>'+data.itemsx[x].unit+'</td>'+
                            '     <td>'+data.itemsx[x].abs_price+'</td>'+
                            '     <td>'+data.itemsx[x].abs_total_price+'</td>'+
                            '   </tr>';
                            count++;
                  appvd_id = 0;
                  fintotal += parseFloat(data.itemsx[x].abs_total_price);
                }
                $('#pr_dept_code').val(data.info.dept_code)
                $('#total_amount').val(accounting.formatMoney(total_amount,"Php "));
                $('#items_list tbody').html(tr);
                $('#prno_id').val(data.info.prno_id);
                $('#approved_id').val(data.info.apprved_pubbid_id);
                $('#pr_dept_id').val(data.info.prno_dept);
                $('#pr_no_date').val(data.info.pr_date);
                $('#bac_control_id').val(data.info.control_id);
                $('#bac_control_no').val(data.info.bac_control_no);
                $('#bac_date').val(data.info.bac_date);
                $('#sof_desc').val(data.info.sourcefund);
                $('#sof_id').val(data.info.sourcefund_id);
                $('#bac_categ').val(data.info.bac_categ);
                $('#bac_categ_id').val(data.info.category_id);
                var bac_type = (data.info.bac_type_id > 0 ? data.info.bac_type_id : data.info.proc_type);
                $('#bac_reso_type option[value="'+bac_type+'"]').prop('selected', 'selected');
                $('#bac_remarks').val(data.info.remarks);
                var finalamount = (data.info.total_amt > 0 ? data.info.total_amt : fintotal.toFixed(2));
                $('#total_amount').val(finalamount);
              }
            else{
              alert("No items found. Please add abstract first");
              location.reload();
            }
          }
     });
  };

  $.fn.deleteBacPONumber = function(control_id){
    var x = confirm("Are you sure to delete this record?");
    if(x){
        $.ajax({
            type: "POST",
             url: "{{route('bac.delete-control-info')}}",
            data : {
              control_id : control_id,
              _token : '{{csrf_token()}}'
            },
            dataType: "json",
            error: function(){
              console.log('error');
            },
            success: function(data){
              $('#purchase_order_list').DataTable().ajax.reload();
            }
        });
    }
  }


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
.datepicker table tr td.disabled, .datepicker table tr td.disabled:hover {
    background: none;
    color: #e41010;
    cursor: default;
}
  </style>

@stop