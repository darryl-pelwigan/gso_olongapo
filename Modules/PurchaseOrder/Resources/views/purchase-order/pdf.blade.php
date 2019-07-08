@extends('template::pdf.default')

@section('content')
  <!-- Content Wrapper. Contains page content -->


  <div class="borderr content-wrapper">
 
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
           <div class="box-body">

             <header>
               <div class="table_header">
                 <table class="table table-thnormal padding-bottom">
                   <tr>
                     <td width="50%"></td>
                     <td style="padding-bottom: 11px; !important" id="centertext" align="center" width="50%">
                        <h3 class=pr_title">PURCHASE ORDER</h3>
                        <p>Republic of the Philippines</p>
                        <b>City of Olongapo</b>                     
                     </td>
                     <td width="50%"></td>
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
                            <td id="serif">Supplier: </td>
                            <td class="underline"><strong>{{$info->suppl_title}}</strong></td>
                          </tr>
                          <tr>
                            <td id="serif">Address: </td>
                            <td class="underline"><strong>{{$info->details}}</strong></td>
                          </tr>
                        </table>
                      </td>
                      <td width="50%">

                        <table id="serif" width="100%">
                          <tr>
                            <td  width="40%">PO No.</td>
                            <td width="60%" class="underline"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$info->po_no}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Date:</td>
                            <td class="underline">{{$info->po_date}}</td>
                          </tr>
                          <tr>
                            <td>Mode of Procurement:  </td>
                            <td class="underline">{{$info->bac_mode}}</td>
                          </tr>
                          <tr>
                            <td>P.R No:/s </td>
                            <td class="underline">{{$info->pr_no}}</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="header_tbl">
                  <table id="serif" class="table table-thnormal">
                      <tr>
                        <td>
                          Gentelmen:<br>
                          &nbsp;&nbsp;&nbsp;&nbsp; Please furnish this office the following articles subject to the terms and conditions contained herein:
                        </td>
                      </tr>
                    </table>
                </div>

                <div class="header_tbl">
                  <table id="serif" class="table table-thnormal">
                  <tr>
                    <td class="table1" width="50%">
                      <table class="table_header" width="100%">
                        <tr>
                          <td width="0%" >Place of Delivery: </td>
                          <td width="0%" class="" > _____________________________</td>
                        </tr>
                        <tr>
                        <td width="0%">Date of Delivery: </td>
                          <td  width="0%" class=""> _____________________________</td>
                        </tr>
                      </table>
                    </td>
                    <td width="50%">
                      <table class="table_header" width="100%">
                        <tr>
                          <td width="13%" >Delivery Term: </td>
                          <td width="30%" class="">__________________________________</td>
                        </tr>
                        <tr>
                          <td>Payment Term: </td>
                          <td class="">__________________________________</td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
               </div>
                  <table class=" table1 table table-thnormal table-bordered page-break " id="tbl_items">
                      <tr>
                        <td width="0%" align="center"><b>Item <br /> No.</b></td>
                        <td width="0%" align="center"><b>UNIT</b></td>
                        <td width="0%" align="center"><b>QUANTITY</b></td>
                        <td width="51%" align="center"><b>DESCRIPTION</b></td>
                        <td width="0%" align="center"><b>UNIT<br>COST</b></td>
                        <td width="0%" align="center"><b>AMOUNT</b></td>
                      </tr>
                      <?php $count=1; $total_price=0; ?>
                        @foreach( $po_items as $data )
                            <tr id ="tbl_items">
                              <td id="tbl_items">{{ $count }}</td>
                              <td id="tbl_items">{{ $data->unit }}  </td>
                              <td id="tbl_items">{{ $data->qty }} </td>
                               <?php
                                  $desc =$data->description;

                                  //if (strlen($desc) > 100) { --}}

                                  if (strlen($desc) > 88) {
                                    echo '<td class="text-right2" id="desc_style" style="word-wrap:break-word;">'.$desc.'</td>';
                                  } else {
                                      echo '<td class="text-right2">'.$desc.'</td>';
                                  }
                                ?>

                              <td id="tbl_items" class="text-right2">{{ number_format($data->po_amount,2) }} </td>
                              <td id="tbl_items" class="text-right2">{{ number_format($data->po_total,2) }} </td>
                            </tr>
                          <?php $count++; $total_price += $data->po_total; ?>
                        @endforeach

                        <?php
                          $totaltr = 27;
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
                             <td colspan="5" class="total" style="font-size:15px">Total Amount in Words</td>
                             <td class="text-right2 total bold">{{ number_format($total_price,2) }}</td>
                            </tr>
                            <tr>
                              <td id="serif" colspan="6">
                                <div style="padding: 15px;"><span>&nbsp; &nbsp; &nbsp;In case of failure to make the full delivery wihtin the time specified above, a penalty of one tenth(1/10) of one percent for every day of delay shall be imposed.</span></div>

                                    <table class="serif" style="width: 100%;">
                                      <tr>
                                        <td style="padding-left: 15px" width="30px"></td>
                                        <td width="20px"> <p style="color:white">a</p></td>
                                        <td width="70px" style="">Very Truly yours,<br></td>
                                      </tr>
                                      <tr>
                                        <td >Conforme:</td>
                                        <td></td>
                                        <td style=""><br><br><span><u>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;{{ strtoupper($info->fname ?? '') }} {{ strtoupper($info->mname ?? '')  }}  {{ strtoupper($info->lname ?? '')}}&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;</u></span></td>
                                      </tr>
                                      <tr>
                                        <td ></td>
                                        <td></td>
                                        <td><p style="font-style:italic; padding-left: 50px;">(Authorized Official)</p></td>
                                      </tr>
                                      <tr>
                                        <td style="padding-left: 30px;"><br>____________________________</td>
                                        <td></td>
                                        <td ></td>
                                      </tr>
                                       <tr>
                                        <td style="font-style:italic; padding-left: 38px;">(Signature Over Printed Name)</p></td>
                                        <td></td>
                                        <td ></td>
                                      </tr>
                                       <tr>
                                        <td style="padding-left: 30px;"><br><br>__________________</td>
                                        <td></td>
                                        <td ></td>
                                      </tr>
                                       <tr>
                                        <td id="serif " style="padding-left: 75px;"><p style="font-family: Times-New-Roman !important;">(Date)<br></p></td>
                                        <td></td>
                                        <td ></td>
                                      </tr>
                                    </table>

                              </td>
                            </tr>
                            <tr>
                              <td class="serif" colspan="6">
                                <div style="padding: 15px;"><span>(In case of Negotiated Purchase pursuant to Section 369 (a) of RA 7160, this portion must be accomplished.)</span>
                                </div>
                                <div style="padding: 15px;">
                                  <span>Approved per Sanggunian Resolution No. __________________________________
                                  </span>
                                </div>
                                <br>
                                <div>
                                    <table id="serif" style="width: 100%;">
                                       <tr>
                                        <td id="serif" width="60%"><p style= "font-family: Times-New-Roman !important;padding-left: 15px; ">Certified Correct: ________________________________</p></td>
                                        <td style="" width="25%">Date: _________________</td>
                                      </tr>
                                       <tr>
                                        <td width="" ><p style="font-style:italic; padding-left: 150px;">Secretary to the Sanggunian<br></p></td>
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
    </div>
  <!-- /.content-wrapper -->

   @stop






