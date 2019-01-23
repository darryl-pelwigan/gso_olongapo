<?php $__env->startSection('content'); ?>
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


   <?php $__env->stopSection(); ?>

<?php $__env->startSection('plugins-css'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datatables/dataTables.bootstrap.css">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('plugins-script'); ?>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
  $('#example1').DataTable();

  $('[data-toggle="tooltip"]').tooltip();

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template::admin-pages.menus.'.$template['menu'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>