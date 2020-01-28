@extends('template::pdf.default')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="main-border content-wrapper">


    <!-- Main content -->
    <section class="content">
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
            <td class="text_center"> <p> Republic of the Philippines<br> City of Olongapo </p></td>
          </tr>
        </table>

        <table width="100%" class="border_top_bottom">
          <tr>
            <td width="30%" class="border padding_top_bottom font_size_11">
              <table width="100%">
                <tr>
                  <td width="10%">Division:</td>
                  <td class="text_center border_bottom" width="90%">{{$info->_main_dept_desc}}</td>
                </tr>
                <tr>
                  <td>Office:</td>
                  <td class="text_center border_bottom"></td>
                </tr>
              </table>
            </td>
            <td class="border font_size_11" width="20%">
              <table width="100%">
                <tr>
                  <td width="100%">Responsibility Center Code:</td>
                </tr>
                <tr>
                  <td class="border_bottom">&nbsp;</td>
                </tr>

              </table>
            </td>
            <td class="border" width="50%">
              <table width="100%">
                <tr>
                  <td class="text_center" width="15%">RIS No.:</td>
                  <td class="border_bottom text_center" width="40%">{{$info->ris_no}}</td>
                  <td class="text_center" width="15%">Date:</td>
                  <td class="border_bottom text_center" width="25%">{{ date('F j Y', strtotime($info->ris_date)) }}<</td>
                </tr>
                <tr>
                  <td class="text_center">SAI No.:</td>
                  <td class="border_bottom text_center">{{$info->sai_no ?? ''}}</td>
                  <td class="text_center" width="15%">Date:</td>
                  <td class="border_bottom text_center">{{ isset($info->sai_date) ?  date('F j Y', strtotime($info->sai_date )) : '' }}</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

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
                                  $desc =$data->description;

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
                                    <td width="90%" class="underline" style="margin-right: 5px;">{{$info->pr_purpose ?? ''}}</td>
                                    <td width="0.5%"></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" class="underline">&nbsp;</td>
                                  </tr>

                                </table>
                              </td>
                            </tr>

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
                                    @php
                                      $name = explode('/', $info->name_app);
                                    @endphp
                                  <tr>
                                    <td align="center"><b>Printed Name:</b></td>
                                    <td class="border" align="center" style="font-size: 9px;"> {{ strtoupper($info->requested_by ?? '') }}</td>

                                        <td class="border_bottom" align="center"> <b>{{ $name[0]}}</b> </td>
                                        <td class="border_bottom" align="center"> <b>{{ $name[1]}}</b> </td>

                                        <td class="border" align="center">{{$info->issued_by}} </td>
                                        <td class="border" align="center">{{$info->received_by}}  </td>
                                  </tr>
                                  @php
                                      $des = explode('/', $info->designation_app);
                                  @endphp
                                  
                                  <tr>
                                    <td class="borderZero" align="center"><b>Designation:</b></td>
                                    <td class="border" align="center" style="font-size: 10px;">{{ strtoupper($info->designated_req ?? '') }}</td>

                                  

                                        <td class="border_bottom" align="center"> <b>{{$des[0]}}</b> </td>
                                        <td class="border_bottom" align="center"> <b>{{$des[1]}} </b> </td>
                                        <td class="border" align="center">{{ $info->issued_des}}</td>
                                        <td class="border" align="center">{{ $info->received_des}}</td>
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


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

   @stop

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
