<script type="text/javascript">


  $.fn.getALL = function(){

  if ( $.fn.dataTable.isDataTable( '#purchase_request_list' ) ) {
      $('#purchase_request_list').dataTable().fnDestroy();
  }

  $(document).on('keyup', 'input.number', function(){
      if (event.which >= 37 && event.which <= 40) {
         event.preventDefault();
      }
      var currentVal = $(this).val();
      var testDecimal = $(this).checkDecimals(currentVal)
      if (testDecimal.length > 1) {
          alert("You cannot enter more than one decimal point");
          currentVal = currentVal.slice(0, -1);
      }
      $(this).val($(this).replaceCommas(currentVal));
  });



    $('#purchase_request_list').dataTable({
              processing: true,
              serverSide: true,
              ajax:{
                "type": 'POST',
                "url" : '{!! route('absctrct.set_datatables') !!}',
                data : {
                        "_token" : '{{csrf_token()}}',
                        dataTables : 'pr_list'
                }
              },
              columns: [
                  { data: 'item_id' , name: 'olongapo_purchase_request_items.id' },
                  { data: 'description', name: 'olongapo_purchase_request_items.description'},
                  { data: 'pr_no', name: 'olongapo_purchase_request_no.pr_no'},
                  {
                    data: null,
                    name: 'olongapo_purchase_request_no.pr_date',
                    render: function(data, type, row){
                      var prno_date = moment(data.prno_date).format("YY-MM-DD");
                        return prno_date;
                    }
                  },

                  { data: 'dept_code', name: 'olongapo_department.dept_code' },
                  { data: 'subdept_code', name: 'olongapo_subdepartment.subdept_code' },

                  { data: 'qty', name: 'olongapo_purchase_request_items.qty' },
                  { data: 'unit', name: 'olongapo_purchase_request_items.unit' },
                   {
                    data: null, name: '', searchable : false, orderable : false,
                    render : function(data,type,row){
                      return '<button class="btn btn-info btn-xs" onclick="$(this).updatePR('+data.item_id+');" > <i class="fa fa-address-book"></i> Abstract</button>';
                    }
                   },
              ],
              "order": [[ 2, 'asc' ]],
              "columnDefs": [
                  { "width": "30%", "targets": 1 },
                  { "width": "20%", "targets": 2 },
                  { "width": "20%", "targets": 3 },
                  { "width": "20%", "targets": 8 }
                ],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                  $('tr#test th').addClass('hide');
                 $(input).appendTo($(column.footer()).empty())
                // $(input).appendTo($('tr#test th').empty())
                .on('keyup', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                    column.search(val ? val : '', true, false).draw();
                });
            });
        },
    });
  };

$.fn.getALL();

$.fn.replaceCommas = function(currentVal){
    var components = currentVal.toString().split(".");
    console.log(components);
    if (components.length === 1)
        components[0] = currentVal;
        components[0] = components[0].replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    if (components.length === 2)
        components[1] = components[1].replace(/\D/g, "");
    return components.join(".");
}

$.fn.checkDecimals = function(currentVal){
    var count;
    currentVal.match(/\./g) === null ? count = 0 : count = currentVal.match(/\./g);
    return count;
}

