@extends('template::pdf.default')

@section('content')
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<?php
$pr_date = new Carbon\Carbon($pr->pr_date);
$obr_date = '';
if($pr->obr_id){
  $obr_date = new Carbon\Carbon($pr->pr_obr->obr_date);
  $obr_date = $obr_date->format('F d , Y');
}
 $bac_type = '';
if($pr->proc_type != 0){
  $bac_type = $pr->bac_type->proc_title;
}
?>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
           <div class="box-body">

            <?php
              $totalrows = count($pr->pr_items()->get());
              $rowsperpage = 30;
              $totalpages = $totalrows / 30;
              $pageloop = ($totalpages < 1 ? 1 : $totalpages);
              $alltotal = 0;
              $prs = $pr->pr_items()->get();
              for($i = 0; $i < $pageloop; $i++){
            ?>
            <div class="pages">
             <header>
               <div class="header_tbl">
                 <table class="table table-thnormal" >
                   <tr>
                     <td align="right" width="25%"><img src="{{asset('olongapo')}}/img/logo-100.png" alt="" height="75px;"></td>
                     <td align="center" width="50%">
                       <h3 class="pr_title">PURCHASE REQUEST</h3>
                       <p>Republic of the Philippines</p>
                       City of Olongapo</td>
                     <td width="25%"></td>
                   </tr>
                 </table>
               </div>
             </header>
              <div class="header_tbl">
                  <table class="table table-thnormal">
                    <tr>
                      <td id="table_left" width="40%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td>Department: </td>
                            <td class="underline"><strong>{{$pr->pr_dept->dept->dept_desc}}</strong></td>
                          </tr>
                          <tr>
                            <td>Section: </td>
                            <td class="underline"><strong>{{$pr->pr_dept->dept_desc}}</strong></td>
                          </tr>
                        </table>
                      </td>
                      <td width="35%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td width="40%">PR No.: </td>
                            <td width="60%" class="underline"><strong>{{$pr->pr_no}}</strong></td>
                          </tr>
                          <tr>
                            <td>SAI No.:</td>
                            <td class="underline"><strong>{{$pr->sai_no}}</strong></td>
                          </tr>
                          <tr>
                            <td>ALOBS No.: </td>
                            <td class="underline"><strong>{{$pr->pr_obr->obr_no ?? ''}}</strong></td>
                          </tr>
                          <tr>
                            <td>APP/PPMP No.:</td>
                            <td class="underline"><strong>{{$pr->ppmp->ppmp_no ?? ''}}</strong></td>
                          </tr>
                        </table>
                      </td>
                      <td width="25%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td>Date:</td>
                            <td class="underline">{{$pr_date->format('F d , Y')}}</td>
                          </tr>
                          <tr>
                            <td>Date:</td>
                            <td class="underline">{{ date('F d, Y', strtotime($pr->sai_date)) }}</td>
                          </tr>
                          <tr>
                            <td>Date:</td>
                            <td class="underline">{{ $obr_date }}</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
              </div>

              <table class="table table-bordered" id="tbl_items" width="100%">
                    <thead>
                      <tr>
                        <th align="center" width="5%">Item <br /> No.</th>
                        <th align="center" width="6%">Quantity</th>
                        <th align="center" width="8%">Unit of <br/> Issue</th>
                        <th align="center">Item Description</th>
                        <th align="center" width="10%">Estimated<br>Unit Cost</th>
                        <th align="center" width="10%">Estimated<br>Cost</th>
                      </tr>

                    </thead>
                    <tbody>
                      <?php $count=1; $unit_price_total=0; $sum_price_total=0; ?>

                        <?php
                          $xx = $rowsperpage * $i;
                          $loops = $rowsperpage * ($i+1);
                          $prs = $pr->pr_items()->get();
                          $counter = 0;
                        ?>

                        @for ($x = $xx; $x < $loops; $x++)
                          <?php if(isset($prs[$x]['qty'] )){?>
                            <?php $total_price = $prs[$x]['unit_price'] * $prs[$x]['qty'];  ?>
                              <tr id="tbl_items">
                                <td class="text-right2">{{ ($x+1) }}</td>
                                <td class="text-right2">{{ $prs[$x]['qty'] }}</td>
                                <td class="text-right2">{{ $prs[$x]['unit'] }}</td>
                                {{--td class="text-right2">{{ $prs[$x]['description'] }}</td>--}}
                                <?php
                                  $desc = $prs[$x]['description'];
                                  $length_count = strlen($desc);

                                  if ( $length_count > 88) {

                                    $div = $length_count / 88;
                                    $whole_numer = ceil($div);

                                    echo '<td class="text-right2" id="desc_style" style="word-wrap:break-word;">'.$desc.'</td>';
                                    $loops -= $whole_numer;
                                    $counter++;


                                  } else {
                                      echo '<td class="text-right2">'.$desc.'</td>';
                                  }
                                ?>

                                <td class="text-right2">{{ number_format($prs[$x]['unit_price'],2) }} </td>
                                <td class="text-right2">{{ number_format($prs[$x]['total_price'],2) }} </td>
                              </tr>
                            <?php $count++;  $unit_price_total += $prs[$x]['unit_price'] ; $sum_price_total +=$total_price;  ?>
                        <?php
                        }else{
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
                        ?>
                        @endfor
                         <?php if ($totalrows <= 30 && $totalrows > 26){
                          echo "<style>
                                #tbl_items{

                                }
                              </style>";
                        }
                        else if ($totalrows <= 25 && $totalrows > 21){
                          echo "<style>
                                #tbl_items{

                                }
                              </style>";
                        }
                        else if ($totalrows <= 20 && $totalrows > 16){
                          echo "<style>
                                #tbl_items{

                                }
                              </style>";
                        }
                        else if ($totalrows <= 15 && $totalrows > 11){
                          echo "<style>
                                #tbl_items{

                                }
                              </style>";
                        }
                        else if ($totalrows <= 10 && $totalrows > 6){
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

                        <?php $alltotal += $sum_price_total; ?>
                        <tr>
                         <td colspan="5" class="total">{{ ($i == round($pageloop) || round($pageloop) == 1 ? 'Total' : 'Subtotal') }} </td>
                         <td class="text-right2 total">{{ ($i == round($pageloop) || round($pageloop) == 1 ? number_format($alltotal,2) : number_format($sum_price_total,2))  }}</td>
                        </tr>

                    </tbody>
              </table>
              @if($i == round($pageloop) || $pageloop == 1)
                <table class="table  table-bordered tbl_purpose" border="1">
                   <tr>
                       <td colspan="6" rowspan="4">PURPOSE :  <span><u>{{$pr->pr_purpose}}</u></span><br>___________________________________________________________________________________________________________________</td>
                     </tr>
                </table>
              @endif
              <table class="table  table-bordered table_footer" border="1">
                  <tr>
                      <td width="15%"></td>
                      <td width="25%">Requested by:</td>
                      <td width="23%">Appropriation Availability:</td>
                      <td width="37%">Approved by:</td>
                  </tr>
                  <tr>
                    <td rowspan="3">Signature:<br/>Printed Name:<br/>Designation:</td>
                    <td class="underline"><br></td>
                    <td class="underline"><br></td>
                    <td class="underline"><br></td>
                  </tr>
                  <tr>
                    <td class="underline">{{ strtoupper($requested_by->fname ?? '') }} {{ strtoupper($requested_by->mname ?? '')  }}  {{ strtoupper($requested_by->lname ?? '')  }}</td>
                    <td class="underline">LIZA L. LIM</td>
                    <td class="underline">{{ strtoupper($approved_by[0]->full_name ?? '') }} / {{ strtoupper($approved_by[1]->full_name ?? '') }}</td>
                  </tr>
                   <tr>
                    <td class="underline">{{ $requested_by->title ?? '' }}</td>
                    <td class="underline">ICO, City Treasurer's Office</td>
                    <td class="underline"><br>{{ $approved_by[0]->position ?? ''}} / {{ $approved_by[1]->position ?? ''}}</td>
                  </tr>
              </table>
              </div>
              <?php
            }
              ?>
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

 <!-- NEXT PAGE FOR -->

 @php

  $totalrows2 = count($pr->pr_items()->get());
  $rowsperpage2 = 30;
  $totalpages2 = $totalrows2 / 30;
  $pageloop2 = ($totalpages2 < 1 ? 1 : $totalpages2);
  $alltotal2 = 0;

  $prs2 = $pr->pr_items()->get();

 @endphp

