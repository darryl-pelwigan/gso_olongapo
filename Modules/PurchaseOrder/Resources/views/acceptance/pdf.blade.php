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
                       <h4 class="pr_title">ACCEPTANCE AND INSPECTION REPORT</h4>
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
                            <td>Entity Name: </td>
                            <td class="underline"></td>
                          </tr>
                        </table>
                      </td>
                      <td width="50%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td width="40%">Fund Cluster: </td>
                            <td width="60%" class="underline">{{$info->sourcefund}}</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
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
                            <td>PO No./Date: </td>
                            <td class="underline"><strong>{{$info->po_no}}</strong></td>
                          </tr>
                          <tr>
                            <td>Requisitioning Office/Dept: </td>
                            <td class="underline"><strong>{{$info->dept_desc}}</strong></td>
                          </tr>
                          <tr>
                            <td>Responsibility Center Code: </td>
                            <td class="underline"><strong>{{$info->subdept_code}}</strong></td>
                          </tr>
                        </table>
                      </td>
                      <td width="50%">
                        <table class="table_header" width="100%">
                          <tr>
                            <td width="40%">AAI No.: </td>
                            <td width="60%" class="underline">{{$info->aai_no}}</td>
                          </tr>
                           <tr>
                            <td width="40%">Date : </td>
                            <td width="60%" class="underline">{{$info->aai_date}}</td>
                          </tr>
                          <tr>
                            <td width="40%">Invoice No.: </td>
                            <td width="60%" class="underline">{{$info->invoice_no}}</td>
                          </tr>
                          <tr>
                            <td width="40%">Date : </td>
                            <td width="60%" class="underline">{{$info->invoice_date}}</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>

                  <table id = "tbl_items" class="table table-bordered page-break">
                      <tr>
                        <td width="5%" align="center"><b>Stock/ <br /> Property No.</b></td>
                        <td width="51%" align="center"><b>Description</b></td>
                        <td width="12%" align="center"><b>Unit</b></td>
                        <td width="12%" align="center"><b>Quantity</b></td>
                      </tr>
                      <?php $count=1; $total_price=0; ?>
                        @foreach( $po_items as $data )
                            <tr id= "tbl_items">
                              <td>{{ $count }}</td>
                              <td>{{ $data->unit }}  </td>
                              <td>{{ $data->qty }} </td>
                              <?php if(strlen($data->description)>85){
                                echo"<td class='text-right2' style='word-wrap: break-word;font-size:5px' >";
                                echo $data->description;
                                echo"</td>";
                                }
                                else{
                                echo"<td class='text-right2' style='word-wrap: break-word;' >";
                                echo $data->description;
                                echo"</td>";
                                }
                                ?>

                            </tr>
                          <?php $count++; $total_price += $data->po_total; ?>
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

                            </tr>
                        <?php
                            }
                                                                                                                                                                                                                                                                                                                                                                                                                                                           }
                        ?>


                  </table>
                   <div class="header_tbl">
                    <table class="table table-thnormal">
                      <tr>
                        <td id="table_left" width="50%">
                          <table class="table_header" width="100%">
                            <tr>
                              <td class="text-center">INSPECTION</td>
                            </tr>
                          </table>
                        </td>
                        <td width="50%">
                          <table class="table_header" width="100%">
                            <tr>
                              <td class="text-center">ACCEPTANCE</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                  </table>
                </div>
                <div class="header_tbl">
                    <table class="table table-thnormal">
                      <tr>
                        <td id="table_left" width="50%">
                          <table class="table_header" width="100%">
                            <tr>
                              <td>Date Inspected: _________________________________________</td>
                            </tr>
                            <tr>
                              <td><input type="checkbox" name=""> Inspected, verified and found in order to quantity and specifications.</td>
                            </tr>
                            <tr>
                              <td><br></td>
                            </tr>
                            <tr>
                              <td><br></td>
                            </tr>
                            <tr>
                              <td class="text-center">_________________________________</td>
                            </tr>
                            <tr>
                              <td class="text-center">Inspection Officer/Inspection Committee</td>
                            </tr>

                          </table>
                        </td>
                        <td width="50%">
                          <table class="table_header" width="100%">
                             <tr>
                              <td>Date Received: _________________________________________</td>
                            </tr>
                            <tr>
                              <td><input type="checkbox" name=""> Completed</td>
                            </tr>
                            <tr>
                              <td><input type="checkbox" name=""> Partial (pls. specify quantity)</td>
                            </tr>
                            <tr>
                              <td><br></td>
                            </tr>
                            <tr>
                              <td class="text-center">_________________________________</td>
                            </tr>
                            <tr>
                              <td class="text-center">Supply and/or Property Custodian</td>
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
<?php if ($count <= 30 && $count > 26){
                          echo "
                                #tbl_items{
                                font-size: 7px;
                                }
                              ";
                        }
                        else if ($count <= 25 && $count > 21){
                          echo "
                                #tbl_items{
                                font-size: 8px;
                                }
                              ";
                        }
                        else if ($count <= 20 && $count > 16){
                          echo "
                                #tbl_items{
                                font-size: 9px;
                                }
                              ";
                        }
                        else if ($count <= 15 && $count > 11){
                          echo "
                                #tbl_items{
                                font-size: 11px;
                                }
                              ";
                        }
                        else if ($count <= 10 && $count > 6){
                          echo "
                                #tbl_items{
                                font-size: 13px;
                                }
                              ";
                        }
                        else {
                          echo "
                                #tbl_items{
                                font-size: 15px;
                                }
                              ";
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
