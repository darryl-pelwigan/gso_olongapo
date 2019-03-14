<!doctype html>
<html>
<head>
           <title><?php echo e($template['page_title']); ?> </title>
        <?php echo $__env->make('template::pdf.includes.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- plugins css place after main css is loaded -->
            <?php echo $__env->yieldContent('plugins-css'); ?>
</head>
<body>
<?php echo $__env->yieldContent('header'); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('template::pdf.includes.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- plugins script place after maing js is loaded -->
<?php echo $__env->yieldContent('plugins-script'); ?>

</body>
</html>
