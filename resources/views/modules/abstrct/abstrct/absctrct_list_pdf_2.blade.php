<!DOCTYPE html>
<html>
  <head>
      <link rel="stylesheet" href="{{asset('pdf')}}/css/bac-style.css">
      <link rel="stylesheet" href="{{asset('pdf')}}/css/pdf-fonts.css">
      <link rel="stylesheet" href="{{asset('pdf')}}/css/print-bac-style.css">
      <link rel="stylesheet" href="{{asset('adminlte')}}/bootstrap/css/bootstrap.css">
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
                          <td width="75%" class="underline" align="center">{{ $items[0]->control_no }}</td>
                      </tr>
                  </table>
                  <table width="100%" class="control_info">
                      <tr>
                          <td width="10%">Date</td>
                          <td width="90%" class="underline" align="center">{{ date('d-m-Y', strtotime($items[0]->abstrct_date )) }}</td>
                      </tr>
                  </table>
                  <table width="100%" class="control_info">
                      <tr>
                          <td width="60%">Purchase Request (PR) No.</td>
                          <td width="40%" class="underline" align="center">{{ $items[0]->pr_no }}</td>
                      </tr>
                  </table>
                  <table width="100%" class="control_info">
                      <tr>
                          <td width="10%">Date</td>
                          <td width="90%" class="underline" align="center">{{ date('d-m-Y', strtotime($items[0]->prno_date)) }}</td>
                      </tr>
                  </table>
              </td>
          </tr>
          <tr>
             <td align="center" colspan="3" style="border: 0px;">
              Abtract of Public or <u> &nbsp;&nbsp;&nbsp;&nbsp; {{ $items[0]->proc_title }} &nbsp;&nbsp;&nbsp;&nbsp; </u> and award for the Purchase/Procurement/Acquisition of OFFICE SUPPLIES AND/OR PROPERTY
            </td>
          </tr>
        </table>
     </div>
  </div> 
  <div class="">
    <table class="table" id="main_tbl" border="1">
        <tr>
          <th rowspan="3" class="tg-9hbo" width="3%">Item<br>No.</th>
          <th rowspan="3" class="tg-9hbo" align="center" style="text-align: center;" width="40%">NAME OF ARTICLE BEING REQUESTITIONED</th>
          <th rowspan="3" class="tg-9hbo">Qty.</th>
          <th rowspan="3" class="tg-9hbo">Unit</th>
          <th colspan="{{count($suppliersx)*2}}" style="text-align: center;">N A M E OF D E A L E R S / S U P P L I E R S O R C O N T R A C T O R S</th>
        </tr>
        <tr>
          <?=$suppliers_clean?>
        </tr>
        <tr>
          <?php echo $subth ?>
        </tr>
        <?php $count  = 0; ?>
        @foreach ($items as $key=>$data)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$data->description}}</td>
            <td style="text-align: center;">{{$data->qty}}</td>
            <td style="text-align: center;">{{$data->unit}}</td>
            <?php echo $list[$key] ?>
          </tr>
          <?php $count++; ?>
        @endforeach
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          @foreach($subtotal as $s)
              <td>  </td>
              <td style="text-align: right;"><b>{{$s->subtotal}}</b></td>

          @endforeach
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
 <div class=""><br>
     <table width="100%"  border="0" class="tbl_signee">
        <tr>
          <td width="10%" class="underline">{{ strtoupper($signee[0]->name ?? '') }}</td>
          <td width="5%"></td>
          <td width="10%" class="underline">{{ strtoupper($signee[1]->name ?? '') }}</td>
          <td width="5%"></td>
          <td width="10%" class="underline">{{ strtoupper($signee[2]->name ?? '') }}</td>
          <td width="5%"></td>
          <td width="10%" class="underline">{{ strtoupper($signee[3]->name ?? '') }}</td>
          <td width="5%"></td>
          <td width="10%" class="underline">{{ strtoupper($signee[4]->name ?? '') }}</td>
          <td width="5%"></td>
          <td width="10%" class="underline">{{ strtoupper($signee[5]->name ?? '') }}</td>
          <td width="5%"></td>
        </tr>
        <tr>
          <td class="center">Requisitioning Officer</td>
          <td></td>
          <td class="center">Requisitioning Officer</td>
          <td></td>
          <td class="center">BAC Member</td>
          <td></td>
          <td class="center">BAC Member</td>
          <td></td>
          <td class="center">BAC Member</td>
          <td></td>
          <td class="center">BAC CHAIRMAN</td>
        </tr>
        <tr>
          <td width="10%" class="underline">{{ $signee[0]->position }}</td>
          <td width="5%"></td>
          <td width="10%" class="underline">{{ $signee[1]->position }}</td>
          <td width="5%"></td>
          <td width="10%" class="underline">{{ $signee[2]->position }}</td>
          <td width="5%"></td>
          <td width="10%" class="underline">{{ $signee[3]->position }}</td>
          <td width="5%"></td>
          <td width="10%" class="underline">{{ $signee[4]->position }}</td>
          <td width="5%"></td>
          <td width="10%" class="underline">{{ $signee[5]->position }}</td>
          <td width="5%"></td
        </tr>
     </table>
     <table width="50%"  border="0" class="tbl_signee" align="center">
      <tr>
        <td colspan="4">Approved by:</td>
      </tr>
       <tr>
        <td width="10%"></td>
         <td class="underline" width="35%" align="center">{{ strtoupper($approved_by_req[0]->full_name ?? '') }}</td>
         <td width="20%"></td>
         <td class="underline" width="35%" align="center">{{ strtoupper($approved_by_req[1]->full_name ?? '') }}</td>
       </tr>
        <tr>
        <td></td>
         <td class="center" align="center">City Mayor</td>
         <td></td>
         <td class="center" align="center">Secretary to the Mayor</td>
       </tr>
     </table>
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
    font-size:12px;
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