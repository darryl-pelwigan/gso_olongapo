@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Group List
      </h1>
    </section>



    <!-- Main content -->
    <section class="content">

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal -->


   @stop

@section('plugins-css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/dataTables.bootstrap.css">
@stop



@section('plugins-script')
<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
  $('#example1').DataTable();

  $('[data-toggle="tooltip"]').tooltip();

</script>
@stop
