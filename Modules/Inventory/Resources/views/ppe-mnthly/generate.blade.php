@extends('template::admin-pages.menus.'.$template['menu'])

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      PPE REPORT
      </h1>
    </section>



    <!-- Main content -->

                <div class="col-md-4" style="margin-top:10px">
                  <div class="form-group row">
                       <label for="pr_no" class="col-sm-3 control-label">Generate report by: </label>
                          <div class="col-sm-9">
                          <select class="form-control" name="type" id="type">
                              <option value="Yearly"> Yearly</option>
                              <option value="Monthly">Monthly</option>
                          </select>
                      </div>
                  </div>
                </div>

<section class="content" id="Monthly" hidden>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info box-shadow">
            <div class="box-header">
              <h3 class="box-title">PPE MONTHLY REPORT</h3>


            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" method="POST" action="{{route('inventory.ppe-generate-monthly-report-pdf')}}">
            {{csrf_field()}}
            <div class="box-body">
                <div class="col-md-4">
                  <div class="form-group row">
                       <label for="pr_no" class="col-sm-3 control-label">DATE FROM </label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control date" id="from" name="from" placeholder="PR DATE" required />
                      </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                       <label for="pr_no" class="col-sm-3 control-label">DATE TO </label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control date" id="to" name="to" placeholder="PR DATE" required/>
                      </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                       <label for="pr_no" class="col-sm-3 control-label">PREPARED BY </label>
                          <div class="col-sm-9">
                          <select class="form-control" name="prepared" id="prepared">
                              <option></option>
                              @foreach($employee as $emp)
                                <option value={{$emp->id}}>{{$emp->fname}} {{$emp->mname}} {{$emp->lname}} </option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                       <label for="pr_no" class="col-sm-3 control-label">REVIEWED BY </label>
                          <div class="col-sm-9">
                          <select class="form-control" name="reviewed" id="reviewed">
                              <option></option>
                              @foreach($employee as $emp)
                                <option value={{$emp->id}}>{{$emp->fname}} {{$emp->mname}} {{$emp->lname}} </option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                       <label for="pr_no" class="col-sm-3 control-label">NOTED BY </label>
                          <div class="col-sm-9">
                         <select class="form-control" name="noted" id="noted">
                              <option></option>
                              @foreach($employee as $emp)
                                <option value={{$emp->id}}>{{$emp->fname}} {{$emp->mname}} {{$emp->lname}} </option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                       <label for="pr_no" class="col-sm-3 control-label">ENDORSED TO </label>
                          <div class="col-sm-9">
                          <select class="form-control" name="endorsed" id="endorsed">
                              <option></option>
                              @foreach($employee as $emp)
                                <option value={{$emp->id}}>{{$emp->fname}} {{$emp->mname}} {{$emp->lname}} </option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                 <button type="submit" class="btn btn-info" id="submit_butts" onclick="$(this).sentRequest();">Generate by default</button>
                  <button type="button" class="btn btn-info" id="btn-mon-dept">Generate by department</button>
                  <button type="button" class="btn btn-info" id="btn-mon-person">Generate by person</button>
                </div>
                 <div class="col-md-4" id="mon_person" hidden>
                  <label for="pr_no" class="col-sm-3 control-label">Person </label>
                  <select class="form-control" name="mon_sort_person" id="mon_sort_person" >
                              <option></option>
                              @foreach($employee as $emp)
                                <option value={{$emp->id}}>{{$emp->fname}} {{$emp->mname}} {{$emp->lname}} </option>
                              @endforeach
                          </select>
                  <button type="submit" class="btn btn-info pull-right" id="submit_butts" onclick="$(this).sentRequest();">Generate</button>
                </div>
                <div class="col-md-4" id="mon_dept" hidden>
                  <label for="pr_no" class="col-sm-3 control-label">Department </label>
                  <select class="form-control" name="mon_sort_dept" id="mon_sort_dept">
                              <option></option>
                              @foreach($dept as $dep)
                                <option value={{$dep->id}}>{{$dep->dept_desc}}</option>
                              @endforeach
                          </select>
                  <button type="submit" class="btn btn-info pull-right" id="submit_butts" onclick="$(this).sentRequest();">Generate</button>
                </div>
              </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>

    <section class="content" id="Yearly">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info box-shadow">
            <div class="box-header">
              <h3 class="box-title">PPE YEARLY REPORT</h3>


            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" method="POST" action="{{route('inventory.ppe-generate-yearly-report-pdf')}}">
            {{csrf_field()}}
            <div class="box-body">
                <div class="col-md-4">
                  <div class="form-group row">
                       <label for="pr_no" class="col-sm-3 control-label">SELECT YEAR </label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control date" id="from" name="from" placeholder="PR DATE" required/>
                      </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                       <label for="pr_no" class="col-sm-3 control-label">ACCOUNTABLE OFFICER </label>
                          <div class="col-sm-9">
                           <select class="form-control" name="ao" id="ao">
                              <option></option>
                              @foreach($employee as $emp)
                                <option value={{$emp->id}}>{{$emp->fname}} {{$emp->mname}} {{$emp->lname}} </option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                       <label for="pr_no" class="col-sm-3 control-label">BUREAU OR OFFICE </label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="bureau" name="bureau"  required/>
                      </div>
                  </div>
                </div>

                <div class="col-md-12">
                 <button type="submit" class="btn btn-info" id="submit_butts" onclick="$(this).sentRequest();">Generate by default</button>
                  <button type ="button" class="btn btn-info" id="btn-year-dept">Generate by department</button>
                  <button type ="button" class="btn btn-info" id="btn-year-person">Generate by person</button>
                </div>
                 <div class="col-md-4" id="year_person" hidden>
                  <label for="pr_no" class="col-sm-3 control-label">Person </label>
                  <select class="form-control" name="year_sort_person" id="year_sort_person" >
                              <option></option>
                              @foreach($employee as $emp)
                                <option value={{$emp->id}}>{{$emp->fname}} {{$emp->mname}} {{$emp->lname}} </option>
                              @endforeach
                          </select>
                  <button type="submit" class="btn btn-info pull-right" id="submit_butts" onclick="$(this).sentRequest();">Generate</button>
                </div>
                <div class="col-md-4" id="year_dept" hidden>
                  <label for="pr_no" class="col-sm-3 control-label">Department </label>
                  <select class="form-control" name="year_sort_dept" id="year_sort_dept">
                              <option></option>
                              @foreach($dept as $dep)
                                <option value={{$dep->id}}>{{$dep->dept_desc}}</option>
                              @endforeach
                          </select>
                  <button type="submit" class="btn btn-info pull-right" id="submit_butts" onclick="$(this).sentRequest();">Generate</button>
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



   @stop





