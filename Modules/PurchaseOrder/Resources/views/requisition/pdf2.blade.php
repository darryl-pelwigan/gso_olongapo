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
                       <h3 class="pr_title">REQUISITION AND ISSUE SLIP</h3>
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


                    <tr>
                      <td id="table_left" width="30%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td>Division: </td>
                            <td width="50%" class="underline">{{$info->_main_dept_desc}}</td>
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
                            <td width="60%" class="underline"><br></td>
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
                            <td width="60%" class="underline"><br></td>
                          </tr>
                        </table>
                      </td>
                      </td>
                    </tr>
                  </table>
                </div>

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
                          <?php $count++; $total_price += $data->total_price; ?>
                        @endforeach

                        <?php
                          $totaltr = 40;
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
                                    <td class="border" align="center"> &nbsp; </td>
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
                                    <td class="border" align="center">&nbsp;</td>
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
                        else if ($count<= 15 && $count> 11){
                          echo "<style>
                                #tbl_items{
                                font-size: 10px;
                                }
                              </style>";
                        }
                        else if ($count <= 10 && $count> 6){
                          echo "<style>
                                #tbl_items{
                                font-size: 11px;
                                }
                              </style>";
                        }
                        else {
                          echo "<style>
                                #tbl_items{
                                font-size: 12px;
                                }
                              </style>";
                        }
                        ?>




@section('plugins-css')
<style type="text/css">

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
