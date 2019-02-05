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
                  
                  <div class="form-group row">
                     <label for="pr_no" class="col-sm-2 control-label">REQUEST DATE: </label>
                        <div class="col-sm-2">
                        <input type="hidden" name="pr_id" id="pr_id" value="<?php echo e($pr->id); ?>" />
                                  <?php echo e($pr->pr_date_dept); ?>

                    </div>
                </div>

                <div class="form-group row">
                     <label for="purpose" class="col-sm-2 control-label">DEPARTMENT : </label>
                      <div class="col-sm-10">
                       <input type="hidden" name="pr_dept_id" value="<?php echo e($pr->dept_id); ?>" />
                                  <?php echo e($pr->pr_dept->dept_desc); ?>

                    </div>
                </div>

                <div class="form-group row">
                     <label for="purpose" class="col-sm-2 control-label">PURPOSE : </label>
                      <div class="col-sm-10">
                                  <?php echo e($pr->pr_purpose); ?>

                    </div>
                </div>
                <?php if(count($ppmp) > 0): ?>
                <div class="form-group row">
                     <label for="purpose" class="col-sm-2 control-label">STATUS : </label>
                      <div class="col-sm-10">
                           Request is <b style="font-size:20px; <?php echo e(($ppmp->status == 0 ? 'color:#d42813;' : 'color:#33ad01;')); ?>"><?php echo e(($ppmp->status == 0 ? 'DECLINED' : 'APPROVED')); ?></b>.     
                      </div>
                </div>

                <div class="form-group row">
                     <label for="purpose" class="col-sm-2 control-label">PPMP NO. : </label>
                      <div class="col-sm-10">
                            <?php echo e($ppmp->ppmp_no); ?>

                    </div>
                </div>

                <div class="form-group row">
                     <label for="purpose" class="col-sm-2 control-label">PPMP DATE : </label>
                      <div class="col-sm-10">
                            <?php echo e(($ppmp->ppmp_date && $ppmp->ppmp_date != '1970-01-01' ? $ppmp->ppmp_date : '')); ?>

                    </div>
                </div>

                <div class="form-group row">
                     <label for="purpose" class="col-sm-2 control-label">REMARKS : </label>
                      <div class="col-sm-10">
                            <?php echo e($ppmp->remarks); ?>

                    </div>
                </div>
                <?php endif; ?>

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
                            

                             <tr>
                               <td colspan="5">Total</td>
                               <td id="sum_price_total" class="text-right"> <?php echo e(number_format($sum_price_total,2)); ?> </td>
                             </tr>

                          </tbody>

                    </table>
                    <?php echo e(csrf_field()); ?>


                        <button  type="button" onclick="$(this).PPMPApproval(<?php echo e($pr->id); ?>, 1);" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Approve</button>
                        <button  type="button" onclick="$(this).PPMPApproval(<?php echo e($pr->id); ?>, 0);" class="btn btn-sm btn-danger pull-right"><i class="fa fa-save"></i> Decline</button>


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


<div class="modal fade" id="approval_modal" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="item_group_header">Request Approval</h4>
        </div>
        <div class="modal-body">
          <div id="status"></div>
          <div id="contents-menu">
            <form class="form-horizontal" method="POST" id="approvalForm">
            <?php echo e(csrf_field()); ?>

              <div class="alert  alert-dismissible" id="ppmp_alert">
                  <h4><i class="icon fa fa-ban"></i> Are you sure to <span id="app_status"></span> request?</h4>
              </div>
              <div class="form-group ppmp_info hide">
                <label for="employee_name" class="col-sm-3 control-label">Date: </label>
                <div class="col-sm-8">
                      <input type="text" name="date" class="form-control datepicker" />
                </div>
              </div>
              <div class="form-group ppmp_info hide">
                <label for="employee_name" class="col-sm-3 control-label">PPMP No: </label>
                <div class="col-sm-8">
                      <input type="text" name="ppmp_no" id="remarks" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label for="employee_name" class="col-sm-3 control-label">Remarks : </label>
                <div class="col-sm-8">
                      <input type="text" name="remarks" id="remarks" class="form-control" />
                      <input type="hidden" name="approval" id="approval" class="form-control" />
                      <input type="hidden" name="pr_id" id="pr_id" class="form-control" value="<?php echo e($pr->id); ?>" />
                </div>
              </div>
              <div class="box-footer">
                  <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                  <button type="button" class="btn btn-info pull-right" id="submit_bac_committee" onclick="$(this).submitApproval();">Submit</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>



<?php $__env->startSection('plugins-script'); ?>
<script src="<?php echo e(asset('adminlte/plugins/autocomplete/')); ?>/jquery.autocomplete.min.js"></script>
<script src="<?php echo e(asset('adminlte/plugins/daterangepicker/')); ?>/moment.min.js"></script>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>

  $.fn.PPMPApproval = function(pr_id, status){
    $('#approval_modal').modal('show');
    $('#approval').val(status);
    $('#app_status').text((status == 0 ? 'DECLINE' : 'APPROVE'));
    if(status == 0){
      $('.ppmp_info').addClass('hide');
      $('#ppmp_alert').removeClass('alert-success');      
      $('#ppmp_alert').addClass('alert-danger');
    }else{
      $('.ppmp_info').removeClass('hide');
      $('#ppmp_alert').addClass('alert-success');   
      $('#ppmp_alert').removeClass('alert-danger');         
    }
  };

  $.fn.submitApproval = function(pr_id, status){
    var datax = $('#approvalForm').serialize();
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('bac.ppmp_approval')); ?>",
        data : datax,
        dataType: "json",
        success: function(data){
            var errors = '';
            location.reload();
        }
    });
  };
  

</script>
<?php echo $__env->make('department::purchase_request.js.edit-js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
</style>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('template::admin-pages.menus.'.$template['menu'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>