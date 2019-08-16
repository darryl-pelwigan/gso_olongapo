<?php $__env->startSection('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Purchase Request
      </h1>
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchase Request List</h3>

              <!-- <button class="btn btn-success pull-right"  onclick="$(this).showAddModal();"><i class="fa fa-plus"></i></button> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <table id="purchase_request_list" class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Description</th>
                          <th>PR NO</th>
                          <th>PR Date.</th>
                         <!--  <th>PR COUNT</th> -->
                          <th>PR Dept</th>
                          <th>PR Sub-Dept</th>
                          <th>Qty</th>
                          <th>Unit</th>
                          <th>Action</th>
                        </tr>

                      </thead>
                      <tbody>

                      </tbody>
                      <tfoot>
                             <tr>
                                <th>No</th>
                                <th>Description</th>
                                 <th>PR NO</th>
                                 <th>PR Date.</th>
                                <!-- <th>PR COUNT</th> -->
                                <th>PR Dept</th>
                                <th>PR Sub-Dept</th>
                                <th>Qty</th>
                                <th>Unit</th>
                              </tr>
                      </tfoot>
                </table>
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
<div class="modal fade" id="add_purchase_request_modal" tabindex="-1" role="dialog" aria-labelledby="add_purchase_request_modalLabel">
  <div class="modal-dialog modal-lg" role="document" id="abstract-modal">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_purchase_request_modalLabel"> <span></span></h4>
      </div>
      <form class="form-horizontal" id="add_purchase_request">
        <div class="modal-body">
          <div id="status"></div>
          <div id="contents-menu">
              <input type="hidden" id="update_check_date" value="">
                <div class="box-body">
                  <div id="statusC"></div>

                  <div class="form-group">

                       <label for="pr_no" class="col-sm-2 control-label">DEPT.</label>
                        <div class="col-sm-6">
                          <input type="text"    class="form-control"   id="pr_dept_desc" name="pr_dept_desc"  placeholder="Dept" disabled="true" />
                          <input type="hidden" class="form-control" id="pr_dept_id" name="pr_dept_id" />
                          <input type="hidden" class="form-control" id="pr_dept_code" name="pr_dept_code"/>
                          <input type="hidden" class="form-control" id="pr_dept_subcode" name="pr_dept_subcode"/>

                      </div>

                       <label for="pr_no" class="col-sm-2 control-label">PR DATE. : </label>
                          <div class="col-sm-2">
                          <input type="text" class="form-control" id="pr_no_date" name="pr_no_date" placeholder="PR NO DATE" disabled="true" />
                      </div>
                  </div>

                  <div class="form-group">
                       <label for="pr_no" class="col-sm-2 control-label">PR NO.</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="pr_no_dis"  name="pr_no_dis"    placeholder="PR NO" disabled="true" />
                          <input type="hidden" class="form-control" id="pr_no"  name="pr_no" disabled="true"  />
                      </div>
                  </div>

                 <div class="form-group">
                       <label for="obr_no" class="col-sm-2 control-label">OBR NO.</label>
                        <div class="col-sm-6">
                          <input type="text"    class="form-control"   id="obr_no" name="obr_no"  placeholder="OBR NO." />
                      </div>
                       <label for="obr_date" class="col-sm-2 control-label">OBR DATE : </label>
                          <div class="col-sm-2">
                          <input type="text" class="form-control" id="obr_date" name="obr_date" placeholder="OBR DATE" />
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="absctrct_no" class="col-sm-2 control-label">ABSTRACT NO.</label>
                        <div class="col-sm-6">
                         <input type="text" class="form-control" id="absctrct_no"  name="absctrct_no"    placeholder="ABSTRACT NO"  disabled="true"  />
                      </div>
                       <label for="absctrct_date" class="col-sm-2 control-label">ABSTRACT DATE : </label>
                          <div class="col-sm-2">
                          <input type="text" class="form-control" id="absctrct_date" name="absctrct_date" placeholder="ABSTRACT DATE" />
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="absctrct_no" class="col-sm-2 control-label">PROCUREMENT TYPE:</label>
                        <div class="col-sm-6">
                          <select class="form-control" name="proc_type" id="proc_type">
                              <option value="">SELECT PROCUREMENT</option>
                              <?php $__currentLoopData = $proc_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proc_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($proc_method->id); ?>" ><?php echo e($proc_method->proc_title.' ('.$proc_method->proc_min_value.' - '.$proc_method->proc_max_value.')'); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                  </div>

                  <button type="button" onclick="$(this).addSupplier();" class="btn btn-success btn-sm pull-right" id="add_supplier"><i class="fa fa-plus"></i> Add Supplier</button>

                  <table class="table table-striped" id="items_list">
                    <thead>

                    </thead>

                    <tbody>

                    </tbody>
                  </table>


                  <div id="other_content_b"></div>
              
                 
                </div>
                <!-- /.box-footer -->
                <input type="hidden" name="removetx_items" id="removetx_items" value="">
                <input type="hidden" name="pr_id_update" id="pr_id_update" value="">
                <input type="hidden" name="has_change" id="has_change" value="0">
                <?php echo e(csrf_field()); ?>

          </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
            <button type="button" class="btn btn-info pull-right" id="submit_butts" onclick="$(this).sentPurchaseRequest();">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

   <?php $__env->stopSection(); ?>





<?php $__env->startSection('plugins-script'); ?>
<script src="<?php echo e(asset('adminlte/plugins/autocomplete/')); ?>/jquery.autocomplete.min.js"></script>
<script src="<?php echo e(asset('adminlte/plugins/daterangepicker/')); ?>/moment.min.js"></script>
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/accounting/accounting.min.js"></script>
<?php echo $__env->make('abstrct::abstrct.js.index-js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('plugins-css'); ?>
 <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/datepicker3.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datatables/jquery.dataTables.min.css">

<style type="text/css">
.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; width: 20% !important; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
.select2-container{ width:100% !important; }

table>thead>tr#test>th>input,table>tfoot>tr>th>input{
  width: 100%;
}

#update-remarks
{
    max-height: 360px;
    background: #e4eaf1;
    overflow-y: overlay;
    padding: 3px 16px 9px;
}

#update-remarks p.lead {
    font-size: 15px;
    padding-left: 20px;
    text-indent: -13px;
}

#update-remarks mark{
    font-size: 12px;
    background-color: #f9f8f4;
    padding: 3px;
    color: #8e8b8b;

}

#abstract-modal{
    width: 97%;
}

.box-body{
  overflow-x: auto;
}
.select_supplier{
  background: #00a65a;
}

</style>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template::admin-pages.menus.'.$template['menu'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>