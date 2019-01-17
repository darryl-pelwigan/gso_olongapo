<script type="text/javascript">

$.fn.showAddModal = function(){
$('#add_purchase_request_modal').modal({
                      backdrop: 'static',
                      keyboard: false
              });
$('#submit_butts').attr('onclick','$(this).sentPurchaseRequest();');
$('#other_content_b').html('');
};



  $.fn.getALL = function(){

  if ( $.fn.dataTable.isDataTable( '#purchase_request_list' ) ) {
      $('#purchase_request_list').dataTable().fnDestroy();
  }
    $('#purchase_request_list').dataTable({
              processing: true,
              serverSide: true,
              ajax:{
                "type": 'POST',
                "url" : '{!! route('bac.set_datatables') !!}',
                data : {
                        "_token" : '{{csrf_token()}}',
                        dataTables : 'abstrct_list'
                }
              },
              columns: [
                  { data: 'abstrct_id' , name: 'olongapo_absctrct.id' },
                  { data: 'control_no', name: 'olongapo_absctrct.control_no'},
                  {
                    data: null,
                    name: 'olongapo_absctrct.abstrct_date',
                    render: function(data, type, row){
                      var abstrct_date = moment(data.abstrct_date).format("YY-MM-DD");
                        return abstrct_date;
                    }
                  },
                  { data: 'pr_no', name: 'olongapo_purchase_request_no.pr_no'},
                  {
                    data: null,
                    name: 'olongapo_purchase_request_no.pr_date',
                    render: function(data, type, row){
                      var prno_date = moment(data.prno_date).format("YY-MM-DD");
                        return prno_date;
                    }
                  },
                   {
                    data: null, name: '', searchable : false, orderable : false,
                    render : function(data,type,row){
                      return '<button class="btn btn-info btn-xs" onclick="$(this).updatePR('+data.abstrct_id+');" >View</button>';
                    }
                   },
              ],
              "order": [[ 2, 'asc' ]],
              "columnDefs": [
                  { "width": "30%", "targets": 1 },
                  { "width": "20%", "targets": 2 },
                  { "width": "20%", "targets": 3 },
                  // { "width": "20%", "targets": 8 }
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

$.fn.updatePR = function(item_id){

  $('#add_purchase_request').trigger("reset");
  var thead = '<tr id="header-th">'+
              '        <th>No</th>'+
              '        <th>Description</th>'+
              '        <th>Remarks</th>'+
              '        <th>Qty</th>'+
              '        <th>unit</th>'+
              '      </tr>'+
              '      <tr id="header_th_items">'+
              '        <td colspan="5">ITEMS</td>'+
              '      </tr>';
  $('#items_list thead').html(thead);
  $('#items_list tbody').html('');
  $.ajax({
            type: "POST",
            url: "{{route('bac.get_abstrct')}}",
            data : {
              pr_no : item_id,
              _token : '{{csrf_token()}}'
            },
            dataType: "json",
            error: function(){
              alert('error');
            },
            success: function(data){
              $('#old_control_no').val(data['items'][0].control_no);
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
              $('#absctrct_no').val(data['items'][0].control_no);
              $('#absctrct_date').val(data['items'][0].abstrct_date);

              $('#bac_reso_type').html(data.bac_type_o);


              $('#items_list thead #header-th').append(data.suppliers);
              $('#items_list thead #header_th_items').append(data.unit_total);

              var count =1;
              $('#items_list tbody').html('');
              var add_tr = '' ;

              for(var x = 0 ; x<(data['items'].length);x++){
                                 add_tr = add_tr + '<tr id="item_'+x+'" >'+
                                  '  <td>'+count+
                                  ' <input type="hidden" name="item_id['+x+']" value="'+data['items'][x].item_id+'" />'+
                                  '  </td>'+
                                  '  <td>'+data['items'][x].description+'</td>'+
                                  '  <td>'+data['items'][x].remarks+'</td>'+
                                  '  <td>'+data['items'][x].qty+'<input type="hidden" id="qty_'+x+'" name="qty['+x+']" value="'+data['items'][x].qty+'" /></td>'+
                                  '  <td>'+data['items'][x].unit+'</td>'+
                                  data['list'][x]+
                                  '</tr>';


                count++;
              }

              add_tr = add_tr + '<input type="hidden" name="items_num" value="'+data['items'].length+'" />';
              $('#items_list tbody').html(add_tr);
              $('#items_list tbody').append(data.total_tr);
              $('#removetx_items').val('');
              $('#submit_butts').attr('onclick','$(this).updatePRdata(\''+data['items'][0].prno_id+'\')');
              // $('#submit_butts').addClass('hide');
              // $('#add_supplier').addClass('hide');
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
            url: "{{route('bac.process_abstrct')}}",
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
                     // $.fn.closeModal('add_purchase_request_modal');
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



$.fn.addSupplier = function(){

  var th_supp = parseInt($('.suppliers').length);
  var count = parseInt($('#items_list tbody tr').length);
  var th = '<th colspan="2" class="suppliers"><input type="text" class="form-control item_supplier" data-index="'+th_supp+'" name="supplier_desc['+th_supp+']" placeholder="Supplier Description" /> <input type="hidden" name="supplier_id['+th_supp+']" id="supplier_id_'+th_supp+'"><input type="hidden" name="pubbid_id['+th_supp+']" id="pubbid_id'+th_supp+'" value=""></th>';
  $('#items_list thead #header-th').append(th);

  var th_items = '<td>Unit Price</td> <td>Total Price</td>';
  $('#items_list thead #header-th-items').append(th_items);
  var items = [];
  for(var x=0;x<count;x++){
   items[x] =  '  <td><input class="form-control unit_price" type="text"  data-x="'+x+'" data-index="'+th_supp+'" name="item_price['+x+']['+th_supp+']" value="" /></td>'+
                                  '  <td><input class="form-control " type="text" name="item_toprice['+x+']['+th_supp+']" value=""  disabled="true" /></td>';
      $('#items_list tbody #item_'+x).append(items[x]);
  }
  $.fn.supplierAutoc();
  $.fn.unit_price();
};

$.fn.unit_price = function(){
  $('.unit_price').on('change',function(){
      var index_x = $(this).attr('data-index');
      var x = $(this).attr('data-x');
      var qty = parseFloat($('#qty_'+x).val());
      var Total_p = parseFloat(parseFloat($(this).val())*qty);
    if(isNaN(Total_p)){
      Total_p = '';
    }
    $('input[name="item_toprice['+x+']['+index_x+']"]').val(Total_p.toFixed(2));

  });
};


$('#sof_desc').autocomplete({
        serviceUrl: '{{route("bac.a_get_sof")}}',
        dataType: 'json',
        type: 'POST',
        params : {
                  _token : '{{csrf_token()}}'
        },
        onSelect: function (suggestion) {
          $('#sof_id').val(suggestion.data);
        }
  });

$('#bac_categ').autocomplete({
        serviceUrl: '{{route("bac.a_get_categ")}}',
        dataType: 'json',
        type: 'POST',
        params : {
                  _token : '{{csrf_token()}}'
        },
        onSelect: function (suggestion) {
          $('#bac_categ_id').val(suggestion.data);
        }
  });


//Date picker
    $('#bac_date').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd',
    }).on('change',function(){
        $.fn.setControllNumber();
    });



    $.fn.setControllNumber = function(){
      var bac_date = $('#bac_date').val();
      var bac_datex = bac_date.split('-');
          $.ajax({
            type: "POST",
             url: "{{route('bac.set-bac-control-no')}}",
            data : {
              bac_date : bac_date,
              pr_dept_code : $('#pr_dept_code').val(),
              _token : '{{csrf_token()}}'
            },
            dataType: "json",
            error: function(){
              console.log('error');
            },
            success: function(data){
              $('#bac_control_no').val(data);
            }
        });

    };



</script>