$.fn.updatePR = function(item_id){
  $('#add_purchase_request_modalLabel').text("Add Abstract");
  $('#add_purchase_request').trigger("reset");
  var thead = '<tr id="header-th">'+
              '        <th>No</th>'+
              '        <th>Description</th>'+
            //  '        <th>Remarks</th>'+
              '        <th>Price</th>'+
              '        <th>Qty</th>'+
              '        <th>unit</th>'+
              '        <th colspan="3" class="suppliers"><input type="text" class="form-control item_supplier" data-index="0" name="supplier_desc[0]" placeholder="Supplier Description" /> <input type="hidden" name="supplier_id[0]" id="supplier_id_0"></th>'+
              '      </tr>'+
              '      <tr id="header-th-items">'+
              '        <td colspan="5">ITEMS</td>'+
              '        <td>Unit Price</td>'+
              '        <td>Total Price</td>'+
              '        <td><input type="checkbox" onclick="$(this).allSupplierColumn(0);" class="supplier_checkbox  supplier_checkbox_col_0"/></td>'+
              '      </tr>';
  $('#items_list thead').html(thead);
  $('#items_list tbody').html('');
  $.ajax({
            type: "POST",
            url: "{{route('pr.get_pr')}}",
            data : {
              pr_no : item_id,
              _token : '{{csrf_token()}}'
            },
            dataType: "json",
            error: function(){
              alert('error');
            },
            success: function(data){
              console.log(data['items']);
              console.log('asdasdasdasd');
              // console.log('padas');
              $('#pr_dept_desc').val(data['items'][0].dept_desc);
              $('#pr_dept_id').val(data['items'][0].prno_dept);
              $('#pr_dept_code').val(data['items'][0].dept_code);
              $('#pr_dept_subcode').val(data['items'][0].subdept_code);
              $('#pr_no').val(data['items'][0].pr_no);
              $('#pr_no_dis').val(data['items'][0].pr_no);
              $('#pr_no_date').val(data['items'][0].prno_date);
              $('#update_check_date').val(data['items'][0].prno_date);
              $('#obr_no').val(data['items'][0].obr_no);
              $('#obr_date').val(data['items'][0].obr_date);

              $('#proc_type option[value="'+data['items'][0].proc_type+'"]').prop('selected', 'selected');
              var count =0;
              $('#items_list tbody').html('');
              var add_tr = '' ;
              for(var x = 0 ; x<(data['items'].length);x++){
                     // var total_price = ['items'][x].unit_price * data['items'][x].qty;
                     // var sum_price = sum_price + total_price;

                     add_tr = add_tr + '<tr id="item_'+x+'" >'+
                                  '  <td>'+(x+1)+
                                  ' <input type="hidden" name="item_id['+x+']" value="'+data['items'][x].item_id+'" />'+
                                  '  </td>'+
                                  '  <td>'+data['items'][x].description+'</td>'+
                                //  '  <td>'+(data['items'][x].remarks != null ? data['items'][x].remarks : '')+'</td>'+
                                  '  <td>'+data['items'][x].unit_price+'</td>'+
                                  '  <td>'+data['items'][x].qty+'<input type="hidden" id="qty_'+x+'" name="qty['+x+']" value="'+data['items'][x].qty+'" /></td>'+
                                  '  <td>'+data['items'][x].unit+'</td>'+
                                  '  <td><input class="form-control number unit_price uprice_'+count+'"  type="text" data-x="'+x+'" data-index="0" data-count="'+count+'" name="item_price['+x+']['+count+']" value="" /></td>'+
                                  '  <td><input class="form-control number tprice_'+count+'" type="text"  name="item_toprice['+x+']['+count+']" value="" disabled="true"  /></td>'+
                                  '  <td><input type="checkbox" name="supplier_item['+x+']['+count+']"  onclick="$(this).highlightAmount('+x+', '+count+');" class="supplier_row_'+x+' supplier_column_'+count+' supplier_checkbox" value="1"/></td>'+
                                  '</tr>';
              }
              add_tr = add_tr + '<input type="hidden" name="items_num" value="'+data['items'].length+'" />';
              $('#items_list tbody').html(add_tr);
              $('#removetx_items').val('');
              $('#submit_butts').attr('onclick','$(this).updatePRdata(\''+data['items'][0].prno_id+'\')');
              $('#add_purchase_request_modal').modal({
                      backdrop: 'static',
                      keyboard: false
              });
              $.fn.supplierAutoc();
              $.fn.unit_price();
            }
        });
};

$('#pr_dept_desc').autocomplete({
        serviceUrl: '{{route("dept.get_subdeptcodes")}}',
        dataType: 'json',
        type: 'POST',
        params : {
                  _token : '{{csrf_token()}}'
        },
        onSelect: function (suggestion) {
          $('#pr_dept_id').val(suggestion.data);
          $('#pr_dept_code').val(suggestion.dept_code);
          $('#pr_dept_subcode').val(suggestion.subdept_code);
          $('#pr_no_dis').val(suggestion.dept_code+'-'+suggestion.subdept_code);
        }
  });
$.fn.supplierAutoc = function(){
  $('.item_supplier').autocomplete({
          serviceUrl: '{{route("inv.get_supplier")}}',
          dataType: 'json',
          type: 'POST',
          params : {
                    _token : '{{csrf_token()}}'
          },
          onSelect: function (suggestion) {
            var index_inp = $(this).attr('data-index');
            $('#supplier_id_'+index_inp).val(suggestion.data);
          }
    });
};


