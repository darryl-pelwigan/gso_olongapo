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
                       <h3 class="pr_title" style="font-size: 20px;">REQUISITION AND ISSUE SLIP</h3>
                       <img src="{{asset('olongapo')}}/img/logo-100.png" alt="" width="20px" height="20px;">
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
                    <!-- <tr>
                      <td id="table_left" width="25%">
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
                      <td width="25%">
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
                    </tr> -->

                    <tr>
                      <td id="table_left" width="30%">
                        <table class="table_header" width="100%">
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
                      <td id="table_left" width="20%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td width="60%">Responsibility Center Code: </td>
                            <td width="40%" class="underline">&nbsp;</td>
                          </tr>
                        </table>
                      </td>
                      <td id="table_left" width="30%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td width="40%">RIS No.: </td>
                            <td width="60%" class="underline"> {{$info->ris_no}} </td>
                          </tr>
                          <tr>
                            <td width="40%">SAI.: </td>
                            <td width="60%" class="underline">{{$info->sai_no}}</td>
                          </tr>
                        </table>
                      </td>
                      <td id="" width="30%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td width="40%">Date: </td>
                            <td width="60%" class="underline">{{ date('F j Y', strtotime($info->ris_date)) }}</td>
                          </tr>
                          <tr>
                            <td width="40%">Date: </td>
                            <td width="60%" class="underline">{{ date('F j Y', strtotime($info->sai_date)) }}</td>
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
                  <table class="table table-bordered page-break">
                      <tr>
                        <td colspan="4" align="center"><b>Requisition</b></td>
                        <td colspan="2" align="center"><b>Issuance</b></td>
                      </tr>
                      <tr>
                        <td width="5%" align="center"><b>Stock <br /> No.</b></td>
                        <td width="10%" align="center"><b>Unit</b></td>
                        <td width="51%" align="center"><b>Description</b></td>
                        <td width="10%" align="center"><b>QUANTITY</b></td>
                        <td width="12%" align="center"><b>Quantity</td>
                        <td width="12%" align="center"><b>Remarks</b></td>
                      </tr>
                      <?php $count=1; $total_price=0; ?>
                        @foreach( $po_items as $data )
                            <tr id="tbl_items">
                              <td>{{ $count }}</td>
                              <td>{{ $data->unit }}  </td>
                            <?php
                                  $desc =$data->description;

                                  //if (strlen($desc) > 100) { --}}

                                  if (strlen($desc) > 88) {
                                    echo '<td class="text-right2" id="desc_style" style="word-wrap:break-word; font-size: 6px;">'.$desc.'</td>';
                                  } else {
                                      echo '<td class="text-right2">'.$desc.'</td>';
                                  }
                                ?>
                              <td>{{ $data->qty }} </td>
                              <td class="text-right2"></td>
                              <td class="text-right2"></td>
                            </tr>
                          <?php $count++; $total_price += $data->po_total; ?>
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
                             <td colspan="5" class="total" style="font-size: 15px;">Total</td>
                             <td class="text-right2 total" style="font-size: 15px;">{{ number_format($total_price,2) }}</td>
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
                                <table class="table_header" width="100%">
                                  <tr>
                                    <td class="border" width="10%" align="center">&nbsp;</td>
                                    <td class="border" width="15%" align="center"><b>Requested by:</b></td>
                                    <td class="border" width="40%" align="center" colspan="2"><b>Approved by:</b></td>
                                    <td class="border" width="15%" align="center"><b>Issued by:</b></td>
                                    <td class="border" width="20%" align="center"><b>Received by:</b></td>
                                  </tr>
                                  <tr>
                                    <td class="border" align="center">&nbsp;</b></td>
                                    <td class="border" align="center"> &nbsp; </td>
                                    <td class="border_bottom" align="center"> &nbsp; </td>
                                    <td class="border_bottom" align="center"> &nbsp; </td>
                                    <td class="border" align="center"> &nbsp; </td>
                                    <td class="border" align="center"> &nbsp; </td>
                                  </tr>
                                  <tr>
                                    <td class="border" align="center"><b>Printed Name:</b></td>
                                    <td class="border" align="center"> {{ strtoupper($info->fname ?? '') }} {{ strtoupper($info->mname ?? '')  }}  {{ strtoupper($info->lname ?? '')  }}</td>
                                    <td class="border_bottom" align="center"> <b>ROLEN C. PAULINO</b> </td>
                                    <td class="border_bottom" align="center"> <b>SHEILA R. PADILLA</b> </td>
                                    <td class="border" align="center"> &nbsp; </td>
                                    <td class="border" align="center"> &nbsp; </td>
                                  </tr>
                                  <tr>
                                    <td class="border" align="center"><b>Signature:</b></td>
                                    <td class="border" align="center">&nbsp;</td>
                                    <td class="border_bottom" align="center"> <b>City Mayor</b> </td>
                                    <td class="border_bottom" align="center"> <b>Secratary to the Mayor</b> </td>
                                    <td class="border" align="center">&nbsp;</td>
                                    <td class="border" align="center">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td class="border" align="center"><b>Designation:</b></td>
                                    <td class="border" align="center">{{ strtoupper($info->designation ?? '') }}</td>
                                    <td class="border_bottom" align="center">&nbsp;</td>
                                    <td class="border_bottom" align="center">&nbsp;</td>
                                    <td class="border" align="center">&nbsp;</td>
                                    <td class="border" align="center">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td class="border" align="center"><b>Date:</b></td>
                                    <td class="border" align="center">&nbsp;</td>
                                    <td class="border_bottom" align="center">&nbsp;</td>
                                    <td class="border_bottom" align="center">&nbsp;</td>
                                    <td class="border" align="center">&nbsp;</td>
                                    <td class="border" align="center">&nbsp;</td>
                                  </tr>
                                </table>
                              </td>
                            </tr>


