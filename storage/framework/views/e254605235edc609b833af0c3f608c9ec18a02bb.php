<?php $__env->startSection('left-sidebar-menu'); ?>
<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
   <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <?php $__currentLoopData = $template['navs']['main']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $props_main = json_decode($nav->properties,true);

                   foreach ($props_main as $key => $value) {
                    $prop_main[$key] = '';
                            foreach ($props_main[$key] as $keyx => $valuex) {
                                $prop_main[$key] .= " $keyx=\"$valuex\" ";
                      }
                  }
            ?>
          <?php if($nav->parent==0): ?>
              <li <?=array_has($prop_main, 'li')?$prop_main['li']:''?> >
                    <a href="<?php echo e(Route::has($nav->route)? route($nav->route) : 'error'); ?>" <?=array_has($prop_main, 'a')?$prop_main['a']:''?> >
                           <i <?=array_has($prop_main, 'i')?$prop_main['i']:''?> ></i>
                       <span><?php echo e($nav->title); ?></span>
                    </a>
              </li>
          <?php else: ?>
               <li class="treeview">
                  <a href="#">
                    <i class="fa fa-dashboard"></i> <span><?php echo e($nav->title); ?></span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                  <?php $__currentLoopData = $template['navs']['subs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $snav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $props_sub = json_decode($snav->properties,true);

                            foreach ($props_sub as $key => $value) {
                              $prop_sub[$key] = '';
                              foreach ($props_sub[$key] as $keyx => $valuex) {
                                $prop_sub[$key] .= " $keyx=\"$valuex\"";
                              }
                            }
                  ?>
                    <?php if($nav->id==$snav->parent_id): ?>
                      <li <?=array_has($prop_sub, 'li')?$prop_sub['li']:''?> >
                            <a href="<?php echo e(Route::has($snav->route)? route($snav->route) : 'error'); ?>" <?=array_has($prop_sub, 'a')?$prop_sub['a']:''?> >
                                <i <?=array_has($prop_sub, 'i')?$prop_sub['i']:''?> ></i>
                                 <span><?php echo e($snav->title); ?></span>
                            </a>
                      </li>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
              </li>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template::admin-layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>