<!DOCTYPE html>
<html>
  <head>
      <link rel="stylesheet" href="<?php echo e(asset('pdf')); ?>/css/bac-style.css">
      <link rel="stylesheet" href="<?php echo e(asset('pdf')); ?>/css/pdf-fonts.css">
      <link rel="stylesheet" href="<?php echo e(asset('pdf')); ?>/css/print-bac-style.css">
      
  </head>
<body>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
           <div class="box-body">

            <div class="pages">
             <header>
               <div class="header_tbl">
                 <table class="table table-thnormal" >
                   <tr>
                     <td align="" width="50%">
                        PPE WEEKLY REPORT
                     </td>
                     <td width="25%"></td>
                   </tr>
                 </table>
               </div>
             </header>
              <div class="header_tbl">
                  <table class="table table-thnormal" id="main_tbl" style="border-collapse: collapse;">
                    <thead>
                      <tr>
                        <th>GSO</th>
                        <th>ACCOUNT</th>
                        <th style="border-bottom: 0px">DESCRIPTION</th>
                        <th>Estimated</th>
                        <th>Date</th>
                        <th>ACCOUNTABLE</th>
                        <th>(Exact Location,</th>
                        <th>Depreciable</th>
                        <th>UNIT</th>
                        <th style="border-right:0px">Balance per card</th>
                        <th style="border-left:0px"></th>
                        <th style="border-right:0px">Shortage</th>
                        <th style="border-left:0px"></th>
                        <th>ACCUMULATED</th>
                        <th>RESIDUAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>Property Code</th>
                        <th>GROUP</th>
                        <th style="border-top:0px"></th>
                        <th>life yrs</th>
                        <th>Acuuired</th>
                        <th>OFFICER</th>
                        <th> conditions, etc.)</th>
                        <th>(I/O)</th>
                        <th>VALUE</th>
                        <th>Qty</th>
                        <th>Value</th>
                        <th>Qty</th>
                        <th>Total Value</th>
                        <th>DEPRECIATION</th>
                        <th>VALUE</th>
                      </tr>
                      <?php $__currentLoopData = $ppe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($p[0]); ?></td>
                          <td><?php echo e($p[1]); ?></td>
                          <td><?php echo e($p[2]); ?></td>
                          <td><?php echo e($p[3]); ?></td>
                          <td><?php echo e($p[4]); ?></td>
                          <td><?php echo e($p[5]); ?></td>
                          <td><?php echo e($p[6]); ?></td>
                          <td><?php echo e($p[7]); ?></td>
                          <td><?php echo e($p[8]); ?></td>
                          <td><?php echo e($p[9]); ?></td>
                          <td><?php echo e($p[8]); ?></td>
                          <td></td>
                          <td></td>
                          <td><?php echo e($p[10]); ?></td>
                          <td><?php echo e($p[11]); ?></td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
              </div>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <div class="page-break">

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</section>
</div>
</body>
</html>

<style type="text/css">
  body{
    margin:25px;
    color: #000;
    font-size:11px;
  }
  #abstract_title{
    font-size:14px;
  }
  #main_tbl tr td, #main_tbl tr th{
    margin-top: 0px;
    padding: 2px;
    border: 1px solid #000;
    font-size:11.5px;
  }
  .suppliers{
    font-size: 10px;
  }
  .tg  {border-collapse:collapse;border-spacing:0;}
  .tg td{font-family:Arial, sans-serif;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
  .tg th{font-family:Arial, sans-serif;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
  .tg .tg-9hbo{font-weight:bold;vertical-align:top}
  .tg .tg-yw4l{vertical-align:top}
  .underline{
    border-bottom: 1px solid #000;
  }
  .tbl_signee td{

    padding: 3px;
  }
  .control_info tr td{
    font-size:11px;
  }
  .table{
    border-collpase : collapse;
  }

</style>