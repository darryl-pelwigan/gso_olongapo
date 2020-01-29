<script type="text/javascript">
  $.fn.getALL = function(){

  if ( $.fn.dataTable.isDataTable( '#purchase_request_list' ) ) {
      $('#purchase_request_list').dataTable().fnDestroy();
  }
    $('#purchase_request_list').dataTable({
              processing: true,
              serverSide: false,
              ajax:{
                "type": 'POST',
                "url" : '{!! route('popr.set_datatables') !!}',
                data : {
                           "_token" : '{{csrf_token()}}',
                            dataTables : 'dept_pr_list'
                }
              },
             columns: [
            { data: 'id', name: 'olongapo_purchase_request_no.id',
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { data: 'olongapo_subdepartment.dept_desc', name: 'olongapo_subdepartment.dept_desc'},
            { data: 'olongapo_purchase_request_no.pr_purpose', name: 'olongapo_purchase_request_no.pr_purpose'},
            // { data: 'olongapo_purchase_request_no.pr_no', name: 'olongapo_purchase_request_no.pr_no'},
            { data: null, name: 'olongapo_purchase_request_no.pr_no',
              render : function(data, type, row){

                if ( data.olongapo_purchase_request_no.pr_no != " "){
                  return '<i class="fa fa-check-circle" aria-hidden="true" style="font-size:15px;color:green"></i> '+ data.olongapo_purchase_request_no.pr_no;
                }else {
                  return '<i class="fa fa-times" aria-hidden="true" style="font-size:20px;color:red"></i>'
                }
              }
            },
            { data: 'olongapo_purchase_request_no.pr_date', name: 'olongapo_purchase_request_no.pr_date'},
            { data: 'proc_type'},
            { data: 'olongapo_purchase_request_no.pr_date_dept', name: 'olongapo_purchase_request_no.pr_date_dept'},
            { data: null, name: 'olongapo_purchase_request_no.pr_date_dept',
                render : function(data, type, row){
                    var action = '';
                   if(data.pr_status === '' || data.pr_status === null){

                       action = '<form method="get" action="{{route('pr.pr_edit')}}">{{csrf_field()}}<input type="hidden" name="pr_id" id="pr_id" value="'+data.olongapo_purchase_request_no.id+'" /> <input type="submit" class="btn btn-info btn-sm" name="view" value="View" /> <input type="submit" class="btn btn-sm btn-warning" name="edit" value="Edit" /> <button type="button" class="btn btn-success btn-sm" onclick="$(this).add_req(\''+data.olongapo_purchase_request_no.requested_by+'\',\''+data.olongapo_purchase_request_no.designated_req+'\',\''+data.olongapo_purchase_request_no.name_avail+'\',\''+data.olongapo_purchase_request_no.designation_avail+'\',\''+data.olongapo_purchase_request_no.name_app+'\',\''+data.olongapo_purchase_request_no.designation_app+'\',\''+data.olongapo_purchase_request_no.id+'\');">PDF</button> <button type="button" class="btn btn-success btn-sm" onclick="$(this).excel_show(\''+data.olongapo_purchase_request_no.requested_by+'\',\''+data.olongapo_purchase_request_no.id+'\');">XLS</button></form></form> ';

                    }else if(data.pr_status === 'done'){
                       action = '<strong>Not yet process</strong>';
                    }
                    return action;
                }
           }
        ],
             columnDefs: [
            {
              orderable: false, targets: [-1]
            },
        ],
        // "order": [[ 3, 'asc' ]],
    }).dataTableSearch(500);;
  };

$.fn.getALL();

$.fn.add_req = function(name, des_req, name_avail, des_avail, name_app, des_app,  id){

  console.log(name_avail);


  $("#modal_submit").attr("onclick","$(this).sentPdf()");

  var vars = name_app;
  var arrVars = vars.split("/");
  var lastVar = arrVars.pop();
  var restVar = arrVars.join("/");

  var vars2 = des_app;
  var arrVars2 = vars2.split("/");
  var lastVar2 = arrVars2.pop();
  var restVar2 = arrVars2.join("/");


  if(name.length > 1 )
  {

    $('#name_req').val(name);
    $('#designation_req').val(des_req);
    $('#name_avail').val(name_avail);
    $('#designation_avail').val(des_avail);
    $('#name_app1').val(restVar);
    $('#designation_app1').val(restVar2);
    $('#name_app2').val(lastVar);
    $('#designation_app2').val(lastVar2);
    $('#prid').val(id);

    $("#add_requisition").modal('show');
  }else{
    $('#prid').val(id);

    $("#add_requisition").modal('show');
  }



};

$.fn.excel_show = function(name, id){

  console.log(id);

  $("#modal_submit").attr("onclick","$(this).sentExcel()");
  if(name.length > 1 )
  {
    $('#name_req').val(name);
    $('#prid').val(id);
    $("#add_requisition").modal('show');
  }else{
    $('#prid').val(id);

    $("#add_requisition").modal('show');
  }



};

$.fn.updatePR = function(item_id){
  $('#add_purchase_request').trigger("reset");
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
              var add_remarks = '<br /><div class="row" ><div class="col-md-5"><div class="form-group">'+
                                '<textarea class="form-control" name="update_pr_remarks" placeholder="Add Remarks" ></textarea>'+
                                '</div></div>'+
                                '<div class="col-md-5 col-md-offset-1">'+
                                '<div id="update-remarks">'+data['remarks']+'</div>'+
                                '</div></div>'
                                ;
              $('#other_content_b').html(add_remarks);
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
              $('#supplier').val(data['items'][0].supplier_desc);
              $('#supplier_id').val(data['items'][0].supplier_id);
              var count =1;
              $('#items_list tbody').html('');
              var add_tr = '' ;
              for(var x = 0 ; x<(data['items'].length);x++){
                     add_tr = add_tr + '<tr id="item_'+count+'" >'+
                                  '  <td>'+count+
                                  ' <input type="hidden" name="item_id['+count+']" value="'+item_id+'" />'+
                                  '  </td>'+
                                  '  <td><textarea class="form-control" placeholder="Description" name="item_desc['+count+']">'+data['items'][x].description+'</textarea></td>'+
                                  '  <td><textarea class="form-control" placeholder="Remarks" name="item_remarks['+count+']">'+data['items'][x].remarks+'</textarea></td>'+
                                  '  <td><input class="form-control" type="text" name="item_qty['+count+']" value="'+data['items'][x].qty+'" /></td>'+
                                  '  <td><input class="form-control" type="text" name="item_unit['+count+']" value="'+data['items'][x].unit+'" /></td>'+
                                  // '  <td><input class="form-control" type="text" name="item_price['+count+']" value="'+accounting.formatMoney(data[x].pr_total,'')+'" /></td>'+
                                  // '  <td><input class="form-control item_supplier" type="text" name="item_supplier['+count+']" value="'+data[x].title+'" /></td>'+
                                  // '  <td><button type="button" class="btn btn-danger btn-sm item_cancel"  onclick="$(this).removeTRX('+count+','+data['items'][x].item_id+');" >remove</button></td>'+
                                  '</tr>';
                count++;
              }
              $('#items_list tbody').html(add_tr);
              $('#removetx_items').val('');
              $('#submit_butts').attr('onclick','$(this).updatePRdata(\''+data['items'][0].prno_id+'\')');
              $('#add_purchase_request_modal').modal({
                      backdrop: 'static',
                      keyboard: false
              });

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
          if(suggestion.subdept_code!=0){
            $('#pr_no_dis').val(suggestion.dept_code+'.'+suggestion.subdept_code);
          }else{
            $('#pr_no_dis').val(suggestion.dept_code);
          }

        }
  });
  $('.item_supplier').autocomplete({
          serviceUrl: '{{route("inv.get_supplier")}}',
          dataType: 'json',
          type: 'POST',
          params : {
                    _token : '{{csrf_token()}}'
          },
          onSelect: function (suggestion) {
            $('#supplier_id').val(suggestion.data);
          }
    });



