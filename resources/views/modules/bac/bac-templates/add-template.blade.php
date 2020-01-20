@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Purchase Without Purchase NO.
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">


              <h3 class="box-title">ADD NEW BAC TEMPLATE</h3>
              <button class="btn btn-sm btn-primary pull-right"> VIEW SHORTCODES</button>
            <!-- /.box-header -->
            <form class="form-horizontal" method="POST" action="{{route('bac.new_template')}}">
            {{csrf_field()}}
            <div class="box-body">

            <div class="col-md-10 col-md-offset-1">


                   <div class="form-group">
                    <label class="control-label col-sm-2" for="tmpl_desc">Description:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tmpl_desc" name="tmpl_desc" placeholder="Enter Description">
                    </div>
                  </div>



                   <div class="form-group">
                    <label class="control-label col-sm-2" for="tmpl_code">Code:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tmpl_code" name="tmpl_code" placeholder="Enter Code">
                    </div>
                  </div>



                   <div class="form-group">
                    <label class="control-label col-sm-2" for="tmpl_tmpl">Template:</label>
                    <div class="col-sm-10">
                   <textarea id="template_html" name="tmpl_tmpl" placeholder="Enter Your Template Content Here...."></textarea>
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
   @stop





@section('plugins-script')
<script src="{{asset('adminlte/plugins/autocomplete/')}}/jquery.autocomplete.min.js"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/')}}/moment.min.js"></script>
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="{{asset('adminlte')}}/plugins/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">

//Date picker
    $('#po_date').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd',
    });


tinymce.init({
  selector: '#template_html',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime  nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview  | forecolor backcolor emoticons | codesample',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
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

table>thead>tr#test>th>input,table>tfoot>tr>th>input{
  width: 100%;
}

.modal.in .modal-dialog{
  width: 95%;
  margin: 10px auto;
  }
  </style>


@stop