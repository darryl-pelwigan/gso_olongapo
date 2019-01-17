@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          View/Update BAC TEMPLATE
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">



              <h3 class="box-title">

                <button class="btn btn-sm btn-warning pull-right" onclick="$(this).showShortCodes();"> VIEW SHORTCODES</button>
              </h3>



              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            <!-- /.box-header -->
            <form class="form-horizontal" method="POST" action="{{route('bac.new_template')}}">
            {{csrf_field()}}

            <input type="hidden" name="tmpl_update" value="true">
            <input type="hidden" name="update_tmpl_id" value="{{$tmpl_id}}">
            <div class="box-body">

            <div class="col-md-12">

                   <div class="form-group">
                    <label class="control-label col-sm-1" for="tmpl_desc">Description:</label>
                    <div class="col-sm-11">
                      <input type="text" class="form-control" id="tmpl_desc" name="tmpl_desc" placeholder="Enter Description" value="{{($tmpl->templ_desc)}}">
                    </div>
                  </div>



                   <div class="form-group">
                    <label class="control-label col-sm-1" for="tmpl_code">Code:</label>
                    <div class="col-sm-11">
                      <input type="text" class="form-control" id="tmpl_code" name="tmpl_code" placeholder="Enter Code" value="{{($tmpl->templ_code)}}">
                    </div>
                  </div>



                   <div class="form-group">
                    <!-- <label class="control-label col-sm-1" for="tmpl_tmpl">Template:</label> -->
                    <div class="col-sm-12">

                    <?php
                    $tmplx = json_decode($tmpl->tmpl_tmpl) ;
                    ?>
                   <textarea id="template_html" name="tmpl_tmpl" placeholder="Enter Your Template Content Here....">{{ $tmplx }}</textarea>
                  </div>
                  </div>
            </div>
            </div>

            <div class="box-footer">
             <div class="col-md-10 col-md-offset-1">
                <button class="btn">Cancel</button>
                <button class="pull-right btn btn-info btn-sm">Submit</button>
              </div>
            </div>

            </form>
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
<div class="modal fade" id="bac_shortcode_modal" tabindex="-1" role="dialog" aria-labelledby="bac_shortcode_modalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="bac_shortcode_modalLabel"> SHORTCODES<span></span></h4>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <div id="contents-menu">
          <div class="box-body">
                <dl class="dl-horizontal">
                  <dt> [pr_no] </dt>
                      <dd>Purchase request CONTROL NO</dd>

                  <dt> [prno_date] </dt>
                      <dd>Purchase request DATE</dd>

                  <dt> [pr_total_amount] </dt>
                      <dd>PURCHASE APPROVED AMMOUNT</dd>

                  <dt> [bac_categ] </dt>
                      <dd>BAC CATEGORY</dd>

                  <dt> [company_name] </dt>
                      <dd>SUPPLIER COMPANY NAME</dd>

                  <dt> [company_addr] </dt>
                      <dd>SUPPLIER COMPANY ADDRESS</dd>

                  <dt> [current_date] </dt>
                      <dd>CURRENT DATE</dd>

                  <dt> [dept_name] </dt>
                      <dd>DEPARTMENT NAME</dd>

                </dl>
          </div>
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
<script src="{{asset('adminlte')}}/plugins/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
$.fn.showShortCodes = function(){
  $('#bac_shortcode_modal').modal({
     backdrop: 'static',
    keyboard: false
  });
};

tinymce.init({
  selector: '#template_html',
  height: 500,
  themes: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime  nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview  | forecolor backcolor emoticons | codesample | fontsizeselect',
  fontsize_formats: "8px 10px 11px 12px 13px 14px 18px 24px 36px",
  image_advtab: true,
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]

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