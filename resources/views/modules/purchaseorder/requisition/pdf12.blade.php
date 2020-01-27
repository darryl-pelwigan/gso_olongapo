@extends('template::pdf.default')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="main-border content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
           <div class="box-body">
             <table width="100%">
          <tr>
            <td>
              <h3 class="pr_title text_center padding_top">REQUISITION AND ISSUE SLIP</h3>
            </td>
          </tr>
          <tr>
              <td class="text_center"><img src="{{asset('olongapo')}}/img/logo-100.png" alt="" height="25px;"></td>
          </tr>
          <tr>
            <td class="text_center" style="font-size: 10px;"> <p> Republic of the Philippines<br> City of Olongapo </p></td>
          </tr>

        </table>
                <div class="header_tbl">
                  <table class="table table-thnormal" width="100%">
                    <tr>
                      <td id="table_left" width="40%">
                        <table class="table_header" width="100%" >
                          <tr>
                            <td width="20%">Division: </td>
                            <td width="80%" class="underline"><center>{{$info->_main_dept_desc}}</center></td>
                          </tr>
                          <tr>
                            <td>Office: </td>
                            <td width="50%" class="underline"></td>
                          </tr>
                        </table>
                      </td>
                      <td id="table_left" width="25%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td>Responsibility Center Code: <span>_____________</span></td>
                          </tr>
                        </table>
                      </td>
                      <td id="" width="40%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td width="30%" style="text-align: center;">RIS No.: </td>
                            <td width="60%" class="underline" style="text-align: center;"> {{$info->ris_no}} </td>
                          </tr>
                          <tr>
                            <td style="text-align: center;">SAI No.: </td>
                            <td class="underline" style="text-align: center;">{{$info->sai_no}}</td>
                          </tr>
                        </table>
                      </td>
                      <td id="" width="30%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td width="20%" style="text-align: center;">Date: </td>
                            <td width="60%" class="underline" style="text-align: center;">{{ date('F j Y', strtotime($info->ris_date)) }}</td>
                          </tr>
                          <tr>
                            <td  style="text-align: center;">Date: </td>
                            <td class="underline" style="text-align: center;">{{ date('F j Y', strtotime($info->sai_date)) }}</td>
                          </tr>
                        </table>
                      </td>
                      </td>
                    </tr>
                  </table>
                </div>
   <!--              <div class="header_tbl">
                  <table class="table table-thnormal">
                      <tr>
                        <td>
                          Gentelmen:<br>
                          &nbsp;&nbsp;&nbsp;&nbsp; Please furnish this office the following articles subject to the terms and conditions contained herein:
                        </td>
                      </tr>
                    </table>
                </div> -->
<!--                 <div class="header_tbl">
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
               </div> -->
               <div >
                  <table class="table1 table-bordered page-break" width="100%">
                      <tr>
                        <td class="letter-space" colspan="4" align="center" height="2%" style="padding:5px"><b>Requisition</b></td>
               </div>
                        <td class="letter-space" colspan="2" align="center"><b>Issuance</b></td>
                      </tr>
                      <tr>
                        <td class="gray" width="10%" align="center" height="1%" style="padding:10px"><b>Stock No.</b></td>
                        <td class="gray" width="5%" align="center"><b>Unit</b></td>
                        <td class="gray" width="51%" align="center"><b>Description</b></td>
                        <td class="gray" width="10%" align="center"><b>Quantity</b></td>
                        <td class="gray" width="12%" align="center"><b>Quantity</td>
                        <td class="gray" width="12%" align="center"><b>Remarks</b></td>
                      </tr>
                      <?php $count=1; $total_price=0; ?>
                        @foreach( $po_items as $data )
                            <tr id="tbl_items">
                              <td style="text-align: center;">{{ $count }}</td>
                              <td style="text-align: center; font-size: 11px; padding: 0 5px;" >{{ $data->unit }}  </td>
                            <?php
                                  $desc = $data->description;

                                  //if (strlen($desc) > 100) { --}}

                                  if (strlen($desc) > 88) {
                                    echo '<td style="text-align: left; padding-left: 10px;" id="desc_style" style="word-wrap:break-word;">'.$desc.'</td>';
                                  } else {
                                      echo '<td style="text-align: left; padding-left: 10px;">'.$desc.'</td>';
                                  }
                                ?>
                              <td style="text-align: right; padding-right: 5px;">{{ $data->qty }} </td>
                              <td style="text-align: right; padding-right: 5px;"></td>
                              <td style="text-align: left;"></td>
                            </tr>
                          <?php $count++; $total_price += $data->total_price; ?>
                        @endforeach

                        <?php
                          $totaltr = 34;
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
                             <td colspan="5" class="total" style="font-size: 12px;" height="1%">Total</td>
                             <td class="text-right2 total" style="font-size: 12px;">{{ number_format($total_price,2) }}</td>
                            </tr>
                            <tr>
                              <td colspan="6">
                                <table class="table_header" width="100%">
                                  <tr>
                                    <td width="9%" style="margin-left: 10px;">Purpose:</td>
                                    <td width="90%" class="underline" style="margin-right: 5px;">{{$info->pr_purpose}}</td>
                                    <td width="0.5%"></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" class="underline">&nbsp;</td>
                                  </tr>

                                </table>
                              </td>
                            </tr>





