<?php $__env->startSection('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      GSO Code
      </h1>
    </section>



    <!-- Main content -->
    <section class="content">
<div class="row">
  <div class="col-md-6 col-sm-12">
          <div class="info-box">
            <div class="box-content">

            <ul class="list-unstyled">
            <?php $__currentLoopData = $codes['get_catcodes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="gso-codes blue">
                <a style="font-size: 20px">
                <span class="pull-right-container">
                                  <span class="label bg-yellow "><?php echo e($value->code_family); ?></span>
                                </span>
                  <strong><?php echo e(($value->cat_desc)); ?>  </strong>
                </a>
                 <ul class="gso-codes">
                 <?php $__currentLoopData = $codes['get_codes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($value->cat_id==$value2->cat_id): ?>
                       <li class="gso-codes ">
                        <a style="font-size: 20px">
                         <span class="pull-right-container">
                          <button type="button" onclick="$(this).delete_cat_list(<?php echo e($value2->code_list_id); ?> );"  class="btn btn-danger delete_cat_list"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                              <span class="label bg-light-blue "><?php echo e($value2->code_no); ?></span>
                          </span>
                          <strong><?php echo e(($value2->desc)); ?></strong>

                        </a>
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
              <h3 class="box-title">Add Category GSO CODE</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="add_gsocategory">
            <?php echo e(csrf_field()); ?>

              <div class="box-body">
              <div id="statusC"></div>
                <div class="form-group">
                  <label for="gso_code_desc" class="col-sm-4 control-label">Code Desc</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="gso_code_desc" name="gso_code_desc" placeholder="Code Desc">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default">Cancel</button>
                <button type="button" onclick="$(this).addGSOcategory();" class="btn btn-info pull-right">SAVE</button>
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
            <form class="form-horizontal" id="add_gsocodeitems">
            <?php echo e(csrf_field()); ?>

              <div class="box-body">
              <div id="statusCI"></div>
                <div class="form-group">
                  <label for="gso_code_category" class="col-sm-4 control-label">Category</label>
                  <div class="col-sm-8">
                    <select class="form-control" id="gso_code_category" name="gso_code_category">
                    <option></option>
                     <?php $__currentLoopData = $codes['get_catcodes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e(($value->cat_id)); ?>"><?php echo e(($value->cat_desc)); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="gso_subcode_family" class="col-sm-4 control-label">Desc</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="gso_codeitems_desc" name="gso_codeitems_desc" placeholder="Sub-Code Desc">
                  </div>
                </div>

                <div class="form-group">
                  <label for="gso_subcode_desc" class="col-sm-4 control-label">Useful Life</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="gso_codeitems_usefull_life"  name="gso_items_usefull_life" placeholder="Useful Life">
                  </div>
                </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default">Cancel</button>
                <button type="button" onclick="$(this).addGSOcodeitems();" class="btn btn-info pull-right">SAVE</button>
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
<script type="text/javascript">
  $.fn.addGSOcategory = function(){
       $.ajax({
                  type: "POST",
                  url: "<?php echo e(route('inventory.add_gsocategory')); ?>",
                  data : $('#add_gsocategory').serialize(),
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
                      location.reload();
                    }
                  }
            });
  };

  $.fn.addGSOcodeitems = function(){
      $.ajax({
                  type: "POST",
                  url: "<?php echo e(route('inventory.add_gsocodeitems')); ?>",
                  data : $('#add_gsocodeitems').serialize(),
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
                      $('#statusCI').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn();
                    }else{
                      $('#statusCI').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn();
                       location.reload();
                    }
                  }
            });
  };

  $.fn.delete_cat_list = function(id){
    var txt;
    var r = confirm("Are You sure you want to delete this records! ? ");
    if (r == true) {
      $.ajax({
          type: "GET",
          url: "<?php echo e(route('inv.delete_gso_category')); ?>",
          data : { category_id: id },
          dataType: "json",
          success: function(data){
            location.reload();
            // alert(data);
          }
        });
    }

    // alert(id);

  }


</script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('plugins-css'); ?>
  <style type="text/css">

    li.gso-codes {
       margin-bottom: 25px;
    }
    ul.list-unstyled > li.blue > a{
        color:#58020d;
    }
    li.gso-codes > a {
       color:#0e4202;
    }
    .bg-yellow{
      color:#000 !important;
    }
  </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template::admin-pages.menus.'.$template['menu'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>