@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      PPE Code
      </h1>
    </section>



    <!-- Main content -->
    <section class="content">
<div class="row">
  <div class="col-md-6 col-sm-12">
          <div class="info-box">
            <div class="info-box-content">
                <ul class="list-unstyled">
            @foreach($codes['get_catcodes'] as $key => $value )
              <li class="ppe-codes blue">
                <a style="font-size: 20px">
                <span class="pull-right-container">
                  {{-- <button type="button" onclick="$(this).update_ppe_category({{$value->cat_id}});"  class="btn btn-success btn-sm update_ppe_category"><i class="fa fa-pencil" aria-hidden="true"></i></button> --}}

                  <button type="button" onclick="$(this).delete_ppe_category({{$value->cat_id}});"  class="btn btn-danger btn-sm delete_ppe_category"><i class="fa fa-trash-o" aria-hidden="true"></i></button>

                  <strong>{{($value->cat_desc)}}</strong>
                </a>
                 <ul class="ppe-codes">
                       @foreach($codes['get_subcatcodes'] as $key => $value2 )
                          @if($value->cat_id==$value2->cat_id)
                             <li class="ppe-codes ">
                              <a style="font-size: 20px">
                                <span class="pull-right-container">

                                  {{-- <button type="button" onclick="$(this).update_ppe_sub_category({{$value2->cat_id}});"  class="btn btn-success btn-sm update_ppe_category"><i class="fa fa-pencil" aria-hidden="true"></i></button> --}}

                                  <button type="button" onclick="$(this).delete_ppe_sub_category({{$value2->sub_id}});"  class="btn btn-danger btn-sm delete_ppe_category"><i class="fa fa-trash-o" aria-hidden="true"></i></button>


                                  <span class="label bg-dark-blue ">{{$value2->code_family}}</span>

                                </span>

                                  <strong>{{($value2->subcat_desc)}} <i>({{($value2->code_coa)}})</i></strong>

                                  </a>

                                   <ul class="ppe-items">
                                         @foreach($codes['get_items'] as $key => $value3 )
                                            @if($value2->subcat_id==$value3->ppe_subcat_id)
                                               <li class="ppe-items ">
                                                <a style="font-size: 20px">
                                                 <span class="pull-right-container">
                                                    {{-- <button type="button" onclick="$(this).update_ppe();"  class="btn btn-success btn-sm update_ppe_category"><i class="fa fa-pencil" aria-hidden="true"></i></button> --}}
                                                    <button type="button" onclick="$(this).delete_ppe_items({{$value3->ppeitems_id }});"  class="btn btn-danger delete_ppe_code"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                      <span class="label bg-light-blue ">{{sprintf("%02d", $value3->code_no)}}</span>
                                                    </span>
                                                    <strong>{{($value3->ppeitems_desc)}}</strong>
                                                    </a>
                                               </li>
                                             @endif
                                    @endforeach
                             </ul>
                          </li>
                           @endif
                  @endforeach
                 </ul>
              </li>
              @endforeach
            </ul>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

  </div>

  <div class="col-md-6 col-sm-12">
     <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Category PPE CODE</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="add_ppecategory"  >
            {{csrf_field()}}
              <div class="box-body">
               <div id="statusC"></div>
                <div class="form-group">
                  <label for="PPE_code_desc" class="col-sm-4 control-label">Code Desc</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="PPE_code_desc" name="PPE_code_desc" placeholder="Code Desc">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default">Cancel</button>
                <button type="button" onclick="$(this).addPPEcategory();" class="btn btn-info pull-right">SAVE</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->

          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Sub-Category PPE CODE</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="add_ppesubcategory">
             {{csrf_field()}}
              <div class="box-body">
              <div id="statusSC"></div>
                <div class="form-group">
                  <label for="PPE_code_category" class="col-sm-4 control-label">Category</label>
                  <div class="col-sm-8">

                    <select class="form-control PPE_code_category" name="PPE_code_category">
                      @if ($codes['get_catcodes'] )

                        <option disabled="" selected="">Select Category</option>
                        @foreach ($codes['get_catcodes'] as $element)
                          <option value="{{ $element->cat_desc}}">{{ $element->cat_desc}}</option>
                        @endforeach
                        

                      @else
                        <option selected="" disabled="">NO Category of PPE Added</option>
                      @endif

                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="PPE_subcode_desc" class="col-sm-4 control-label">Sub-Code Desc</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="PPE_subcode_desc" name="PPE_subcode_desc" placeholder="Sub-Code Desc">
                  </div>
                </div>
                <div class="form-group">
                  <label for="PPE_subcode_coa" class="col-sm-4 control-label">COA CODE</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="PPE_subcode_coa" name="PPE_subcode_coa" placeholder="Sub-Code COA">
                  </div>
                </div>

                <div class="form-group">
                  <label for="PPE_subcode_family" class="col-sm-4 control-label">Sub-Code Family NO</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="PPE_subcode_family" name="PPE_subcode_family" placeholder="Sub-Code Number">
                  </div>
                </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default">Cancel</button>
                <button type="button" onclick="$(this).addPPEsubcategory();" class="btn btn-info pull-right">SAVE</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->


           <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Items</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="add_ppeitems">
            {{csrf_field()}}
              <div class="box-body">
              <div id="statusItems"></div>
                <div class="form-group">
                  <label for="PPE_subcode_desc2" class="col-sm-4 control-label">Sub-Category</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="PPE_subcode_desc2"  placeholder="Sub-Code Desc">
                    <input type="hidden" id="PPE_subcode_desc2-test" name="PPE_subcode_desc2">
                  </div>
                </div>

                <div class="form-group">
                  <label for="PPE_subcode_family" class="col-sm-4 control-label">Desc</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="PPE_item_desc" name="PPE_item_desc" placeholder="Item Desc">
                  </div>
                </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default">Cancel</button>
                <button type="button" onclick="$(this).addPPEitems();" class="btn btn-info pull-right">SAVE</button>
              </div>
              <!-- /.box-footer -->
            </form>
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
<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
  $('#example1').DataTable();


  $('.PPE_code_category').autocomplete({
        serviceUrl: '{{route("inventory.get_ppecodes")}}',
        dataType: 'json',
        type: 'POST',
        params : {
                  _token : '{{csrf_token()}}'
        },
        onSelect: function (suggestion) {

        }
  });
  $('#PPE_subcode_desc2').keydown(function(){
    var x = $('#PPE_code_category2-test').val();
        $('#PPE_subcode_desc2').autocomplete({
            serviceUrl: '{{route("inventory.get_ppesubcodes")}}',
            dataType: 'json',
            type: 'POST',
            params : {
                      cat_desc : x,
                      _token : '{{csrf_token()}}'
            },
            onSelect: function (suggestion) {
                $('#PPE_subcode_desc2-test').val(suggestion.data);
            }
      });
  });




  $.fn.addPPEcategory = function(){
       $.ajax({
                  type: "POST",
                  url: "{{route('inventory.add_ppecategory')}}",
                  data : $('#add_ppecategory').serialize(),
                  dataType: "json",
                  error: function(){
                      alert('error');
                  },
                  success: function(data){
                    var errors = '';
                    if(data['status']==0){
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                        }
                      $('#statusC').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn();
                    }else{
                      $('#statusC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn();
                    }
                  }
            });
  };

  $.fn.addPPEsubcategory = function(){
       $.ajax({
                  type: "POST",
                  url: "{{route('inventory.add_ppesubcategory')}}",
                  data : $('#add_ppesubcategory').serialize(),
                  dataType: "json",
                  error: function(){
                      alert('error');
                  },
                  success: function(data){
                    var errors = '';
                    if(data['status']==0){
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                        }
                      $('#statusSC').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn();
                    }else{
                      $('#statusSC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn();
                    }
                  }
            });
  };

   $.fn.addPPEitems = function(){


     $.ajax({
                  type: "POST",
                  url: "{{route('inventory.add_ppeitems')}}",
                  data : $('#add_ppeitems').serialize(),
                  dataType: "json",
                  error: function(){
                      alert('error');
                  },
                  success: function(data){
                    var errors = '';
                    if(data['status']==0){
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                        }
                      $('#statusItems').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn();
                    }else{
                      $('#statusItems').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn();
                    }
                  }
            });
  };


  $.fn.delete_ppe_category = function(id){

    var txt;
    var r = confirm("Are You sure you want to delete this records! ? ");
    if (r == true) {
      $.ajax({
        type: "GET",
        url: "{{route('delete.delete_ppe_category')}}",
        data : { id: id },
        dataType: "json",
        success: function(data){
          location.reload();
        }
      });

    }

  }

  $.fn.delete_ppe_sub_category = function(id){

    var r2 = confirm("Are You sure you want to delete this records! ? ");
    if (r2 == true) {
      $.ajax({
        type: "GET",
        url: "{{route('delete.delete_ppe_sub_category')}}",
        data : { id: id },
        dataType: "json",
        success: function(data){
          location.reload();
        }
      });

    }

  }

  $.fn.delete_ppe_items = function(id){

    var r2 = confirm("Are You sure you want to delete this records! ? ");
    if (r2 == true) {
      $.ajax({
        type: "GET",
        url: "{{route('delete.delete_ppe_items')}}",
        data : { id: id },
        dataType: "json",
        success: function(data){
          location.reload();
        }
      });

    }

  }


  

</script>
@stop

@section('plugins-css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/dataTables.bootstrap.css">

  <style type="text/css">
    .info-box-content{
      margin-left : 0px;
    }

    ul.list-unstyled > li a strong {
        font-weight: 600;
    }

    ul.list-unstyled > li{
      border-bottom: 2px solid #656565;
    }

    li.ppe-codes,li.ppe-items {
      margin-top: 15px;
      margin-bottom: 15px;
    }
    ul.list-unstyled > li.blue > a{
        color:#023058;
    }
    li.ppe-codes > a {
       color:#483644;
    }
    li.ppe-items > a {
       color:#00a65a;
    }
    .bg-dark-blue{
          background-color: #16232b !important;
    }

.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
.select2-container{ width:100% !important; }
  </style>
@stop
