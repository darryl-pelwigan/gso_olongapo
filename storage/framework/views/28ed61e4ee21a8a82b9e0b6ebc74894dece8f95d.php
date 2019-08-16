<?php $__env->startSection('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ABSTRACT SIGNEE
      </h1>
    </section>
      <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <form class="form-horizontal" method="POST" action="<?php echo e(route('absctrct.save-signee')); ?>">
                    <?php echo e(csrf_field()); ?>

            
              <div class="box">
                <div class="box-header">
                    Requsitioning Office
                </div>
                <div class="form-group">
                    <label for="" class="col-md-3">Name</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="signee_name[]" value="<?php echo e($signee[0]->name); ?>">
                      <input type="hidden" name="signee_id[]"  value="<?php echo e($signee[0]->id); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-3">Position</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" value="<?php echo e($signee[0]->position); ?>" name="signee_position[]">
                    </div>
                </div>
                <br style="clear: both;"><br>
              </div>
              <div class="box">
                <div class="box-header">
                    Officer
                </div>
                  <div class="form-group">
                      <label for="" class="col-md-3">Name</label>
                      <div class="col-md-8">
                         <input type="text" class="form-control" name="signee_name[]" value="<?php echo e($signee[1]->name); ?>">
                      <input type="hidden" name="signee_id[]"  value="<?php echo e($signee[1]->id); ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="col-md-3">Position</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" value="<?php echo e($signee[1]->position); ?>" name="signee_position[]">
                      </div>
                  </div>
                <br style="clear: both;"><br>
              </div>

              <div class="box">
                <div class="box-header">
                    BAC Members
                </div>
                    <div class="form-group">
                        <label for="" class="col-md-3">Name</label>
                        <div class="col-md-8">
                           <input type="text" class="form-control" name="signee_name[]" value="<?php echo e($signee[2]->name); ?>">
                      <input type="hidden" name="signee_id[]"  value="<?php echo e($signee[2]->id); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3">Position</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" value="<?php echo e($signee[2]->position); ?>" name="signee_position[]">
                        </div>
                    </div>
                <br style="clear: both;"><br>
                </div>

               <div class="box">
                <div class="box-header">
                    BAC Members
                </div>
                    <div class="form-group">
                    <label for="" class="col-md-3">Name</label>
                    <div class="col-md-8">
                       <input type="text" class="form-control" name="signee_name[]" value="<?php echo e($signee[3]->name); ?>">
                      <input type="hidden" name="signee_id[]"  value="<?php echo e($signee[3]->id); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-3">Position</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" value="<?php echo e($signee[3]->position); ?>" name="signee_position[]">
                    </div>
                </div>
                   <br style="clear: both;"><br>
                </div>
             
               <div class="box">
                <div class="box-header">
                    BAC Members
                </div>
                  <div class="form-group">
                    <label for="" class="col-md-3">Name</label>
                    <div class="col-md-8">
                       <input type="text" class="form-control" name="signee_name[]" value="<?php echo e($signee[4]->name); ?>">
                      <input type="hidden" name="signee_id[]"  value="<?php echo e($signee[4]->id); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-3">Position</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" value="<?php echo e($signee[4]->position); ?>" name="signee_position[]">
                    </div>
                </div>
                <br style="clear: both;"><br>

                </div>
               <div class="box">
                <div class="box-header">
                    BAC Chairman
                </div>
                  <div class="form-group">
                    <label for="" class="col-md-3">Name</label>
                    <div class="col-md-8">
                       <input type="text" class="form-control" name="signee_name[]" value="<?php echo e($signee[5]->name); ?>">
                      <input type="hidden" name="signee_id[]"  value="<?php echo e($signee[5]->id); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-3">Position</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" value="<?php echo e($signee[5]->position); ?>" name="signee_position[]">
                    </div>
                </div>
                <br style="clear: both;"><br>

                </div>
                <button type="submit" name="submit" class="btn btn-md btn-success"> Update</button>
            </form>
        </div>
      </div>
    </section>
  </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('plugins-script'); ?>
<script src="<?php echo e(asset('adminlte/plugins/autocomplete/')); ?>/jquery.autocomplete.min.js"></script>
<script src="<?php echo e(asset('adminlte/plugins/daterangepicker/')); ?>/moment.min.js"></script>
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/accounting/accounting.min.js"></script>
<script type="text/javascript">


</script>
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

table>thead>tr#test>th>input,table>tfoot>tr>th>input{
  width: 100%;
}


  </style>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template::admin-pages.menus.'.$template['menu'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>