/*Update PR data*/
$.fn.updatePRdata = function(pr_id){
    $('#pr_id_update').val(pr_id);
    $('#absctrct_no').attr('disabled',false);
    var el = $(this);
    el.attr('disabled',true);

    $.ajax({
          type: "POST",
          url: "{{route('abstrct.processes')}}",
          data : $('#add_purchase_request').serialize(),
          dataType: "json",
          error: function(){
            el.attr('disabled',false);
            $('#absctrct_no').attr('disabled',true);
          },
          success: function(data){
              var errors = '';
              if(data['status']==0){
                for(var key in data['errors']){
                  errors += data['errors'][key]+'<br />';
                }
                $('#statusC').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                  el.attr('disabled',false);
              }else{
                $('#statusC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                $.fn.getALL();
                $.fn.closeModal('add_purchase_request_modal');
                el.attr('disabled',false);
              }
              el.attr('disabled',false);
              $('#absctrct_no').attr('disabled',true);
          }
    });

};

//Date picker


$('#obr_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
});

$('#absctrct_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
}).on('change',function(){
   $.ajax({
            type: "POST",
            url: "{{route('absctrct.get_control_number')}}",
            data : {
              date : $(this).val(),
              _token : '{{csrf_token()}}'
            },
            dataType: "html",
            error: function(){
              console.log('error');
            },
            success: function(data){
              $('#absctrct_no').val(data);
            }
        });
});

  // var th = '<th colspan="2" class="suppliers">\
  //             <table>\
  //               <tr>\
  //                 <td>\
  //                   <input type="text" class="form-control item_supplier" data-index="'+th_supp+'" name="supplier_desc['+th_supp+']" placeholder="Supplier Description" />\
  //                   <input type="hidden" name="supplier_id['+th_supp+']" id="supplier_id_'+th_supp+'">\
  //                 </td>\
  //                 <td>\
  //                   <button class="btn btn-xs btn-danger"><i class="fa fa-minus"></i> </button>\
  //                 </td>\
  //               </tr>\
  //             </table>\
  //           </th>';

$.fn.addSupplier = function(){
  var th_supp = parseInt($('.suppliers').length);
  var count = parseInt($('#items_list tbody tr').length);
  var th = '<th colspan="3" class="suppliers" id="suppliers_th_'+th_supp+'"><input type="text" class="form-control item_supplier" data-index="'+th_supp+'" name="supplier_desc['+th_supp+']" placeholder="Supplier Description" /> <input type="hidden" name="supplier_id['+th_supp+']" id="supplier_id_'+th_supp+'"><button class="btn btn-xs btn-danger removecolumn" id="removecolumn_'+th_supp+'" type="button"><i class="fa fa-minus"></i> Remove</button></th>';
  $('#items_list thead #header-th').append(th);

  var th_items = '<td class="th_'+th_supp+'">Unit Price</td>\
                  <td class="th_'+th_supp+'">Total Price</td>\
                  <td class="th_'+th_supp+'"><input type="checkbox" onclick="$(this).allSupplierColumn('+th_supp+');" class="supplier_checkbox supplier_checkbox_col_'+th_supp+'"/></td>';
  $('#items_list thead #header-th-items').append(th_items);
  var items = [];
  for(var x=0;x<count;x++){
    items[x] =  '<td class="th_'+th_supp+'">\
                    <input class="form-control number unit_price uprice_'+th_supp+'" type="text"  data-x="'+x+'" data-index="'+th_supp+'" name="item_price['+x+']['+th_supp+']" value="" />\
                </td>'+
                '<td class="th_'+th_supp+'">\
                    <input class="form-control tprice_'+th_supp+'" type="text" name="item_toprice['+x+']['+th_supp+']" value=""  disabled="true" />\
                </td>\
                <td class="th_'+th_supp+'">\
                  <input type="checkbox" name="supplier_item['+x+']['+th_supp+']" class="supplier_row_'+x+' supplier_column_'+th_supp+' supplier_checkbox" onclick="$(this).highlightAmount('+x+', '+th_supp+');" value="1"/>\
                </td>';
    $('#items_list tbody #item_'+x).append(items[x]);

    if($('.supplier_row_'+x+':checked').length){
      $('input[name="supplier_item['+x+']['+th_supp+']"]').attr('disabled', 'disabled');
      $('.supplier_checkbox_col_'+th_supp).attr('disabled', 'disabled');

    }else{
      $('input[name="supplier_item['+x+']['+th_supp+']"]').removeAttr('disabled');
      $('.supplier_checkbox_col_'+th_supp).removeAttr('disabled', 'disabled');
    }

  }

  $.fn.supplierAutoc();
  $.fn.unit_price();
  $(".removecolumn").click(function() {
      var colNumber = new String($(this).attr('id')).replace('removecolumn_', '');
      $('.th_'+colNumber).remove();
      $('#suppliers_th_'+colNumber).remove();
  });
};

