@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         PURCHASE REQUEST
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12"  style="display: none;">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pending Purchase Requests</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @foreach($pr as $key=>$data)
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <div class="row">
                      <label for="" class="col-sm-2 control-label">Purchase Request Date : </label>
                      <div class="col-sm-6 underline">
                        {{ date('F d, Y', strtotime($data->pr_date_dept)) }}
                      </div>
                    </div>
                    <div class="row">
                      <label for="" class="col-sm-2 control-label">Purpose : </label>
                      <div class="col-sm-6 underline">
                        {{$data->pr_purpose}}
                      </div>
                    </div>
                    <div class="row">
                      <label for="" class="col-sm-2">Requests : </label>
                      <div class="col-sm-6">
                        <table class="table table-bordered table-hover" id="items_list">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Description</th>
                              <th>Qty</th>
                              <th>Unit</th>
                              <th>Unit price</th>
                              <th>Total price</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $count=1; ?>
                            @foreach( $data->pr_items()->get() as $prs )
                              <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $prs->description }}</td>
                                <td>{{ $prs->qty }}</td>
                                <td>{{ $prs->unit }}</td>
                                <td>{{ $prs->unit_price }}</td>
                                <td>{{ $prs->unit_price  * $prs->qty}}</td>
                               </tr>
                            <?php $count++; ?>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <br style="clear: both;">
                  </div>
                  <div class="panel-body">
                    <legend class="text-center">Purchase Request Status Tracking</legend>
                     <div class="container step-procedure">
                       <ul class="progress-indicator">
                          <li class="completed">
                              <span class="bubble"></span>
                              <i class="fa fa-check-circle"></i>
                              PR CREATED
                          </li>
                          <?= $currentstatus = ""; ?>
                          @if(count($status[$key]['ppmp']) > 0)
                              @if($status[$key]['ppmp']->status == 1)
                                <li class="completed">
                                <span class="bubble"></span>
                                <i class="fa fa-check-circle"></i>
                                PPMP APPROVED
                                </li>
                              @else
                                <li class="declined">
                                <span class="bubble"></span>
                                <i class="fa fa-times-circle"></i>
                                PPMP DECLINED<br>
                                Remarks: <u>{{ $status[$key]['ppmp']->remarks }}</u>
                                </li>
                                <?= $currentstatus = "Purchase request has been decline."; ?>
                              @endif
                          @else
                          <?php $currentstatus = "Pending PPMP Approval"; ?>
                          <li>
                              <span class="bubble"></span>
                              PPMP APPROVAL
                          </li>
                          @endif


                          @if($data->pr_no != null)
                            <li class="completed">
                              <span class="bubble"></span>
                              PR NUMBER
                            </li>
                          @else
                            <li>
                              <span class="bubble"></span>
                              PR NUMBER
                            </li>
                            <?php $currentstatus = "Pending Purchase Number."; ?>
                          @endif

                          @if(count($status[$key]['abstract']) > 0)
                            <li class="completed">
                              <span class="bubble"></span>
                              ABSTRACT
                            </li>
                          @else
                            <li>
                              <span class="bubble"></span>
                              ABSTRACT
                            </li>
                            <?php $currentstatus = "Pending Abstract Number."; ?>
                          @endif

                          @if(count($status[$key]['bac']) > 0)
                            <li class="completed">
                              <span class="bubble"></span>
                              BAC APPROVAL
                            </li>
                          @else
                            <li>
                              <span class="bubble"></span>
                              BAC APPROVAL
                              <?php $currentstatus = "Pending BAC Control Number."; ?>
                            </li>
                          @endif

                          @if(count($status[$key]['po_no']) > 0)
                            <li class="completed">
                              <span class="bubble"></span>
                              PO Number
                            </li>
                          @else
                            <li>
                              <span class="bubble"></span>
                              PO Number
                              <?php $currentstatus = "Pending Purchase Number."; ?>
                            </li>
                          @endif
                      </ul>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>

       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchase Request List</h3>
              <button class="btn btn-success pull-right"  onclick="$(this).showAddModal();"><i class="fa fa-plus"></i> Add Request</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="" id="pr_delete_form">
                <table id="dept_pr_list" class="table table-bordered table-hover">
                    <thead>
                      <tr id="test">
                          <td></td>
                          <td><input type="text" class="form-control" /></td>
                          <td><input type="text" class="form-control" /></td>
                          <td><input type="text" class="form-control" /></td>
                          {{-- <td><input type="text" class="form-control" /></td> --}}
                          <td></td>
                          <td class="delete_column hide"></td>
                      </tr>
                      <tr>
                          <th>No</th>
                          <th>Purpose</th>
                          <th>PR NO</th>
                          <th>Date Added</th>
                          {{-- <th>Status</th> --}}
                          <th>Action</th>
                          <th class="delete_column hide">Delete</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                  {{csrf_field()}}
                  <button class="btn btn-default"><input type="checkbox" id="delete_checkbutton"><b> Delete Purchase Request Record/s</b></button>
                  <button type="button" class="btn btn-danger delete_column hide" name="delete" id="delete_prs" onclick="$(this).deletPRRequest();" disabled=""> <i class="fa fa-trash"></i> Confirm Purchase Request Deletion</button>
                </form>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <!-- Modal -->
