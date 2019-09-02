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

              @php
                 // dd($pmi->pr_no->bac_info);
              @endphp

               @include('template::admin-layouts.includes.message')
           <form class="form-horizontal" id="new_ppe_mnthly" method="POST" action="{{route('inventory.update_ppe_pr')}}">
            <input type="hidden" name="pmi_id" value="{{$pmi->id}}">
                    <div class="form-group">
                      <label for="type_es" class="col-sm-3 control-label">TYPE OF Inventory</label>
                             <div class="col-sm-6">
                              <div class="radio">
                                <label>
                                  <input type="radio" class="set-control-number" name="type_es" id="type_es1" value="Supplies" {{ $pmi->type == 'Supplies' ? "checked" : "" }}>
                                     SUPPLIES
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" class="set-control-number" name="type_es" id="type_es2" value="Equipement" {{ $pmi->type == 'Equipement' ? "checked" : "" }}>
                                  EQUIPEMENT
                                </label>
                              </div>
                            </div>
                    </div>


                      @php
                        // dd($pmi);
                      @endphp

                    <div class="form-group">
                        <label for="date_log" class="col-sm-3 control-label">Date Log : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control  set-control-number" id="date_log"   name="date_log"   placeholder="Date Log Y-m-d"  value="{{ old('date_log') ?  old('date_log') : $pmi->date_log}}" />
                        </div>
                    </div>


                    <div class="form-group">
                            <label for="payment_price" class="col-sm-3 control-label">Department</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="dept" name="dept" placeholder="Department" value="{{ $pmi->inv_dept->dept_desc }}"  readonly>
                              <input type="hidden" class="form-control" id="pr_sdept_id" name="pr_sdept_id"  value="{{ $pmi->department }}" >
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="control_no" class="col-sm-3 control-label">Control # : </label>
                        <div class="col-sm-6">
                          <input type="text"  class="form-control  " id="control_no"   name="control_no"   placeholder="Control # " readonly value="{{ $pmi->inv_control_no }}" />
                        </div>
                      </div>

                       @php

                      $supplier = '';
                      $supplier_id = '';
                      $po_no = '';
                        if($pmi->pono_id){
                          // $supplier = $pmi->pr_no->bac_info->pubbid()->first()->abstrct_supplier->supplier->title;
                          // $supplier_id = $pmi->pr_no->bac_info->pubbid()->first()->abstrct_supplier->supplier->id;
                          $supplier = $pmi->pr_no->bac_info->abstrct_supplier->supplier->title;
                          $supplier_id = $pmi->pr_no->bac_info->abstrct_supplier->supplier->id;
                          $po_no = $pmi->pr_no->pr_orderno->po_no;
                          $po_readonly = 'readonly';
                        }else{
                          $supplier = isset($pmi->inv_items[0]->supplier_info) ? $pmi->inv_items[0]->supplier_info->title : '';
                          $supplier_id = isset($pmi->inv_items[0]->supplier_info) ? $pmi->inv_items[0]->supplier_info->id : '';
                          $po_no = isset($pmi->inv_items[0]) ? $pmi->inv_items[0]->po_no : '';
                          $po_readonly = '';
                        }
                    @endphp
                    <input type="hidden" id="set_control_number_a" value="0">
                      <div class="form-group">
                        <label for="item_pono" class="col-sm-3 control-label">PO Number : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control " id="item_pono"   name="item_pono"   placeholder="PO Number" value="{{ $po_no  }}" {{  $po_readonly }} />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="item_supplier" class="col-sm-3 control-label"> SUPPLIER: </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control item_supplier"  name="item_supplier" readonly value="{{ $supplier }}"   /><input type="hidden" class="form-control"  name="item_supplier_id"  value="{{ $supplier_id }}"  />
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
                                      <th>(EXACT LOCATION, CONDITIONS, ETC.)</th>
                                      <th>DEPRECIABLE</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($pmi->inv_items as $items)
                                   @php
                                    // dd($items);
                                  @endphp
                                         <tr id="tr_1"><input type="hidden" name="item_id[]" value="{{ $items->id }}">
                                              <td><textarea   class="form-control" name="item_desc[]" readonly>{{ $items->item_desc }}</textarea></td>
                                              <td><input type="text" class="form-control"  name="item_property_code[]" value="{{ $items->property_code }}" /></td>
                                              <td><input type="text" class="form-control"  name="item_unit[]" value="{{ $items->unit }}" readonly  /></td>
                                              <td><input type="text" class="form-control item_qty"  name="item_qty[]" style="width: 60px;padding-right: 2px;" value="{{ $items->qty }}" readonly /></td>
                                              <td><input type="text" class="form-control item_unit_value"  name="item_unit_value[]" style="width: 100px;" value="{{ $items->unit_value }}" readonly /></td>
                                              <td><input type="text" class="form-control"  name="item_total_value[]" style="width: 100px;" disabled="" value="{{ $items->unit_value * $items->qty }}" readonly /></td>
                                              <td><input type="text" class="form-control item_accountable_person"  name="item_accountable_person[]" value="{{ $items->accountable ? $items->accountable->lname.','.$items->accountable->fname : '' }}"  /> <input type="hidden" class="form-control"  name="item_accountable_person_id[]" value="{{ $items->accountable_person }}" /> </td>
                                              <td><input type="text" class="form-control"  name="item_invoice[]" value="{{ $items->invoice}}" /></td>
                                              <td><input type="text" class="form-control"  name="item_loc[]" value="{{ $items->location}}" /></td>
                                              <td><select name="item_dep[]" class="form-control"> <option disabled selected value> -- select an option -- </option><option value="I">Yes</option><option value="O">No</option></select></td>
                                          </tr>
                                @endforeach

                              </tbody>

                          </table>
                             </div>
                        </div>
      {{csrf_field()}}

                          <button type="submit" class="btn btn-success" onclick="$(this).updatePPEMnthly();">Update</button>

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