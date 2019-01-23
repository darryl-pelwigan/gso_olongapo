<?php $__env->startSection('header'); ?>
<header>
    <div class="row" id="">
        <div class="col-xs-2 text-right">
            <br><img class="img-responsive"  src="<?php echo e(asset('olongapo/img/logo-360.png')); ?>" style="margin-top: 10px; width: 95px; height: 95px;" />
        </div>
        <div class="col-xs-8 text-center" style="font-size: 12px;">
            <p class="coo" >Republic of the Philippines</p>
            <p class="coo" >City of Olongapo</p>
            <h3 class="c_title"><strong>BIDS AND AWARDS COMMITTEE</strong></h3>
            <img src="<?php echo e(asset('adminlte-custom/img/line.png')); ?>" class="img-line" />
            <p class="coo" >General Services Office, 2/F Olongapo City Hall, Olongapo City</p>
            <p class="cntc web">web: www.olongapocity.gov.ph </p>
            <p class="cntc">email: olongapo_gso@yahoo.com </p>
            <h3 class="res">RESOLUTION  NO. <u>&nbsp;&nbsp;  <?php echo e($bac_control_no); ?>  &nbsp;&nbsp;</u> </h3>
            <p class="res-i"><i>(Series of <?php echo e(date('Y')); ?>)</i></p>
        </div>
    </div>
</header><!-- /header -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo ($bac_template); ?>

    <br>
    <div class="text-center" style="margin: 0; padding: 0">
        <b>BIDS AND AWARDS COMMITTEE</b>
        <p style="text-align: center;" style="margin: 0; padding: 0;">Requested by: </p>
    </div>
    <?php
            $cc = 1;
            $cx = 1;
            $cd = 1;
    ?>
    <br />
        <?php for( $x = 0 ; $x< count($committee) ; $x++): ?>
            <?php if( $cc%2==1 ): ?>
                    <?php $cx=1; $cd=1; ?>
                 <div class="row">
            <?php endif; ?>
                 <div class="col-xs-4 col-xs-offset-1" style="font-size: 12px;">
                    <p class="text-center"><strong><u><?php echo e(strtoupper($committee[$x]->employee_name)); ?></u></strong></p>
                    <p class="text-center"><?php echo e($committee[$x]->title); ?></p><br><br>
                </div>

            <?php if( $cc%2==0 && $cx==2 ): ?>
                </div>
                <?php  $cd++; ?>
            <?php endif; ?>

                <?php  $cc++; $cx++; ?>
        <?php endfor; ?>
    <?php if( $cd!=2 ): ?>
                </div>
    <?php endif; ?>
     <br />
     <p style="text-align: center;">Approved by: </p>
         <?php
            $cc = 1;
            $cx = 1;
            $cd = 1;
        ?>

          <?php for( $x = 0 ; $x< count($approved_by) ; $x++): ?>

            <?php if( $cc%2==1 ): ?>
                    <?php $cx=1;  $cd = 1; ?>
                 <div class="row">
            <?php endif; ?>
                
                 <div class="col-xs-5 col-xs-offset-1" style="font-size: 12px;">
                    <p class="text-center"><strong><u><?php echo e(strtoupper($approved_by[$x]->employee_name)); ?></u></strong></p>
                    <p class="text-center"><?php echo e($approved_by[$x]->title); ?></p>
                </div>

            <?php if( $cc%2==0 && $cx==2 ): ?>
                </div>
                <?php  $cd++; ?>
            <?php endif; ?>

                <?php  $cc++; $cx++; ?>
        <?php endfor; ?>
    <?php if( $cd!=2 ): ?>
        </div>
    <?php endif; ?>
        <br>
        <p style="margin-left: 25px;">Attested by: </p>
         <?php
            $cc = 1;
            $cx = 1;
            $cd = 1;
        ?>

          <?php for( $x = 0 ; $x< count($attested_by) ; $x++): ?>

            <?php if( $cc%2==1 ): ?>
                    <?php $cx=1; $cd = 1; ?>
                 <div class="row">
            <?php endif; ?>
                 <div class="col-xs-4 col-xs-offset-1" >
                    <p class="text-center"><strong><u><?php echo e(strtoupper($attested_by[$x]->employee_name)); ?></u></strong></p>
                    <p class="text-center"><?php echo e($attested_by[$x]->title); ?></p>
                </div>

            <?php if( $cc%2==0 && $cx!=2 ): ?>
                </div>
                <?php $cd++; ?>
            <?php endif; ?>
                <?php  $cc++; $cx++; ?>
        <?php endfor; ?>
    <?php if( $cd!=2 ): ?>
                </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<style type="text/css">
  body{

    font-size:12px;
  }
  
</style>
<?php echo $__env->make('template::pdf.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>