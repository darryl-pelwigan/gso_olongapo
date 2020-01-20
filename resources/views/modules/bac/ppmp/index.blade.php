@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         BIDS AND AWARDS COMMITTEE
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                  <h4>Project Procurement Management Plan (PPMP)</h4>
                  <h4>For the Year {{date('Y')}}</h4>
                  <button class="btn btn-success pull-right" onclick="$(this).addPPMP();" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i></button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover" id="tbl_ppmp">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Department</th>
                      <th>Upload</th>
                      <th>File</th>
                    </tr>
                  </thead>

                </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<div class="modal fade" id="addPPMP_modal" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="item_group_header"></h4>
        </div>
        <div class="modal-body">
          <div id="status"></div>
          <div id="contents-menu">
            <form class="form-horizontal" method="POST" id="itemGroupForm">
            {{csrf_field()}}
              <div class="form-group">
                <label for="employee_name" class="col-sm-3 control-label">Group : </label>
                <div class="col-sm-8">
                      <input type="text" name="group[]" id="group" class="form-control" />
                      <input type="hidden" name="group_id[]" id="group_id" class="form-control" />
                </div>
                <div class="col-md-1">
                    <button class="btn btn-success btn-xs" type="button" onclick="$(this).moreItemGroup();" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i></button>
                </div>
              </div>
              <div class="more_group">
                
              </div>
              <div class="box-footer">
                  <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                  <button type="button" class="btn btn-info pull-right" id="submit_bac_committee" onclick="$(this).submitItemGroup();">Submit</button>
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
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>

@include('bac::ppmp.js.index-js')

@stop
@section('plugins-css')
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
</style>
@stop