@section('plugins-css')
<style type="text/css">
/*< <?php if ($count <= 30 && $count > 26){
                          echo "
                                #tbl_items{

                                }
                              ";
                        }
                        else if ($count <= 25 && $count > 21){
                          echo "
                                #tbl_items{

                                }
                              ";
                        }
                        else if ($count <= 20 && $count > 16){
                          echo "
                                #tbl_items{

                                }
                              ";
                        }
                        else if ($count <= 15 && $count > 11){
                          echo "
                                #tbl_items{

                                }
                              ";
                        }
                        else if ($count <= 10 &&  $count > 6){
                          echo "
                                #tbl_items{

                                }
                              ";
                        }
                        else {
                          echo "
                                #tbl_items{

                                }
                              ";
                        }
                        ?>*/
html,body{
  margin: 10px 20px;
  font-size: 15.3px;
  
}

.serif {
  font-family: "Times-New-Roman" !important;
  padding: 15px;
}
#serif{
  font-family: "Times-New-Roman" !important;
}

.bold{
  font-style:bold; 
}

/* .borderless{
  border-collapse: collapse;
  width: 100%;
} */
.borderr{
  border-style: solid;
  border-width: 2px;
  
}
/* .content-wrapper{
  flex-flow: row wrap;
  font-weight: bold;
  text-align: center;
  padding: 10px;
  flex: 1 100%;
} */
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
  font-weight: bold
  
}

.text-right2{
  text-align: center;
}
.pr_title{
  font-family: "Arial-black" !important;
  font-weight: bolder;
  text-align: center;
 
}

.centertext2{
  /* display:inline-block; */
  margin-left: auto;
  margin-right: auto;
  font-family: "Times-New-Roman";
}
  
}
#centertext{
  display: block;
  margin-left: auto;
  margin-right: auto;
  
}
.header_tbl{
  /* border: 2px solid #000 !important; */
  border-top: 1px solid #000;
  text-align: center;
 
  /* border: none; */
  /*margin-bottom: -20px;*/
}
.underline{
  text-align: center;
  border-bottom:1px solid;
}
.table_header tr td{
  /* padding: 3px; */
  text-align: center;
  /* padding-bottom: 25px; */
  
  /* border: none; */
}
.padding-bottom{
  /* padding-bottom: 25%; */
}

.center{
  text-align: center;
 
}
#table_left{
  /* border-right: 1px solid #000; */
  /* margin-left: auto;
  margin-right: auto;
  display: block; */
}
.table1{
  /* border-right: 1px solid #000; */
  border-collapse: collapse;
 
}
#border-top{
  border-top: 1px solid #000;
}

.table1 td{
  padding:0;
  margin:0;
 
}

.table_footer tr td{
  text-align: center;
  font-family: "Times-New-Roman", Times, serif;
}

.font_italic{
  font-style: italic;
}

div {
    /*page-break-after: avoid;*/
}


</style>


@stop
