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

              <button class="btn btn-success pull-right"  onclick="$(this).showAddModal();"><i class="fa fa-plus"></i></button>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
                     <table id="purchase_request_list" class="table table-bordered table-hover">
                          <thead>
                          <tr id="test">
                              <td></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                              <td><input type="text" class="form-control" /></td>
                        </tr>
                            <tr>
                              <th>No</th>
                               <th>Department</th>
                              <th>Purpose</th>
                              <th>PR NO</th>
                              <th>PR Date.</th>
                              <th>REQUEST DATE.</th>
                              <th>Action</th>
                            </tr>

                          </thead>
                          <tbody>

                          </tbody>

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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_purchase_request_modalLabel"> <span></span></h4>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <div id="contents-menu">
            <form class="form-horizontal" id="add_purchase_request">
            <input type="hidden" id="update_check_date" value="">
              <div class="box-body">
                <div id="statusC"></div>

                <div class="form-group">

                     <label for="pr_no" class="col-sm-2 control-label">DEPT.</label>
                      <div class="col-sm-6">
                        <input type="text"    class="form-control"   id="pr_dept_desc" name="pr_dept_desc"  placeholder="Dept" />
                        <input type="hidden" class="form-control" id="pr_dept_id" name="pr_dept_id" />
                        <input type="hidden" class="form-control" id="pr_dept_code" name="pr_dept_code"/>
                        <input type="hidden" class="form-control" id="pr_dept_subcode" name="pr_dept_subcode"/>

                    </div>

                     <label for="pr_no" class="col-sm-2 control-label">PR DATE. : </label>
                        <div class="col-sm-2">
                        <input type="text" class="form-control" id="pr_no_date" name="pr_no_date" placeholder="PR NO DATE" />
                    </div>
                </div>

                <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">PR NO.</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="pr_no_dis"  name="pr_no_dis"    placeholder="PR NO" disabled="true" />
                        <input type="hidden" class="form-control" id="pr_no"  name="pr_no"  />
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

                <!-- <div class="form-group">
                     <label for="supplier" class="col-sm-2 control-label">Supplier</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control item_supplier" id="supplier"  name="supplier"    placeholder="Supplier"  />
                        <input type="hidden" class="form-control" id="supplier_id"  name="supplier_id"  />
                    </div>
                </div>
 -->


                <button type="button" class="btn btn-success btn-sm pull-right" id="add_items"><i class="fa fa-plus"></i></button>

                <table class="table table-striped table-bordered" id="items_list">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Description</th>
                      <th>Remarks</th>
                      <th>Qty</th>
                      <th>unit</th>
                      <th>action</th>
                    </tr>
                  </thead>

                  <tbody>

                  </tbody>
                </table>


                <div id="other_content_b"></div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="button" class="btn btn-info pull-right" id="submit_butts" onclick="$(this).sentPurchaseRequest();">Submit</button>
              </div>
              <!-- /.box-footer -->
              <input type="hidden" name="removetx_items" id="removetx_items" value="">
              <input type="hidden" name="pr_id_update" id="pr_id_update" value="">
              <input type="hidden" name="has_change" id="has_change" value="0">
              <?php echo e(csrf_field()); ?>

            </form>

        </div>
      </div>
      <div class="modal-footer">

      </div>
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
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/table-header-search.js"></script>
<?php echo $__env->make('manager::request.js.index-js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
</style>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template::admin-pages.menus.'.$template['menu'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>