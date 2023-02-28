<?php $__env->startSection('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         PURCHASE REQUEST
      </h1>

       <?php echo $__env->make('template::admin-layouts.includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                  <form class="form-horizontal" method="POST" action="<?php echo e(route('pr.pr_edit_save')); ?>">
                
                
                <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">REQUEST DATE: </label>
                        <div class="col-sm-2">
                        <input type="hidden" name="pr_id" id="pr_id" value="<?php echo e($pr->id); ?>" />
                        <?php echo e($pr->pr_date_dept); ?>

                    </div>
                </div>

                <div class="form-group">
                     <label for="purpose" class="col-sm-2 control-label">DEPARTMENT : </label>
                      <div class="col-sm-10">
                      <input type="hidden" name="pr_dept_id" value="<?php echo e($pr->dept_id); ?>" />
                      <?php echo e($pr->pr_dept->dept_desc); ?>

                    </div>
                </div>

                <div class="form-group">
                     <label for="purpose" class="col-sm-2 control-label">PURPOSE : </label>
                      <div class="col-sm-10">
                                  <?php echo e($pr->pr_purpose); ?>

                    </div>
                </div>

                <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">Procurement Type: </label>
                        <div class="col-sm-4">
                        <?php if($edit_view === 'edit'): ?>
                        <select class="form-control" name="proc_type">
                            <option value="">SELECT PROCUREMENT</option>
                            <?php $__currentLoopData = $proc_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proc_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($proc_method->id == $pr->proc_type): ?>
                                <option value="<?php echo e($proc_method->id); ?>" selected><?php echo e($proc_method->proc_title.' ('.$proc_method->proc_min_value.' - '.$proc_method->proc_max_value.')'); ?></option>
                              <?php else: ?>
                                <option value="<?php echo e($proc_method->id); ?>" ><?php echo e($proc_method->proc_title.' ('.$proc_method->proc_min_value.' - '.$proc_method->proc_max_value.')'); ?></option>
                              <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php else: ?>
                            <?php $__currentLoopData = $proc_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proc_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($proc_method->id == $pr->proc_type): ?>
                                <?php echo e($proc_method->proc_title.' ('.$proc_method->proc_min_value.' - '.$proc_method->proc_max_value.')'); ?>

                              <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
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
                        <?php if($edit_view === 'edit'): ?>
                            <input type="text"  class="form-control datepicker"  name="pr_date" id="pr_date" value="<?php echo e($pr_date); ?>" placeholder="PR DATE YYYY-MM-DD" />
                        <?php else: ?>
                            <?php echo e($pr->pr_date); ?>

                        <?php endif; ?>
                    </div>
                </div>


                   <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">PURCHASE REQUEST NO: </label>
                        <div class="col-sm-3">
                        <?php if($edit_view === 'edit'): ?>
                          <input type="text" class="form-control" name="pr_no" id="pr_no" value="<?php echo e($pr_no); ?>"  placeholder="PURCHASE REQUEST NO." required   />
                        <?php else: ?>
                            <?php echo e($pr_no); ?>

                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                  <?php if($purely_consumption == '1'): ?>
                  <?php else: ?>
                     <label for="sai_no" class="col-sm-2 control-label">SAI NO : </label>
                  <?php endif; ?>
                        <div class="col-sm-3">
                        <?php if($edit_view === 'edit'): ?>
                          <?php if($purely_consumption == '1'): ?>
                          <?php else: ?>
                          <input type="text" class="form-control" name="sai_no" id="sai_no" value="<?php echo e($pr->sai_no ?? ''); ?>"  placeholder="SAI NO."    />
                          <?php endif; ?>
                        <?php else: ?>
                            <?php echo e($pr->sai_no ?? ''); ?>

                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                  <?php if($purely_consumption == '1'): ?>
                  <?php else: ?>
                     <label for="sai_date" class="col-sm-2 control-label">SAI DATE : </label>
                  <?php endif; ?>
                        <div class="col-sm-3">
                        <?php if($edit_view === 'edit'): ?>
                          <?php if($purely_consumption == '1'): ?>
                          <?php else: ?>
                          <input type="text" class="form-control datepicker" name="sai_date" id="sai_date" value="<?php echo e($sai_date); ?>"  placeholder="SAI DATE  YYYY-MM-DD "    />
                          <?php endif; ?>
                        <?php else: ?>
                            <?php echo e($pr->sai_date ?? ''); ?>

                        <?php endif; ?>
                    </div>
                </div>

                  <div class="form-inline">
                    <div class="col-sm-6">
                      <!-- <div class="form-check"> -->
                      <?php if($pr->iau_verified == 1): ?>
                      <input type="checkbox" class="form-check-input" style="height: 30px; width: 30px;" name="verify_iau" id="verify_iau" required checked="checked">
                      <?php else: ?>
                      <input type="checkbox" class="form-check-input" style="height: 30px; width: 30px;" name="verify_iau" id="verify_iau" required>
                      <?php endif; ?>
                      <label class="form-check-label">VERIFIED BY IAU</label>
                      <!-- </div> -->

                      <label>ON </label>
                      <?php if(!is_null($pr->iau_vdate) && $pr->iau_vdate != ""): ?>
                      <input type="text" class="form-control datepicker" name="verify_iau_date" id="verify_iau_date" placeholder="<?php echo e(\Carbon\Carbon::parse($pr->iau_vdate)->format('Y-m-d')); ?>" value="<?php echo e(\Carbon\Carbon::parse($pr->iau_vdate)->format('Y-m-d')); ?>" required>
                      <?php else: ?>
                      <input type="text" class="form-control datepicker" name="verify_iau_date" id="verify_iau_date" placeholder="<?php echo e(\Carbon\Carbon::now()->format('Y-m-d')); ?>" value="<?php echo e(\Carbon\Carbon::now()->format('Y-m-d')); ?>" required>
                      <?php endif; ?>
                    </div>
                    
                    <div class="col-sm-6"> 
                      <!-- <div class="form-check"> -->
                      <?php if($pr->budget_verified == 1): ?>
                      <input type="checkbox" class="form-check-input" style="height: 30px; width: 30px;" name="verify_bo" id="verify_bo" required checked="checked">
                      <?php else: ?>
                      <input type="checkbox" class="form-check-input" style="height: 30px; width: 30px;" name="verify_bo" id="verify_bo" required>
                      <?php endif; ?>
                      <label class="form-check-label">VERIFIED BY BUDGET OFFICE </label>
                      <!-- </div> -->

                      <label>ON </label>
                      <?php if(!is_null($pr->budget_vdate) && $pr->budget_vdate != ""): ?>
                      <input type="text" class="form-control datepicker" name="verify_bo_date" id="verify_bo_date" placeholder="<?php echo e(\Carbon\Carbon::parse($pr->budget_vdate)->format('Y-m-d')); ?>" value="<?php echo e(\Carbon\Carbon::parse($pr->budget_vdate)->format('Y-m-d')); ?>" required>
                      <?php else: ?>
                      <input type="text" class="form-control datepicker" name="verify_bo_date" id="verify_bo_date" placeholder="<?php echo e(\Carbon\Carbon::now()->format('Y-m-d')); ?>" value="<?php echo e(\Carbon\Carbon::now()->format('Y-m-d')); ?>" required>
                      <?php endif; ?>
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
                             <?php if($edit_view === 'edit'): ?>
                                  <?php $__currentLoopData = $pr->pr_items()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php $total_price = $prs->unit_price  * $prs->qty; ?>
                                            <tr>
                                                  <td><?php echo e($count); ?><input type="hidden" name="item_id[]" value="<?php echo e($prs->id); ?>" /></td>
                                                  <td><textarea class="form-control hidden" placeholder="Description" name="item_desc[]"  style="word-wrap:break-word;"><?php echo e($prs->description); ?></textarea> <?php echo e($prs->description); ?></td>
                                                  <td><input class="form-control item_qty hidden" type="text" name="item_qty[]" value="<?php echo e($prs->qty); ?>"  /> <?php echo e($prs->qty); ?></td>
                                                 <td><input class="form-control hidden" type="text" name="item_unit[]" value="<?php echo e($prs->unit); ?>"  /> <?php echo e($prs->unit); ?></td>
                                                 <td><input class="form-control item_price text-right" type="text" name="item_price[]" value="<?php echo e($prs->unit_price); ?>" /></td>
                                                  <td><input class="form-control item_total_price text-right" type="text" name="item_total_price[]" disabled value="<?php echo e(number_format($total_price,2)); ?>" /></td>
                                            </tr>

                                     <?php $count++;  $unit_price_total += $prs->unit_price ; $sum_price_total +=$total_price; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php else: ?>
                                    <?php $__currentLoopData = $pr->pr_items()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $total_price = $prs->unit_price  * $prs->qty; ?>
                                            <tr>
                                                  <td><?php echo e($count); ?></td>
                                                  <td><?php echo e($prs->description); ?></td>
                                                  <td><?php echo e($prs->qty); ?>  </td>
                                                 <td> <?php echo e($prs->unit); ?> </td>
                                                 <td class="text-right"> <?php echo e(number_format($prs->unit_price,2)); ?> </td>
                                                  <td class="text-right"> <?php echo e(number_format($total_price,2)); ?> </td>
                                            </tr>
                                        <?php $count++;  $unit_price_total += $prs->unit_price ; $sum_price_total +=$total_price; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php endif; ?>

                             <tr>
                               <td colspan="5">Total</td>
                               <td id="sum_price_total" class="text-right"> <?php echo e(number_format($sum_price_total,2)); ?> </td>
                             </tr>

                          </tbody>

                    </table>
                    <?php echo e(csrf_field()); ?>

                    <?php if($edit_view === 'edit'): ?>
                    <button type="submit" name="cancel" class="btn btn-sm btn-default " value="cancel">Cancel</button>
                    <button  type="submit"  class="btn btn-sm btn-primary pull-right" id="update_btn" disabled="disabled"><i class="fa fa-save"></i> Update</button>
                      <?php endif; ?>
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



   <?php $__env->stopSection(); ?>

<?php $__env->startSection('plugins-script'); ?>
<script src="<?php echo e(asset('adminlte/plugins/autocomplete/')); ?>/jquery.autocomplete.min.js"></script>
<script src="<?php echo e(asset('adminlte/plugins/daterangepicker/')); ?>/moment.min.js"></script>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<?php echo $__env->make('department::purchase_request.js.edit-js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('plugins-css'); ?>
 <!-- Bootstrap time Picker -->
<link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/datepicker3.css">
  <!-- DataTables -->
<link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datatables/jquery.dataTables.min.css">

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template::admin-pages.menus.'.$template['menu'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>