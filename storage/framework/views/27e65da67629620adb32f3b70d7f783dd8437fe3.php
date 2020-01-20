<script type="text/javascript">

$.fn.loadPR = function(){
  if ( $.fn.dataTable.isDataTable( '#dept_pr_list' ) ) {
    $('#dept_pr_list').dataTable().fnDestroy();
  }

  $(document).on('click', '.pr_ids', function(){
    if($('.pr_ids:checked').length){
      $('#delete_prs').prop('disabled', '');
    }else{
      $('#delete_prs').prop('disabled', 'disabled');     
    }
  });

  $('#delete_checkbutton').click(function(){
    if($(this).is(':checked')){
      $('.delete_column').removeClass('hide');
    }else{
      $('.delete_column').addClass('hide');      
    }
  });


  $('#dept_pr_list').dataTable({
      processing: true,
      serverSide: true,
      ajax:{
          "type": 'POST',
         "url" : '<?php echo route('dept.set_datatables'); ?>',
          data : {
                  "_token" : '<?php echo e(csrf_token()); ?>',
                  dataTables : 'dept_pr_list'
          }
      },
      columns: [
            { data: 'olongapo_purchase_request_no.id', name: 'olongapo_purchase_request_no.id',
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { data: 'pr_purpose', name: 'olongapo_purchase_request_no.pr_purpose'},
            { data: 'pr_no', name: 'olongapo_purchase_request_no.pr_no'},
            { data: 'pr_date_dept', name: 'olongapo_purchase_request_no.pr_date_dept'},
           //  { data: null, name: 'olongapo_purchase_request_no.approval_status',
           //      render : function(data, type, row){
           //          var action = '';
           //          if(data.approval_status == 0){
           //             action = '<b class="text-danger"><i class="fa fa-times text-danger"></i> Decline </b>';
           //          }else if(data.approval_status == 1){
           //             action = '<b class="text-success"><i class="fa fa-check text-success"></i> Approved</b>';
           //         }else if(data.approval_status == 3){
           //             action = '<b class="text-warning"><i class="fa fa-circle text-warning"></i> Pending</b>';
           //          }
           //          var remarks = ((data.approval_remarks != null && data.approval_remarks != '') ? '('+data.approval_remarks+')' : '');
           //          return action +' '+remarks ; 
           //      }
           // },
            { data: null, name: 'olongapo_purchase_request_no.pr_date_dept',
                render : function(data, type, row){
                    var action = '';
                   if(data.pr_status === '' || data.pr_status === null){
                       action = '<form method="get" action="<?php echo e(route('dept.pr_edit')); ?>"><?php echo e(csrf_field()); ?><input type="hidden" name="pr_id" value="'+data.olongapo_purchase_request_no.id+'" /> <button type="submit" class="btn btn-sm btn-primary" ><i class="fa fa-pencil"></i> Edit</button></form> ';
                    }else if(data.pr_status === 'done'){
                       action = '<strong>Not yet process</strong>';
                    }
                    return action;
                }
           },
            {
              data:null,
              "searchable" : false,
              render:function(data, type, row){
                return '<input type="checkbox" name="pr_id[]" class="pr_ids" value="'+data.olongapo_purchase_request_no.id+'"/> Delete';
              },className : 'delete_column hide'
            }
      ],
      columnDefs: [
        {
          orderable: false, targets: [-1]
        },
      ],
      "order": [[ 0, 'asc' ]],
      'fnDrawCallback':function(){
        $('#delete_checkbutton').click(function(){
          if($(this).is(':checked')){
            $('.delete_column').removeClass('hide');
          }else{
            $('.delete_column').addClass('hide');      
          }
        });

        if($("#delete_checkbutton").is(':checked')){
          $('.delete_column').removeClass('hide');
        }else{
          $('.delete_column').addClass('hide');      
        }
    }
  }).dataTableSearch(500);
};

$.fn.loadPR();

$('#pr_no_date').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd',
});

$('.datepicker').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd',
});


$.fn.showAddModal = function(){
    $('#add_purchase_request_modalLabel').text("Add Purchase Request");
    $('#add_purchase_request').trigger("reset");
    var count = 1;
    var add_tr =  '<tr >'+
                          '  <td><textarea class="form-control textarea" placeholder="Description" name="item_desc[]"></textarea></td>'+
                          // '  <td><textarea class="form-control textarea" placeholder="Remarks" name="item_remarks[]"></textarea></td>'+
                          '  <td class="td-sm"><input class="form-control item_qty input-sm" type="number" step="0.1" name="item_qty[]" value="1" /></td>'+
                          '  <td><input class="form-control input-sm item_unit" type="text" name="item_unit[]" value="" /></td>'+
                          '  <td class="td-sm" ><input class="form-control item_price" type="number" step="0.1" name="item_price[]" value="" /></td>'+
                          '  <td><input class="form-control item_total_price" type="text" name="item_total_price[]" value="" readonly /></td>'+
                          '  <td></td>'+
                          '</tr>';
    $('#items_list tbody').html(add_tr);
    
    $('#add_purchase_request_modal').modal({
        backdrop: 'static',
        keyboard: false
    });

    $('#submit_butts').attr('onclick','$(this).sentPurchaseRequest();');
    $('#other_content_b').html('');
    $.fn.item_price();
    $.fn.item_unit();
};

$('#add_items').on('click',function(){
    var rowCount = $('#items_list tbody tr').length;
    rowCount +=1;
    var add_tr = '<tr>'+
                    '  <td><textarea class="form-control" placeholder="Description" name="item_desc[]"></textarea></td>'+
                    // '  <td><textarea class="form-control" placeholder="Remarks" name="item_remarks[]"></textarea></td>'+
                    '  <td><input class="form-control item_qty" type="number" step="0.1" name="item_qty[]" value="1"/></td>'+
                    '  <td><input class="form-control item_unit" type="text" name="item_unit[]" /></td>'+
                    '  <td><input class="form-control item_price" type="number" step="0.1" name="item_price[]" /></td>'+
                    '  <td><input class="form-control item_total_price"  name="item_total_price[]" disabled /></td>'+
                    '  <td><button type="button" class="btn btn-danger btn-sm item_cancel"  onclick="$(this).removeTR();" >remove</button></td>'+
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
      }else{
        total_price = parseFloat(el.val());
        $('input[name="item_total_price[]"]').eq(el_index).val(total_price.toFixed(2));
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
      }
  });
};

$.fn.removeTR = function(){
  $(this).closest('tr').remove();
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
                    $('#dept_pr_list').DataTable().ajax.reload();

            }
     });
};

$.fn.closeModal = function(id){
    $('#'+id).modal('hide');
    $('.modal-backdrop').fadeOut();
    $('body').removeClass('modal-open');
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



$.fn.deletPRRequest = function(){
    var x = confirm("Are you sure to delete record/s?");
    if(x){
      $.ajax({
          type: "POST",
          url: "<?php echo e(route('dept.delete_pr')); ?>",
          data : $('#pr_delete_form').serialize(),
          dataType: "json",
          error: function(){
              console.log('error');
          },
          success: function(data){
            alert("Record/s deleted successfully.");
            $('#dept_pr_list').DataTable().ajax.reload();
          }
      });
    }
};

</script>
