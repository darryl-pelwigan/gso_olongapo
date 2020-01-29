<?php $__env->startSection('content'); ?>

<style type="text/css">
/* The container */
.container {
  display: inline-block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  margin-left: 3%;
  width: 20%;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #00c0ef;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #00a65a;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
  
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         PURCHASE REQUEST
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12"  style="display: none;">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pending Purchase Requests</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php $__currentLoopData = $pr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <div class="row">
                      <label for="" class="col-sm-2 control-label">Purchase Request Date : </label>
                      <div class="col-sm-6 underline">
                        <?php echo e(date('F d, Y', strtotime($data->pr_date_dept))); ?>

                      </div>
                    </div>
                    <div class="row">
                      <label for="" class="col-sm-2 control-label">Purpose : </label>
                      <div class="col-sm-6 underline">
                        <?php echo e($data->pr_purpose); ?>

                      </div>
                    </div>
                    <div class="row">
                      <label for="" class="col-sm-2">Requests : </label>
                      <div class="col-sm-6">
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
                            <?php $count=1; ?>
                            <?php $__currentLoopData = $data->pr_items()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td><?php echo e($count); ?></td>
                                <td><?php echo e($prs->description); ?></td>
                                <td><?php echo e($prs->qty); ?></td>
                                <td><?php echo e($prs->unit); ?></td>
                                <td><?php echo e($prs->unit_price); ?></td>
                                <td><?php echo e($prs->unit_price  * $prs->qty); ?></td>
                               </tr>
                            <?php $count++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <br style="clear: both;">
                  </div>
                  <div class="panel-body">
                    <legend class="text-center">Purchase Request Status Tracking</legend>
                     <div class="container step-procedure">
                       <ul class="progress-indicator">
                          <li class="completed">
                              <span class="bubble"></span>
                              <i class="fa fa-check-circle"></i>
                              PR CREATED
                          </li>
                          <?= $currentstatus = ""; ?>
                          <?php if(count($status[$key]['ppmp']) > 0): ?>
                              <?php if($status[$key]['ppmp']->status == 1): ?>
                                <li class="completed">
                                <span class="bubble"></span>
                                <i class="fa fa-check-circle"></i>
                                  PPMP APPROVED
                                </li>
                              <?php else: ?>
                                <li class="declined">
                                <span class="bubble"></span>
                                <i class="fa fa-times-circle"></i>
                                PPMP DECLINED <br>
                                Remarks: <u><?php echo e($status[$key]['ppmp']->remarks); ?></u>
                                </li>
                                <?= $currentstatus = "Purchase request has been decline."; ?>
                              <?php endif; ?>
                          <?php else: ?>
                          <?php $currentstatus = "Pending PPMP Approval"; ?>
                          <li>
                              <span class="bubble"></span>
                              PPMP APPROVAL
                          </li>
                          <?php endif; ?>


                          <?php if($data->pr_no != null): ?>
                            <li class="completed">
                              <span class="bubble"></span>
                              PR NUMBER
                            </li>
                          <?php else: ?>
                            <li>
                              <span class="bubble"></span>
                              PR NUMBER
                            </li>
                            <?php $currentstatus = "Pending Purchase Number."; ?>
                          <?php endif; ?>

                          <?php if(count($status[$key]['abstract']) > 0): ?>
                            <li class="completed">
                              <span class="bubble"></span>
                              ABSTRACT
                            </li>
                          <?php else: ?>
                            <li>
                              <span class="bubble"></span>
                              ABSTRACT
                            </li>
                            <?php $currentstatus = "Pending Abstract Number."; ?>
                          <?php endif; ?>

                          <?php if(count($status[$key]['bac']) > 0): ?>
                            <li class="completed">
                              <span class="bubble"></span>
                              BAC APPROVAL
                            </li>
                          <?php else: ?>
                            <li>
                              <span class="bubble"></span>
                              BAC APPROVAL
                              <?php $currentstatus = "Pending BAC Control Number."; ?>
                            </li>
                          <?php endif; ?>

                          <?php if(count($status[$key]['po_no']) > 0): ?>
                            <li class="completed">
                              <span class="bubble"></span>
                              PO Number
                            </li>
                          <?php else: ?>
                            <li>
                              <span class="bubble"></span>
                              PO Number
                              <?php $currentstatus = "Pending Purchase Number."; ?>
                            </li>
                          <?php endif; ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>

       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchase Request List</h3>
              <button class="btn btn-success pull-right"  onclick="$(this).showAddModal();"><i class="fa fa-plus"></i> Add Request</button>

              <button class="btn btn-warning pull-right"  data-toggle="modal" data-target="#upload_modal"><i class="fa fa-upload"></i> Upload Request(.CSV)</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="" id="pr_delete_form">
                <table id="dept_pr_list" class="table table-bordered table-hover">
                    <thead>
                      <tr id="test">
                          <td></td>
                          <td><input type="text" class="form-control" /></td>
                          <td><input type="text" class="form-control" /></td>
                          <td><input type="text" class="form-control" /></td>
                          
                          <td></td>
                          <td class="delete_column hide"></td>
                      </tr>
                      <tr>
                          <th>No</th>
                          <th>Purpose</th>
                          <th>PR NO</th>
                          <th>Date Added</th>
                          
                          <th>Action</th>
                          <th class="delete_column hide">Delete</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                  <?php echo e(csrf_field()); ?>

                  <button class="btn btn-default"><input type="checkbox" id="delete_checkbutton"><b> Delete Purchase Request Record/s</b></button>
                  <button type="button" class="btn btn-danger delete_column hide"  name="delete" id="delete_prs" onclick="$(this).deletPRRequest();" disabled=""> <i class="fa fa-trash"></i> Confirm Purchase Request Deletion</button>
                </form>
            </div>
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
  <div class="modal-dialog modal-xlg" role="document">
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
                <?php if(count($uploads) > 0): ?>
                  <div class="alert alert-info" role="alert">
                    Kinldy check PPMP(Project Procurement Management Plan) before adding your request. <br>
                    To view your departments' PPMP click list/s below:<br>
                    <?php $__currentLoopData = $uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><a href="../public/ppmp/<?php echo e($file->file_upload); ?>" target="_blank"><?php echo e($file->remarks); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                <?php endif; ?>



                 <?php if(Session::get('olongapo_user')->group_id == 9): ?>
                  <div class="form-group">
                       <label for="pr_no" class="col-sm-2 control-label">REQUESTED BY : </label>
                          <div class="col-sm-6">
                          <select class="form-control" name="employee" id="employee">
                              <option></option>
                              <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value=<?php echo e($emp->id); ?>><?php echo e($emp->fname); ?> <?php echo e($emp->mname); ?> <?php echo e($emp->lname); ?> </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                  </div>
                <?php endif; ?>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="id2">Department:</label>
                    <div class="col-sm-6">
                      
                      <select class="form-control input-sm" name="select_dept" id="select_dept">
                          <option value=""></option>
                        <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($dept->id); ?>"> <?php echo e($dept->dept_desc); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </select>
                    </div>

                    <label for="pr_no" class=" col-sm-1 control-label">PR DATE: </label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control input-sm" id="pr_no_date" name="pr_no_date" placeholder="PR DATE" />
                    </div>
                </div>

                 <div class="form-group">
                     <label for="purpose" class="col-sm-2 control-label">Purpose : </label>
                      <div class="col-sm-6">
                        <textarea  class="form-control input-sm" id="purpose"  name="purpose" placeholder="Purpose" > </textarea>
                    </div>


                    <label class="container">Purely Consumption 
                      <input class="input-sm" type="checkbox" name="pc" value=1>
                      
                      <span class="checkmark"></span>
                    </label>
                </div>

                <div class="form-group">
                    <label for="requested_by" class="col-sm-2 control-label">Requested By: </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="requested_by" name="requested_by" placeholder="" />
                    </div>        
                </div>

                <button type="button" class="btn btn-success btn-sm pull-right" id="add_items"><i class="fa fa-plus"></i></button>

                <table class="table table-striped table-bordered" id="items_list">
                  <thead>
                    <tr>
                      <th>Description</th>
                      <th>Qty</th>
                      <th>Unit</th>
                      <th>Unit Price</th>
                      <th>Total Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>

                  </tbody>
                </table>


                <div id="other_content_b"></div>


              </div>
              <!-- /.box-body -->
              
              <div class="box-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Cancel</button>
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


<div class="modal fade" id="upload_modal" tabindex="-1" role="dialog" aria-labelledby="upload_modal">
  <div class="modal-dialog modal-xlg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title"></h4>
      </div>
      <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo e(route('dept.import_pr')); ?>">
        <?php echo e(csrf_field()); ?>

      <div class="modal-body">
          <div class="form-group">
                    <label class="control-label col-sm-2" for="id2">Department:</label>
                    <div class="col-sm-6">
                      
                      <select class="form-control" name="import_select_dept" id="import_select_dept" required="">
                          <option value=""></option>
                        <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($dept->id); ?>"> <?php echo e($dept->dept_desc); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </select>
                    </div>

                  <label for="import_pr_no_date" class=" col-sm-1 control-label">PR DATE: </label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control datepicker" id="import_pr_no_date" name="import_pr_no_date" placeholder="PR DATE" required="" />
                  </div>
                  </div>

                 <div class="form-group">
                     <label for="purpose" class="col-sm-2 control-label">Purpose : </label>
                      <div class="col-sm-6">
                        <textarea  class="form-control date_picker" id="import_purpose"  name="import_purpose"  placeholder="Purpose" required=""> </textarea>
                    </div>


                    <label class="container">Purely Consumption 
                      <input type="checkbox" name="import_pc" value=1>
                      
                      <span class="checkmark"></span>
                    </label>
                </div>

                <div class="form-group">
                     <label for="import_requested_by" class="col-sm-2 control-label">Requested By: </label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="requested_by" name="import_requested_by" placeholder="" required="" />
                    </div>
                </div>

           <div class="form-group">
            <label class="control-label col-sm-2" for="document_excel">File/Document: </label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="document_excel" name="document_excel" required="" accept=".xls, .xlsx, .csv">
            </div>
          </div>
      </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn btn-success">
            <span id="" class=' glyphicon glyphicon-upload'> </span> Import
          </button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Close
          </button>
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
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/table-header-search.js"></script>

<?php echo $__env->make('department::purchase_request.js.index-js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('plugins-css'); ?>
 <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/datepicker3.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('progress')); ?>/progress-wizard.min.css">

  <style type="text/css">

    .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
    .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
    .autocomplete-selected { background: #F0F0F0; }
    .autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
    .autocomplete-group { padding: 2px 5px; }
    .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
    .select2-container{ width:100% !important; }
    .modal-xlg {
      width: 98%;
    }
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
    .textarea{
      width: 98% !important;
      margin: 0 auto;
    }
    .td-sm{
      width: 9%;
    }
    .underline{
      border-bottom: 1px solid;
    }
    /*TRACKING STYLES*/
      .progress-indicator>li.declined .bubble, .progress-indicator>li.declined .bubble:after, .progress-indicator>li.declined .bubble:before {
      background-color: #d6452e;
      border-color: #e64026;
  }

  .progress-indicator>li.declined, .progress-indicator>li.declined .bubble {
    color: #d6452e;
}
.progress-indicator {
    margin: 0 0 1em;
    padding: 0;
    font-size: 90%;
    text-transform: uppercase;
}

  </style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template::admin-pages.menus.'.$template['menu'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>