/*Update PR data*/
$.fn.updatePRdata = function(pr_id){
  $('#pr_id_update').val(pr_id);
  var el = $(this);
    el.attr('disabled',true);

      $.ajax({
            type: "POST",
            url: "{{route('pr.update_pr')}}",
            data : $('#add_purchase_request').serialize(),
            dataType: "json",
            error: function(){
              el.attr('disabled',false);
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
            }
     });

};

//Date picker

    $('#pr_no_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    });


$('#obr_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
});

$('#pr_no_date').on('change',function(){
    var date_n = $(this).val();
    if(date_n!=''){
      date = date_n.split('-');
      var pr_no_old = $('#pr_no').val();
      var year_d = date[0];
      var mnth_d = date[1];
      var day_d = date[2];
      var dept_code =  $('#pr_dept_code').val();
      var subdept_code =       $('#pr_dept_subcode').val();
      if(subdept_code!=0){
        $('#pr_no_dis').val(dept_code+'.'+subdept_code+'-'+year_d.substring(2,4)+'-'+mnth_d+'-'+day_d);
      }else{
        $('#pr_no_dis').val(dept_code+'-'+year_d.substring(2,4)+'-'+mnth_d+'-'+day_d);
      }

      if(date_n != $('#update_check_date').val() )
        $.fn.getPrNoCounter(true);
      else
        $.fn.getPrNoCounter(false);
    }
});