{{--                             <tr>
                              <td align="center" width="20%"></td>
                              <td align="center" width="20%">Requested by:</td>
                              <td colspan="2" align="center">Approved by:</td>
                              <td align="center" width="20%">Issued by:</td>
                              <td align="center" width="25%">Received by:</td>
                            </tr>

                            <tr>
                              <td>Signature:</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td>Printed Name:</td>
                              <td></td>
                              <td width="15%">ROLEN C. PAULINO</td>
                              <td>SHEILA R. PADILLA</td>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td>Designation:</td>
                              <td></td>
                              <td>City Mayor</td>
                              <td>Secretary of Mayor</td>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td>Date:</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                             --}}
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
                                font-size: 7px;
                                }
                              </style>";
                        }
                        else if ($count <= 25 && $count > 21){
                          echo "<style>
                                #tbl_items{
                                font-size: 8px;
                                }
                              </style>";
                        }
                        else if ($count <= 20 && $count > 16){
                          echo "<style>
                                #tbl_items{
                                font-size: 9px;
                                }
                              </style>";
                        }
                        else if ($count <= 15 && $count > 11){
                          echo "<style>
                                #tbl_items{
                                font-size: 11px;
                                }
                              </style>";
                        }
                        else if ($count <= 10 && $count > 6){
                          echo "<style>
                                #tbl_items{
                                font-size: 13px;
                                }
                              </style>";
                        }
                        else {
                          echo "<style>
                                #tbl_items{
                                font-size: 15px;
                                }
                              </style>";
                        }
                        ?>



@section('plugins-css')
<style type="text/css">

html,body{
  margin: 5px 5px;
  font-size: 12px;
  padding-bottom: -20px;
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

.border {
  border: 1px solid black;
}

.border_bottom {
  border-bottom: 1px solid black;
}

div {
    /*page-break-after: avoid;*/
}


</style>


@stop
