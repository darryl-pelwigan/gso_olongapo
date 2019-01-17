<script type="text/javascript">
$.fn.addItemGroup = function()
{
	$('form').trigger("reset");
	$('#addItemGroup_modal').modal('show');
	$('#item_group_header').text('Add Item Group');
}
$.fn.moreItemGroup = function()
{
	var count = $(".more_group > .form-group").length + 1;
	var html = '<div class="form-group group_'+count+'">\
            <label for="employee_name" class="col-sm-3 control-label">Group : </label>\
            <div class="col-sm-8">\
                  <input type="text" name="group[]" class="form-control" />\
                  <input type="hidden" name="group_id[]" class="form-control"/>\
            </div>\
            <div class="col-md-1">\
                <button type="button" class="btn btn-warning btn-xs" onclick="$(this).removeItemGroup('+count+');" data-backdrop="static" data-keyboard="false"><i class="fa fa-minus"></i></button>\
            </div>\
          </div>';

    $(html).appendTo('.more_group');
}
$.fn.removeItemGroup = function(count)
{
	$('.group_'+count).html('');
}

$.fn.submitItemGroup = function(){
	var datax = $('#itemGroupForm').serialize();
 	$.ajax({
        type: "POST",
        url: "{{route('bac.add-group-item')}}",
        data : datax,
        dataType: "json",
        error: function(){
          	console.log('error');
        },
        success: function(data){
          	var errors = '';
	        if(data['status']==0){
	           for(var key in data['errors']){
	               errors += data['errors'][key]+'<br />';
	            }
	          	$('#status').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(10000).fadeOut();
	        }else{
	          	$('#status').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> 	Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
          		$('#tbl_item_group').DataTable().ajax.reload();
	       	}
        }
 	});
};

$.fn.getALL = function(){
	$('#tbl_item_group').dataTable({
		processing: true,
        serverSide: true,
        ajax:{
	        "type": 'POST',
	        "url" : '{!! route('bac.item_dt') !!}',
	        data : {
	            "_token" : '{{csrf_token()}}',
	            dataTables : 'group_lists'
	        }
	    },
        columns: [
        	{data : 'id', name: 'id'},
        	{data : 'group', name: 'group'},
        	{
                data: null, name: '', searchable : false, orderable : false,
                render : function(data,type,row){
                  return '<button class="btn btn-info btn-xs" onclick="$(this).updateItemGoup('+data.id+');" >View</button><button class="btn btn-danger btn-xs" onclick="$(this).deleteItemGroup('+data.id+');" >Delete</button>';
                }
            },
        ]
	});

	$('#tbl_item_category').dataTable({
		processing: true,
        serverSide: true,
        ajax:{
	        "type": 'POST',
	        "url" : '{!! route('bac.item_dt') !!}',
	        data : {
	            "_token" : '{{csrf_token()}}',
	            dataTables : 'category_lists'
	        }
	    },
        columns: [
        	{data : 'category_id', name: 'category_id'},
        	{data : 'code', name: 'code'},
        	{data : 'category', name: 'category'},
        	{data : 'group', name: 'group'},
        	{
                data: null, name: '', searchable : false, orderable : false,
                render : function(data,type,row){
                  return '<button class="btn btn-info btn-xs" onclick="$(this).updateItemCategory('+data.category_id+');" >View</button><button class="btn btn-danger btn-xs" onclick="$(this).deleteItemGroup('+data.category_id+');" >Delete</button>';
                }
            },
        ]
	});

	$('#tbl_item').dataTable({
		processing: true,
        serverSide: true,
        ajax:{
	        "type": 'POST',
	        "url" : '{!! route('bac.item_dt') !!}',
	        data : {
	            "_token" : '{{csrf_token()}}',
	            dataTables : 'item_lists'
	        }
	    },
        columns: [
        	{data : 'item_id', name: 'item_id'},
        	{data : 'item'},
        	{data : 'unit'},
        	{data : 'category'},
        	{data : 'group'},
        	{
                data: null, name: '', searchable : false, orderable : false,
                render : function(data,type,row){
                  return '<button class="btn btn-info btn-xs" onclick="$(this).updateItem('+data.item_id+');" >View</button><button class="btn btn-danger btn-xs" onclick="$(this).deleteItem('+data.item_id+');" >Delete</button>';
                }
            },
        ]
	});

    var itemunit_options = [
                              { value: "bottle"},
                              { value: "box"},
                              { value: "can"},
                              { value: "gallons"},
                              { value: "gram"},
                              { value: "kilograms"},
                              { value: "liters"},
                              { value: "miligrams"},
                              { value: "milliliters"},
                              { value: "packs"},
                              { value: "pad"},
                              { value: "pieces"},
                              { value: "pound"},
                              { value: "reams"},
                              { value: "roll"},
                              { value: "set"},
                              { value: "units"}
                            ];
  $('#unit').autocomplete({
      lookup : itemunit_options,
      minChars:0,
      onSelect: function (suggestion) {
        $(this).val(suggestion.value);
      }
      }).focus(function() {
      $(this).autocomplete('search', $(this).val());
  });
}
$.fn.getALL();

