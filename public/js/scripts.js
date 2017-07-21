$(document).ready(function(){
	
});

//Opens a modal that dynamically displays the user's data
$('.openUserPanel').click(function(){
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
			alert('Error!')
		}
	})
});

//Changes the modal's view from displaying user info the edit mode
$('#triggerUserEdit').click(function(){
	$('#userEdit').css('display', 'block');
	$('#userInfo').css('display', 'none');
	// alert('Triggered!');
});