$.fn.getPrNoCounter = function(dis){
  var pr_no = $('#pr_no_dis');
 $.ajax({
            type: "POST",
            url: "{{route('pr.get_pr_counter')}}",
            data : {
              dis:dis,
              pr_no : pr_no.val(),
              _token : '{{csrf_token()}}'
            },
            dataType: "json",
            error: function(){
              alert('error');
            },
            success: function(data){
              pr_no.val(data[0]);
              $('#pr_no').val(data[1]);
            }
        });

};

  // $('#purchase_request_list').DataTable();

  $('#add_items').on('click',function(){
    var rowCount = $('#items_list tbody tr').length;
    rowCount +=1;
      $('.item_cancel').remove();
      var add_tr = '<tr id="item_'+rowCount+'" >'+
                    '  <td>'+rowCount+'</td>'+
                    '  <td><textarea class="form-control" placeholder="Description" name="item_desc['+rowCount+']"></textarea></td>'+
                    '  <td><textarea class="form-control" placeholder="Remarks" name="item_remarks['+rowCount+']"></textarea></td>'+
                    '  <td><input class="form-control" type="text" name="item_qty['+rowCount+']" /></td>'+
                    '  <td><input class="form-control" type="text" name="item_unit['+rowCount+']" /></td>'+
                    // '  <td><input class="form-control" type="text" name="item_price['+rowCount+']" /></td>'+
                    // '  <td><input class="form-control item_supplier" type="text" name="item_supplier['+rowCount+']" /></td>'+
                    '  <td><button type="button" class="btn btn-danger btn-sm item_cancel"  onclick="$(this).removeTR('+rowCount+');" >remove</button></td>'+
                    '</tr>';

                    $('#items_list tbody').append(add_tr);
var has_change = $('#has_change');
  has_change.val(parseInt(has_change.val())+1);
  });


  $.fn.removeTR = function(id){
    $(this).closest('tr').remove();
    id -= 1;
    if(id!=1){
      $('tr#item_'+(id)+' td:last-child').append('<button type="button" class="btn btn-danger btn-sm item_cancel"  onclick="$(this).removeTR('+(id)+');" >remove</button>');
    }
  };

$.fn.removeTRX = function(id,item_id){

  var removetx_items = $('#removetx_items').val(); //retrieve array
      $('#removetx_items').val(removetx_items+','+item_id);

    $(this).closest('tr').css({'background':'#f9c3c3'});

    var has_change = $('#has_change');
  has_change.val(parseInt(has_change.val())+1);
  };

  $.fn.sentPurchaseRequest = function(){
    var el = $(this);
    el.attr('disabled',true);
      $.ajax({
            type: "POST",
            url: "{{route('pr.add_purchase_request')}}",
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
                      $('#statusC').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
                     $.fn.getALL();
                       $.fn.closeModal('add_purchase_request_modal');
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

$('#add_purchase_request').change(function(){
var has_change = $('#has_change');
  has_change.val(parseInt(has_change.val())+1);
});


$(':radio[name=req_receive]').change(function() {
  var stat = $(this).val();
  if(stat == 0)
  {
    $('#req1').removeClass("hidden");
    $('#req2').addClass("hidden");
  }else{
    $('#req1').addClass("hidden");
    $('#req2').removeClass("hidden");
  }
});

$(':radio[name=avail_receive]').change(function() {
  var stat = $(this).val();
    if(stat == 0)
  {
    $('#avail1').removeClass("hidden");
    $('#avail2').addClass("hidden");
  }else{
    $('#avail2').removeClass("hidden");
    $('#avail1').addClass("hidden");
  }
});

$(':radio[name=app_receive]').change(function() {
  var stat = $(this).val();
    if(stat == 0)
  {
    $('#app1').removeClass("hidden");
    $('#app2').addClass("hidden");
  }else{
    $('#app2').removeClass("hidden");
    $('#app1').addClass("hidden");
  }
});


 $.fn.sentPdf = function(){

    var form = $('#set_prop').serialize();
    console.log(form);
   var route = "{{route('pr.pr_pdf',['change1','change2'])}}";
    // route =route.replace("change1", $('#po_id').val());
    route =route.replace("change1", $('#pr_id').val());
    route =route.replace("change2", form);
   window.location.href = route;

  };

  $.fn.sentExcel = function(){

    var form = $('#set_prop').serialize();
    console.log(form);
   var route = "{{route('pr.pr_excel',['change1','change2'])}}";
    // route =route.replace("change1", $('#po_id').val());
    route =route.replace("change1", $('#pr_id').val());
    route =route.replace("change2", form);
   window.location.href = route;

  };



</script>