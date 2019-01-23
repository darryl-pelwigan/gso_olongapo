 

<?php $__env->startSection('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PPE
      </h1>
    </section>



    <!-- Main content -->
    <section class="content">

         <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchase Order List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
                 <table id="employee_list" class="table table-bordered table-hover">
                      <thead>
                      <tr id="test">
                              <td></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                        </tr>
                        <tr>
                              <th>No</th>
                              <th>Date</th>
                              <th>CONTROL #</th>
                              <th>DESCRIPTION</th>
                              <th>PROPERTY CODE</th>
                              <th>PO#</th>
                              <th>QTY</th>
                              <th>UNIT VALUE</th>
                              <th>TOTAL VALUE</th>
                              <th>ACCOUNTABLE PERSON</th>
                              <th>DEPARTMENT</th>
                              <th>SUPPLIER</th>
                              <th>INVOICE</th>
                              <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
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


   <?php $__env->stopSection(); ?>





<?php $__env->startSection('plugins-script'); ?>
<script src="<?php echo e(asset('adminlte/plugins/autocomplete/')); ?>/jquery.autocomplete.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>

<script type="text/javascript">

</script>

<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/table-header-search.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('plugins-css'); ?>
   <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/datepicker3.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datatables/jquery.dataTables.min.css">

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template::admin-pages.menus.'.$template['menu'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>