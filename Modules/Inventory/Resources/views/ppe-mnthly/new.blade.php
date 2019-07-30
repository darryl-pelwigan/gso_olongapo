@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      PPE MONTHLY REPORT
      </h1>
    </section>



    <!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info box-shadow">
            <div class="box-header">
              <h3 class="box-title">Purchase Order List</h3>



            </div>
            <!-- /.box-header -->
            <div class="box-body">
               @include('template::admin-layouts.includes.message')
           <form class="form-horizontal" id="new_ppe_mnthly" method="POST" action="{{route('inv.save_monthly_report_new')}}">
                    <div class="form-group">
                      <label for="type_es" class="col-sm-3 control-label">TYPE OF Inventory</label>
                             <div class="col-sm-6">
                              <div class="radio">
                                <label>
                                  <input type="radio" class="set-control-number" name="type_es" id="type_es1" value="Supplies" checked="">
                                     SUPPLIES
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" class="set-control-number" name="type_es" id="type_es2" value="Equipement">
                                  EQUIPEMENT
                                </label>
                              </div>
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="date_log" class="col-sm-3 control-label">Date Log : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control  set-control-number" id="date_log"   name="date_log"   placeholder="Date Log"  value="{{ old('date_log') }}" />
                        </div>
                    </div>


                    <div class="form-group">
                            <label for="payment_price" class="col-sm-3 control-label">Department</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="dept" name="dept" placeholder="Department" value="{{ old('dept') }}" >
                              <input type="hidden" class="form-control" id="pr_sdept_id" name="pr_sdept_id"  value="{{ old('pr_sdept_id') }}" >
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="control_no" class="col-sm-3 control-label">Control # : </label>
                        <div class="col-sm-6">
                          <input type="text"  class="form-control  " id="control_no"   name="control_no"   placeholder="Control # " readonly value="{{ old('control_no') }}" />
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="item_pono" class="col-sm-3 control-label">PO Number : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control " id="item_pono"   name="item_pono"   placeholder="PO Number" value="{{ old('item_pono') }}"  />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="item_supplier" class="col-sm-3 control-label"> SUPPLIER: </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control item_supplier"  name="item_supplier" value="{{ old('item_supplier') }}"   /><input type="hidden" class="form-control"  name="item_supplier_id"  value="{{ old('item_supplier_id') }}"  />
                        </div>
                    </div>




                        <div class="table-responsive" >
                        <div class="form-group" style="margin: 0;">
                          <table class="table table-bordered table-striped " id="ppe-mnthly-report-items-add">
                              <thead>
                                <tr>
                                      <th>DESCRIPTION</th>
                                      <th>PROPERTY CODE</th>
                                       <th>UNIT</th>
                                        <th>QTY</th>
                                      <th>UNIT VALUE</th>
                                      <th>TOTAL VALUE</th>
                                      <th>ACCOUNTABLE PERSON</th>
                                      <th>INVOICE</th>
                                      <th>ESTIMATED LIFE YEARS</th>
                                      <th>(EXACT LOCATION, CONDITIONS, ETC.)</th>
                                      <th>DEPRECIABLE</th>
                                      <th></th>
                                </tr>
                              </thead>

                              <tbody>
                              @if(   !(old('item_desc')))
                                <tr id="tr_1">
                                    <td><textarea   class="form-control" name="item_desc[]" ></textarea></td>
                                    <td><input type="text" class="form-control"  name="item_property_code[]" /></td>
                                    <td><input type="text" class="form-control"  name="item_unit[]"  /></td>
                                    <td><input type="text" class="form-control item_qty"  name="item_qty[]" style="width: 60px;padding-right: 2px;" /></td>
                                    <td><input type="text" class="form-control item_unit_value"  name="item_unit_value[]" style="width: 100px;" /></td>
                                    <td><input type="text" class="form-control"  name="item_total_value[]" style="width: 100px;" readonly="" /></td>
                                    <td><input type="text" class="form-control item_accountable_person"  name="item_accountable_person[]"  /> <input type="hidden" class="form-control"  name="item_accountable_person_id[]" /> </td>
                                    <td><input type="text" class="form-control"  name="item_invoice[]" /></td>
                                    <td><input type="text" class="form-control"  name="item_est[]" /></td>
                                    <td><input type="text" class="form-control"  name="item_loc[]" /></td>
                                    <td><select name="item_dep[]" class="form-control"> <option disabled selected value> -- select an option -- </option><option value="I">Yes</option><option value="O">No</option></select></td>
                                    <td><button type="button" class="btn btn-xs btn-success add-tr"><i class="fa fa-plus"></i> row</button></td>
                                </tr>
                              @else
                                        @for( $x =0 ; $x < count(old('item_desc')); $x++)
                                                             <tr id="tr_1">
                                                                  <td><textarea   class="form-control" name="item_desc[]" >{{ old('item_desc.'.$x) }}</textarea></td>
                                                                  <td><input type="text" class="form-control"  name="item_property_code[]" value="{{ old('item_property_code.'.$x) }}" /></td>
                                                                  <td><input type="text" class="form-control"  name="item_unit[]" value="{{ old('item_unit.'.$x) }}"  /></td>
                                                                  <td><input type="text" class="form-control item_qty"  name="item_qty[]" style="width: 60px;padding-right: 2px;" value="{{ old('item_qty.'.$x) }}"  /></td>
                                                                  <td><input type="text" class="form-control item_unit_value"  name="item_unit_value[]" style="width: 100px;" value="{{ old('item_unit_value.'.$x) }}" /></td>
                                                                  <td><input type="text" class="form-control"  name="item_total_value[]" style="width: 100px;" disabled="" value="{{ old('item_total_value.'.$x) }}" /></td>
                                                                  <td><input type="text" class="form-control item_accountable_person"  name="item_accountable_person[]"  /> <input type="hidden" class="form-control"  name="item_accountable_person_id[]" /> </td>
                                                                  <td><input type="text" class="form-control"  name="item_invoice[]" value="{{ old('item_invoice.'.$x) }}" /></td>
                                                                  <td><input type="text" class="form-control"  name="item_est[]" value="{{ old('item_invoice.'.$x) }}" /></td>
                                                                  <td><input type="text" class="form-control"  name="item_loc[]" value="{{ old('item_invoice.'.$x) }}" /></td>
                                                                  <td><select name="item_dep[]" class="form-control"> <option disabled selected value> -- select an option -- </option><option value="I">Yes</option><option value="O">No</option></select></td>
                                                                  <td><button type="button" class="btn btn-xs btn-success add-tr"><i class="fa fa-plus"></i> row</button></td>
                                                              </tr>
                                        @endfor
                              @endif

                              </tbody>

                          </table>
                             </div>
                        </div>
      {{csrf_field()}}

                          <button type="submit" class="btn btn-success" onclick="$(this).submitPPEMnthly();">Save</button>

  </form>

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
 <!-- validator http://bootstrapvalidator.com/ -->
  <script type="text/javascript" src="{{asset('adminlte')}}/plugins/bootstrap-validator2/dist/js/bootstrapValidator.js"></script>

<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/table-header-search.js"></script>
<script src="//cdn.rawgit.com/ashl1/datatables-rowsgroup/v1.0.0/dataTables.rowsGroup.js"></script>
<script src="{{asset('adminlte/plugins/autocomplete/')}}/jquery.autocomplete.min.js"></script>
@include('inventory::ppe-mnthly.ajax-content.new_js')
@stop


@section('plugins-css')
 <!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datepicker/datepicker3.css">
<link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="{{asset('adminlte')}}/plugins/lightbox2/css/lightbox.css">
<style type="text/css">

.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; width: 20% !important; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
.select2-container{ width:100% !important; }


</style>
@stop