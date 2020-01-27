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
                  <td class="border_bottom text_center">{{$info->sai_no}}</td>
                  <td class="text_center" width="15%">Date:</td>
                  <td class="border_bottom text_center">{{ date('F j Y', strtotime($info->sai_date)) }}</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <table width="100%" class="table">
          <tr>
            <td colspan="4" class="text_center bold" height="2%" style="padding:5px; border-right: 1px solid black; font-size: 14px;"> <i> Requisition</i></td>
            <td colspan="2" class="text_center bold" style="border-left: 1px solid black; font-size: 14px;"> <i>Issuance</i></td>
          </tr>

          <tr>
            <td>Stock No.</td>
            <td>Unit</td>
            <td>Description</td>
            <td>Quantity</td>
            <td>Quantity</td>
            <td>Remarks</td>
            
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
    border: 2px solid black;
  }

  .pr_title{
    font-family:  "arial-black" !important;
    font-weight: 900;
    padding: 5px;
    font-size: 22px;
  }

  .text_center{
    text-align: center;
  }

  .padding_top {
    padding-top: 10px;
  }

  .padding_top_bottom {
    padding-top: 5px;
    padding-bottom: 5px;
  }

  .padding_bottom_5{
    padding-bottom: 5px;
  }

  .border_top_bottom {
    border-top: 1px solid black;
    border-bottom: 1px solid black;
  }

  .border {
    border: 1px solid black;
  }

  .border_bottom {
    border-bottom: 1px solid;
  }

  .font_size_11{
    font-size: 11px;
  }

  .bold {
    font-weight: bold;
  }

  .table {
    border-collapse: collapse;
  }

  .table, .table th, .table td {
    border: 1px solid black;
  }

  

  </style>

@stop
