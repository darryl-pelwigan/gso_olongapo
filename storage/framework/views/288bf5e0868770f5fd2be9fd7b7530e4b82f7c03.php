<!doctype html>
<html>
<head>
           <title><?php echo e($template['page_title']); ?></title>
        <?php echo $__env->make('template::admin-layouts.includes.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- plugins css place after main css is loaded -->
            <?php echo $__env->yieldContent('plugins-css'); ?>
</head>
<body class="skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <?php echo $__env->make('template::admin-layouts.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
             <?php echo $__env->yieldContent('left-sidebar-menu'); ?>


        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->

            <?php echo $__env->yieldContent('content'); ?>

        <!-- **********************************************************************************************************************************************************
        MAIN FOOTER
        *********************************************************************************************************************************************************** -->
        <!--main footer start-->

        <?php echo $__env->make('template::admin-layouts.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- **********************************************************************************************************************************************************
        MAIN CONTROLLER SIDEBAR
        *********************************************************************************************************************************************************** -->
        <!--main controler-sidebar start-->
        <?php echo $__env->make('template::admin-layouts.includes.controler-sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
        <!-- js placed at the end of the document so the pages load faster -->
        <?php echo $__env->make('template::admin-layouts.includes.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- plugins script place after maing js is loaded -->
            <?php echo $__env->yieldContent('plugins-script'); ?>

</body>
</html>