@section('plugins-script')
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="{{asset('adminlte')}}/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/datatables/table-header-search.js"></script>
<script src="//cdn.rawgit.com/ashl1/datatables-rowsgroup/v1.0.0/dataTables.rowsGroup.js"></script>
<script src="{{asset('adminlte/plugins/autocomplete/')}}/jquery.autocomplete.min.js"></script>

<script type="text/javascript">
  $('.date').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd',
});

$(document).ready(function(){

    $('#type').change(function(){
        if(document.getElementById("type").value == "Yearly"){
                $("#Yearly").attr("hidden",false);
                $("#Monthly").attr("hidden",true);
                $("#year_person").attr("hidden",true);
                $("#year_dept").attr("hidden",true);

        }else if(document.getElementById("type").value == "Monthly"){

             $("#Yearly").attr("hidden",true);
             $("#Monthly").attr("hidden",false);
             $("#mon_person").attr("hidden",true);
             $("#mon_dept").attr("hidden",true);
        }

    });


    $('#btn-mon-dept').click(function(){
             $("#mon_person").attr("hidden",true);
             $("#mon_dept").attr("hidden",false);
    });

    $('#btn-mon-person').click(function(){
             $("#mon_person").attr("hidden",false);
             $("#mon_dept").attr("hidden",true);
    });

    $('#btn-year-dept').click(function(){
             $("#year_person").attr("hidden",true);
             $("#year_dept").attr("hidden",false);
    });

    $('#btn-year-person').click(function(){
             $("#year_person").attr("hidden",false);
             $("#year_dept").attr("hidden",true);
    });


});


</script>

@stop


@section('plugins-css')
 <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datepicker/datepicker3.css">
<link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="{{asset('adminlte')}}/plugins/lightbox2/css/lightbox.css">
<style type="text/css">

.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; width: 20% !important; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
.select2-container{ width:100% !important; }


</style>
@stop