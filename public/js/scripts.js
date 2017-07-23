$(document).ready(function(){
	// $('.date-picker').datetimepicker({
	// 	dateFormat: 'YYYY-MM-DD'
	// });
});

//Opens an Ajax-powered modal that dynamically displays the user's data
$('#usersViewBody').on('click', '.openUserPanel', function(){
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

//Saves any changes made on the user via Ajax
$('#saveUserEdit').click(function(){
	$('#userEdit').css('display', 'none');
	$('#userInfo').css('display', 'block');
	var token = $('#token').val();
	var uid = $('#userEditId').val();
	var name = $('#edit_usr').val();
	var emp_num = $('#edit_emp').val();
	var dept = $('#edit_dept').val();
	var pos = $('#edit_pos').val();
	var hired = $('#edit_hired').val();
	var add = $('#edit_add').val();
	var bday = $('#edit_bday').val();
	var mar_stat = $('input[name=mar_stat]:checked', '#userUpdate').val();
	var stat = $('input[name=stat]:checked', '#userUpdate').val();
	var bank = $('#edit_bank').val();
	var email = $('#edit_email').val();
	var pw = $('#edit_pw').val();
	// alert(token);
	$.ajax({
		type: 'POST',
		url: 'admin/user/update/'+uid,
		data: {
			_token : token,
			name : name,
			emp_num : emp_num,
			dept : dept,
			pos : pos,
			hired : hired,
			add : add,
			bday : bday,
			mar_stat : mar_stat,
			stat : stat,
			bank : bank,
			email : email,
			pw : pw
		},
		success: function(data, status){
			$('#usersViewBody').html(data);
			alert('User '+name+'\'s has been successfully updated!');
		},
		error: function(){
			alert('An error was encountered during the database update!');
		}
	})
});
// $("#izimodal").iziModal();
// $(document).on('click', '.trigger', function (event) {
// 	event.preventDefault();
// 	$('#izimodal').iziModal('open');
// });

// $('#trigger2').iziModal({
// 		transitionIn: 'bounceInUp',
// 		transitionOut: 'bounceOutDown'
// 	});
// $(document).on('click', '.trigger2', function (event) {
// 	event.preventDefault();
// 	$('#trigger2').iziModal('open');
// 	$('#trigger2').iziModal('setBottom', 0);
// });

$("#payrollModal").iziModal({
	title: 'Update Payroll',
	subtitle: 'Update this employee\'s payroll for the current cut-off',
	icon: 'glyphicon glyphicon-piggy-bank',
	padding: '15'
});
$(document).on('click', '.payrollModalTrigger', function (event) {
	event.preventDefault();
	$('#payrollModal').iziModal('open');
});