<!doctype html>
<html>
<head>
           <title><?php echo e($template['page_title']); ?></title>
        <?php echo $__env->make('template::login.includes.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- plugins css place after main css is loaded -->
            <?php echo $__env->yieldContent('plugins-css'); ?>
</head>
<body class="hold-transition login-page">
<!-- Site wrapper -->
<div class="wrapper">

            <?php echo $__env->yieldContent('content'); ?>


</div>
        <!-- js placed at the end of the document so the pages load faster -->
        <?php echo $__env->make('template::top-nav.includes.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- plugins script place after maing js is loaded -->
            <?php echo $__env->yieldContent('plugins-script'); ?>

</body>
</html>