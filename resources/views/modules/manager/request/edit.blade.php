
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
                     <label for="pr_no" class="col-sm-2 control-label">REQUEST DATE : </label>
                        <div class="col-sm-2">
                        <input type="hidden" name="pr_id" value="{{ $pr->id }}" />
                                  {{$pr->pr_date}}
                    </div>
                </div>

                <div class="form-group">
                     <label for="purpose" class="col-sm-2 control-label">PURPOSE : </label>
                      <div class="col-sm-6">
                                  {{$pr->pr_purpose}}
                    </div>
                </div>
                     <table class="table table-bordered table-hover" id="items_list">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Description</th>
                              <th>Qty</th>
                              <th>unit</th>
                              <th>unit price</th>
                              <th>total price</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $count=1; ?>
                             @if($edit_view === 'edit')
                                  @foreach( $pr->pr_items()->get() as $prs )
                                            <tr>
                                                  <td>{{ $count }}<input type="hidden" name="item_id[]" value="{{ $prs->id }}" /></td>
                                                  <td><textarea class="form-control hidden" placeholder="Description" name="item_desc[]"  >{{ $prs->description }}</textarea> {{ $prs->description }}</td>
                                                  <td><input class="form-control item_qty hidden" type="text" name="item_qty[]" value="{{ $prs->qty }}"  /> {{ $prs->qty }}</td>
                                                 <td><input class="form-control hidden" type="text" name="item_unit[]" value="{{ $prs->unit }}"  /> {{ $prs->unit }}</td>
                                                 <td><input class="form-control item_price" type="text" name="item_price[]" value="{{ $prs->unit_price }}" /></td>
                                                  <td><input class="form-control item_total_price" type="text" name="item_total_price[]" disabled value="{{ $prs->unit_price  * $prs->qty}}" /></td>
                                            </tr>

                                     <?php $count++; ?>
                                  @endforeach
                              @else
                                    @foreach( $pr->pr_items()->get() as $prs )
                                            <tr>
                                                  <td>{{ $count }}</td>
                                                  <td>{{ $prs->description }}</td>
                                                  <td>{{ $prs->qty }}  </td>
                                                 <td> {{ $prs->unit }} </td>
                                                 <td> {{ $prs->unit_price }} </td>
                                                  <td> {{ $prs->unit_price  * $prs->qty}} </td>
                                            </tr>
                                     <?php $count++; ?>
                                  @endforeach

                             @endif

                          </tbody>

                    </table>
                    {{csrf_field()}}
                    @if($edit_view === 'edit')
                    <button type="submit" name="cancel" class="btn btn-sm btn-default " value="cancel">Cancel</button>
                            <button  type="submit"  class="btn btn-sm btn-primary pull-right">Update</button>
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
</style>



@stop