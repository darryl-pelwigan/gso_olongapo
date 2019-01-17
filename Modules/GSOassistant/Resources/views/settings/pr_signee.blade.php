@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          GSO PURCHASE REQUEST/ORDER SIGNEE

      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
               @include('template::admin-layouts.includes.message')
            </div>

            <!-- /.box-header -->
            <div class="box-body">
            <form class="form-horizontal" method="POST" action="#">
            {{csrf_field()}}
               <div class="form-group">
                  <label class="control-label col-sm-2" for="emp_name">Employee Full Name:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Enter Employee Full Name" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="emp_position">POSITION:</label>
                  <div class="col-sm-6">
                      <select name="emp_position" class="form-control">
                          <option value="City Mayor">City Mayor</option>
                          <option value="Secretary to the Mayor">Secretary to the Mayor</option>
                    </select>
                  </div>
                </div>


                 <div class="form-group">
                  <label class="control-label col-sm-2" for="emp_dept">Type:</label>
                  <div class="col-sm-6">
                    <select name="type_of_signee" class="form-control">
                          <option value="1">PURCHASE REQUEST</option>
                          <option value="2">PURCHASE ORDER</option>
                    </select>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-sm-2" for="year_signee_start">YEAR START:</label>
                  <div class="col-sm-6">
                     <select name="year_signee_start" class="form-control">
                         @for( $x = 0 ; $x < 4 ; $x++)
                          <option value="{{date('Y')-$x}}">{{date('Y')-$x}}</option>
                         @endfor
                    </select>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-sm-2" for="year_signee_end">YEAR END:</label>
                  <div class="col-sm-6">
                     <select name="year_signee_end" class="form-control">
                         @for( $x = 0 ; $x < 4 ; $x++)
                          <option value="{{date('Y')+$x}}">{{date('Y')+$x}}</option>
                         @endfor
                    </select>
                  </div>
                </div>


            <div class="box-footer">
             <div class="col-md-3 col-md-offset-1">
                <button class="pull-right btn btn-info btn-sm">Submit</button>
              </div>
            </div>

            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- update modal -->
      <div class="modal fade" id="new_employee_modal" tabindex="-1" role="dialog" aria-labelledby="new_employee_modalLabel">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="new_employee_modalLabel"> <span></span></h4>
            </div>
            <div class="modal-body">
              <div id="status"></div>
              <div id="contents-menu">
                  <form class="form-horizontal" id="new_employee" method="post" action="{{ route('gso_update_pr_signee') }}">
                    <div class="box-body">
                      <div id="statusCI"></div>
                      <div class="employee_info">
                        <div class="form-group">
                          <label for="obr_date" class="col-sm-3 control-label">Employer Full Name : </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="full_name"  name="full_name" placeholder="First Name" />
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="obr_date" class="col-sm-3 control-label">Position : </label>
                          <div class="col-sm-9">
                            <select name="position" id="position" class="form-control">
                                <option value="City Mayor">City Mayor</option>
                                <option value="Secretary to the Mayor">Secretary to the Mayor</option>
                            </select>
                          </div>
                        </div>


                        <div class="form-group">
                          <label for="obr_date" class="col-sm-3 control-label">Type : </label>
                          <div class="col-sm-9">
                            <select name="type_of_signee" id="type_of_signee" class="form-control">
                                  <option value="1">PURCHASE REQUEST</option>
                                  <option value="2">PURCHASE ORDER</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="obr_date" class="col-sm-3 control-label">Year Start : </label>
                          <div class="col-sm-9">
                            <select name="year_signee_start" id="year_signee_start" class="form-control">
                              @for( $x = 0 ; $x < 4 ; $x++)
                               <option value="{{date('Y')-$x}}">{{date('Y')-$x}}</option>
                              @endfor
                           </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="obr_date" class="col-sm-3 control-label">Year End : </label>
                          <div class="col-sm-9">
                            <select name="year_signee_end" id="year_signee_end" class="form-control">
                                @for( $x = 0 ; $x < 4 ; $x++)
                                 <option value="{{date('Y')+$x}}">{{date('Y')+$x}}</option>
                                @endfor
                           </select>
                          </div>
                        </div>


                      </div>


                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                      <button type="submit" class="btn btn-info pull-right">Submit</button>
                    </div>
                    <!-- /.box-footer -->
                    <input type="hidden" id="rec_id" name="rec_id" />
                    {{csrf_field()}}
                  </form>

              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

        </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">

            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover" id="proc_methods">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>EMPLOYEE NAME</th>
                      <th>POSITION</th>
                      <th>Year</th>
                       <th>Added</th>
                       <th>Action</th>
                    </tr>
                  </thead>
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

  <!-- Modal -->
   @stop