$.fn.updateItemGoup = function(group_id){
	$('form').trigger("reset");
	$('#addItemGroup_modal').modal('show');
	$('#item_group_header').text('Update Item Group');
 	$.ajax({
        type: "POST",
        url: "{{route('bac.get-group')}}",
        data : {
            group_id : group_id,
            _token : '{{csrf_token()}}'
        },
        dataType: "json",
        error: function(){
          	console.log('error');
        },
        success: function(data){
           	$('#group').val(data.group);
           	$('#group_id').val(data.id);

        }
 	});
};

$.fn.deleteItemGroup = function(group_id){
	var x = confirm("Are you sure to delete this group?");
	if(x){
	 	$.ajax({
	        type: "POST",
	        url: "{{route('bac.delete-group')}}",
	        data : {
	            group_id : group_id,
	            _token : '{{csrf_token()}}'
	        },
	        dataType: "json",
	        error: function(){
	          	console.log('error');
	        },
	        success: function(data){
	           	$('#tbl_item_group').DataTable().ajax.reload();
	        }
	 	});
 	}
};

// ITEM CATEGORY JS

$.fn.addItemCategory = function()
{
	$('#addItemCategory_modal').modal('show');
	$('form').trigger("reset");
	$('#item_category_header').text('Add Item Category');
}

$.fn.submitItemCategory = function(){
	var datax = $('#itemCategoryForm').serialize();
 	$.ajax({
        type: "POST",
        url: "{{route('bac.add-category-item')}}",
        data : datax,
        dataType: "json",
        error: function(){
          	console.log('error');
        },
        success: function(data){
           	$('#addItemGroup_modal').modal('hide');  
          	var errors = '';
	        if(data['status']==0){
	           for(var key in data['errors']){
	               errors += data['errors'][key]+'<br />';
	            }
	          	$('#status_category').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(10000).fadeOut();
	        }else{
	          $('#status_category').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
	       	}
          	$('#tbl_item_category').DataTable().ajax.reload();
        }
 	});
};


$.fn.updateItemCategory = function(category_id){
	$('form').trigger("reset");
	$('#addItemCategory_modal').modal('show');
	$('#item_category_header').text('Update Item Category');
 	$.ajax({
        type: "POST",
        url: "{{route('bac.get-category')}}",
        data : {
            category_id : category_id,
            _token : '{{csrf_token()}}'
        },
        dataType: "json",
        error: function(){
          	console.log('error');
        },
        success: function(data){
           	$('#code').val(data.code);
           	$('#category').val(data.category);
           	$('#category_id').val(data.id);
           	$('#group_id option[value="'+data.group_id+'"]').prop('selected', 'selected');
        }
 	});
};

// ITEM 

$.fn.addItem = function()
{
	$('form').trigger("reset");
	$('#addItem_modal').modal('show');
	$('#item_header').text('Add Item');
}

$.fn.submitItem = function(){
	var datax = $('#additemForm').serialize();
 	$.ajax({
        type: "POST",
        url: "{{route('bac.add-item')}}",
        data : datax,
        dataType: "json",
        error: function(){
          	console.log('error');
        },
        success: function(data){
           	// $('#addItem_modal').modal('hide');  
          	var errors = '';
	        if(data['status']==0){
	           for(var key in data['errors']){
	               errors += data['errors'][key]+'<br />';
	            }
	          	$('#status_item').html('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Alert!</h4>'+errors+'</div>').fadeIn().delay(10000).fadeOut();
	        }else{
	          $('#status_item').html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-ban"></i> Success!</h4>'+errors+'</div>').fadeIn().delay(5000).fadeOut();
	       	}
          	$('#tbl_item').DataTable().ajax.reload();
        }
 	});
};

$.fn.updateItem = function(item_id){
	$('form').trigger("reset");
	$('#addItem_modal').modal('show');
	$('#item_header').text('Update Item Group');
 	$.ajax({
        type: "POST",
        url: "{{route('bac.get-item')}}",
        data : {
            item_id : item_id,
            _token : '{{csrf_token()}}'
        },
        dataType: "json",
        error: function(){
          	console.log('error');
        },
        success: function(data){
           	$('#item_id').val(data.id);
           	$('#item').val(data.item);
           	$('#unit').val(data.unit);
           	$('#category_id option[value="'+data.category_id+'"]').prop('selected', 'selected');
        }
 	});
};

$.fn.deleteItem = function(item_id){
	var x = confirm("Are you sure to delete this item?");
	if(x){
	 	$.ajax({
	        type: "POST",
	        url: "{{route('bac.delete-item')}}",
	        data : {
	            item_id : item_id,
	            _token : '{{csrf_token()}}'
	        },
	        dataType: "json",
	        error: function(){
	          	console.log('error');
	        },
	        success: function(data){
	           	$('#tbl_item').DataTable().ajax.reload();
	        }
	 	});
 	}
};
</script>