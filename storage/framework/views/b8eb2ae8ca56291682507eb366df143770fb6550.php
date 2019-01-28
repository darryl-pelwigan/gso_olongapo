<!-- Error messages -->
<?php if(!$errors->isEmpty() || Session::has('error')): ?>
<div class="row">
    <div class="col-lg-12">
        <div id="error-blk" class="alert alert-danger alert-dismissible">
            <button class="close" aria-hidden="true">x</button>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="msg"><?php echo e($error); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if(Session::has('error')): ?>
                <?php $__currentLoopData = Session::get('error'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="msg"><?php echo e($error); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Info messages -->
<?php if(Session::has('info')): ?>
<div class="row">
    <div class="col-lg-12">
        <div id="info-blk" class="alert alert-info alert-dismissible">
            <button class="close" aria-hidden="true">x</button>
            <?php $__currentLoopData = Session::get('info'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="msg"><?php echo e($info); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(Session::has('danger')): ?>
<div class="row">
    <div class="col-lg-12">
        <div id="info-blk" class="alert alert-danger alert-dismissible disabled">
            <button class="close" aria-hidden="true">x</button>
            <?php $__currentLoopData = Session::get('danger'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $danger): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="msg"><?php echo e($danger); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>