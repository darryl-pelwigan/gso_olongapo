<!DOCTYPE html>
<html>
  <head>
      <link rel="stylesheet" href="<?php echo e(asset('pdf')); ?>/css/bac-style.css">
      <link rel="stylesheet" href="<?php echo e(asset('pdf')); ?>/css/pdf-fonts.css">
      <link rel="stylesheet" href="<?php echo e(asset('pdf')); ?>/css/print-bac-style.css">
      <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/bootstrap/css/bootstrap.css">
  </head>
<body>
     <div class="">
      <div class="">
          <table class="table" width="100%">
          <tr>
              <td width="20%"></td>
              <td align="center" width="55%">
                Republic of the Philippines<br>
                CITY OF OLONGAPO<br>
                <b id="abstract_title">
                    ABSTRACT OF RECORDS OF PROCUREMENT THRU<br>
                    ALTERNATIVE MODE OF PROCUREMENT
                </b></td>
              <td width="25%">
                 <table width="100%" class="control_info">
                      <tr>
                          <td width="25%">Control No.</td>
                          <td width="75%" class="underline" align="center"><?php echo e($items[0]->control_no); ?></td>
                      </tr>
                  </table>
                  <table width="100%" class="control_info">
                      <tr>
                          <td width="10%">Date</td>
                          <td width="90%" class="underline" align="center"><?php echo e(date('d-m-Y', strtotime($items[0]->abstrct_date ))); ?></td>
                      </tr>
                  </table>
                  <table width="100%" class="control_info">
                      <tr>
                          <td width="60%">Purchase Request (PR) No.</td>
                          <td width="40%" class="underline" align="center"><?php echo e($items[0]->pr_no); ?></td>
                      </tr>
                  </table>
                  <table width="100%" class="control_info">
                      <tr>
                          <td width="10%">Date</td>
                          <td width="90%" class="underline" align="center"><?php echo e(date('d-m-Y', strtotime($items[0]->prno_date))); ?></td>
                      </tr>
                  </table>
              </td>
          </tr>
          <tr>
             <td align="center" colspan="3" style="border: 0px;">
              Abtract of Public or <u> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo e($items[0]->proc_title); ?> &nbsp;&nbsp;&nbsp;&nbsp; </u> and award for the Purchase/Procurement/Acquisition of OFFICE SUPPLIES AND/OR PROPERTY
            </td>
          </tr>
        </table>
     </div>
  </div> 
  <div class="">
    <table class="table" id="main_tbl" border="1">
        <tr>
          <th rowspan="3" class="tg-9hbo" style="text-align: center;" width="3%">Item<br>No.</th>
          <th rowspan="3" class="tg-9hbo" style="text-align: center;" width="40%">NAME OF ARTICLE BEING REQUESTITIONED</th>
          <th rowspan="3" class="tg-9hbo" style="text-align: center;">Qty.</th>
          <th rowspan="3" class="tg-9hbo" style="text-align: center;">Unit</th>
          <th colspan="<?php echo e(count($suppliersx)*2); ?>" style="text-align: center;">N A M E OF D E A L E R S / S U P P L I E R S O R C O N T R A C T O R S</th>
        </tr>
        <tr>
          <?=$suppliers_clean?>
        </tr>
        <tr>
          <?php echo $subth ?>
        </tr>
        <?php $count  = 0; ?>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($data->description); ?></td>
            <td style="text-align: center;"><?php echo e($data->qty); ?></td>
            <td style="text-align: center;"><?php echo e($data->unit); ?></td>
            <?php echo $list[$key] ?>
          </tr>
          <?php $count++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <?php $__currentLoopData = $subtotal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <td>  </td>
              <td style="text-align: right;"><b><?php echo e($s->subtotal); ?></b></td>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    </table>
  </div>
  <div class="text-center">
          <p><strong>BIDS AND AWARDS COMMITTEE</strong></p>
  </div>
  <div class="">
          <p>We hereby certify that the foregoing abstract of bid proposal or canvasses are correct that we are present when such bid proposals of canvasses for the above item were opened at ______________________________ (Note: at least three (3) price quotations for canvass). <p>
          <p>AWARD(S) IS HEREBY GIVEN TO <?= $awards_given ?>  as the 
          prices offered by it/them is/are the lowest/highest calculated/rated responsive bid and the same is/are considered reasonable and advantageous to the City Government.</p>
  </div>
  <div>
  <div>
      <table width="100%"  border="0" class="tbl_signee">
        <tr>
          <?php for( $x = 0 ; $x< count($committee) ; $x++): ?>  
            <td class="underline" width="10%"><?php echo e(strtoupper($committee[$x]->employee_name)); ?></td>  
            <td width="5%"></td>
          <?php endfor; ?>
        </tr> 
        <tr>
          <?php for( $x = 0 ; $x< count($committee) ; $x++): ?>  
            <td class="center"><?php echo e($committee[$x]->title); ?></td>  
            <td width="5%"></td>
          <?php endfor; ?>
        </tr> 
      </table><br>
      <table width="50%"  border="0" class="tbl_signee" align="center">
        <tr>
          <td colspan="4">Approved by:</td>
        </tr>
        <tr>
          <td width="10%"></td>
          <?php for( $x = 0 ; $x< count($approved_by) ; $x++): ?>
            <td class="underline" width="35%" align="center"><?php echo e(strtoupper($approved_by[$x]->employee_name)); ?></td>
            <td width="20%"></td>
          <?php endfor; ?>
        </tr>
        <tr>
          <td width="10%"></td>
          <?php for( $x = 0 ; $x< count($approved_by) ; $x++): ?>
            <td width="35%" align="center"><?php echo e($approved_by[$x]->title); ?></td>
            <td width="20%"></td>
          <?php endfor; ?>
       </tr>
     </table>
  </div> 




 




  
</div>
</body>
</html>

<style type="text/css">
  body{
    margin:25px;
    color: #000;
    font-size:13px;
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