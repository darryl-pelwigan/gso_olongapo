<?php $__env->startSection('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      PPE MONTHLY REPORT
      </h1>
    </section>



    <!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info box-shadow">
            <div class="box-header">
              <h3 class="box-title">Purchase Order List</h3>



            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <?php echo $__env->make('template::admin-layouts.includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
           <form class="form-horizontal" id="new_ppe_mnthly" method="POST" action="<?php echo e(route('inv.save_monthly_report_new')); ?>">
                    <div class="form-group">
                      <label for="type_es" class="col-sm-3 control-label">TYPE OF Inventory</label>
                             <div class="col-sm-6">
                              <div class="radio">
                                <label>
                                  <input type="radio" class="set-control-number" name="type_es" id="type_es1" value="Supplies" checked="">
                                     SUPPLIES
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" class="set-control-number" name="type_es" id="type_es2" value="Equipement">
                                  EQUIPEMENT
                                </label>
                              </div>
                            </div>
                    </div>


                      <?php 
                        // dd($po->pr_orderno->po_no);
                       ?>

                    <div class="form-group">
                        <label for="date_log" class="col-sm-3 control-label">Date Log : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control  set-control-number" id="date_log"   name="date_log"   placeholder="Date Log Y-m-d"  value="<?php echo e(old('date_log') ?  old('date_log') : date('Y-m-d')); ?>" />
                        </div>
                    </div>


                    <div class="form-group">
                            <label for="payment_price" class="col-sm-3 control-label">Department</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="dept" name="dept" placeholder="Department" value="<?php echo e($bac->pr->pr_dept->dept_desc); ?>"  readonly>
                              <input type="hidden" class="form-control" id="pr_sdept_id" name="pr_sdept_id"  value="<?php echo e($bac->pr->pr_dept->id); ?>" >
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="control_no" class="col-sm-3 control-label">Control # : </label>
                        <div class="col-sm-6">
                          <input type="text"  class="form-control  " id="control_no"   name="control_no"   placeholder="Control # " readonly value="<?php echo e(old('control_no')); ?>" />
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="item_pono" class="col-sm-3 control-label">PO Number : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control " id="item_pono"   name="item_pono"   placeholder="PO Number" value="<?php echo e($bac->pr->pr_orderno->po_no); ?>" readonly/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="item_supplier" class="col-sm-3 control-label"> SUPPLIER: </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control item_supplier"  name="item_supplier" value="<?php echo e($bac->abstrct_supplier->supplier->title); ?>"   /><input type="hidden" class="form-control"  name="item_supplier_id"  value="<?php echo e($bac->abstrct_supplier->supplier->id); ?>"  />
                        </div>
                    </div>




                        <div class="table-responsive" >
                        <div class="form-group" style="margin: 0;">
                          <table class="table table-bordered table-striped " id="ppe-mnthly-report-items-add">
                              <thead>
                                <tr>
                                      <th>DESCRIPTION</th>
                                      <th>PROPERTY CODE</th>
                                       <th>UNIT</th>
                                        <th>QTY</th>
                                      <th>UNIT VALUE</th>
                                      <th>TOTAL VALUE</th>
                                      <th>ACCOUNTABLE PERSON</th>
                                      <th>INVOICE</th>
                                </tr>
                              </thead>

                              <tbody>
                                <?php $__currentLoopData = $bac->abstrct_supplier->abstrct_supplier_approved; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <?php 
                                    // dd($items->prices->unit_price);
                                   ?>
                                         <tr id="tr_1">
                                              <input type="hidden" class="form-control"  name="item_id[]" value="<?php echo e($items->pr_item->id); ?>" />
                                              <td><textarea   class="form-control" name="item_desc[]" readonly><?php echo e($items->pr_item->description); ?></textarea></td>
                                              <td><input type="text" class="form-control"  name="item_property_code[]" value="" /></td>
                                              <td><input type="text" class="form-control"  name="item_unit[]" value="<?php echo e($items->pr_item->unit); ?>" readonly  /></td>
                                              <td><input type="text" class="form-control item_qty"  name="item_qty[]" style="width: 60px;padding-right: 2px;" value="<?php echo e($items->pr_item->qty); ?>" readonly /></td>
                                              <td><input type="text" class="form-control item_unit_value"  name="item_unit_value[]" style="width: 100px;" value="<?php echo e($items->prices->unit_price); ?>" readonly /></td>
                                              <td><input type="text" class="form-control"  name="item_total_value[]" style="width: 100px;" disabled="" value="<?php echo e($items->prices->unit_price * $items->pr_item->qty); ?>" readonly /></td>
                                              <td><input type="text" class="form-control item_accountable_person"  name="item_accountable_person[]"  /> <input type="hidden" class="form-control"  name="item_accountable_person_id[]" /> </td>
                                              <td><input type="text" class="form-control"  name="item_invoice[]" value="" /></td>
                                          </tr> --}}
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              </tbody>

                          </table>
                             </div>
                        </div>
      <?php echo e(csrf_field()); ?>


                          <button type="submit" class="btn btn-success" onclick="$(this).submitPPEMnthly();">Save</button>

  </form>

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
 <!-- validator http://bootstrapvalidator.com/ -->
  <script type="text/javascript" src="<?php echo e(asset('adminlte')); ?>/plugins/bootstrap-validator2/dist/js/bootstrapValidator.js"></script>

<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/table-header-search.js"></script>
<script src="//cdn.rawgit.com/ashl1/datatables-rowsgroup/v1.0.0/dataTables.rowsGroup.js"></script>
<script src="<?php echo e(asset('adminlte/plugins/autocomplete/')); ?>/jquery.autocomplete.min.js"></script>
<?php echo $__env->make('inventory::ppe-mnthly.ajax-content.new_js_pr', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('plugins-css'); ?>
 <!-- Bootstrap time Picker -->
<link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/datepicker3.css">
<link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/lightbox2/css/lightbox.css">
<style type="text/css">

.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; width: 20% !important; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
.select2-container{ width:100% !important; }


</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template::admin-pages.menus.'.$template['menu'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>