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
                  <form class="form-horizontal" method="POST" action="{{ route('pr.pr_edit_save') }}">
                
                
                <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">REQUEST DATE: </label>
                        <div class="col-sm-2">
                        <input type="hidden" name="pr_id" id="pr_id" value="{{ $pr->id }}" />
                        {{$pr->pr_date_dept}}
                    </div>
                </div>

                <div class="form-group">
                     <label for="purpose" class="col-sm-2 control-label">DEPARTMENT : </label>
                      <div class="col-sm-10">
                      <input type="hidden" name="pr_dept_id" value="{{ $pr->dept_id }}" />
                      {{$pr->pr_dept->dept_desc}}
                    </div>
                </div>

                <div class="form-group">
                     <label for="purpose" class="col-sm-2 control-label">PURPOSE : </label>
                      <div class="col-sm-10">
                                  {{$pr->pr_purpose}}
                    </div>
                </div>

                <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">Procurement Type: </label>
                        <div class="col-sm-4">
                        @if($edit_view === 'edit')
                        <select class="form-control" name="proc_type">
                            <option value="">SELECT PROCUREMENT</option>
                            @foreach($proc_methods as $proc_method)
                              @if($proc_method->id == $pr->proc_type)
                                <option value="{{$proc_method->id}}" selected>{{$proc_method->proc_title.' ('.$proc_method->proc_min_value.' - '.$proc_method->proc_max_value.')'}}</option>
                              @else
                                <option value="{{$proc_method->id}}" >{{$proc_method->proc_title.' ('.$proc_method->proc_min_value.' - '.$proc_method->proc_max_value.')'}}</option>
                              @endif
                            @endforeach
                        </select>
                        @else
                            @foreach($proc_methods as $proc_method)
                              @if($proc_method->id == $pr->proc_type)
                                {{$proc_method->proc_title.' ('.$proc_method->proc_min_value.' - '.$proc_method->proc_max_value.')'}}
                              @endif
                            @endforeach
                           @endif
                    </div>
                </div>

                <?php
                  $sdept = $pr->pr_dept->subdept_code == 0 ? '' : '.'.$pr->pr_dept->subdept_code;
                  $pr_no = $pr->pr_no ? $pr->pr_no : ($pr->pr_dept->dept->dept_code).$sdept.'-'.date('y').'-'.date('m').'-';
                  $pr_date = $pr->pr_date != '0000-00-00' ? $pr->pr_date :  '';
                  $sai_date = $pr->pr_date != '0000-00-00' ? $pr->pr_date :  '';
                ?>


                 <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">PURCHASE REQUEST DATE : </label>
                        <div class="col-sm-3">
                        @if($edit_view === 'edit')
                            <input type="text"  class="form-control datepicker"  name="pr_date" id="pr_date" value="{{$pr_date}}" placeholder="PR DATE YYYY-MM-DD" />
                        @else
                            {{$pr->pr_date}}
                        @endif
                    </div>
                </div>


                   <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">PURCHASE REQUEST NO: </label>
                        <div class="col-sm-3">
                        @if($edit_view === 'edit')
                          <input type="text" class="form-control" name="pr_no" id="pr_no" value="{{$pr_no}}"  placeholder="PURCHASE REQUEST NO." required   />
                        @else
                            {{$pr_no}}
                        @endif
                    </div>
                </div>

                <div class="form-group">
                  @if($purely_consumption == '1')
                  @else
                     <label for="sai_no" class="col-sm-2 control-label">SAI NO : </label>
                  @endif
                        <div class="col-sm-3">
                        @if($edit_view === 'edit')
                          @if($purely_consumption == '1')
                          @else
                          <input type="text" class="form-control" name="sai_no" id="sai_no" value="{{$pr->sai_no ?? ''}}"  placeholder="SAI NO."    />
                          @endif
                        @else
                            {{$pr->sai_no ?? '' }}
                        @endif
                    </div>
                </div>

                <div class="form-group">
                  @if($purely_consumption == '1')
                  @else
                     <label for="sai_date" class="col-sm-2 control-label">SAI DATE : </label>
                  @endif
                        <div class="col-sm-3">
                        @if($edit_view === 'edit')
                          @if($purely_consumption == '1')
                          @else
                          <input type="text" class="form-control datepicker" name="sai_date" id="sai_date" value="{{ $sai_date }}"  placeholder="SAI DATE  YYYY-MM-DD "    />
                          @endif
                        @else
                            {{$pr->sai_date ?? '' }}
                        @endif
                    </div>
                </div>

                  <div class="form-inline">
                    <div class="col-sm-6">
                      <!-- <div class="form-check"> -->
                      @if($pr->iau_verified == 1)
                      <input type="checkbox" class="form-check-input" style="height: 30px; width: 30px;" name="verify_iau" id="verify_iau" required checked="checked">
                      @else
                      <input type="checkbox" class="form-check-input" style="height: 30px; width: 30px;" name="verify_iau" id="verify_iau" required>
                      @endif
                      <label class="form-check-label">VERIFIED BY IAU</label>
                      <!-- </div> -->

                      <label>ON </label>
                      @if(!is_null($pr->iau_vdate) && $pr->iau_vdate != "")
                      <input type="text" class="form-control datepicker" name="verify_iau_date" id="verify_iau_date" placeholder="{{ \Carbon\Carbon::parse($pr->iau_vdate)->format('Y-m-d') }}" value="{{ \Carbon\Carbon::parse($pr->iau_vdate)->format('Y-m-d') }}" required>
                      @else
                      <input type="text" class="form-control datepicker" name="verify_iau_date" id="verify_iau_date" placeholder="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                      @endif
                    </div>
                    
                    <div class="col-sm-6"> 
                      <!-- <div class="form-check"> -->
                      @if($pr->budget_verified == 1)
                      <input type="checkbox" class="form-check-input" style="height: 30px; width: 30px;" name="verify_bo" id="verify_bo" required checked="checked">
                      @else
                      <input type="checkbox" class="form-check-input" style="height: 30px; width: 30px;" name="verify_bo" id="verify_bo" required>
                      @endif
                      <label class="form-check-label">VERIFIED BY BUDGET OFFICE </label>
                      <!-- </div> -->

                      <label>ON </label>
                      @if(!is_null($pr->budget_vdate) && $pr->budget_vdate != "")
                      <input type="text" class="form-control datepicker" name="verify_bo_date" id="verify_bo_date" placeholder="{{ \Carbon\Carbon::parse($pr->budget_vdate)->format('Y-m-d') }}" value="{{ \Carbon\Carbon::parse($pr->budget_vdate)->format('Y-m-d') }}" required>
                      @else
                      <input type="text" class="form-control datepicker" name="verify_bo_date" id="verify_bo_date" placeholder="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                      @endif
                    </div>
                    
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
                            </tr>
                          </thead>
                          <tbody>
                            <?php $count=1; $unit_price_total=0; $sum_price_total=0; ?>
                             @if($edit_view === 'edit')
                                  @foreach( $pr->pr_items()->get() as $prs )
                                  <?php $total_price = $prs->unit_price  * $prs->qty; ?>
                                            <tr>
                                                  <td>{{ $count }}<input type="hidden" name="item_id[]" value="{{ $prs->id }}" /></td>
                                                  <td><textarea class="form-control hidden" placeholder="Description" name="item_desc[]"  style="word-wrap:break-word;">{{ $prs->description }}</textarea> {{ $prs->description }}</td>
                                                  <td><input class="form-control item_qty hidden" type="text" name="item_qty[]" value="{{ $prs->qty }}"  /> {{ $prs->qty }}</td>
                                                 <td><input class="form-control hidden" type="text" name="item_unit[]" value="{{ $prs->unit }}"  /> {{ $prs->unit }}</td>
                                                 <td><input class="form-control item_price text-right" type="text" name="item_price[]" value="{{ $prs->unit_price }}" /></td>
                                                  <td><input class="form-control item_total_price text-right" type="text" name="item_total_price[]" disabled value="{{ number_format($total_price,2) }}" /></td>
                                            </tr>

                                     <?php $count++;  $unit_price_total += $prs->unit_price ; $sum_price_total +=$total_price; ?>
                                  @endforeach
                              @else
                                    @foreach( $pr->pr_items()->get() as $prs )
                                    <?php $total_price = $prs->unit_price  * $prs->qty; ?>
                                            <tr>
                                                  <td>{{ $count }}</td>
                                                  <td>{{ $prs->description }}</td>
                                                  <td>{{ $prs->qty }}  </td>
                                                 <td> {{ $prs->unit }} </td>
                                                 <td class="text-right"> {{ number_format($prs->unit_price,2) }} </td>
                                                  <td class="text-right"> {{ number_format($total_price,2) }} </td>
                                            </tr>
                                        <?php $count++;  $unit_price_total += $prs->unit_price ; $sum_price_total +=$total_price; ?>
                                  @endforeach
                             @endif

                             <tr>
                               <td colspan="5">Total</td>
                               <td id="sum_price_total" class="text-right"> {{ number_format($sum_price_total,2) }} </td>
                             </tr>

                          </tbody>

                    </table>
                    {{csrf_field()}}
                    @if($edit_view === 'edit')
                    <button type="submit" name="cancel" class="btn btn-sm btn-default " value="cancel">Cancel</button>
                    <button  type="submit"  class="btn btn-sm btn-primary pull-right" id="update_btn" disabled="disabled"><i class="fa fa-save"></i> Update</button>
                      @endif
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

