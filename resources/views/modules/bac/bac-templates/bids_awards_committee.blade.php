
@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         BIDS AND AWARDS COMMITTEE
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <button class="btn bg-light-blue btn-sm show-add-committee" data-title="ADD COMMITTEE" data-onclick="addCommittee" >ADD COMMITTEE</button>
            <button class="btn bg-green btn-sm show-add-committee" data-title="ADD APPROVED BY" data-onclick="addApprovedBy">ADD APPROVED BY</button>
            <button class="btn bg-orange btn-sm show-add-committee" data-title="ADD ATTESTED BY" data-onclick="addAttestedBy">ADD ATTESTED BY</button>
            <!-- /.box-header -->
            <div class="box-body">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="box">
            <div class="box-header"><h4>Committee</h4></div>
            <!-- /.box-header -->
            <div class="box-body">

            <div class="col-md-11 col-md-offset-1">
          <div class="">
            @for( $x = 0 ; $x< count($committee) ; $x++)
                <div class="col-md-4">
                    <h3><strong>{{$committee[$x]->employee_name}}</strong></h3>
                    <h4>{{$committee[$x]->title}}</h4>
                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteGroup_modala{{$committee[$x]->comm_id}}" title="DELETE">Delete</button>
                      <!-- Modal-->
                    <div class="modal fade" id="deleteGroup_modala{{$committee[$x]->comm_id}}" role="dialog">
                             <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">
                                                        <strong>Confirm Delete</strong>
                                                    </h4>
                                            </div>
                                            <div class="modal-body">
                                                    <h4>
                                                    <p>Are you sure you want to Delete the Committee Member?</p>
                                                    </h4>
                                            </div>
                                    <div class="modal-footer">
                                            <button class="btn btn-danger committee" data-committee="{{$committee[$x]->comm_id}}">Delete</button>
                                    </div>
                                    </div>
                                     <!-- /.Modal content-->
                            </div>
                     </div>
                      <!-- /.Modal-->
                </div>
            @endfor
            </div>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header"><h4>Approved By</h4></div>
            <!-- /.box-header -->
            <div class="box-body">

            <div class="col-md-11 col-md-offset-1">
          <div class="">
            @for( $x = 0 ; $x< count($approved_by) ; $x++)
                <div class="col-md-4">
                    <h3><strong>{{$approved_by[$x]->employee_name}}</strong></h3>
                    <h4>{{$approved_by[$x]->title}}</h4>
                    <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteGroup_modalb{{$approved_by[$x]->comm_id}}" title="DELETE">Delete</button>
                    <!-- Modal-->
                    <div class="modal fade" id="deleteGroup_modalb{{$approved_by[$x]->comm_id}}" role="dialog">
                             <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">
                                                        <strong>Confirm Delete</strong>
                                                    </h4>
                                            </div>
                                            <div class="modal-body">
                                                    <h4>
                                                    <p>Are you sure you want to Delete the Committee Member?</p>
                                                    </h4>
                                            </div>
                                    <div class="modal-footer">
                                            <button class="btn btn-danger approved_by" data-approved_by="{{$approved_by[$x]->comm_id}}">Delete</button>
                                    </div>
                                    </div>
                                     <!-- /.Modal content-->
                            </div>
                     </div>
                      <!-- /.Modal-->
                      </div>
            @endfor
            </div>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header"><h4>Attested By</h4></div>
            <!-- /.box-header -->
            <div class="box-body">

            <div class="col-md-11 col-md-offset-1">
          <div class="">
            @for( $x = 0 ; $x< count($attested_by) ; $x++)
                <div class="col-md-4">
                    <h3><strong>{{$attested_by[$x]->employee_name}}</strong></h3>
                    <h4>{{$attested_by[$x]->title}}</h4>
                    <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteGroup_modalc{{$attested_by[$x]->comm_id}}" title="DELETE">Delete</button>
                    <!-- Modal-->
                    <div class="modal fade" id="deleteGroup_modalc{{$attested_by[$x]->comm_id}}" role="dialog">
                             <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">
                                                        <strong>Confirm Delete</strong>
                                                    </h4>
                                            </div>
                                            <div class="modal-body">
                                                    <h4>
                                                    <p>Are you sure you want to Delete the Committee Member?</p>
                                                    </h4>
                                            </div>
                                    <div class="modal-footer">
                                            <button class="btn btn-danger attested_by" data-attested_by="{{$attested_by[$x]->comm_id}}">Delete</button>
                                    </div>
                                    </div>
                                     <!-- /.Modal content-->
                            </div>
                     </div>
                      <!-- /.Modal-->
                </div>
            @endfor
            </div>
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

  <!-- Modal -->
  <div class="modal fade" id="bids_awards_people" tabindex="-1" role="dialog" aria-labelledby="bids_awards_peopleLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="bids_awards_peopleLabel"></h4>
      </div>
      <div class="modal-body">
      <div id="status"></div>
        <div id="contents-menu">
                <form class="form-horizontal" method="POST" id="senBacCommittee">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="employee_name" class="col-sm-3 control-label">Employee : </label>
                  <div class="col-sm-9">
                        <input type="text" name="employee_name" id="employee_name" class="form-control" />
                        <input type="hidden" name="employee_id" id="employee_id" class="form-control" />
                  </div>
                </div>

                 <!--  <div class="form-group">
                  <label for="employee_dept" class="col-sm-3 control-label">Department : </label>
                  <div class="col-sm-9">
                        <input type="text" name="employee_dept" id="employee_dept" class="form-control" />
                  </div>
                </div> -->



                <div class="form-group">
                  <label for="employee_position" class="col-sm-3 control-label">Position : </label>
                  <div class="col-sm-9">
                        <input type="text" name="employee_position" id="employee_position" class="form-control" />
                        <input type="hidden" name="employee_position_id" id="employee_position_id" value="" />
                  </div>
                </div>

 <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="button" class="btn btn-info pull-right" id="submit_bac_committee" onclick="$(this).senBacCommittee();">Submit</button>
              </div>
                    <input type="hidden" id="type_process" name="type_process" value="" />
              </form>
        </div>
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
<script type="text/javascript">