$.fn.unit_price = function(){
  $('.unit_price').on('change',function(){
      var index_x = $(this).attr('data-index');
      var x = $(this).attr('data-x');
      var qty = parseFloat($('#qty_'+x).val());
      var val = $(this).val().replace(',', '');
      var Total_p = parseFloat(parseFloat(val)*qty);
      if(isNaN(Total_p)){
        Total_p = '';
      }
      var finalTotal = $(this).replaceCommas(Total_p.toFixed(2));
    $('input[name="item_toprice['+x+']['+index_x+']"]').val(finalTotal);

  });
};


$.fn.highlightAmount = function(col, row){
  if($(this).is(':checked')){
    $('input[name="item_toprice['+col+']['+row+']"]').closest('td').addClass('select_supplier');
    $('input[name="item_price['+col+']['+row+']"]').closest('td').addClass('select_supplier');
    $(this).closest('td').addClass('select_supplier');
    $('.supplier_row_'+col).attr('disabled', 'disabled');
    $(this).removeAttr('disabled', '');
    $('#removecolumn_'+row).prop('disabled', 'disabled');
  }else{
    $('input[name="item_toprice['+col+']['+row+']"]').closest('td').removeClass('select_supplier');
    $('input[name="item_price['+col+']['+row+']"]').closest('td').removeClass('select_supplier');
    $(this).closest('td').removeClass('select_supplier');
    $('.supplier_row_'+col).removeAttr('disabled');
    $('.supplier_checkbox_col_'+row).removeAttr('checked');
    $('.supplier_checkbox_col_'+row).attr('disabled', 'disabled');
    $('#removecolumn_'+row).prop('disabled', '');

    if($('.supplier_checkbox_col_'+row+':checked').length > 0){
      $('.supplier_checkbox_col_'+row).attr('disabled', 'disabled');
      $('.supplier_checkbox_col_'+row).removeAttr('disabled');
    }else{
      $('.supplier_checkbox_col_'+row).removeAttr('checked');
      $('.supplier_checkbox_col_'+row).removeAttr('disabled');
    }

  }
};

$.fn.allSupplierColumn = function(col){

  if($('.supplier_column_'+col).is('[disabled=disabled]')){
    $('.supplier_checkbox_col_'+col).prop('disabled', 'disabled');
    $('.supplier_checkbox_col_'+col).removeAttr('checked');
  }else{
    $('.supplier_checkbox_col_'+col).prop('disabled', '');

         if($(this).is(':checked')){
        $('.uprice_'+col).closest('td').addClass('select_supplier');
        $('.tprice_'+col).closest('td').addClass('select_supplier');
        $('.supplier_column_'+col).closest('td').addClass('select_supplier');
        $('.supplier_column_'+col).prop('checked', 'checked');
        $('.supplier_checkbox').prop('disabled', 'disabled');
        $('.supplier_column_'+col).removeAttr('disabled', '');
        $('.supplier_checkbox_col_'+col).prop('disabled', 'disabled');
        $(this).removeAttr('disabled');

        $('#removecolumn_'+col).prop('disabled', 'disabled');

      }else{
        $('.uprice_'+col).closest('td').removeClass('select_supplier');
        $('.tprice_'+col).closest('td').removeClass('select_supplier');
        $('.supplier_column_'+col).closest('td').removeClass('select_supplier');
        $('.supplier_checkbox').removeAttr('disabled');
        $('.supplier_checkbox').removeAttr('checked');
        $('.supplier_checkbox_col_'+col).prop('disabled', '');

        $('#removecolumn_'+col).prop('disabled', '');

      }

  }



};


</script>