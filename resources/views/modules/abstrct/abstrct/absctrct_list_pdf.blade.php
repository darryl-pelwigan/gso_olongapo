<!DOCTYPE html>
<html>
  <head>
      <link rel="stylesheet" href="{{asset('pdf')}}/css/bac-style.css">
      <link rel="stylesheet" href="{{asset('pdf')}}/css/pdf-fonts.css">
      <link rel="stylesheet" href="{{asset('pdf')}}/css/print-bac-style.css">
      {{-- <link rel="stylesheet" href="{{asset('adminlte')}}/bootstrap/css/bootstrap.css"> --}}
  </head>
<body>
     <div class="">
      <div class="">
          <table class="table" width="100%" style="margin-top:10px;">
          <tr>
              <td align="right"></td>
              <td align="center" width="55%">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Republic of the Philippines<br>
               <img src="{{asset('olongapo')}}/img/logo-100.png" height="45px" style="margin-right:25px"> CITY OF OLONGAPO<br>

                <b id="abstract_title">
                    ABSTRACT FOR QUOTATION THRU ALTERNATIVE MODE OF PROCUREMENT
                </b>
              </td>
          </tr>
          <tr>
            <!-- <td align="center" colspan="3" style="border: 0px;">
              Abtract of Public or <u> &nbsp;&nbsp;&nbsp;&nbsp; {{ $items[0]->proc_title }} &nbsp;&nbsp;&nbsp;&nbsp; </u> and award for the Purchase/Procurement/Acquisition of OFFICE SUPPLIES AND/OR PROPERTY
            </td> -->
            <td width="25%">
                 <table width="100%" class="control_info">
                      <tr>
                          <td width="10%">Project No.:</td>
                      </tr>
                  </table>
                  <table width="100%" class="control_info">
                      <tr>
                          <td width="10%">End User/Project Location:</td>
                      </tr>
                  </table>
                  <table width="100%" class="control_info">
                      <tr>
                          <td width="10%">Approved Project for the Contract:</td>
                      </tr>
                  </table>
                  <table width="100%" class="control_info">
                      <tr>
                          <td width="10%">Type of Alternative Mode of Procurement:</td>
                      </tr>
                  </table>
              </td>

              <td width="50%"></td>

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
        </table>
     </div>
  </div>

  <div class="">
    <table class="table" id="main_tbl" border="1" style="border-collapse: collapse; padding-top: 30px;" width="100%">
        <tr>
          <th rowspan="3" class="tg-9hbo" style="text-align: center; vertical-align: middle;padding:7px;" width="3%">Item<br>No.</th>
          <th rowspan="3" class="tg-9hbo" style="text-align: center; vertical-align: middle;padding-right:150px;padding-left:150px" width="40%">Item Description</th>
          <th rowspan="3" class="tg-9hbo" style="text-align: center; vertical-align: middle;padding-right:20px;padding-left:20px" width="5%">Qty.</th>
          <th rowspan="3" class="tg-9hbo" style="text-align: center; vertical-align: middle;padding-right:20px;padding-left:20px" width="5%">Unit</th>
          {{-- <th colspan="{{count($suppliersx)*2}}" style="text-align: center;">Name of Dealers/Suppliers</th> --}}
          <th colspan="6" style="text-align: center;">Name of Dealers/Suppliers</th>
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
            <td style="padding:7px;">{{$key+1}}</td>
            <td >{{$data->description}}</td>
            <td style="text-align: center;">{{$data->qty}}</td>
            <td style="text-align: center;">{{$data->unit}}</td>
             <?php echo $list[$key] ?>
          </tr>
          <?php $count++; ?>
        @endforeach

        <?php
          $totaltr = 12;
          $loop = $totaltr - $count;
            if($loop > 0){
              for ($i=0; $i < $loop; $i++) {
        ?>
          <tr>
            <td style="padding:7px;"><br></td>
            <td><br></td>
            <td><br></td>
            <td><br></td>
            <td><br></td>
            <td><br></td>
            <td><br></td>
            <td><br></td>
            <td><br></td>
            <td><br></td>
          </tr>
        <?php
            }
          }
        ?>

        <tr>
          <td style="padding:7px;"></td>
          <td></td>
          <td></td>
          <td></td>
           @foreach($subtotal as $s)
              <td>  </td>
              <td style="text-align: right;padding:7px;"><b>{{$s->subtotal}}</b></td>
           @endforeach
           @if(count($subtotal) == 2)
              <td>  </td>
              <td>  </td>
            @elseif(count($subtotal) == 1)
              <td>  </td>
              <td>  </td>
              <td>  </td>
              <td>  </td>
           @endif
        </tr>
    </table>
  </div>

  <div><div class="text-center">
          <p style="font-size: 14px;text-align: center;"><strong>BIDS AND AWARDS COMMITTEE</strong></p>
  </div>
  <div class="">
          {{-- <p>We hereby certify that the foregoing abstract of bid proposal or canvasses are correct that we are present when such bid proposals of canvasses for the above item were opened at ______________________________ (Note: at least three (3) price quotations for canvass). <p> --}}

          <p>We hereby certify that the foregoing abstract of quotation are correct that request for quotation for the items above were issued to suppliers.<p>

          <p>AWARD(S) IS HEREBY GIVEN TO <?= $awards_given ?>  as the
          prices offered by it/them is/are the lowest/highest calculated/rated responsive bid and the same is/are considered reasonable and advantageous to the City Government.</p>
  </div>
  <div>
      <table width="100%"  border="0" class="tbl_signee">
        {{-- <tr>
          @for( $x = 0 ; $x< count($committee) ; $x++)
            <td class="underline" width="10%">{{ strtoupper($committee[$x]->employee_name) }}</td>
            <td width="5%"></td>
          @endfor
        </tr>
        <tr>
          @for( $x = 0 ; $x< count($committee) ; $x++)
            <td class="center">{{$committee[$x]->title}}</td>
            <td width="5%"></td>
          @endfor
        </tr> --}}
        <tr>
          @for( $x = 0 ; $x< count($signee) ; $x++)
            <td class="underline" width="10%">{{ strtoupper($signee[$x]->name) }}</td>
            <td width="5%"></td>
          @endfor
        </tr>
        <tr>
          @for( $x = 0 ; $x< count($signee) ; $x++)
            <td class="center">{{$signee[$x]->position}}</td>
            <td width="5%"></td>
          @endfor
        </tr>
      </table><br>
      <table width="50%"  border="0" class="tbl_signee" align="center">
        <tr>
          <td colspan="4">Approved by:</td>
        </tr>
        <tr>
          <td width="10%"></td>
          @for( $x = 0 ; $x< count($approved_by) ; $x++)
            <td class="underline" width="35%" align="center">{{ strtoupper($approved_by[$x]->employee_name) }}</td>
            <td width="20%"></td>
          @endfor
        </tr>
        <tr>
          <td width="10%"></td>
          @for( $x = 0 ; $x< count($approved_by) ; $x++)
            <td width="35%" align="center">{{$approved_by[$x]->title}}</td>
            <td width="20%"></td>
          @endfor
       </tr>
     </table>
  </div>
</div>
</body>
</html>

<style type="text/css">
  body{
    margin: 15px 25px;
    color: #000;
    font-size:10px;
  }
  #abstract_title{
    font-size:14px;
  }
  #main_tbl tr td, #main_tbl tr th{
    margin-top: 0px;
    padding: 1px;
    border: 1px solid #000;
    font-size:11.5px;
  }
  .suppliers{
    font-size: 8px;
  }
  .tg  {border-collapse:collapse;border-spacing:0;}
  .tg td{font-family:Arial, sans-serif;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
  .tg th{font-family:Arial, sans-serif;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
  .tg .tg-9hbo{font-weight:bold;vertical-align:top;padding:15px;}
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
    margin-top: -20px;
  }

</style>