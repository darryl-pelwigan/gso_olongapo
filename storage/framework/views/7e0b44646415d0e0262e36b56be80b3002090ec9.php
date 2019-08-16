<?php $__env->startSection('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      PPE MONTHLY REPORT
      </h1>
    </section>



    <!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info box-shadow">
            <div class="box-header">
              <h3 class="box-title">PPE MONTHLY REPORT</h3>


               <a class="btn btn-success pull-right" href="<?php echo e(route('inv.monthly_report_new')); ?>"  ><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive" id="show-all-ppe-mnthly">

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



   <?php $__env->stopSection(); ?>





<?php $__env->startSection('plugins-script'); ?>
<!-- bootstrap datepicker http://bootstrap-datepicker.readthedocs.org/ -->
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo e(asset('adminlte')); ?>/plugins/datatables/table-header-search.js"></script>
<script src="//cdn.rawgit.com/ashl1/datatables-rowsgroup/v1.0.0/dataTables.rowsGroup.js"></script>
<script src="<?php echo e(asset('adminlte/plugins/autocomplete/')); ?>/jquery.autocomplete.min.js"></script>
<script type="text/javascript">

$.fn.submitPPEMnthly = function(){
   $.ajax({
            type: "POST",
            url: "<?php echo e(route('inv.set_ppe_mnthly_report')); ?>",
            data :$('#new_ppe_mnthly').serialize(),
            dataType: "html",
            error: function(){
               console.log('error');
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

$('#date_log').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd',
    });

$('#dept').autocomplete({
        serviceUrl: '<?php echo e(route("dept.get_subdeptcodes")); ?>',
        dataType: 'json',
        type: 'POST',
        params : {
                  _token : '<?php echo e(csrf_token()); ?>'
        },
        onSelect: function (suggestion) {
          $('#pr_sdept_id').val(suggestion.data);
        }
  });

$.fn.autoCompleteSupp = function(){
  $('.item_supplier').autocomplete({
        serviceUrl: '<?php echo e(route("inv.get_supplier")); ?>',
        dataType: 'json',
        type: 'POST',
        params : {
                  _token : '<?php echo e(csrf_token()); ?>'
        },
        onSelect: function (suggestion) {
            var index = $( ".item_supplier" ).index( this );
            $('input[type=hidden][name^="item_supplier_id"]:eq('+index+')').val(suggestion.data);
            console.log(index);
        }
  });
};
$.fn.autoCompleteSupp();

$.fn.autoCompleteEmpp = function(){
  $('.item_accountable_person').autocomplete({
        serviceUrl: '<?php echo e(route("emp.get_employee_name")); ?>',
        dataType: 'json',
        type: 'POST',
        params : {
                  _token : '<?php echo e(csrf_token()); ?>'
        },
        onSelect: function (suggestion) {
            var index = $( ".item_accountable_person" ).index( this );
            $('input[type=hidden][name^="item_accountable_person_id"]:eq('+index+')').val(suggestion.data);
            console.log(index);
        }
  });
};
$.fn.autoCompleteEmpp();


$.fn.computeTotal = function(){
  $('.item_qty , .item_unit_value').on('change',function(){
      var index = $( ".item_qty" ).index( this );
      if(index === -1){
         var index = $( ".item_unit_value" ).index( this );
      }

     var qty =   $('input[name^="item_qty"]:eq('+index+')').val();
     var unit_value =   $('input[name^="item_unit_value"]:eq('+index+')').val();
     if(qty!== '' && unit_value !== '' ){
        var total_value = parseFloat(qty) *  parseFloat(unit_value) ;
        $('input[name^="item_total_value"]:eq('+index+')').val(total_value.toFixed(2));
     }


  });
};
$.fn.computeTotal();
$('.add-tr').on('click',function(){
  var tbody_tr = $('#ppe-mnthly-report-items-add tbody tr');
  var tr_data = ' <tr id="tr_'+(parseInt(tbody_tr.length)+1)+'">'+
                                    '<td><input type="text" class="form-control" name="item_desc[]" style="" /></td>'+
                                    '<td><input type="text" class="form-control"  name="item_property_code[]" /></td>'+
                                    '<td><input type="text" class="form-control"  name="item_pono[]" /></td>'+
                                    '<td><input type="text" class="form-control item_qty"  name="item_qty[]" style="width: 60px;" /></td>'+
                                    '<td><input type="text" class="form-control item_unit_value"  name="item_unit_value[]" style="width: 100px;" /></td>'+
                                    '<td><input type="text" class="form-control"  name="item_total_value[]" style="width: 100px;" disabled="" /></td>'+
                                    '<td><input type="text" class="form-control item_accountable_person"  name="item_accountable_person[]" /><input type="hidden" class="form-control"  name="item_accountable_person_id[]" /></td>'+
                                    '<td><input type="text" class="form-control item_supplier"  name="item_supplier[]" /><input type="hidden" class="form-control"  name="item_supplier_id[]" /></td>'+
                                    '<td><input type="text" class="form-control"  name="item_invoice[]" /></td>'+
                                    '<td><button type="button" class="btn btn-xs btn-danger remove-tr" data-tr-id="'+(parseInt(tbody_tr.length)+1)+'" ><i class="fa fa-minus"></i> row</button></td>'+
                                '</tr>';

                                $('#ppe-mnthly-report-items-add tbody').append(tr_data);
                                $.fn.autoCompleteSupp();
                                $.fn.autoCompleteEmpp();
                                $.fn.computeTotal();
    $('.remove-tr').on('click',function(){
        $(this).closest('tr').remove();
    });

});



$('.set-control-number').on('change',function(){
  var type_es = $('input[name="type_es"]:checked').val();
  var date_log = $('input[name="date_log"]').val();
  if(date_log!='' && type_es !== '' ){
        $.fn.set_control_number(type_es,date_log);
  }
});

$.fn.set_control_number = function(type_es,date_log){

  $.ajax({
            type: "POST",
            url: "<?php echo e(route('inv.set_ppe_mnthly_control_no')); ?>",
            data : {
                _token : '<?php echo e(csrf_token()); ?>',
                type_es : type_es,
                date_log : date_log
            },
            dataType: "html",
            error: function(){
               console.log('error');
            },
            success: function(data){
              $('#control_no').val(data);
            }
    });
};

$.fn.loadAddedApplicants = function(){
    $.ajax({
            type: "POST",
            url: "<?php echo e(route('inv.get_all_ppe_mnthly_report')); ?>",
            data : { _token : '<?php echo e(csrf_token()); ?>'},
            dataType: "html",
            error: function(){
               console.log('error');
            },
            success: function(data){
              $('#show-all-ppe-mnthly').html(data);
            }
    });
};
$.fn.loadAddedApplicants();



</script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('plugins-css'); ?>
 <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datepicker/datepicker3.css">
<link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/lightbox2/css/lightbox.css">
<style type="text/css">

.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; width: 20% !important; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
.select2-container{ width:100% !important; }


</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template::admin-pages.menus.'.$template['menu'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>