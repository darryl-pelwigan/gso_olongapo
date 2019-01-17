@extends('template::pdf.default')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header text-center">
      <table width="30%" align="center">
        <tr>
          <td align="right"><img src="{{asset('olongapo/img/logo-100.png')}}" alt="" width="50px;" style="margin-top: -25px;"></td>
          <td align="center">
              <b>Republic of the Philippines</b>
              <p>City of Olongapo</p>
              <b style="font-size: 16px;">General Services Office</b><br><br>
              <b style="font-size: 18px;">POST INSPECTION REPAIR FORM</b><br><br>
          </td>
        </tr>
      </table>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
           <div class="box-body">
              <table width="100%" class="report_data">
                  <tr>
                    <td width="150px">Equipment Make & Model</td>
                    <td width="180px" class="underline">{{$inspection->equimentmodel}}</td>
                    <td width="100px">Model/Plate no.:</td>
                    <td width="180px" class="underline">{{$inspection->modelplate}}</td>
                    <td width="110px">Date of Repair</td>
                    <td width="170px" class="underline">{{$inspection->daterepair}}</td>
                    <td width="150px" >Post Inspection Report No.</td>
                    <td width="100px" class="underline">{{$inspection->post_inspection_report_no}}</td>
                  </tr>
              </table><br>
              <table width="100%" class="report_data">
                  <tr>
                    <td width="50px">End User:</td>
                    <td class="underline" width="180px;">{{$inspection->end_user}}</td>
                    <td width="150px;">Name &amp; Address of Repair Store</td>
                    <td class="underline" width="245px;">{{$inspection->name_address_repair_store}}</td>
                    <td width="30px" >Date</td>
                    <td width="140px" class="underline">{{$inspection->date_inspection_report}}</td>
                  </tr>
              </table><br>
              <table width="100%" class="report_data">
                  <tr>
                    <td width="120px;">Date of LTO Registration (for vehicle): </td>
                    <td width="60px;" class="underline">{{$inspection->date_lto_reg}}</td>
                    <td width="60px;">Date Acquired:</td>
                    <td width="100px;" class="underline">{{$inspection->date_acquired}}</td>
                    <td width="150px;"></td>
                    <td width="150px;">Requested By</td>
                  </tr>
              </table><br>
              <table width="100%">
                  <tr>
                    <td width="80%">
                        <table class="table table-bordered">
                          <thead>
                              <tr>
                                <th>Qty</th>
                                <th>Unit</th>
                                <th>Parts Supplied/Installed</th>
                                <th>Invoice No.</th>
                                <th>Date</th>
                                <th>Unit Cost</th>
                                <th>Total Cost</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $row = 18 - count($pr->pr_items()->get());
                              ?>
                                @foreach( $pr->pr_items()->get() as $prs )
                                    @if(in_array($prs->id, $inspection_ids))
                                      <tr>
                                          <td>{{ $prs->qty }}</td>
                                          <td>{{ $prs->unit }} </td>
                                          <td>{{ $prs->description }}</td>
                                          <td></td>
                                          <td>{{ $prs->pr_date }}  </td>
                                          <td class="text-right" style="padding-right: 20px;"> {{ number_format($prs->unit_price,2) }}</td>
                                          <td class="text-right" style="padding-right: 20px;"> {{ number_format($prs->total_price,2) }}</td>
                                      </tr>
                                    @endif
                                @endforeach
                                <?php for($i = 0; $i < $row; $i++){ ?>
                                  <tr>
                                      <td><br></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td class="text-right"></td>
                                      <td class="text-right"></td>
                                  </tr>
                                <?php } ?>
                            </tbody>
                        </table> 
                        <b>Note: Both Waste Material and Equipment must be present for inspection.</b><br><br><br><br>
                    </td>
                    <td width="20%">

                      <table width="100%" class="signatories">
                        <tr>
                          <td align="center">_____________________________</td>
                        </tr>
                        <tr>
                          <td align="center">End-User/Designation</td>
                        </tr>
                        <tr>
                          <td><br></td>
                        </tr>
                        <tr>
                          <td>Inspected By</td>
                        </tr>
                        <tr>
                          <td><br></td>
                        </tr>
                        <tr>
                          <td align="center">_____________________________<br><br>Inspector</td>
                        </tr>
                         <tr>
                          <td><br></td>
                        </tr>
                        <tr>
                          <td>Noted by</td>
                        </tr>
                        <tr>
                          <td><br></td>
                        </tr>
                        <tr>
                          <td align="center">_____________________________<br><br>GSO Officer</td>
                        </tr>
                         <tr>
                          <td><br></td>
                        </tr>
                        <tr>
                          <td>Acknowledgement</td>
                        </tr>
                        <tr>
                          <td> <p style="text-indent:20px;">I hereby  acknowledged that the components/materials was instaleld.</p></td>
                        </tr>
                        <tr>
                          <td><br></td>
                        </tr>
                        <tr>
                          <td align="center">_____________________________<br><br>End-User</td>
                        </tr>
                      </table>
                    </td>
                  </tr>
              </table>
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





@section('plugins-script')

@stop


@section('plugins-css')
<style type="text/css">

html,body{
  margin: 10px;

}
.table-thnormal>thead>tr>th{
  font-weight: normal;
}
.table-bordered>tbody>tr>td,.table-bordered>thead>tr>th{
  border:1px solid #000;
  padding: 1px;
}
.signatories{
  margin: 0px 5px;
}
.report_data tr td, .signatories tr td{
  padding: 5px;
  color: #000;
}
.underline{
  border-bottom: 1px solid;
}
.total{
  font-size: 17px;
  font-weight: bold;
}

.text-right2{
  text-align: center;
}

</style>


@stop
