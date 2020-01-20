
@extends('template::pdf.default')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content">
        <div class="row">
          <table class="table">
            <tr>
                <td width="20%"></td>
                <td align="center" width="55%">
                  <h4>Republic of the Philippines</h4>
                  <h4>CITY OF OLONGAPO</h4>
                  <br>
                  <b id="abstract_title">
                      ABSTRACT OF RECORDS OF PROCUREMENT THRU<br>
                      ALTERNATIVE MODE OF PROCUREMENT
                  </b></td>
                <td width="25%">
                   <table class="" width="100%">
                        <tr>
                            <td width="25%">Control No.</td>
                            <td width="75%" class="underline">&nbsp;</td>
                        </tr>
                    </table>
                    <table class="" width="100%">
                        <tr>
                            <td width="10%">Date</td>
                            <td width="90%" class="underline" align="center">{{ date('d-m-Y') }}</td>
                        </tr>
                    </table>
                    <table class="" width="100%">
                        <tr>
                            <td width="50%">Purchase Request (PR) No.</td>
                            <td width="50%" class="underline"></td>
                        </tr>
                    </table>
                    <table class="" width="100%">
                        <tr>
                            <td width="10%">Date</td>
                            <td width="90%" class="underline" align="center">{{ date('d-m-Y') }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
          </table>
          <table class="table" border="0">
              <tr>
                <td align="center" style="border:0px;">Abstract of Public Bidding or ____________________________________________ and award for the Purchase/Procurement/Acquisition of OFFICE SUPPLIES AND/OR PROPERTY CITY BUDGET OFFICE.</td>  
              </tr>
          </table>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th rowspan="3">Item No.</th>
                <th rowspan="3">NAME OF ARTICLE BEING REQUESTITIONED</th>
                <th rowspan="3">Qty.</th>
                <th rowspan="3">Unit</th>
                <th colspan=""></th>
              </tr>
            </thead>
          </table>
        </div>
      </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
           <div class="box-body">

                   
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





@section('plugins-script')


@stop


@section('plugins-css')
<style type="text/css">

html,body{
  margin: 0px 5px;
  color: #000;
}
.content-wrapper
{
  margin: 30px;
}
/*.table-thnormal>thead>tr>th{
  font-weight: normal;
}
.table-bordered>tbody>tr>td,.table-bordered>thead>tr>th{
  border:1px solid #000;
  word-break: break-all;
  padding: 1px;
  margin: 0;
  text-indent: 0;

}*/

.total{
  font-size: 17px;
  font-weight: bold;
}

.text-right2{
  text-align: center;
}
#abstract_title{
  font-size: 17px;
}
.underline{
  border-bottom: 1px solid #000;
}
</style>


@stop