<div class="modal fade" id="add_purchase_request_modal" tabindex="-1" role="dialog" aria-labelledby="add_purchase_request_modalLabel">
  <div class="modal-dialog modal-xlg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_purchase_request_modalLabel"> <span></span></h4>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <div id="contents-menu">
            <form class="form-horizontal" id="add_purchase_request">
            <input type="hidden" id="update_check_date" value="">
              <div class="box-body">
                <div id="statusC"></div>
                @if(count($uploads) > 0)
                  <div class="alert alert-info" role="alert">
                    Kinldy check PPMP(Project Procurement Management Plan) before adding your request. <br>
                    To view your departments' PPMP click list/s below:<br>
                    @foreach($uploads as $file)
                      <li><a href="../public/ppmp/{{$file->file_upload}}" target="_blank">{{$file->remarks}}</a></li>
                    @endforeach
                  </div>
                @endif

                @if(Session::get('olongapo_user')->group_id == 9)
                  <div class="form-group">
                       <label for="pr_no" class="col-sm-2 control-label">DEPARTMENT : </label>
                          <div class="col-sm-6">
                          <select class="form-control" name="department" id="department">
                              <option></option>
                              @foreach($department as $dept)
                                <option value={{$dept->id}}>{{$dept->dept_desc}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                @endif

                 @if(Session::get('olongapo_user')->group_id == 9)
                  <div class="form-group">
                       <label for="pr_no" class="col-sm-2 control-label">REQUESTED BY : </label>
                          <div class="col-sm-6">
                          <select class="form-control" name="employee" id="employee">
                              <option></option>
                              @foreach($employee as $emp)
                                <option value={{$emp->id}}>{{$emp->fname}} {{$emp->mname}} {{$emp->lname}} </option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                @endif

                <div class="form-group">
                     <label for="pr_no" class="col-sm-2 control-label">PR DATE : </label>
                        <div class="col-sm-2">
                        <input type="text" class="form-control" id="pr_no_date" name="pr_no_date" placeholder="PR DATE" />
                    </div>
                </div>

                 <div class="form-group">
                     <label for="purpose" class="col-sm-2 control-label">Purpose : </label>
                      <div class="col-sm-6">
                        <textarea  class="form-control" id="purpose"  name="purpose"    placeholder="Purpose" > </textarea>
                    </div>
                </div>
                <div class="form-group">
                  <label for="purpose" class="col-sm-2 control-label">Purely Consumption  </label>
                  <input type="hidden" name="pc" value=0> </input>
                  <input type="checkbox" name="pc" value=1 style="margin-left:2px;"> </input>

                </div>

                <button type="button" class="btn btn-success btn-sm pull-right" id="add_items"><i class="fa fa-plus"></i></button>

                <table class="table table-striped table-bordered" id="items_list">
                  <thead>
                    <tr>
                      <th>Description</th>
                      <th>Qty</th>
                      <th>Unit</th>
                      <th>Unit Price</th>
                      <th>Total Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>

                  </tbody>
                </table>


                <div id="other_content_b"></div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="button" class="btn btn-info pull-right" id="submit_butts" onclick="$(this).sentPurchaseRequest();">Submit</button>
              </div>
              <!-- /.box-footer -->
              <input type="hidden" name="removetx_items" id="removetx_items" value="">
              <input type="hidden" name="pr_id_update" id="pr_id_update" value="">
              <input type="hidden" name="has_change" id="has_change" value="0">
              {{csrf_field()}}
            </form>

        </div>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

   @stop





@section('plugins-script')
<script src="{{asset('adminlte/plugins/autocomplete/')}}/jquery.autocomplete.min.js"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/')}}/moment.min.js"></script>
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/accounting/accounting.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/table-header-search.js"></script>

@include('department::purchase_request.js.index-js')
@stop

@section('plugins-css')
 <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datepicker/datepicker3.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{asset('progress')}}/progress-wizard.min.css">

  <style type="text/css">

    .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
    .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
    .autocomplete-selected { background: #F0F0F0; }
    .autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
    .autocomplete-group { padding: 2px 5px; }
    .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
    .select2-container{ width:100% !important; }
    .modal-xlg {
      width: 98%;
    }
    table>thead>tr#test>th>input,table>tfoot>tr>th>input{
      width: 100%;
    }
    #update-remarks
    {
      max-height: 360px;
      background: #e4eaf1;
      overflow-y: overlay;
      padding: 3px 16px 9px;
    }
    #update-remarks p.lead {
      font-size: 15px;
      padding-left: 20px;
      text-indent: -13px;
    }
    #update-remarks mark{
      font-size: 12px;
      background-color: #f9f8f4;
      padding: 3px;
      color: #8e8b8b;
    }
    .textarea{
      width: 98% !important;
      margin: 0 auto;
    }
    .td-sm{
      width: 9%;
    }
    .underline{
      border-bottom: 1px solid;
    }
    /*TRACKING STYLES*/
      .progress-indicator>li.declined .bubble, .progress-indicator>li.declined .bubble:after, .progress-indicator>li.declined .bubble:before {
      background-color: #d6452e;
      border-color: #e64026;
  }

  .progress-indicator>li.declined, .progress-indicator>li.declined .bubble {
    color: #d6452e;
}
.progress-indicator {
    margin: 0 0 1em;
    padding: 0;
    font-size: 90%;
    text-transform: uppercase;
}

  </style>

@stop