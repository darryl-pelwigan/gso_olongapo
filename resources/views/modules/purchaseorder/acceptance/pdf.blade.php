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
                 <table width="100%">
                   <tr>
                     <td>
                       <h4 class="title">ACCEPTANCE AND INSPECTION REPORT</h4>
                       <p class="title2">Republic of the Philippines<br>City of Olongapo</p>
                     </td>
                   </tr>
                 </table>
               </div>
             </header>
                 <div class="header_tbl">
                  <table width="100%">
                    <tr>
                      <td>
                        <table>
                          <tr>
                            <td class="label_name">Supplier: </td>
                            <td class="underline" style='padding-right:300px'><strong>{{$info->suppl_title}}</strong></td>
                            <td>AAI No.: </td>
                            <td class="underline_2">{{$info->aai_no}}</td>
                          </tr>
                        </table>
                          <table>
                          <tr>
                            <td class="label_name">PO No.: </td>
                            <td  class="underline_2"><strong>{{$info->po_no}}</strong></td>
                            <td class="label_name">&nbsp;&nbsp;&nbsp;Date : </td>
                            <td class="underline_2">{{$info->aai_date}}</td>
                            <td class="label_name" >&nbsp;&nbsp;&nbsp;Invoice No.: </td>
                            <td class="underline_2" style="padding-right: 40px">{{$info->invoice_no}}</td>
                            <td class="label_name">&nbsp;&nbsp;&nbsp;Date : </td>
                            <td class="underline_2">{{$info->invoice_date}}</td>
                          </tr>
                        </table>
                        <table>
                          <tr>
                            <td class="label_name">Requisitioning Office/Dept: </td>
                            <td class="underline"><strong>{{$info->dept_desc}}</strong></td>
                            <td class="label_name">&nbsp;&nbsp;&nbsp;Responsibility Center Code: </td>
                            <td class="underline"><strong>{{$info->subdept_code}}</strong></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>

                  <table class=" tbl_all table table-thnormal table-bordered" width="100%">
                      <tr class="tr1">
                        <td align="center"><b>Item No.</b></td>
                        <td align="center"><b>Unit</b></td>
                        <td align="center"><b>Description</b></td>
                        <td align="center"><b>Quantity</b></td>
                      </tr>
                      <?php $count=1; $total_price=0; ?>
                        @foreach( $po_items as $data )
                            <tr id= "tbl_items">
                              <td class="output_txt" align="center">{{ $data->unit }}</td>
                              <td class="output_txt" align="center">{{ $count }}</td>

                              <?php
                              $descript = $data->description;
                             if (strlen($descript) > 100) {
                                    echo '<td style="word-wrap:break-word;">'.$descript.'</td>';
                                  } else {
                                      echo '<td>'.$descript.'</td>';
                                  }
                                ?>
                              ?>
                              <td class="output_txt" align="center">{{ $data->qty }}</td>
                            </tr>
                          <?php $count++; $total_price += $data->po_total; ?>
                        @endforeach

                        <?php
                          $totaltr = 36;
                          $loop = $totaltr - $count;
                          if($loop > 0){
                            for ($i=0; $i < $loop; $i++) {
                            ?>
                              <tr>
                                  <td><br></td>
                                  <td><br></td>
                                  <td><br></td>
                                  <td><br></td>
                              </tr>
                            <?php
                            }
                                                                                                                                                                                                                                                                                                                                                                                                                }
                        ?>

                  </table>
                </div>
                  <div class="header_tbl">
                    <table class="table table-thnormal" width="100%">
                      <tr >
                        <td class="text3" id="table_left" width="50%">
                          <table>
                            <tr>
                              <td class="text2">ACCEPTANCE</td>
                            </tr>
                          </table>
                        </td>
                        <td class="text3">
                          <table>
                            <tr >
                              <td class="text2">INSPECTION</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                  </table>
                </div>

                <div class="header_tbl">
                    <table class="table table-thnormal" width="100%">
                      <tr>
                        <td id="table_left" width="50%">
                          <table>
                             <tr>
                              <td><br></td>
                            </tr>
                             <tr>
                              <td>Date Received: ________________________________________</td>
                            </tr>
                            <tr>
                              <td><input class="inp1" type="checkbox" > &nbsp;Completed</td>
                            </tr>
                            <tr>
                              <td><input class="inp1" type="checkbox" > &nbsp;Partial</td>
                            </tr>
                            <tr>
                              <td><br></td>
                            </tr>
                            <tr>
                              <td class="text"><u>{{$prop}}</u></td>
                            </tr>
                            <tr>
                              <td class="text">Supply and/or Property Custodian</td>
                            </tr>
                          </table>
                        </td>
                        <td>
                          <table>
                             <tr>
                              <td><br></td>
                            </tr>
                            <tr>
                              <td>Date Inspected: ________________________________________</td>
                            </tr>
                            <tr>
                              <td><input class="inp2" type="checkbox"> &nbsp;Inspected, verified and found OK <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; As to quantity and specifiactions</td>
                            </tr>
                            <tr>
                              <td><br></td>
                            </tr>
                            <tr>
                              <td class="text">_________________________________</td>
                            </tr>
                            <tr>
                              <td class="text">Inspection Officer/Inspection Committee</td>
                            </tr>

                          </table>
                        </td>
                      </tr>
                  </table>
                </div>

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
{{-- <?php
  $count = count($descript);
  if ($count <= 40 && $count > 18){
                          echo "
                                #tbl_items{
                                font-size: 10px;
                                }
                              ";
                        }

                        else if ($count <= 15 && $count > 11){
                          echo "
                                #tbl_items{
                                font-size: 10px;
                                }
                              ";
                        }
                        else if ($count <= 10 && $count > 6){
                          echo "
                                #tbl_items{
                                font-size: 10px;
                                }
                             ";
                        }
                        else {
                          echo "
                                #tbl_items{
                                font-size: 10px;
                                }
                             ";
                        }

?> --}}
html,body{
  margin: 5px 5px;
  font-size: 13px;
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
/*
.table-bordered>thead>tr>th{
  text-align: center;
}*/
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
/*.pr_title{
  font-family: "Arial" !important;
  font-weight: bolder;
  text-align: center;
}*/
.header_tbl{
  border: 1px solid #000 !important;
  /*margin-bottom: -20px;*/
}
.underline{
  font-size: 16px;
  border-bottom: 1px solid;
  width: 75px;
}

.underline_2{
  font-size: 16px;
  border-bottom: 1px solid;
  width: 25px;
}
/*.table_header tr td{
  padding: 3px;
}*/
#table_left{
  border-right: 1px solid #000;
}
.table1{
  border-right: 1px solid #000;
}

.table1 td{
  padding:0; margin:0;
}

.table_footer tr td{
  text-align: center;
}

.title {
  margin-top: 5px;
  text-align: center;
  font-size: 18px;
}

.title2 {
  text-align: center;
  font-size: 15px;
  margin-bottom: 5px;
}

.tbl_all {
  border-collapse: collapse;
}

.tr1 {
  font-size: 18px;
}

.text {
  text-align: center;
}

.inp1 {
  text-align: center;
  padding-left: 55px;
  width: 18px;
  height: 18px;
}

.inp2 {
  text-align: center;
  padding-left: 45px;
  width: 18px;
  height: 18px;
}

.text2 {
  font-weight: bolder;
  font-size: 17px;
}

.text3 {
  text-align: center;
}

.output_txt {
  font-size: 13px;
  margin-top: 5px;
  margin-bottom: 5px;
}

.label_name {
  font-size: 15px;
}

div {
    /*page-break-after: avoid;*/
}

</style>


@stop
