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
                  <h4>Item Lists</h4>
                  <button class="btn btn-success pull-right" onclick="$(this).addItem();" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i></button>
              </div>
              <div class="box-body">
                  <table class="table table-bordered table-hover" id="tbl_item">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Item</th>
                        <th>Unit</th>
                        <th>Category</th>
                        <th>Group</th>
                        <th></th>
                      </tr>
                    </thead>
                  </table>
              </div>
          </div>

          <div class="box">
              <div class="box-header">
                  <h4>Item Category</h4>
                  <button class="btn btn-success pull-right" onclick="$(this).addItemCategory();" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i></button>
              </div>
              <div class="box-body">
                   <table class="table table-bordered table-hover" id="tbl_item_category">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Code</th>
                        <th>Category</th>
                        <th>Group</th>
                        <th></th>
                      </tr>
                    </thead>
                  </table>
              </div>
          </div>

          <div class="box">
              <div class="box-header">
                  <h4>Item Groups</h4>
                  <button class="btn btn-success pull-right" onclick="$(this).addItemGroup();" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i></button>
              </div>
              <div class="box-body">
                   <table class="table table-bordered table-hover" id="tbl_item_group">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Group</th>
                        <th></th>
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


<div class="modal fade" id="addItemGroup_modal" tabindex="-1" role="dialog" aria-labelledby="">
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

<div class="modal fade" id="addItemCategory_modal" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="item_category_header"></h4>
        </div>
        <div class="modal-body">
            <div id="status_category">
              
            </div>
            <form class="form-horizontal" method="POST" id="itemCategoryForm">
              <div id="contents-menu"> 
                {{csrf_field()}}
                  <div class="form-group">
                    <label for="employee_name" class="col-sm-3 control-label">Code: </label>
                    <div class="col-sm-8">
                        <input type="text" name="code" id="code" class="form-control" />
                    </div>
                  </div> 
                  <div class="form-group">
                    <label for="employee_name" class="col-sm-3 control-label">Category: </label>
                    <div class="col-sm-8">
                        <input type="text" name="category" id="category" class="form-control" />
                        <input type="hidden" name="category_id" id="category_id" class="form-control" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="employee_name" class="col-sm-3 control-label">Group: </label>
                    <div class="col-sm-8">
                        <select name="group_id" id="group_id" class="form-control">
                          <option value=""></option>
                          @foreach($group as $g)
                            <option value="{{$g->id}}">{{$g->group}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>              
              </div>
              <div class="box-footer">  
                  <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                  <button type="button" class="btn btn-info pull-right" id="submit_bac_committee" onclick="$(this).submitItemCategory();">Submit</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addItem_modal" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="item_header"></h4>
        </div>
        <div class="modal-body">
            <div id="status_item">
              
            </div>
            <form class="form-horizontal" method="POST" id="additemForm">
              <div id="contents-menu"> 
                {{csrf_field()}}
                  <div class="form-group">
                    <label for="employee_name" class="col-sm-3 control-label">Item: </label>
                    <div class="col-sm-8">
                        <input type="text" name="item" id="item" class="form-control" />
                        <input type="hidden" name="item_id" id="item_id" class="form-control" />
                    </div>
                  </div> 
                  <div class="form-group">
                    <label for="employee_name" class="col-sm-3 control-label">Unit: </label>
                    <div class="col-sm-8">
                        <input type="text" name="unit" id="unit" class="form-control" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="employee_name" class="col-sm-3 control-label">Category: </label>
                    <div class="col-sm-8">
                        <select name="category_id" id="category_id" class="form-control">
                          <option value=""></option>
                          @foreach($category as $c)
                            <option value="{{$c->id}}">{{$c->category}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>                 
              </div>
              <div class="box-footer">  
                  <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                  <button type="button" class="btn btn-info pull-right" id="submit_bac_committee" onclick="$(this).submitItem();">Submit</button>
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

@include('bac::items.js.index-js')

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