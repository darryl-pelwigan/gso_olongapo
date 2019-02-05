<script type="text/javascript">
$.fn.addPPMP = function()
{
	$('form').trigger("reset");
	$('#addItemGroup_modal').modal('show');
	$('#item_group_header').text('Add Item Group');
}

$.fn.addPPMPUpload = function(id){
	var datax = $('#form_upload').serialize();
 	$.ajax({
        type: "POST",
        url: "<?php echo e(route('bac.ppmp_upload_add')); ?>",
        data : datax,
        dataType: "json",
        error: function(){
          	console.log('error');
        },
        success: function(data){
          	var errors = '';
	        if(data['status']==0){
	          alert("Please reload and try again");
	        }else{
	          	location.reload();
	       	}
        }
 	});
};

$.fn.getALL = function(){
	$('#tbl_ppmp').dataTable({
		processing: true,
        serverSide: true,
        ajax:{
	        "type": 'POST',
	        "url" : '<?php echo route('bac.item_dt'); ?>',
	        data : {
	            "_token" : '<?php echo e(csrf_token()); ?>',
	            dataTables : 'ppmp_upload'
	        }
	    },
        columns: [
        	{data : 'subdept_id', name: 'subdept_id'},
        	{data : 'dept_desc', name: 'dept_desc'},
          {
            data: null, name: '', searchable : false, orderable : false,
            render : function(data,type,row){
              var img = '../ppmp/';
              return '<form action="<?php echo e(route('bac.ppmp_upload_add')); ?>" method="post" id="form_upload" enctype="multipart/form-data"><?php echo e(csrf_field()); ?>\
                      <div class="col-md-9">\
                        <input type="file" class="form-control" name="file" required=""/>\
                        <input type="text" class="form-control" name="filename" required="" placeholder="FILENAME"/>\
                        <input type="hidden" value="'+data.subdept_id+'" name="subdept_id"/>\
                      </div>\
                      <div class="col-md-3">\
                        <button class="btn btn-info btn-xs" name="submit" type="submit">Submit</button>\
                      </div>\
                  </form>';
            }
          },
          {
            data: null, name: '', searchable : false, orderable : false,
            render : function(data,type,row){
              var uploads = data.uploads;
              var lists = "";
              var c = 1;
              lists += '<ul class="list-group">';
              for (var i = 0; i < data.uploads.length; i++) {
                  lists += '<li class="list-group-item"><a target="_blank" href="../ppmp/'+data.uploads[i].file_upload+'">'+c+'. '+data.uploads[i].remarks+'</a><button class="btn btn-danger btn-xs pull-right" onclick="$(this).deletePPMPUpload('+data.uploads[i].id+');">Remove</button>\</li>';
                  c++;
              }
              lists += '</ul>';
              return lists;
            }
          }
        ]
	});
}
$.fn.getALL();


$.fn.deletePPMPUpload = function(id){
    var x = confirm("Are you sure to delete this file?");
    if(x){
      $.ajax({
            type: "POST",
            url: "<?php echo e(route('bac.ppmp-upload-delete')); ?>",
            data : {
              upload_id : id,
              _token : '<?php echo e(csrf_token()); ?>'
            },
            dataType: "json",
            success: function(data){
               location.reload();
            }
      });
    }
}
</script>