<!--                                 <div style="padding: 15px;"><span>&nbsp; &nbsp; &nbsp;In case of failure to make the full delivery wihtin the time specified above, a penalty of one tenth(1/10) of one percent for every day of delay shall be imposed.</span></div>

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

                              </td> -->
                            <!-- </tr> -->


                            {{-- <tr>
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
                            </tr> --}}

                            <tr>
                              <td colspan="6">
                                <table class="table1 page-break" width="100%">
                                  <tr>
                                    <td class="borderZero" width="10%" align="center">&nbsp;</td>
                                    <td class="border" width="15%" align="center"><b>Requested by:</b></td>
                                    <td class="border" width="40%" align="center" colspan="2"><b>Approved by:</b></td>
                                    <td class="border" width="15%" align="center"><b>Issued by:</b></td>
                                    <td class="border" width="20%" align="center"><b>Received by:</b></td>
                                  </tr>
                                  <tr>
                                    <td class="borderZero" align="center" height="2%"><b>Signature:</b></td>
                                    <td class="border" align="center">&nbsp;</td>
                                    <td class="border_bottom" align="center"> </td>
                                    <td class="border_bottom" align="center"> </td>
                                    <td class="border" align="center">&nbsp;</td>
                                    <td class="border" align="center">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="center"><b>Printed Name:</b></td>
                                    <td class="border" align="center" style="font-size: 9px;"> {{ strtoupper($info->requested_by ?? '') }}</td>

                                    @if ($request_signee)
                                      @foreach ($request_signee as $rs)
                                        <td class="border_bottom" align="center"> <b> {{ $rs->full_name }}</b> </td>
                                      @endforeach
                                    @endif

                                    {{-- <td class="border_bottom" align="center"> <b>SHEILA R. PADILLA</b> </td> --}}
                                    <td class="border" align="center"> &nbsp; </td>
                                    <td class="border" align="center"> &nbsp; </td>
                                  </tr>
                                  
                                  <tr>
                                    <td class="borderZero" align="center"><b>Designation:</b></td>
                                    <td class="border" align="center" style="font-size: 10px;">{{ strtoupper($info->designated ?? '') }}</td>

                                    @if ($request_signee)
                                      @foreach ($request_signee as $rs)
                                        <td class="border_bottom" align="center"> <b> {{ $rs->position }}</b> </td>
                                      @endforeach
                                    @endif
                          {{--           <td class="border_bottom" align="center"><b>City Mayor</b></td>
                                    <td class="border_bottom" align="center"><b>Secratary to the Mayor</b></td> --}}
                                    <td class="border" align="center">&nbsp;</td>
                                    <td class="border" align="center">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="center"><b>Date:</b></td>
                                    <td class="border" align="center">&nbsp;</td>
                                    <td class="border_bottom" align="center">&nbsp;</td>
                                    <td class="border_bottom" align="center">&nbsp;</td>
                                    <td class="border" align="center">&nbsp;</td>
                                    <td class="border" align="center">&nbsp;</td>
                                  </tr>
                                </table>
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


   <?php if ($count <= 30 && $count > 26){
                          echo "<style>
                                #tbl_items{

                                }
                              </style>";
                        }
                        else if ($count <= 25 && $count > 21){
                          echo "<style>
                                #tbl_items{

                                }
                              </style>";
                        }
                        else if ($count <= 20 && $count > 16){
                          echo "<style>
                                #tbl_items{

                                }
                              </style>";
                        }
                        else if ($count <= 15 && $count > 11){
                          echo "<style>
                                #tbl_items{

                                }
                              </style>";
                        }
                        else if ($count <= 10 && $count > 6){
                          echo "<style>
                                #tbl_items{

                                }
                              </style>";
                        }
                        else {
                          echo "<style>
                                #tbl_items{

                                }
                              </style>";
                        }
                        ?>



@section('plugins-css')
<style type="text/css">

html,body{
  margin: 15px 15px;
  font-size: 12px;
  padding-bottom: -20px;
}
.table-thnormal>thead>tr>th{

}
.table-thnormal {
  margin-bottom: -2px !important;
}

.table-bordered>tbody>tr>td,.table-bordered>thead>tr>th{
  border:1px solid #000;
  word-break: break-all;
  padding: 1px;
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
  font-family:  "arial-black" !important;
  font-weight: 900;
  padding: 5px;
  font-size: 22px;
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
  text-align: left;
}
#table_left{
  border-right: 1px solid #000;
}
.table1{
  border-right: 1px solid #000;
   border-collapse: collapse;
}

.table1 td{
  padding:0;
  margin:0;
}

.table_footer tr td{
  text-align: center;
}

.border {
  border: 1px solid black;
}

.border_bottom {
  border-bottom: 1px solid black;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  }
.main-border{
  border-style: solid;
  border-width: 2px;
}

.gray{
  background: lightgray;
}
.letter-space{
  letter-spacing: 2px;
  font-style: italic;
  font-weight: bold;
  font-family:   sans-serif !important;
}
.borderZero{
  border: 0px;
}

.text_center{
    text-align: center;
  }

  .padding_top {
    padding-top: 10px;
  }

div {
    /*page-break-after: avoid;*/
}


</style>


@stop
