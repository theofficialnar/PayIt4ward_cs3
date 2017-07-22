$(document).ready(function(){
	// $('.date-picker').datetimepicker({
	// 	dateFormat: 'YYYY-MM-DD'
	// });
});

//Opens a modal that dynamically displays the user's data
$('.openUserPanel').click(function(){
	$('#userModalHead').html('User Info');
	$('#saveUserEdit').hide();
	$('#triggerUserEdit').show();
	var uid = $(this).data('uid');
	var token = $('#token').val();
	// $('.modal-title').html($(this).data('uid'));
	$.ajax({
		type: 'POST',
		url: 'admin_panel/user/'+uid,
		data: {
			_token: token
		},
		success: function(data,status){
			$('.modal-body').html(data)
		},
		error: function(){
			alert('Error connecting to database!')
		}
	})
});

//Changes the modal's view from displaying user info the edit mode
$('#triggerUserEdit').click(function(){
	$('#userEdit').css('display', 'block');
	$('#userInfo').css('display', 'none');
	$(this).hide();
	$('#userModalHead').html('Update User Info');
	$('#saveUserEdit').show();
	// alert('Triggered!');
});