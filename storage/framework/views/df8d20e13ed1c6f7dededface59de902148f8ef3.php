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
          <form action="" method="POST" id="pr_form">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Post Inspection Repair Form </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div id="statusC"></div>
                  <div class="form-group row">
                     <label for="pr_no" class="col-sm-3 control-label">REQUEST DATE: </label>
                        <div class="col-sm-3">
                        <input type="hidden" name="pr_id" id="pr_id" value="<?php echo e($pr->id); ?>" />
                         <?php echo e($pr->pr_date_dept); ?>

                         <input type="hidden" name="post_inspection_id" id="post_inspection_id" value="<?php echo e((isset($inspection->id) ? $inspection->id : '')); ?>" />
                         <?php echo e($pr->pr_date_dept); ?>

                    </div>
                </div>

                <div class="form-group row">
                     <label for="purpose" class="col-sm-3 control-label">DEPARTMENT : </label>
                      <div class="col-sm-10">
                        <?php echo e($pr->pr_dept->dept_desc); ?>

                    </div>
                </div>

                <div class="form-group row">
                     <label for="purpose" class="col-sm-3 control-label">PURPOSE : </label>
                      <div class="col-sm-10">
                         <?php echo e($pr->pr_purpose); ?>

                    </div>
                </div>

                <div class="form-group row">
                     <label for="purpose" class="col-sm-3 control-label">Equipment Make&Model : </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="equimentmodel" id="equimentmodel" value="<?php echo e((isset($inspection->equimentmodel) ? $inspection->equimentmodel : '')); ?>" />
                    </div>
                </div>
                <div class="form-group row">
                     <label for="purpose" class="col-sm-3 control-label">Model/Plate no. : </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="modelplate" id="modelplate" value="<?php echo e((isset($inspection->modelplate) ? $inspection->modelplate : '')); ?>" />
                    </div>
                </div>

                <div class="form-group row">
                     <label for="purpose" class="col-sm-3 control-label">Date of Repair: </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control datepicker" name="daterepair" id="daterepair" value="<?php echo e((isset($inspection->daterepair) ? $inspection->daterepair : '')); ?>" />
                    </div>
                </div>


                <div class="form-group row">
                     <label for="purpose" class="col-sm-3 control-label">Post Inspection Report No. : </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="post_inspection_report_no" id="post_inspection_report_no" value="<?php echo e((isset($inspection->post_inspection_report_no) ? $inspection->post_inspection_report_no : '')); ?>" />
                    </div>
                </div>


                <div class="form-group row">
                     <label for="purpose" class="col-sm-3 control-label">End User : </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="end_user" id="end_user" value="<?php echo e((isset($inspection->end_user) ? $inspection->end_user : '')); ?>" />
                    </div>
                </div>
                <div class="form-group row">
                     <label for="purpose" class="col-sm-3 control-label">Nam& Address of Repair Store : </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="name_address_repair_store" id="name_address_repair_store" value="<?php echo e((isset($inspection->name_address_repair_store) ? $inspection->name_address_repair_store : '')); ?>" />
                    </div>
                </div>
                <div class="form-group row">
                     <label for="purpose" class="col-sm-3 control-label">Date : </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control datepicker" name="date_inspection_report" id="date_inspection_report" value="<?php echo e((isset($inspection->date_inspection_report) ? $inspection->date_inspection_report : '')); ?>" />
                    </div>
                </div>
                <div class="form-group row">
                     <label for="purpose" class="col-sm-3 control-label">Date of LTO Registration(for vehicle) : </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control datepicker" name="date_lto_reg" id="date_lto_reg" value="<?php echo e((isset($inspection->date_lto_reg) ? $inspection->date_lto_reg : '')); ?>" />
                    </div>
                </div>
                <div class="form-group row">
                     <label for="purpose" class="col-sm-3 control-label">Date Acquired. : </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control datepicker" name="date_acquired" id="date_acquired" value="<?php echo e((isset($inspection->date_acquired) ? $inspection->date_acquired : '')); ?>" />
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
                          <th>Add</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $count=1; $unit_price_total=0; $sum_price_total=0; ?>
                            <?php $__currentLoopData = $pr->pr_items()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $total_price = $prs->unit_price  * $prs->qty; ?>
                                    <tr <?php echo e((in_array($prs->id, $inspection_ids) ? 'class=highlight' : '')); ?> >
                                          <td><?php echo e($prs->description); ?></td>
                                          <td><?php echo e($prs->description); ?></td>
                                          <td><?php echo e($prs->qty); ?>  </td>
                                          <td> <?php echo e($prs->unit); ?> </td>
                                          <td class="text-right"> <?php echo e(number_format($prs->unit_price,2)); ?> </td>
                                          <td class="text-right"> <?php echo e(number_format($total_price,2)); ?> </td>
                                          <td>
                                              <?php if(in_array($prs->id, $inspection_ids)): ?>
                                                 <button class="btn btn-xs btn-danger" type="button" onclick="$(this).deletePIItems(<?php echo e($prs->id); ?>, <?php echo e((isset($inspection->id) ? $inspection->id : 0)); ?>);"> <i class="fa fa-trash"></i> Delete</button>   
                                              <?php else: ?>
                                                <input type="checkbox" name="items[]"  id="item_<?php echo e($prs->id); ?>" onclick="$(this).clickItems(<?php echo e($prs->id); ?>);"  value="<?php echo e($prs->id); ?>"> Add
                                              <?php endif; ?>
                                          </td>
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


                        
                        <button  type="button" onclick="$(this).submitPostInspection();" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Submit</button>
                       </form>
                       <form action="<?php echo e(route('bac.generate-inspection')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <?php if(isset($inspection->id)): ?>
                            <input type="hidden" name="inspct_id" value="<?php echo e($inspection->id); ?>">
                           <button class="btn btn-sm btn-success pull-right" type="submit"> <i class="fa fa-file"></i> Export to PDF</button>   
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
<script>


  $.fn.submitPostInspection = function(){
    var datax = $('#pr_form').serialize();
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('bac.submit-inspection')); ?>",
        data : datax,
        dataType: "json",
        success: function(data){
            var errors = '';
            if(data['status']==0){
               for(var key in data['errors']){
                   errors += data['errors'][key]+'<br />';
                }
                $('#statusC').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
            }else{
              $('#statusC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                location.reload();
            }
        }
    });
  };
  
  $.fn.clickItems = function(item_id){
      if($('#item_'+item_id+':checked').length > 0){
        $('#item_'+item_id).closest('tr').addClass('highlight');
      }else{
        $('#item_'+item_id).closest('tr').removeClass('highlight');
      }
  };

  $.fn.deletePIItems = function(pr_id, inspct_id){
      var x = confirm("Are you sure to delete this file?");
      if(x){
        $.ajax({
              type: "POST",
              url: "<?php echo e(route('bac.delete-inspection-item')); ?>",
              data : {
                inspct_id : inspct_id,
                pr_id : pr_id,
                _token : '<?php echo e(csrf_token()); ?>'
              },
              dataType: "json",
              success: function(data){
                alert("Item deleted successfully.")
                 location.reload();
              }
        });
      }
  }



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
  .highlight{
    background: #45b543 !important;
  }
</style>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('template::admin-pages.menus.'.$template['menu'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>