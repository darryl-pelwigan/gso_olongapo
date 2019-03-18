@extends('template::pdf.default')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
           <div class="box-body">
             <header>
               <div class="header_tbl">
                 <table class="table table-thnormal" >
                   <tr>
                     <td width="25%"></td>
                     <td align="center" width="50%">
                       <h3 class="pr_title">PURCHASE ORDER</h3>
                       <p>Republic of the Philippines</p>
                       <b>City of Olongapo</b>
                     </td>
                     <td width="25%"></td>
                   </tr>
                 </table>
               </div>
             </header>
                <div class="header_tbl">
                  <table class="table table-thnormal">
                    <tr>
                      <td id="table_left" width="50%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td>Supplier: </td>
                            <td class="underline"><strong>{{$info->suppl_title}}</strong></td>
                          </tr>
                          <tr>
                            <td>Address: </td>
                            <td class="underline"><strong>{{$info->details}}</strong></td>
                          </tr>
                        </table>
                      </td>
                      <td width="50%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td width="40%">PO No.: </td>
                            <td width="60%" class="underline">{{$info->po_no}}</td>
                          </tr>
                          <tr>
                            <td>Date.:</td>
                            <td class="underline">{{$info->po_date}}</td>
                          </tr>
                          <tr>
                            <td>Mode of Procurement:  </td>
                            <td class="underline">{{$info->bac_mode}}</td>
                          </tr>
                          <tr>
                            <td>P.R No:/s :</td>
                            <td class="underline">{{$info->pr_no}}</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="header_tbl">
                  <table class="table table-thnormal">
                      <tr>
                        <td>
                          Gentelmen:<br>
                          &nbsp;&nbsp;&nbsp;&nbsp; Please furnish this office the following articles subject to the terms and conditions contained herein:
                        </td>
                      </tr>
                    </table>
                </div>
                <div class="header_tbl">
                  <table class="table table-thnormal">
                  <tr>
                    <td id="table_left" class="table1" width="50%">
                      <table class="table_header" width="100%">
                        <tr>
                          <td width="13%" >Place of Delivery: </td>
                          <td width="30%" class="" >___________________________________</td>
                        </tr>
                        <tr>
                          <td>Date of Delivery: </td>
                          <td class="">___________________________________</td>
                        </tr>
                      </table>
                    </td>
                    <td width="50%">
                      <table class="table_header" width="100%">
                        <tr>
                          <td width="13%" >Delivery Term: </td>
                          <td width="30%" class="">___________________________________</td>
                        </tr>
                        <tr>
                          <td>Payment Term: </td>
                          <td class="">___________________________________</td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
               </div>
                  <table class="table table-bordered page-break">
                      <tr>
                        <td width="5%" align="center"><b>Item <br /> No.</b></td>
                        <td width="10%" align="center"><b>UNIT</b></td>
                        <td width="10%" align="center"><b>QUANTITY</b></td>
                        <td width="51%" align="center"><b>DESCRIPTION</b></td>
                        <td width="12%" align="center"><b>UNIT<br>COST</b></td>
                        <td width="12%" align="center"><b>AMOUNT</b></td>
                      </tr>
                      <?php $count=1; $total_price=0; ?>
                        @foreach( $po_items as $data )
                            <tr>
                              <td id="tbl_items">{{ $count }}</td>
                              <td id="tbl_items">{{ $data->unit }}  </td>
                              <td id="tbl_items">{{ $data->qty }} </td>
                              <td id="tbl_items">{{ $data->description }}</td>
                              <td id="tbl_items" class="text-right2">{{ number_format($data->po_amount,2) }} </td>
                              <td id="tbl_items" class="text-right2">{{ number_format($data->po_total,2) }} </td>
                            </tr>
                          <?php $count++; $total_price += $data->po_total; ?>
                        @endforeach

                        <?php
                          $totaltr = 20;
                          $loop = $totaltr - $count;
                          if($loop > 0){
                            for ($i=0; $i < $loop; $i++) {
                        ?>
                            <tr>
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
                             <td colspan="5" class="total">Total Amount in Words</td>
                             <td class="text-right2 total">{{ number_format($total_price,2) }}</td>
                            </tr>
                            <tr>
                              <td colspan="6">
                                <div style="padding: 15px;"><span>&nbsp; &nbsp; &nbsp;In case of failure to make the full delivery wihtin the time specified above, a penalty of one tenth(1/10) of one percent for every day of delay shall be imposed.</span></div>

                                    <table style="width: 100%;">
                                      <tr>
                                        <td style="padding-left: 15px" width="30px"></td>
                                        <td width="20px"> <p style="color:white">a</p></td>
                                        <td width="70px" style="">Very Truly yours,<br></td>
                                      </tr>
                                      <tr>
                                        <td >Conforme:</td>
                                        <td></td>
                                        <td ><br><br>____________________________</td>
                                      </tr>
                                      <tr>
                                        <td ></td>
                                        <td></td>
                                        <td><p style="padding-left: 40px;">(Authorized Official)</p></td>
                                      </tr>
                                      <tr>
                                        <td style="padding-left: 30px;"><br>____________________________</td>
                                        <td></td>
                                        <td ></td>
                                      </tr>
                                       <tr>
                                        <td style="padding-left: 38px;">(Signature Over Printed Name)</p></td>
                                        <td></td>
                                        <td ></td>
                                      </tr>
                                       <tr>
                                        <td style="padding-left: 30px;"><br><br>__________________</td>
                                        <td></td>
                                        <td ></td>
                                      </tr>
                                       <tr>
                                        <td style="padding-left: 75px;"><p style="">(Date)<br></p></td>
                                        <td></td>
                                        <td ></td>
                                      </tr>
                                    </table>

                              </td>
                            </tr>
                            <tr>
                              <td colspan="6">
                                <div style="padding: 15px;"><span>(In case of Negotiated Purchase pursuant to Section 369 (a) of RA 7160, this portion must be accomplished.)</span>
                                </div>
                                <div style="padding: 15px;">
                                  <span>Approved per Sanggunian Resolution No. ____________________________________________________
                                  </span>
                                </div>
                                <br>
                                <div>
                                    <table style="width: 100%;">
                                       <tr>
                                        <td style="" width="60%"><p style="padding-left: 15px;">Certified Correct: ________________________________</p></td>
                                        <td style="" width="25%">Date: __________________________</td>
                                      </tr>
                                       <tr>
                                        <td><p style="padding-left: 150px;">Secretary to the Sanggunian<br></p></td>
                                        <td></td>
                                      </tr>
                                    </table>
                                  </div>
                              </td>
                            </tr>

                  </table>


                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

   @stop






@section('plugins-css')
<style type="text/css">
<?php if ($count <= 30 && $count > 21){

                          echo "#tbl_items{";
                          echo "font-size: 9.5px;";
                          echo "}";

                        }
                        else if ($count <= 20 && $count > 11){

                          echo "#tbl_items{";
                          echo "font-size: 10.5px;";
                          echo "}";

                        }
                        else {

                          echo "#tbl_items{";
                          echo "font-size: 11.5px;";
                          echo "}";

                        }
?>
html,body{
  margin: 5px 5px;
  font-size: 12px;
}
.table-thnormal>thead>tr>th{
  font-weight: normal;
}
.table-thnormal {
  margin-bottom: -2px !important;
}

.table-bordered>tbody>tr>td,.table-bordered>thead>tr>th{
  border:1px solid #000;
  word-break: break-all;
  padding: 1px;
  margin: 0;
  text-indent: 0;

}

.table-bordered>thead>tr>th{
  text-align: center;

}
.content{
  border: 1px;
}
.total{
  font-size: 17px;
  font-weight: bold;
}

.text-right2{
  text-align: center;
}
.pr_title{
  font-family: "Arial" !important;
  font-weight: bolder;
}
.header_tbl{
  border: 1px solid #000 !important;
  /*margin-bottom: -20px;*/
}
.underline{
  border-bottom: 1px solid;
}
.table_header tr td{
  /*padding: 3px;*/
}
#table_left{
  border-right: 1px solid #000;
}
.table1{
  border-right: 1px solid #000;
   border-collapse: collapse;
}

.table1 td{
  padding:0; margin:0;
}

.table_footer tr td{
  text-align: center;
}

div {
    /*page-break-after: avoid;*/
}


</style>


@stop
