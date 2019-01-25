<!DOCTYPE html>
<html>
  <head>
      <link rel="stylesheet" href="{{asset('pdf')}}/css/bac-style.css">
      <link rel="stylesheet" href="{{asset('pdf')}}/css/pdf-fonts.css">
      <link rel="stylesheet" href="{{asset('pdf')}}/css/print-bac-style.css">
      <link rel="stylesheet" href="{{asset('adminlte')}}/bootstrap/css/bootstrap.css">
  </head>
<body>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
           <div class="box-body">

            <div class="pages">
             <header>
               <div class="header_tbl">
                 <table class="table table-thnormal" >
                   <tr>
                     <td align="" width="50%">
                        PPE WEEKLY REPORT
                     </td>
                     <td width="25%"></td>
                   </tr>
                 </table>
               </div>
             </header>
              <div class="header_tbl">
                  <table class="table table-thnormal" id="main_tbl">
                    <thead>
                      <tr>
                        <th>DATE</th>
                        <th>Control #</th>
                        <th>DESCRIPTION</th>
                        <th>PROPERTY CODE</th>
                        <th>PO#</th>
                        <th>QTY</th>
                        <th>UNIT VALUE</th>
                        <th>TOTAL VALUE</th>
                        <th>ACCOUNTABLE PERSON</th>
                        <th>DEPARTMENT</th>
                        <th>SUPPLIER</th>
                        <th>INVOICE</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($ppe as $p)
                        <tr>
                          <td>{{$p[0]}}</td>
                          <td>{{$p[1]}}</td>
                          <td>{{$p[2]}}</td>
                          <td>{{$p[3]}}</td>
                          <td>{{$p[4]}}</td>
                          <td>{{$p[5]}}</td>
                          <td>{{$p[6]}}</td>
                          <td>{{$p[7]}}</td>
                          <td>{{$p[8]}}</td>
                          <td>{{$p[9]}}</td>
                          <td>{{$p[10]}}</td>
                          <td>{{$p[11]}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
           
  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <div class="page-break">

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</section>
</div>
</body>
</html>

<style type="text/css">
  body{
    margin:25px;
    color: #000;
    font-size:11px;
  }
  #abstract_title{
    font-size:14px;
  }
  #main_tbl tr td, #main_tbl tr th{
    margin-top: 0px;
    padding: 2px;
    border: 1px solid #000;
    font-size:11.5px;
  }
  .suppliers{
    font-size: 10px;
  }
  .tg  {border-collapse:collapse;border-spacing:0;}
  .tg td{font-family:Arial, sans-serif;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
  .tg th{font-family:Arial, sans-serif;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
  .tg .tg-9hbo{font-weight:bold;vertical-align:top}
  .tg .tg-yw4l{vertical-align:top}
  .underline{
    border-bottom: 1px solid #000;
  }
  .tbl_signee td{

    padding: 3px;
  }
  .control_info tr td{
    font-size:11px;
  }
  .table{
    border-collpase : collapse;
  }

</style>