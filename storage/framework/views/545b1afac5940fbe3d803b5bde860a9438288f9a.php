<?php $__env->startSection('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      PPE Code
      </h1>
    </section>



    <!-- Main content -->
    <section class="content">
<div class="row">
  <div class="col-md-6 col-sm-12">
          <div class="info-box">
            <div class="info-box-content">
                <ul class="list-unstyled">
            <?php $__currentLoopData = $codes['get_catcodes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="ppe-codes blue">
                <a style="font-size: 20px">
                <span class="pull-right-container">
                                  <span class="label bg-yellow "></span>
                                </span>
                  <strong><?php echo e(($value->cat_desc)); ?></strong>
                </a>
                 <ul class="ppe-codes">
                       <?php $__currentLoopData = $codes['get_subcatcodes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($value->cat_id==$value2->cat_id): ?>
                             <li class="ppe-codes ">
                              <a style="font-size: 20px">
                               <span class="pull-right-container">
                                    <span class="label bg-dark-blue "><?php echo e($value2->code_family); ?></span>
                                  </span>
                                  <strong><?php echo e(($value2->subcat_desc)); ?> <i>(<?php echo e(($value2->code_coa)); ?>)</i></strong>

                                  </a>

                                   <ul class="ppe-items">
                                         <?php $__currentLoopData = $codes['get_items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value2->subcat_id==$value3->ppe_subcat_id): ?>
                                               <li class="ppe-items ">
                                                <a style="font-size: 20px">
                                                 <span class="pull-right-container">
                                                    <button type="button" onclick="$(this).delete_ppe_code(<?php echo e($value3->ppeitems_id); ?>);"  class="btn btn-danger delete_ppe_code"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                      <span class="label bg-light-blue "><?php echo e(sprintf("%02d", $value3->code_no)); ?></span>
                                                    </span>
                                                    <strong><?php echo e(($value3->ppeitems_desc)); ?></strong>

                                                    </a>
                                               </li>
                                             <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </ul>
                          </li>
                           <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </ul>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

  </div>

  <div class="col-md-6 col-sm-12">
     <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Category PPE CODE</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="add_ppecategory"  >
            <?php echo e(csrf_field()); ?>

              <div class="box-body">
               <div id="statusC"></div>
                <div class="form-group">
                  <label for="PPE_code_desc" class="col-sm-4 control-label">Code Desc</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="PPE_code_desc" name="PPE_code_desc" placeholder="Code Desc">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default">Cancel</button>
                <button type="button" onclick="$(this).addPPEcategory();" class="btn btn-info pull-right">SAVE</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->

          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Sub-Category PPE CODE</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="add_ppesubcategory">
             <?php echo e(csrf_field()); ?>

              <div class="box-body">
              <div id="statusSC"></div>
                <div class="form-group">
                  <label for="PPE_code_category" class="col-sm-4 control-label">Category</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control PPE_code_category" id="PPE_code_category" name="PPE_code_category" placeholder="Code Desc">
                  </div>
                </div>

                <div class="form-group">
                  <label for="PPE_subcode_desc" class="col-sm-4 control-label">Sub-Code Desc</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="PPE_subcode_desc" name="PPE_subcode_desc" placeholder="Sub-Code Desc">
                  </div>
                </div>
                <div class="form-group">
                  <label for="PPE_subcode_coa" class="col-sm-4 control-label">COA CODE</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="PPE_subcode_coa" name="PPE_subcode_coa" placeholder="Sub-Code COA">
                  </div>
                </div>

                <div class="form-group">
                  <label for="PPE_subcode_family" class="col-sm-4 control-label">Sub-Code Family NO</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="PPE_subcode_family" name="PPE_subcode_family" placeholder="Sub-Code Number">
                  </div>
                </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default">Cancel</button>
                <button type="button" onclick="$(this).addPPEsubcategory();" class="btn btn-info pull-right">SAVE</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->


           <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Items</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="add_ppeitems">
            <?php echo e(csrf_field()); ?>

              <div class="box-body">
              <div id="statusItems"></div>
                <div class="form-group">
                  <label for="PPE_subcode_desc2" class="col-sm-4 control-label">Sub-Category</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="PPE_subcode_desc2"  placeholder="Sub-Code Desc">
                    <input type="hidden" id="PPE_subcode_desc2-test" name="PPE_subcode_desc2">
                  </div>
                </div>

                <div class="form-group">
                  <label for="PPE_subcode_family" class="col-sm-4 control-label">Desc</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="PPE_item_desc" name="PPE_item_desc" placeholder="Item Desc">
                  </div>
                </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default">Cancel</button>
                <button type="button" onclick="$(this).addPPEitems();" class="btn btn-info pull-right">SAVE</button>
              </div>
              <!-- /.box-footer -->
            </form>
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
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
  $('#example1').DataTable();


  $('.PPE_code_category').autocomplete({
        serviceUrl: '<?php echo e(route("inventory.get_ppecodes")); ?>',
        dataType: 'json',
        type: 'POST',
        params : {
                  _token : '<?php echo e(csrf_token()); ?>'
        },
        onSelect: function (suggestion) {

        }
  });
  $('#PPE_subcode_desc2').keydown(function(){
    var x = $('#PPE_code_category2-test').val();
        $('#PPE_subcode_desc2').autocomplete({
            serviceUrl: '<?php echo e(route("inventory.get_ppesubcodes")); ?>',
            dataType: 'json',
            type: 'POST',
            params : {
                      cat_desc : x,
                      _token : '<?php echo e(csrf_token()); ?>'
            },
            onSelect: function (suggestion) {
                $('#PPE_subcode_desc2-test').val(suggestion.data);
            }
      });
  });




  $.fn.addPPEcategory = function(){
       $.ajax({
                  type: "POST",
                  url: "<?php echo e(route('inventory.add_ppecategory')); ?>",
                  data : $('#add_ppecategory').serialize(),
                  dataType: "json",
                  error: function(){
                      alert('error');
                  },
                  success: function(data){
                    var errors = '';
                    if(data['status']==0){
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                        }
                      $('#statusC').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn();
                    }else{
                      $('#statusC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn();
                    }
                  }
            });
  };

  $.fn.addPPEsubcategory = function(){
       $.ajax({
                  type: "POST",
                  url: "<?php echo e(route('inventory.add_ppesubcategory')); ?>",
                  data : $('#add_ppesubcategory').serialize(),
                  dataType: "json",
                  error: function(){
                      alert('error');
                  },
                  success: function(data){
                    var errors = '';
                    if(data['status']==0){
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                        }
                      $('#statusSC').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn();
                    }else{
                      $('#statusSC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn();
                    }
                  }
            });
  };

   $.fn.addPPEitems = function(){


     $.ajax({
                  type: "POST",
                  url: "<?php echo e(route('inventory.add_ppeitems')); ?>",
                  data : $('#add_ppeitems').serialize(),
                  dataType: "json",
                  error: function(){
                      alert('error');
                  },
                  success: function(data){
                    var errors = '';
                    if(data['status']==0){
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                        }
                      $('#statusItems').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn();
                    }else{
                      $('#statusItems').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn();
                    }
                  }
            });
  };


  $.fn.delete_ppe_code = function(id){
    var txt;
    var r = confirm("Are You sure you want to delete this records! ? ");
    if (r == true) {
      $.ajax({
        type: "GET",
        url: "<?php echo e(route('delete.ppe_code')); ?>",
        data : { id: id },
        dataType: "json",
        success: function(data){
          location.reload();
        }
      });

    }
  }
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('plugins-css'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datatables/dataTables.bootstrap.css">

  <style type="text/css">
    .info-box-content{
      margin-left : 0px;
    }

    ul.list-unstyled > li a strong {
        font-weight: 600;
    }

    ul.list-unstyled > li{
      border-bottom: 2px solid #656565;
    }

    li.ppe-codes,li.ppe-items {
      margin-top: 15px;
      margin-bottom: 15px;
    }
    ul.list-unstyled > li.blue > a{
        color:#023058;
    }
    li.ppe-codes > a {
       color:#483644;
    }
    li.ppe-items > a {
       color:#00a65a;
    }
    .bg-dark-blue{
          background-color: #16232b !important;
    }

.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
.select2-container{ width:100% !important; }
  </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template::admin-pages.menus.'.$template['menu'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>