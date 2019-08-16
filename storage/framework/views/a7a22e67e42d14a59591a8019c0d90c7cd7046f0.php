<script type="text/javascript">
var formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'PHP',
  currencyDisplay : 'symbol',
  minimumFractionDigits: 2, /* this might not be necessary */
});

//Date picker

  $('#pr_no_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    });

 $('.datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
  });

  $('#pr_date').on("changeDate", function(e) {
      $.ajax({
        type: "POST",
        url: "<?php echo e(route('pr.get_pr_counter')); ?>",
        data : {
              _token : '<?php echo e(csrf_token()); ?>',
              pr_date :$(this).val(),
              pr_id : $('#pr_id').val(),

        },
        dataType: "json",
        error: function(){
         console.log('error');
        },
        success: function(data){
          var pr_no = $('#pr_no');
          pr_no.val(data);
        }
      });
});

$('#pr_no').on("click", function(e) {
  $.ajax({
      type: "POST",
      url: "<?php echo e(route('pr.get_pr_counter')); ?>",
      data : {
            _token : '<?php echo e(csrf_token()); ?>',
            pr_date :$('#pr_date').val(),
            pr_id : $('#pr_id').val(),

      },
      dataType: "json",
      error: function(){
       console.log('error');
      },
      success: function(data){
        var pr_no = $('#pr_no');
        pr_no.val(data);
      }
  });
});


  $('#add_items').on('click',function(){
    var rowCount = $('#items_list tbody tr').length;
      var add_tr = '<tr>'+
                              '<td>'+(parseInt(rowCount)+1)+'</td>'+
                              '  <td><textarea class="form-control" placeholder="Description" name="item_desc[]"></textarea></td>'+
                              '  <td><input class="form-control item_qty" type="text" name="item_qty[]" /></td>'+
                              '  <td><input class="form-control item_unit" type="text" name="item_unit[]" /></td>'+
                              '  <td><input class="form-control item_price" type="text" name="item_price[]" /></td>'+
                              '  <td><input class="form-control item_total_price" type="text" name="item_total_price[]" disabled /></td>'+
                              '  <td><button type="button" class="btn btn-danger btn-sm item_cancel"  onclick="$(this).removeTR();" >remove</button><input type="hidden" name="delete[]" value="false" /></td>'+
                              '</tr>';
                    $('#items_list tbody').append(add_tr);
                    $.fn.item_price();
                    $.fn.item_unit();
  });

$.fn.item_price = function(){
  $('.item_price').on('change',function(){
    var el = $(this);
    var el_index = $('.item_price').index(el);
    var qty  = $('input[name="item_qty[]"]').eq(el_index).val();
    var total_price = 0;
    if(qty !== null && qty !== '' ){
      total_price = parseFloat(el.val())*parseFloat(qty);
      $('input[name="item_total_price[]"]').eq(el_index).val(total_price.toFixed(2));
       $.fn.SumTotalPrice();
    }
  });
    $('.item_qty').on('change',function(){
    var el = $(this);
    var el_index = $('.item_qty').index(el);

    var unit_price  = $('input[name="item_price[]"]').eq(el_index).val();
     var total_price = 0;
    if(unit_price !== null && unit_price !== '' ){
      total_price = parseFloat(el.val())*parseFloat(unit_price);
      $('input[name="item_total_price[]"]').eq(el_index).val(total_price.toFixed(2));
      $.fn.SumTotalPrice();
    }
  });
};

$.fn.item_unit = function(){
    var itemunit_options = [
                              { value: "bottles"},
                              { value: "boxes"},
                              { value: "gallons"},
                              { value: "grams"},
                              { value: "kilograms"},
                              { value: "liters"},
                              { value: "miligrams"},
                              { value: "milliliters"},
                              { value: "packs/s"},
                              { value: "pad"},
                              { value: "pieces"},
                              { value: "pound"},
                              { value: "reams"},
                              { value: "roll/s"},
                              { value: "set"},
                              { value: "units"}
                            ];
  $('.item_unit').autocomplete({
      lookup : itemunit_options,
      minChars:0,
      onSelect: function (suggestion) {
        $(this).val(suggestion.value);
      }
      }).focus(function() {
      $(this).autocomplete('search', $(this).val());
  });
};



$.fn.item_price();
$.fn.item_unit();

$.fn.SumTotalPrice = function(){
  var sum_total_price = 0;
  $('.item_total_price').each(function(index){
      var value = $(this).val();
            value = value.replace(',','');
          sum_total_price += parseFloat(value);
    });
  $('#sum_price_total').text(formatter.format(sum_total_price).replace(/^(\D+)/, '$1 '));
};


  $.fn.removeTR = function(){
    var el = $(this);
     var el_index = $('.item_cancel').index(el);
    $('input[name="delete[]"]').eq(el_index).val('true');
    var item_id =  $('input[name="item_id[]"]').eq(el_index);
    if(item_id.length === 1){
      el.text('cancel');
      el.removeClass('btn-danger ');
      el.addClass('btn-default ');
      el.attr('onclick','$(this).cancelRemove()');
     $(this).closest('tr').addClass('remove');
    }else{
        $(this).closest('tr').remove();
    }

  };

    $.fn.cancelRemove = function(){
    var el = $(this);
     var el_index = $('.item_cancel').index(el);
    $('input[name="delete[]"]').eq(el_index).val('false');
    $(this).closest('tr').removeClass('remove');
    el.text('remove');
    el.removeClass('btn-default ');
    el.addClass('btn-danger ');
    el.attr('onclick','$(this).removeTR()');
  };

  $.fn.sentPurchaseRequest = function(){
    var el = $(this);
    el.attr('disabled',true);
      $.ajax({
            type: "POST",
            url: "<?php echo e(route('dept.add_purchase_request')); ?>",
            data : $('#add_purchase_request').serialize(),
            dataType: "json",
            error: function(){
              el.attr('disabled',false);
            },
            success: function(data){
               var errors = '';
                    if(data['status']==0){
                        $('input').parent('div').parent('div').removeClass('has-error');
                        $('input').parent('div').parent('div').addClass('has-success');
                       for(var key in data['errors']){
                           errors += data['errors'][key]+'<br />';
                           $('input[name^="'+key+'"]').parent('div').parent('div').addClass('has-error has-feedback');
                           $('textarea[name^="'+key+'"]').parent('div').parent('div').addClass('has-error has-feedback');
                        }
                      $('#statusC').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(10000).fadeOut();
                    el.attr('disabled',false);
                    }else{
                      $('input').parent('div').parent('div').removeClass('has-error');
                      $('input').parent('div').parent('div').addClass('has-success');
                      $('#statusC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut().closeModal('add_purchase_request_modal');
                       el.attr('disabled',false);
                    }

            }
     });
  };

  $.fn.closeModal = function(id){
      $('#'+id).modal('hide');
      $('.modal-backdrop').fadeOut();
      $('body').removeClass('modal-open');
    };





</script>