<script type="text/javascript">
  $(document).on('change', '#verify_iau', function() {
    var iau = $(this).prop('checked');
    var iau_date = $('#verify_iau_date').val();
    var bo = $('#verify_bo').prop('checked');
    var bo_date = $('#verify_bo_date').val();
    if(iau == true && bo == true) {
      $('#update_btn').removeAttr('disabled');
    }
  });
  $(document).on('change', '#verify_iau_date', function() {
    var iau = $('#verify_iau').prop('checked');
    var iau_date = $(this).val();
    var bo = $('#verify_bo').prop('checked');
    var bo_date = $('#verify_bo_date').val();
    if(iau == true && bo == true) {
      $('#update_btn').removeAttr('disabled');
    }
  });
  $(document).on('change', '#verify_bo', function() {
    var iau = $('#verify_iau').prop('checked');
    var iau_date = $('#verify_iau_date').val();
    var bo = $(this).prop('checked');
    var bo_date = $('#verify_bo_date').val();
    if(iau == true && bo == true) {
      $('#update_btn').removeAttr('disabled');
    }
  });
  $(document).on('change', '#verify_bo_date', function() {
    var iau = $('#verify_iau').prop('checked');
    var iau_date = $('#verify_iau_date').val();
    var bo = $('#verify_bo').prop('checked');
    var bo_date = $(this).val();
    if(iau == true && bo == true) {
      $('#update_btn').removeAttr('disabled');
    }
  });
  $(document).ready(function() {
    var iau = $('#verify_iau').prop('checked');
    var iau_date = $('#verify_iau_date').val();
    var bo = $('#verify_bo').prop('checked');
    var bo_date = $('#verify_bo_date').val();
    if(iau == true && bo == true) {
      $('#update_btn').removeAttr('disabled');
    }
  });
  var now = new Date();
  var now_format = now.getFullYear() + '/' + now.getMonth() + '/' + now.getDate();
  $('#verify_iau_date').datepicker('setDate', now_format);
  $('#verify_bo_date').datepicker('setDate', now_format);
</script>
@stop

@section('plugins-css')
 <!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datepicker/datepicker3.css">
  <!-- DataTables -->
<link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.css">

<style type="text/css">
  .remove>td{
  background: #ef6565;
  }

  .form-inline * {
    display: inline;
    padding: 5px;
    vertical-align: middle;
  }
</style>
@stop