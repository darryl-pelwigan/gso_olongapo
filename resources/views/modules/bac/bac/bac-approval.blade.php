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
              <h3 class="box-title">BAC LIST</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <table id="items_list" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>CONTROL No</th>
                          <th>PR No</th>
                          <th>DEPARTMENT</th>
                          <th>AMOUNT</th>
                          <th>SoF</th>
                          <th>CATEGORY</th>
                          <th>Supplier</th>
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

<div class="modal fade" id="view_bac_modal" tabindex="-1" role="dialog" aria-labelledby="view_bac_modalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="view_bac_modalLabel"> <span></span></h4>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <div id="contents-menu">
         <div class="box-body">
            <form class="form-horizontal" method="POST" id="view_bac" action="{{route('bac.view_bac_cn')}}" target="_blank">

              <div class="form-group">
                  <label for="obr_date" class="col-sm-3 control-label">Template : </label>
                  <div class="col-sm-9">
                      <select class="form-control" name="bac_template" >
                        @for($x = 0; $x < count($templatex); $x++ )
                              <option value="{{$templatex[$x]->id}}">{{ ( $templatex[$x]->template_desc.' - '.$templatex[$x]->code )}}</option>
                        @endfor
                      </select>
                  </div>
                </div>



                <div class="form-group">
                  <label for="bac_template_paper_size" class="col-sm-3 control-label">PAPER SIZE : </label>
                  <div class="col-sm-9">
                      <select class="form-control" name="bac_template_paper_size" >
                       <option value="A4">A4</option>
                       <option value="letter">letter</option>
                       <option value="legal">legal</option>
                       <option value="A3">A3</option>
                       <option value="8.5x13">8.5x13</option>
                       <option value="8.5x11">8.5x11</option>
                       <option value="11x17">11x17</option>
                      </select>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="bac_template_orientation" class="col-sm-3 control-label">Orientation : </label>
                  <div class="col-sm-9">
                      <select class="form-control" name="bac_template_orientation" >
                       <option value="portrait">portrait</option>
                       <option value="landscape">landscape</option>
                      </select>
                  </div>
                </div>



 <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right" id="submit_empl" >Submit</button>
              </div>

              </div>
              <!-- /.box-footer -->
              {{csrf_field()}}
              <input type="hidden" name="control_id" id="control_id"/>
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
       $('#items_list').dataTable({
        processing: true,
        serverSide: true,
        ajax:{
          "type": 'POST',
          "url" : '{!! route('bac.set_datatables') !!}',
          data : {
                   dataTables : 'bac_list',
                  "_token" : '{{csrf_token()}}'
          }
        },
        columns: [
            { data: 'item_id' , name: 'olongapo_bac_control_info.id' ,
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { data: 'bac_cono', name: 'olongapo_bac_control_info.bac_control_no'},
            { data: 'pr_no', name: 'olongapo_purchase_request_no.pr_no' },
            { data: 'dept_desc', name: 'olongapo_subdepartment.dept_desc' },
            { data: null, name: 'olongapo_bac_control_info.amount',
              render : function(data,type,row){
                return accounting.formatMoney(data.amount,'Php ');
              }
            },
            { data: 'sof_desc', name: 'olongapo_bac_source_fund.description' },
            { data: 'categ_desc', name: 'olongapo_bac_category.description' },
            { data: 'sup_title', name: 'supplier_info.title' },

            { data: null, name: 'olongapo_bac_control_info.id' ,
              render : function(data , type , row){
                    return ' <button type="submit" class="btn btn-success btn-sm" onclick="$(this).setTemplate('+data.bac_id+');" >view</button>';
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

$.fn.setTemplate = function(bac_id){
  $('#control_id').val(bac_id);
  $('#view_bac_modal').modal({
      backdrop: 'static',
      keyboard: false
  });
};


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


  </style>


@stop