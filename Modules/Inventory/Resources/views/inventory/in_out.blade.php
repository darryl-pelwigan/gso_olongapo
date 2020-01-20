@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Invenotry In/Out
      </h1>
    </section>



    <!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info box-shadow">
            <div class="box-header">
              <h3 class="box-title">Invenotry In/Out</h3>
            </div>
            <!-- /.box-header -->



           <form class="form-horizontal" id="new_ppe_mnthly" method="POST" action="{{route('inventory.in_out')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                            <label for="payment_price" class="col-sm-3 control-label">RIS No: </label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="control_no" name="control_no"  >
                            </div>
              </div>
              <div class="form-group">
                        <label for="date_log" class="col-sm-3 control-label">Available Stock : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control  set-control-number" id="Stock"   name="Stock"  readonly value="{{ $items->item_qty }}" />
                        </div>
                    </div>


                    <div class="form-group">
                            <label for="payment_price" class="col-sm-3 control-label">Type </label>
                            <div class="col-sm-6">
                            <select class="form-control" name="type" id="type">
                                <option value="Out"> Out</option>
                                <option value="In">In</option>

                          </select>
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="control_no" class="col-sm-3 control-label">Item Quantity: </label>
                        <div class="col-sm-6">
                          <input type="text"  class="form-control  " id="qty"   name="qty" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="control_no" class="col-sm-3 control-label">Date: </label>
                        <div class="col-sm-6">
                          <input type="text"  class="form-control date" id="date"   name="date" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="control_no" class="col-sm-3 control-label" id="label" name="label">Requested By: </label>
                        <div class="col-sm-6">
                          <select class="form-control" name="requested" id="requested">
                              <option></option>
                              @foreach($dept as $dep)
                                <option value={{$dep->id}}>{{$dep->dept_desc}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                      <input type="hidden" name="inv_id" value="{{$items->id}}">
                    <div class="form-group">
                      <div class="col-sm-6">
                        <input type="submit" class="btn btn-success"></input>
                      </div>
                    </div>

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
<script type="text/javascript">
$('.date').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd',
});

$(document).ready(function(){

    $('#type').click(function(){
        if(document.getElementById("type").value == "In"){
                $('#label').text("Nalipatak Jay Maisukat ditoy wahahah");


        }else if(document.getElementById("type").value == "Out"){

            $('#label').text("Requested By:");

        }

    });


});

</script>
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