 $(document).ready(function(){
 	$('#btnAdd').click(function(){
 		$('#btnControl').html('Add New');
 		$('.modal-title').html('Add new category')
 		$("input[name='name']").val('');
 		$("input[name='desc']").val('');
 		$('form').attr('action','/cate');
 	});
 	$('.btnEdit').click(function(){
 		$('#btnControl').html('Update');
 		var cateId = $(this).parent().parent().children().first().text();
 		$.get('/cate/'+cateId+'/edit',function(data, status){
 			$("input[name='name']").val(data.name);
 			$("input[name='desc']").val(data.desc);
 			$('.modal-title').html('Update category with ID: '+data.id);
 		});
 		$('form').attr('action','/cate/'+cateId);
 	});
 	$('.btnDelete').click(function(){
 		var cateId = $(this).parent().parent().children().first().text();
 		var confirmDel = window.confirm('Are you sure to delete this category with ID '+cateId);
 		if(confirmDel){
 			$.get('/cate/'+cateId, function(data, status){
 				if(data==1){
 					window.location='/cate';
 				}
 				else
 				{
 					alert('Error !');
 				}
 			});
 		}
 	});
 	$('#message').fadeOut(7000);
 });