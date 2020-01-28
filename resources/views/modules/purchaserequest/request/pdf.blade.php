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
                     <td align="right" width="25%" style="padding-left:130px;"><img src="{{asset('olongapo')}}/img/logo-100.png" alt="" height="75px;"></td>
                     <td align="center" width="100%" style="padding-left:60px;">
                       <h3 class="pr_title">PURCHASE REQUEST</h3>
                       <p>Republic of the Philippines</p>
                       City of Olongapo</td>
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
                            <td style="padding-right:60px;">Department: </td>
                            <td class="underline"><strong>{{$pr->pr_dept->dept->dept_desc}}</strong></td>
                          </tr>
                          <tr>
                            <td>Section: </td>
                            <td class="underline"><strong>{{$pr->pr_dept->dept_desc}}</strong></td>
                          </tr>
                          <tr>
                            <td> &nbsp;</td>
                          </tr>
                          <tr>
                            <td> &nbsp;</td>
                          </tr>
                        </table>
                      </td>
                      <td width="35%">
                        <table class="table_header" width="100%" style="margin-right:15px;">
                          <tr>
                            <td width="40%">PR No.: </td>
                            <td width="60%" class="underline" style="padding-right:80px;"><strong>{{$pr->pr_no}}</strong></td>
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
                            <td style="padding-right:25px;">APP/PPMP No.:</td>
                            <td class="underline"><strong>{{$pr->ppmp->ppmp_no ?? ''}}</strong></td>
                          </tr>
                        </table>
                      </td>
                      <td width="25%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td style="padding-right:30px;">Date:</td>
                            <td class="underline" style="padding-right:50px;">{{$pr_date->format('F d , Y')}}</td>
                          </tr>
                          <tr>
                            <td>Date:</td>
                            <td class="underline">{{ date('F d, Y', strtotime($pr->sai_date)) }}</td>
                          </tr>
                          <tr>
                            <td>Date:</td>
                            <td class="underline">{{ $obr_date }}</td>
                          </tr>
                           <tr>
                            <td> &nbsp;</td>
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
                        ?>

                        @for ($x = $xx; $x < $loops; $x++)
                          <?php if(isset($prs[$x]['qty'] )){?>
                            <?php $total_price = $prs[$x]['unit_price'] * $prs[$x]['qty'];  ?>
                              <tr id="tbl_items">
                                <td class="text-right2" style='padding:5px; text-align: center;'>{{ ($x+1) }}</td>
                                <td class="text-right2" style='text-align: center;'>{{ $prs[$x]['qty'] }}</td>
                                <td class="text-right2" style='text-align: center;'>{{ $prs[$x]['unit'] }}</td>
                                <td class="text-right2" style='word-wrap: break-word; text-align: left; padding-left: 5px;'>{{ $prs[$x]['description'] }}</td>
                                <td class="text-right2"  style='text-align: right; padding-right: 5px;'>{{ number_format($prs[$x]['unit_price'],2) }} </td>
                                <td class="text-right2"  style='text-align: right; padding-right: 5px;'>{{ number_format($prs[$x]['total_price'],2) }} </td>
                              </tr>
                            <?php $count++;  $unit_price_total += $prs[$x]['unit_price'] ; $sum_price_total +=$total_price;  ?>
                        <?php
                        }else{
                        ?>
                            <tr>
                              <td style='padding:5px;'><br></td>
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
                         <?php if ($count <= 30 && $count > 21){
                          echo "<style>";
                          echo "#tbl_items{";
                          echo "font-size: 9.5px;";
                          echo "}";
                          echo "</style>";
                        }
                        else if ($count <= 20 && $count > 11){
                          echo "<style>";
                          echo "#tbl_items{";
                          echo "font-size: 10.5px;";
                          echo "}";
                          echo "</style>";
                        }
                        else {
                          echo "<style>";
                          echo "#tbl_items{";
                          echo "font-size: 11.5px;";
                          echo "}";
                          echo "</style>";
                        }
                        ?>

                        <?php $alltotal += $sum_price_total; ?>
                        <tr>
                         <td colspan="5" class="total" style="padding:10px">{{ ($i == round($pageloop) || round($pageloop) == 1 ? 'Total' : 'Subtotal') }} </td>
                         <td class="text-right2 total" style="padding:10px">{{ ($i == round($pageloop) || round($pageloop) == 1 ? number_format($alltotal,2) : number_format($sum_price_total,2))  }}</td>
                        </tr>

                    </tbody>
              </table>
              @if($i == round($pageloop) || $pageloop == 1)
                <table class="tbl_purpose" width="100%" style="border-left: 1px solid; border-right: 1px solid; border-collapse: collapse;">
                  <tr>
                    <td width="5%"> &nbsp; </td>
                    <td width="8%"> Purpose: </td>
                    <td style="border-bottom: 1px solid black;"> {{$pr->pr_purpose}} </td>

                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                  </tr>

             {{--       <tr>
                       <td colspan="6" rowspan="4" style="padding-right:6px;">PURPOSE : <span><u>{{$pr->pr_purpose}}</u></span></td>
                    </tr> --}}
                </table>
              @endif
              <table class="table  table-bordered table_footer" border="1" style="border-collapse: collapse;"  width="100%">
                  <tr>
                      <td >&nbsp;</td>
                      <td width="25%" style="padding-right: 50px; padding-left:50px;">Requested by:</td>
                      <td width="23%" style="padding-right: 35px; padding-left:35px;">Appropriation Availability:</td>
                      <td width="37%" >Approved by:</td>
                  </tr>
                  <tr>
                    <td rowspan="3" style="padding-right:13px; padding-left:13px">Signature:<br/>Printed Name:<br/>Designation:</td>
                    <td class="underline"><br></td>
                    <td class="underline"><br></td>
                    <td class="underline"><br></td>
                  </tr>
                  <tr>
                    <td class="underline">{{ $form["name_req"]}}</td>

      {{--               @if ($approved_by)
                      @foreach ($approved_by as $element)
                        @if ($element->position == "ICo, City Treasurer's Office")
                          <td class="underline"> {{ $element->full_name }}</td>
                        @endif

                      @endforeach
                    @endif --}}

                    @php
                      $treasurer = '';
                      $sec_mayor = '';
                      if ($approved_by) {
                        foreach ($approved_by as $key => $value) {
                          if ($value->position == "Ico, City Treasurer's Office") {
                            $treasurer = $value->full_name;

                          }

                          if ($value->position == "Secretary To The Mayor") {
                            $sec_mayor .= $value->full_name;
                          }

                          if ($value->position == "City Mayor") {
                            $sec_mayor .= ' / '.$value->full_name;
                          }


                        }
                      }
                    @endphp

                    <td>{{ $form["name_avail"]}}</td>


                    <td class="underline">{{ $form["name_app1"]}} / {{ $form["name_app2"]}} </td>

                    {{-- <td class="underline" style="padding-right: 20px; padding-left:20px;">{{ strtoupper($approved_by[0]->full_name ?? '') }} / {{ strtoupper($approved_by[1]->full_name ?? '') }}</td> --}}
                  </tr>
                   <tr>
                    <td class="underline">{{$form["designation_req"]}}</td>
                    <td>{{ $form["designation_avail"]}}</td>
                    <td class="underline">{{ $form["designation_app1"] }} / {{ $form["designation_app2"] }}</td>
                  </tr>
              </table>
              <div style="page-break-after: always">
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




@section('plugins-css')
<style type="text/css">

html,body{
  margin: 10px 10px;
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
  font-size: 25px;
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
  padding: 1px;
  margin: 0px;
  border-collapse: collapse;
  /*font-size: 14px;*/
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
