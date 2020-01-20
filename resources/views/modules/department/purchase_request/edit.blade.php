
@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         PURCHASE REQUEST
      </h1>

       @include('template::admin-layouts.includes.message')
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Purchase Request </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form class="form-horizontal" method="POST" action="{{ route('dept.pr_edit_save') }}">

                  <div class="alert alert-info" role="alert">
                    Kinldy check PPMP(Project Procurement Management Plan) before adding your request. <br>
                    To view your departments' PPMP click list/s below:<br>
                    @foreach($uploads as $file)
                      <li><a href="../../ppmp/{{$file->file_upload}}" target="_blank">{{$file->remarks}}</a></li>
                    @endforeach
                  </div>

                  <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">PR DATE : </label>
                        <div class="col-sm-2">
                        <input type="hidden" name="pr_id" value="{{ $pr->id }}" />
                        <input type="text" class="form-control" id="pr_no_date" name="pr_no_date" placeholder="PR DATE" value="{{$pr->pr_date_dept}}">
                    </div>
                </div>

                <div class="form-group">
                     <label for="purpose" class="col-sm-2 control-label">Purpose : </label>
                      <div class="col-sm-6">
                        <textarea class="form-control" id="purpose" name="purpose" placeholder="Purpose">{{$pr->pr_purpose}}</textarea>
                    </div>
                </div>
                      <div class="form-group">
                        <div class="col-sm-6 col-sm-6 col-sm-offset-6">
                                <button type="button" class="btn btn-success btn-sm pull-right" id="add_items"><i class="fa fa-plus"></i></button>
                        </div>
                      </div>
                     <table class="table table-bordered table-hover" id="items_list">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Description</th>
                              <th>Qty</th>
                              <th>Unit</th>
                              <th>Unit price</th>
                              <th>Total price</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $count=1; ?>
                            @foreach( $pr->pr_items()->get() as $prs )
                                      <tr>
                                            <td>{{ $count }}<input type="hidden" name="item_id[]" value="{{ $prs->id }}" /></td>
                                            <td><textarea class="form-control" placeholder="Description" name="item_desc[]">{{ $prs->description }}</textarea></td>
                                            <td><input class="form-control item_qty" type="text" name="item_qty[]" value="{{ $prs->qty }}" /></td>
                                           <td><input class="form-control item_unit" type="text" name="item_unit[]" value="{{ $prs->unit }}" /></td>
                                           <td><input class="form-control item_price" type="text" name="item_price[]" value="{{ $prs->unit_price }}" /></td>
                                            <td><input class="form-control item_total_price" type="text" name="item_total_price[]" disabled value="{{ $prs->unit_price  * $prs->qty}}" /></td>
                                          <td><button type="button" class="btn btn-danger btn-sm item_cancel"  onclick="$(this).removeTR();" ><i class="fa fa-trash"></i> Remove</button><input type="hidden" name="delete[]" value="false" /></td>
                                      </tr>

                               <?php $count++; ?>
                            @endforeach
                          </tbody>

                    </table>
                    {{csrf_field()}}
                    <button type="submit" name="cancel" class="btn btn-sm btn-default " value="cancel">Cancel</button>
                            <button  type="submit"  class="btn btn-sm btn-primary pull-right"> <i class="fa fa-save"></i> Update</button>
                    </form>
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
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
@include('department::purchase_request.js.edit-js')
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

  .remove>td{
  background: #ef6565;
  }
</style>



@stop