<div class="page-break"></div>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
           <div class="box-body">
            <?php
              for($i = 0; $i < $pageloop2; $i++){

            ?>
            <div class="pages">
             <header>
               <div class="header_tbl">
                 <table class="table table-thnormal" >
                   <tr>
                     <td align="right" width="25%"><img src="{{asset('olongapo')}}/img/logo-100.png" alt="" height="75px;"></td>
                     <td align="center" width="50%">
                       <h3 class="pr_title">PURCHASE REQUEST</h3>
                       <p>Republic of the Philippines</p>
                       City of Olongapo</td>
                     <td width="25%"></td>
                   </tr>
                 </table>
               </div>
             </header>
              <div class="header_tbl">
                  <table class="table table-thnormal">
                    <tr>
                      <td id="table_left" width="40%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td>Department: </td>
                            <td class="underline"><strong>{{$pr->pr_dept->dept->dept_desc}}</strong></td>
                          </tr>
                          <tr>
                            <td>Section: </td>
                            <td class="underline"><strong>{{$pr->pr_dept->dept_desc}}</strong></td>
                          </tr>
                        </table>
                      </td>
                      <td width="35%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td width="40%">PR No.: </td>
                            <td width="60%" class="underline"><strong>{{$pr->pr_no}}</strong></td>
                          </tr>
                          <tr>
                            <td>SAI No.:</td>
                            <td class="underline"><strong>{{$pr->sai_no}}</strong></td>
                          </tr>
                          <tr>
                            <td>ALOBS No.: </td>
                            <td class="underline"><strong>{{$pr->pr_obr->obr_no ?? ''}}</strong></td>
                          </tr>
                          <tr>
                            <td>APP/PPMP No.:</td>
                            <td class="underline"><strong>{{$pr->ppmp->ppmp_no ?? ''}}</strong></td>
                          </tr>
                        </table>
                      </td>
                      <td width="25%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td>Date:</td>
                            <td class="underline">{{$pr_date->format('F d , Y')}}</td>
                          </tr>
                          <tr>
                            <td>Date:</td>
                            <td class="underline">{{ date('F d, Y', strtotime($pr->sai_date)) }}</td>
                          </tr>
                          <tr>
                            <td>Date:</td>
                            <td class="underline">{{ $obr_date }}</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
              </div>

              <table class="table table-bordered" id="tbl_items" width="100%">
                    <thead>
                      <tr>
                        <th align="center" width="5%">Item <br /> No.</th>
                        <th align="center" width="6%">Quantity</th>
                        <th align="center" width="8%">Unit of <br/> Issue</th>
                        <th align="center">Item Description</th>
                        <th align="center" width="10%">Estimated<br>Unit Cost</th>
                        <th align="center" width="10%">Estimated<br>Cost</th>
                      </tr>

                    </thead>
                    <tbody>
                      <?php $count2=1; $unit_price_total2=0; $sum_price_total2=0; ?>

                        <?php
                          $xx2 = $rowsperpage2 * $i;
                          $loops2 = $rowsperpage2 * ($i+1) + $loops;

                          $prs_array = $pr->pr_items()->get();
                          $counter2 = 0;

                        ?>

                        @for ($x = $xx2; $x < $loops2; $x++)
                          <?php 
                            if ($x >= $loops) {

                              if(isset($prs2[$x]['qty'] )){ 
                          ?>
                            <?php $total_price2 = $prs2[$x]['unit_price'] * $prs2[$x]['qty'];  ?>
                              <tr id="tbl_items">

                                <td class="text-right2">{{ ($x+1) }}</td>
                                <td class="text-right2">{{ $prs2[$x]['qty'] }}</td>
                                <td class="text-right2">{{ $prs2[$x]['unit'] }}</td>

                                <?php
                                  $desc2 = $prs2[$x]['description'];
                                  $length_count2 = strlen($desc2);

                                  if ( $length_count2 > 88) {

                                    $div2 = $length_count2 / 88;
                                    $whole_numer2 = floor($div2);

                                    echo '<td class="text-right2" id="desc_style" style="word-wrap:break-word;">'.$desc2.'</td>';
                                    $loops2 -= $whole_numer2;
                                    $counter2++;


                                  } else {
                                      echo '<td class="text-right2">'.$desc2.'</td>';
                                  }

                                ?>

                                <td class="text-right2">{{ number_format($prs[$x]['unit_price'],2) }} </td>
                                <td class="text-right2">{{ number_format($prs[$x]['total_price'],2) }} </td>
                              </tr>
                            <?php $count2++;  $unit_price_total2 += $prs2[$x]['unit_price'] ; $sum_price_total2 +=$total_price2;  ?>
                        <?php 
                        }else{
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
                        @endfor
                         <?php if ($totalrows2 <= 30 && $totalrows2 > 26){
                          echo "<style>
                                #tbl_items{

                                }
                              </style>";
                        }
                        else if ($totalrows2 <= 25 && $totalrows2 > 21){
                          echo "<style>
                                #tbl_items{

                                }
                              </style>";
                        }
                        else if ($totalrows2 <= 20 && $totalrows2 > 16){
                          echo "<style>
                                #tbl_items{

                                }
                              </style>";
                        }
                        else if ($totalrows2 <= 15 && $totalrows2 > 11){
                          echo "<style>
                                #tbl_items{

                                }
                              </style>";
                        }
                        else if ($totalrows2 <= 10 && $totalrows2 > 6){
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

                        <?php $alltotal2 += $sum_price_total2; ?>
                        <tr>
                         <td colspan="5" class="total">{{ ($i == round($pageloop2) || round($pageloop2) == 1 ? 'Total' : 'Subtotal') }} </td>
                         <td class="text-right2 total">{{ ($i == round($pageloop2) || round($pageloop2) == 1 ? number_format($alltotal2,2) : number_format($sum_price_total2,2))  }}</td>
                        </tr>

                    </tbody>
              </table>
              @if($i == round($pageloop2) || $pageloop2 == 1)
                <table class="table  table-bordered tbl_purpose" border="1">
                   <tr>
                       <td colspan="6" rowspan="4">PURPOSE :  <span><u>{{$pr->pr_purpose}}</u></span><br>___________________________________________________________________________________________________________________</td>
                     </tr>
                </table>
              @endif
              <table class="table  table-bordered table_footer" border="1">
                  <tr>
                      <td width="15%"></td>
                      <td width="25%">Requested by:</td>
                      <td width="23%">Appropriation Availability:</td>
                      <td width="37%">Approved by:</td>
                  </tr>
                  <tr>
                    <td rowspan="3">Signature:<br/>Printed Name:<br/>Designation:</td>
                    <td class="underline"><br></td>
                    <td class="underline"><br></td>
                    <td class="underline"><br></td>
                  </tr>
                  <tr>
                    <td class="underline">{{ strtoupper($requested_by->fname ?? '') }} {{ strtoupper($requested_by->mname ?? '')  }}  {{ strtoupper($requested_by->lname ?? '')  }}</td>
                    <td class="underline">LIZA L. LIM</td>
                    <td class="underline">{{ strtoupper($approved_by[0]->full_name ?? '') }} / {{ strtoupper($approved_by[1]->full_name ?? '') }}</td>
                  </tr>
                   <tr>
                    <td class="underline">{{ $requested_by->title ?? '' }}</td>
                    <td class="underline">ICO, City Treasurer's Office</td>
                    <td class="underline"><br>{{ $approved_by[0]->position ?? ''}} / {{ $approved_by[1]->position ?? ''}}</td>
                  </tr>
              </table>
              </div>
              <?php
            }
              ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
   @stop


@section('plugins-css')
<style type="text/css">

html,body{
  margin: 0px 5px;
}

.table-thnormal>tr>td, {
  font-weight: normal;
  font-size: 12px;
}
.table-thnormal, .table-bordered {
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
  font-size: 16px;
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
  font-weight: normal;
  font-size: 12px;
}
#table_left{
  border-right: 1px solid #000;
}
.table_footer tr td{
  text-align: center;
  font-size: 12px;

}
#tbl_items{
  padding: 0px;
  margin: 0px;
  font-size: 12.5px;
}
.tbl_purpose{
  font-size: 12.5px;

}
.pages{
  max-height:850px;
}

.page-break{
  page-break-before: always;
}
</style>


@stop
