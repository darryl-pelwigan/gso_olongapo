@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      PPE REPORT
      </h1>
    </section>



    <!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info box-shadow">
            <div class="box-header">
              <h3 class="box-title">PPE REPORT</h3>


            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" method="POST" action="{{route('inventory.ppe-generate-report-pdf')}}">
            {{csrf_field()}}
            <div class="box-body">
                <div class="col-md-4">
                  <div class="form-group row">
                       <label for="pr_no" class="col-sm-3 control-label">DATE FROM </label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control date" id="from" name="from" placeholder="PR DATE" />
                      </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                       <label for="pr_no" class="col-sm-3 control-label">DATE TO </label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control date" id="to" name="to" placeholder="PR DATE" />
                      </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-info pull-right" id="submit_butts" onclick="$(this).sentPurchaseRequest();">Submit</button>
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