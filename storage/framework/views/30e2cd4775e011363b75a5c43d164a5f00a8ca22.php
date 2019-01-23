<script type="text/javascript">
$('#new_ppe_mnthlyx').bootstrapValidator({
       // live: 'enabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        live: 'enabled',
        fields: {
            dept: {
                validators: {
                    notEmpty: {
                        message: 'The Department is required and cannot be empty'
                    }
                }
            },
            // control_no: {
            //     validators: {
            //         notEmpty: {
            //             message: 'The Control No. is required and cannot be empty'
            //         }
            //     }
            // },
            'item_desc[]': {
                validators: {
                    notEmpty: {
                        message: 'The ITEM DESCRIPTION is required and cannot be empty'
                    }
                }
            },
            'item_property_code[]': {
                validators: {
                    notEmpty: {
                        message: 'The ITEM PROPERTY CODE is required and cannot be empty'
                    }
                }
            },
            'item_pono': {
                validators: {
                    notEmpty: {
                        message: 'The  PROPERTY NO is required and cannot be empty'
                    }
                }
            },
            'item_qty[]': {
                validators: {
                    notEmpty: {
                        message: 'The ITEM QUANTITY is required and cannot be empty'
                    }
                }
            },
              'item_unit[]': {
                validators: {
                    notEmpty: {
                        message: 'The ITEM UNIT is required and cannot be empty'
                    }
                }
            },
            'item_unit_value[]': {
                validators: {
                    notEmpty: {
                        message: 'The ITEM UNIT VALUE is required and cannot be empty'
                    }
                }
            },
            'item_accountable_person[]': {
                validators: {
                    notEmpty: {
                        message: 'The ITEM ACCOUNTABLE PERSON is required and cannot be empty'
                    }
                }
            },
            'item_supplier': {
                validators: {
                    notEmpty: {
                        message: 'The SUPPLIER is required and cannot be empty'
                    }
                }
            },
             'item_invoice[]': {
                validators: {
                    notEmpty: {
                        message: 'The ITEM SUPPLIER is required and cannot be empty'
                    }
                }
            },


        }
}).on('success.field.fv', function(e, data) {

                data.fv.disableSubmitButtons(true);

        });

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
                                    '<td><textarea   class="form-control" name="item_desc[]" ></textarea></td>'+
                                    '<td><input type="text" class="form-control"  name="item_property_code[]" /></td>'+
                                    // '<td><input type="text" class="form-control"  name="item_pono[]" /></td>'+
                                    '<td><input type="text" class="form-control"  name="item_unit[]" /></td>'+
                                    '<td><input type="text" class="form-control item_qty"  name="item_qty[]" style="width: 60px;padding-right: 2px;" /></td>'+
                                    '<td><input type="text" class="form-control item_unit_value"  name="item_unit_value[]" style="width: 100px;" /></td>'+
                                    '<td><input type="text" class="form-control"  name="item_total_value[]" style="width: 100px;" disabled="" /></td>'+
                                    '<td><input type="text" class="form-control item_accountable_person"  name="item_accountable_person[]" /><input type="hidden" class="form-control"  name="item_accountable_person_id[]" /></td>'+
                                    // '<td><input type="text" class="form-control item_supplier"  name="item_supplier[]" /><input type="hidden" class="form-control"  name="item_supplier_id[]" /></td>'+
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





</script>