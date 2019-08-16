<!-- jQuery 2.2.3 -->
<script src="<?php echo e(asset('adminlte')); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo e(asset('adminlte')); ?>/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo e(asset('adminlte')); ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('adminlte')); ?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('adminlte')); ?>/dist/js/adminlte.min.js"></script>
<script src="<?php echo e(asset('adminlte-custom')); ?>/js/benms_script.app.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

<script type="text/javascript">
    $.fn.closeModal = function(el){
        $('#'+el).delay(5000).modal('hide');
        $('#'+el+' #statusC .alert').delay(1000).fadeOut();
    };
</script>