$(document).ready(function(){
});

//Opens an Ajax-powered modal that dynamically displays the user's data
$('#userPanel').iziModal({
	title: 'View User Data',
	subtitle: 'View and update each employee\'s records in the database',
	icon: 'glyphicon glyphicon-user',
	padding: '15',
	fullscreen: true
});

$('#usersViewBody').on('click', '.openUserPanel', function(event){
	event.preventDefault();
	$('#userPanel').iziModal('open');
	var tab = event.target.hash;
	$('li > a[href="' + tab + '"]').tab("show");
	var uid = $(this).data('uid');
	var token = $('#token').val();
	$.ajax({
		type: 'POST',
		url: 'admin_panel/user/'+uid,
		data: {
			_token: token
		},
		success: function(data,status){
			$('.tab-content').html(data)
		},
		error: function(){
			alert('Error connecting to database!')
		}
	})
});

//Saves any changes made on the user via Ajax
$('.tab-content').on('click', '#saveUserEdit', function(event){
	var token = $('#token').val();
	var uid = $('#userEditId').val();
	var name = $('#edit_usr').val();
	var emp_num = $('#edit_emp').val();
	var dept = $('#edit_dept').val();
	var pos = $('#edit_pos').val();
	var sal = $('#edit_sal').val();
	var hired = $('#edit_hired').val();
	var add = $('#edit_add').val();
	var bday = $('#edit_bday').val();
	var mar_stat = $('input[name=mar_stat]:checked', '#userUpdate').val();
	var stat = $('input[name=stat]:checked', '#userUpdate').val();
	var bank = $('#edit_bank').val();
	var hrs_day = $('#edit_hrs_day').val();
	var days_week = $('#edit_days_week').val();
	var dependents = $('#edit_dependents').val();
	// alert(token);

	$.ajax({
		type: 'POST',
		url: 'admin_panel/user/update/'+uid,
		data: {
			_token : token,
			name : name,
			emp_num : emp_num,
			dept : dept,
			pos : pos,
			sal : sal,
			hired : hired,
			add : add,
			bday : bday,
			mar_stat : mar_stat,
			stat : stat,
			bank : bank,
			hrs_day : hrs_day,
			days_week : days_week,
			dependents : dependents
		},
		success: function(data, status){
			$('#usersViewBody').html(data);
			alert('User '+name+'\'s has been successfully updated!');
		},
		error: function(error){
			alert('An error was encountered during the database update!');
		}
	});

	$('.iziModal-button-close').trigger('click');
});

//Saves any changes made on the user's acct info via Ajax
$('.tab-content').on('click', '#saveUserAcctEdit', function(event){
	var token = $('#token').val();
	var uid = $('#userEditId').val();
	var email = $('#edit_email').val();
	var pw = $('#edit_pw').val();
	// alert(uid);

	$.ajax({
		type: 'POST',
		url: '/admin_panel/user/updateacct/'+uid,
		data: {
			_token : token,
			email : email,
			password : pw
		},
		success: function(data, status){
			alert('User '+name+'\'s account information has been successfully updated!');
		},
		error: function(){
			alert('An error was encountered during the database update!');
		}
	});

	$('.iziModal-button-close').trigger('click');
})
	

//Opens the update payroll modal
$("#payrollModal").iziModal({
	title: 'Update Payroll',
	subtitle: 'Update this employee\'s payroll for the current cut-off',
	icon: 'glyphicon glyphicon-piggy-bank',
	padding: '15'
});
$('#usersViewBody').on('click', '.payrollModalTrigger', function (event) {
	event.preventDefault();
	$('#payrollModal').iziModal('open');
	var uid = $(this).data('uid');
	var token = $('#token').val();
	// alert(token);
	$.ajax({
		type: 'POST',
		url: '/admin_panel/user/payroll/'+uid,
		data: {
			_token : token
		},
		success: function(data, status){
			$('#payrollForm').html(data);
		},
		error: function(){
			alert('An error was encountered during the database update!');
		}
	})
});

//contrib tester ajax
$('#valTest').click(function(){
	var token = $('#token').val();
	// var val = $('#contribTestVal').val();
	var sal = $('#userSal').val();
	// alert(sal);
	$.ajax({
		type: 'POST',
		url: '/admin/contribCheck',
		data: {
			_token : token,
			// val : val
			sal : sal
		},
		success: function(data){
			alert(data);
		},
		error: function(){
			alert('An error was encountered during the database update!');
			// $('#payrollForm').html(data);
		}
	})
})