@section('plugins-script')
<script src="{{asset('adminlte/plugins/autocomplete/')}}/jquery.autocomplete.min.js"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/')}}/moment.min.js"></script>
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="{{asset('adminlte')}}/plugins/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(function() {

$.fn.showSignee = function(){

  if ( $.fn.dataTable.isDataTable( '#proc_methods' ) ) {
      $('#proc_methods').dataTable().fnDestroy();
  }

       $('#proc_methods').dataTable({
        processing: true,
        serverSide: true,
        ajax:{
          "type": 'POST',
          "url" : '{!! route('gso.set_datatables') !!}',
          data : {
                  dataTables : 'gso_signee',
                  "_token" : '{{csrf_token()}}'
          }
        },
        columns: [
            { data: 'id', name: 'olongapo_purchase_request_no.id',
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { data: 'full_name' , name: 'olongapo_purchase_request_signee.full_name'
            },
            { data: 'position' , name: 'olongapo_purchase_request_signee.position'
            },
            { data: null , name: 'olongapo_purchase_request_signee.year_signee_end',
             render: function (data, type, row, meta) {
                  return data.year_signee_start +'-'+data.year_signee_end;
              }
            },
             { data: null , name: 'olongapo_purchase_request_signee.created_at',
             render: function (data, type, row, meta) {
               return data.created_at;
              }
            },
             { data: null , name: 'olongapo_purchase_request_signee.year_signee_end',
             render: function (data, type, row, meta) {
                if(data.deleted_at == null){
                  return '<button onclick="pr_update('+data.id+')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#new_employee_modal" data-backdrop="static" data-keyboard="false">update</button><button class="btn btn-danger btn-sm " data-toggle="modal" data-target="#deleteModal">delete</button>'+

                  '<div id="deleteModal" class="modal fade" role="dialog">'+
                  '<div class="modal-dialog">'+
                  '<div class="modal-content">'+
                  '<div class="modal-header">'+
                  '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                  '<h4 class="modal-title">Modal Header</h4>'+
                  '</div>'+
                  '<div class="modal-body">'+
                  '<p>Are you sure you want to delete this record?</p>'+
                  '</div>'+
                  '<div class="modal-footer">'+
                  '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'+
                  '<button type="button" class="btn btn-default" data-dismiss="modal" onclick="$(this).deleteSignee(\''+data.id+'\');">Delete</button>'+
                  '</div>'+
                  '</div>'+
                  '</div>'+
                  '</div>'
                  ;
                }else{
                  return '';
                }
              }
            },

        ],
        columnDefs: [
          {
              orderable: false, targets: [0,-1]
           }
        ],
        "order": [[ 0, 'desc' ]],
    });

};

 $.fn.showSignee();

 $.fn.deleteSignee = function(data_id){
          console.log(data_id);

           $.ajax({
            type: "POST",
            url: "{{route('gso.deleteSignee')}}",
            data : {
              data_id : data_id,
              _token : '{{csrf_token()}}'
            },
            dataType: "json",
            error: function(){
              alert('error');
            },
            success: function(data){
               $.fn.showSignee();
            }
          });
 };

   $('#emp_name').autocomplete({
        serviceUrl: '{{route("emp.get_employee_name")}}',
        dataType: 'json',
        type: 'POST',
        params : {
                  _token : '{{csrf_token()}}'
        },
        onSelect: function (suggestion) {
          console.log(suggestion.dept_desc);
          console.log(suggestion.title);
            $('#').val(suggestion.data);
        }
  });


  });

    function pr_update(id)
    {
      $.ajax({
        type: 'POST',
        data:{
          _token: '{{ csrf_token() }}',
          id:id
        },
        dataType: 'JSON',
        url: '{{ route("gso.get_pr_signee") }}',
        success: function(data) {
          $('#new_employee_modalLabel').text('Update Record')
          $('#full_name').val(data.full_name);
          $('#position :selected').text(data.position);
          $('#type_of_signee').val(data.type_of_signee);
          $('#year_signee_start').val(data.year_signee_start);
          $('#year_signee_end').val(data.year_signee_end);
          $('#rec_id').val(id);
        }
      });
    }
</script>
@stop


@section('plugins-css')
 <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datepicker/datepicker3.css">
 <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.css">
  <style type="text/css">

.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
.select2-container{ width:100% !important; }

table>thead>tr#test>th>input,table>tfoot>tr>th>input{
  width: 100%;
}

/*.modal.in .modal-dialog{
  width: 95%;
  margin: 10px auto;
  }*/
  </style>


@stop