$('.show-add-committee').click(function(){
    $('#bids_awards_people #bids_awards_peopleLabel').text($(this).attr('data-title'));
    $('#bids_awards_people #type_process').val($(this).attr('data-onclick'));
    $('#bids_awards_people').modal({
            backdrop: 'static',
            keyboard: false
    });
});

$('.committee').click(function(){
  var id = $(this).attr('data-committee');
  $.ajax({
            type: "POST",
             url: "{{route('bac.rm-bac-committee')}}",
            data : {
                    committee_id:id,
                    _token : '{{csrf_token()}}'
                  },
            dataType: "json",
            error: function(){
              console.log('error');
            },
            success: function(data){
                var errors = '';
                    if(data['status']==0){
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                        }
                      $('#status').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                    }else{
                      $('#status').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                       location.reload();
                    }
            }
     });
});

$('.attested_by').click(function(){
  var id = $(this).attr('data-attested_by');
  $.ajax({
            type: "POST",
             url: "{{route('bac.rm-bac-attested_by')}}",
             data : {
                    attested_by:id,
                    _token : '{{csrf_token()}}'
                  },
            dataType: "json",
            error: function(){
              console.log('error');
            },
            success: function(data){
                var errors = '';
                    if(data['status']==0){
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                        }
                      $('#status').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                    }else{
                      $('#status').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                       location.reload();
                    }
            }
     });
});

$('.approved_by').click(function(){
  var id = $(this).attr('data-approved_by');
  $.ajax({
            type: "POST",
             url: "{{route('bac.rm-bac-approved_by')}}",
            data : {
                    approved_by:id,
                    _token : '{{csrf_token()}}'
                  },
            dataType: "json",
            error: function(){
              console.log('error');
            },
            success: function(data){
                var errors = '';
                    if(data['status']==0){
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                        }
                      $('#status').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                    }else{
                      $('#status').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                       location.reload();
                    }
            }
     });
});

$.fn.senBacCommittee = function(){
    var datax = $('#senBacCommittee').serialize();
     $.ajax({
            type: "POST",
             url: "{{route('bac.set-bac-committee')}}",
            data : datax,
            dataType: "json",
            error: function(){
              console.log('error');
            },
            success: function(data){
                var errors = '';
                    if(data['status']==0){
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                        }
                      $('#status').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                    }else{
                      $('#status').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                       location.reload();
                    }
            }
     });
};

$('#employee_name').autocomplete({
        serviceUrl: '{{route("bac.get_employee_name")}}',
        dataType: 'json',
        type: 'POST',
        params : {
                  _token : '{{csrf_token()}}'
        },
        onSelect: function (suggestion) {
          $('#employee_id').val(suggestion.data);
          // $('#employee_dept').val(suggestion.dept_desc);
        }
});

$('#employee_position').autocomplete({
        serviceUrl: '{{route("bac.a_get_position")}}',
        dataType: 'json',
        type: 'POST',
        params : {
                  _token : '{{csrf_token()}}'
        },
        onSelect: function (suggestion) {
          $('#employee_position_id').val(suggestion.data);
        }
  });

</script>
@stop


@section('plugins-css')
 <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datepicker/datepicker3.css">

  <style type="text/css">

.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
.select2-container{ width:100% !important; }




  </style>


@stop