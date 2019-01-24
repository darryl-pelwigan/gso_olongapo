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


                      @php
                        // dd($po->pr_orderno->po_no);
                      @endphp

                    <div class="form-group">
                        <label for="date_log" class="col-sm-3 control-label">Date Log : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control  set-control-number" id="date_log"   name="date_log"   placeholder="Date Log Y-m-d"  value="{{ old('date_log') ?  old('date_log') : date('Y-m-d')}}" />
                        </div>
                    </div>


                    <div class="form-group">
                            <label for="payment_price" class="col-sm-3 control-label">Department</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="dept" name="dept" placeholder="Department" value="{{ $bac->pr->pr_dept->dept_desc }}"  readonly>
                              <input type="hidden" class="form-control" id="pr_sdept_id" name="pr_sdept_id"  value="{{ $bac->pr->pr_dept->id }}" >
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
                          <input type="text" class="form-control " id="item_pono"   name="item_pono"   placeholder="PO Number" value="{{ $bac->pr->pr_orderno->po_no }}" readonly/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="item_supplier" class="col-sm-3 control-label"> SUPPLIER: </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control item_supplier"  name="item_supplier" value="{{ $bac->abstrct_supplier->supplier->title }}"   /><input type="hidden" class="form-control"  name="item_supplier_id"  value="{{ $bac->abstrct_supplier->supplier->id }}"  />
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
                                </tr>
                              </thead>

                              <tbody>
                                @foreach( $bac->abstrct_supplier->abstrct_supplier_approved as $items)
                                   @php
                                    // dd($items);
                                  @endphp
                                         <tr id="tr_1">
                                              <input type="hidden" class="form-control"  name="item_id[]" value="{{ $items->pr_item->id }}" />
                                              <td><textarea   class="form-control" name="item_desc[]" readonly>{{ $items->pr_item->description }}</textarea></td>
                                              <td><input type="text" class="form-control"  name="item_property_code[]" value="" /></td>
                                              <td><input type="text" class="form-control"  name="item_unit[]" value="{{ $items->pr_item->unit }}" readonly  /></td>
                                              <td><input type="text" class="form-control item_qty"  name="item_qty[]" style="width: 60px;padding-right: 2px;" value="{{ $items->pr_item->qty }}" readonly /></td>
                                              <td><input type="text" class="form-control item_unit_value"  name="item_unit_value[]" style="width: 100px;" value="{{ $items->pr_item->unit_price }}" readonly /></td>
                                              <td><input type="text" class="form-control"  name="item_total_value[]" style="width: 100px;" disabled="" value="{{ $items->pr_item->unit_price * $items->pr_item->qty }}" readonly /></td>
                                              <td><input type="text" class="form-control item_accountable_person"  name="item_accountable_person[]"  /> <input type="hidden" class="form-control"  name="item_accountable_person_id[]" /> </td>
                                              <td><input type="text" class="form-control"  name="item_invoice[]" value="" /></td>
                                          </tr>
                                @endforeach

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
@include('inventory::ppe-mnthly.ajax-content.new_js_pr')
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