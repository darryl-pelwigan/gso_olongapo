 @extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transactions
      </h1>
    </section>



    <!-- Main content -->
    <section class="content">

         <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of transactions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
                 <table id="pr_ppe_list" class="table table-bordered table-hover">
                       <thead>
                        <tr>
                          <th>NO</th>
                          <th>RIS No.</th>
                          <th>Item Description</th>
                          <th>Type</th>
                          <th>Item Qty</th>
                          <th>Accountable Person</th>
                          <th>Date</th>
                        </tr>

                      </thead>
                      <tbody>
                        @php
                          $count = 1;
                        @endphp
                          @foreach($logs as $log )
                                    <tr>
                                        <td>{{ $count++ }} </td>
                                        <td>{{ $log->control_no}}</td>
                                        <td>{{ $log->item_desc}}</td>
                                        <td>{{ $log->type }}</td>
                                        <td>{{ $log->qty }}</td>
                                        <td>{{ $log->fname}} {{$log->mname}} {{$log->lname}}</td>
                                        <td>{{ $log->inv_date }}</td>
                                    </tr>
                          @endforeach
                      </tbody>
                </table>
                </div>
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
  <!-- Modal -->


   @stop





@section('plugins-script')
<script src="{{asset('adminlte/plugins/autocomplete/')}}/jquery.autocomplete.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $('#pr_ppe_list').DataTable();
</script>

<script src="{{asset('adminlte')}}/plugins/datatables/table-header-search.js"></script>
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

table>thead>tr#test>th>input,table>tfoot>tr>th>input,table>thead>tr>td>input{
  width: 100%;
}
  </style>
@stop
