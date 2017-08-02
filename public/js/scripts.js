$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

//Opens an Ajax-powered modal that dynamically displays the user's data
if ($('#userPanel').length) {
	$('#userPanel').iziModal({
		title: 'View User Data',
		subtitle: 'View and update each employee\'s records in the database',
		icon: 'glyphicon glyphicon-user',
		padding: '15',
		fullscreen: true
	});
}
$('#usersViewBody').on('click', '.openUserPanel', function (event) {
	event.preventDefault();
	$('#userPanel').iziModal('open');
	var tab = event.target.hash;
	$('li > a[href="' + tab + '"]').tab("show");
	var uid = $(this).data('uid');
	var token = $('#token').val();
	$.ajax({
		type: 'POST',
		url: 'admin_panel/user/' + uid,
		data: {
			_token: token
		},
		success: function (data, status) {
			$('#userPanelDetails').html(data);
		},
		error: function () {
			alert('Error connecting to database!');
		}
	});
});

//Saves any changes made on the user via Ajax
$('#userPanelDetails').on('click', '#saveUserEdit', function (event) {
	var token = $('#token').val();
	var uid = $('#userEditId').val();
	var name = $('#edit_usr').val();
	var dept = $('#edit_dept').val();
	var pos = $('#edit_pos').val();
	var sal = $('#edit_sal').val();
	var hired = $('#edit_hired').val();
	var add = $('#edit_add').val();
	var bday = $('#edit_bday').val();
	var mar_stat = $('input[name=mar_stat]:checked', '#userUpdate').val();
	var stat = $('input[name=stat]:checked', '#userUpdate').val();
	var bank = $('#edit_bank').val();
	var days_week = $('input[name=days_week]:checked', '#userUpdate').val();
	var dependents = $('#edit_dependents').val();
	// alert(token);

	$.ajax({
		type: 'POST',
		url: 'admin_panel/user/update/' + uid,
		data: {
			_token: token,
			name: name,
			dept: dept,
			pos: pos,
			sal: sal,
			hired: hired,
			add: add,
			bday: bday,
			mar_stat: mar_stat,
			stat: stat,
			bank: bank,
			days_week: days_week,
			dependents: dependents
		},
		success: function (data, status) {
			alert('User ' + name + '\'s has been successfully updated!');
			setTimeout(function () {
					window.location.reload();
				},
				0
			);
		},
		error: function (error) {
			alert('An error was encountered during the database update!');
		}
	});

	$('.iziModal-button-close').trigger('click');
});

//Saves any changes made on the user's acct info via Ajax
$('#userPanelDetails').on('click', '#saveUserAcctEdit', function (event) {
	var token = $('#token').val();
	var uid = $('#userEditId').val();
	var email = $('#edit_email').val();
	var pw = $('#edit_pw').val();
	// alert(uid);

	$.ajax({
		type: 'POST',
		url: '/admin_panel/user/updateacct/' + uid,
		data: {
			_token: token,
			email: email,
			password: pw
		},
		success: function (data, status) {
			alert('User ' + name + '\'s account information has been successfully updated!');
		},
		error: function () {
			alert('An error was encountered during the database update!');
		}
	});

	$('.iziModal-button-close').trigger('click');
});

//Opens the update payroll modal
if ($('#payrollModal').length) {
	$("#payrollModal").iziModal({
		title: 'Update Payroll',
		subtitle: 'Update this employee\'s payroll for the current cut-off',
		icon: 'glyphicon glyphicon-piggy-bank',
		padding: '15',
		openFullscreen: true
	});
}
$('#usersViewBody').on('click', '.payrollModalTrigger', function (event) {
	if(!$(this).hasClass('disabled')){
		$('#payrollSubmit').show();
		event.preventDefault();
		$('#payrollModal').iziModal('open');
		var uid = $(this).data('uid');
		var token = $('#token').val();
		// alert(token);
		$.ajax({
			type: 'POST',
			url: '/admin_panel/user/payroll/' + uid,
			data: {
				_token: token
			},
			success: function (data, status) {
				$('#payrollFormContent').html(data);
			},
			error: function () {
				alert('An error was encountered during the database update!');
			}
		});
	}
});

//contrib tester ajax
$('#valTest').click(function () {
	var token = $('#token').val();
	// var val = $('#contribTestVal').val();
	var sal = $('#payrollSal').val();
	// alert(sal);
	$.ajax({
		type: 'POST',
		url: '/admin/contribCheck',
		data: {
			_token: token,
			// val : val
			sal: sal
		},
		success: function (data) {
			alert(data);
		},
		error: function () {
			alert('An error was encountered during the database update!');
			// $('#payrollForm').html(data);
		}
	});
});

//submits payroll data to controller via ajax for processing and will return with a preview of the values prior to saving
$('#payrollSubmit').click(function () {
	var errorFlag = 0;
	var token = $('#token').val();
	var uid = $('#payrollUid').val();
	var absences = ($('#hrs_absent').val()) * 8; //multiplied by 8hrs
	var lates = $('#hrs_late').val();
	var rd = $('#hrs_rd').val();
	var s_hol = $('#hrs_spec_holiday').val();
	var s_hol_rd = $('#hrs_spec_holiday_rd').val();
	var r_hol = $('#hrs_reg_holiday').val();
	var r_hol_rd = $('#hrs_reg_holiday_rd').val();
	var ot_ord = $('#hrs_ot_ord').val();
	var ot_rd = $('#hrs_ot_rd').val();
	var ot_s_hol = $('#hrs_ot_spec_holiday').val();
	var ot_s_hol_rd = $('#hrs_ot_spec_holiday_rd').val();
	var ot_r_hol = $('#hrs_ot_reg_holiday').val();
	var ot_r_hol_rd = $('#hrs_ot_reg_holiday_rd').val();
	var nd_ord = $('#hrs_nd').val();
	var nd_rd = $('#hrs_rd_nd').val();
	var nd_s_hol = $('#hrs_spec_holiday_nd').val();
	var nd_s_hol_rd = $('#hrs_spec_holiday_rd_nd').val();
	var nd_r_hol = $('#hrs_reg_holiday_nd').val();
	var nd_r_hol_rd = $('#hrs_reg_holiday_rd_nd').val();

	//validates the overtime hours being input. Will block hours if less than 8 hours are logged on corresponding holiday
	if (rd < 8 && ot_rd != 0) {
		alert('You can\'t input a Rest Day Overtime with less than 8 hours of time in.');
		errorFlag = 1;
	}

	if (s_hol < 8 && ot_s_hol != 0) {
		alert('You can\'t input a Special Holiday Overtime with less than 8 hours of time in.');
		errorFlag = 1;
	}

	if (s_hol_rd < 8 && ot_s_hol_rd != 0) {
		alert('You can\'t input a Special Holiday and Rest Day Overtime with less than 8 hours of time in..');
		errorFlag = 1;
	}

	if (r_hol < 8 && ot_r_hol != 0) {
		alert('You can\'t input a Regular Holiday Overtime with less than 8 hours of time in.');
		errorFlag = 1;
	}

	if (r_hol_rd < 8 && ot_r_hol_rd != 0) {
		alert('You can\'t input a Regular Holiday and Rest Day Overtime with less than 8 hours of time in.');
		errorFlag = 1;
	}

	//if no errors are found, will proceed on sending the data via ajax
	if (errorFlag == 0) {
		$.ajax({
			type: 'POST',
			url: '/admin_panel/payroll_update',
			data: {
				_token: token,
				uid: uid,
				hrs_absent: absences,
				hrs_late: lates,
				hrs_rd: rd,
				hrs_shol: s_hol,
				hrs_shol_rd: s_hol_rd,
				hrs_hol: r_hol,
				hrs_hol_rd: r_hol_rd,
				hrs_ot_ord: ot_ord,
				hrs_ot_rd: ot_rd,
				hrs_ot_shol: ot_s_hol,
				hrs_ot_shol_rd: ot_s_hol_rd,
				hrs_ot_rhol: ot_r_hol,
				hrs_ot_rhol_rd: ot_r_hol_rd,
				hrs_nd_ord: nd_ord,
				hrs_nd_rd: nd_rd,
				hrs_nd_shol: nd_s_hol,
				hrs_nd_shol_rd: nd_s_hol_rd,
				hrs_nd_rhol: nd_r_hol,
				hrs_nd_rhol_rd: nd_r_hol_rd
			},
			success: function (data) {
				$('#payrollFormContent').html(data);
			}
		});
		$(this).hide();
	}
});

//saves all the data indicated in the preview to the payroll db
$('#payrollFormContent').on('click', '#savePayroll', function () {
	var token = $('#token').val();
	var absences = $('#ded_absences').html();
	var lates = $('#ded_lates').html();
	var philhealth = $('#ded_philhealth').html();
	var sss = $('#ded_sss').html();
	var pagibig = $('#ded_pagibig').html();
	var tax = $('#ded_tax').html();
	var overtime = $('#bon_overtime').html();
	var holiday = $('#bon_holiday').html();
	var night_diff = $('#bon_night_diff').html();
	var salary = $('#month_salary').html();
	var id = $('#payID').val();

	$.ajax({
		type: 'POST',
		url: '/admin_panel/save_payroll/' + id,
		data: {
			_token: token,
			absences: absences,
			lates: lates,
			philhealth: philhealth,
			sss: sss,
			pagibig: pagibig,
			tax: tax,
			overtime: overtime,
			holiday: holiday,
			night_diff: night_diff,
			salary: salary
		},
		success: function () {
			alert('Posted');
			setTimeout(function () {
					window.location.reload();
				},
				0
			);
		}
	});
});

//displays the selected payroll
$('#testsubmit').click(function () {
	var payroll = $('#payrollSelect').find(':selected').val();
	var token = $('#token').val();
	// alert(payroll);

	$.ajax({
		type: 'POST',
		url: '/payroll/view',
		data: {
			_token: token,
			payroll: payroll
		},
		success: function (data) {
			$('#showPayroll').html(data);
		},
		error: function () {
			alert('An error was encountered while pulling up the record.');
		}
	});
});

//trigger message modal to pop up and pull up any new messages
if($('#messageModal').length){
	$('#messageModal').iziModal({
	padding: '15px'
	});
}
$('.navbar').on('click', '#messageModalTrigger', function (event) {
	event.preventDefault();
	$('#messageModal').iziModal('open');
	var token = $('#msg_token').val();
	$.ajax({
		type: 'POST',
		url: 'user/messages',
		data: {
			_token: token,
		},
		success: function(data){
			$('#inboxArea').html(data);
		}
	});
});

//uploads ticket to db
$('#messageModal').on('click', '#sendTicket', function(){
	var subject = $('#subject').val();
	var message = $('#message').val();
	var token = $('#msg_token').val();
	$.ajax({
		type: 'POST',
		url: '/user/ticket',
		data: {
			_token: token,
			subject: subject,
			message: message
		},
		success: function(data){
			alert('Ticket sent to Admin');
			$('.iziModal-button-close').trigger('click');
		}
	});
	$('#subject').val('');
	$('#message').val('');
});

//displays message from inbox
$('#inboxArea').on('click', '.readMessage', function(){
	var tix_id = $(this).data('id');
	var tix_sub = $(this).data('sub');
	var tix_date = $(this).data('date');

	$.ajax({
		type: 'GET',
		url: 'user/messages/'+tix_id+'/'+tix_sub+'/'+tix_date,
		success: function(data){
			$('#inboxArea').html(data);
			$('#msgScroll').animate({ scrollTop: $('#msgScroll')[0].scrollHeight}, 500);
		}
	});
	
});

//sends user back to the inbox after opening a message
$('#inboxArea').on('click', '#msgBack', function(){
	var token = $('#msg_token').val();
	$.ajax({
		type: 'POST',
		url: 'user/messages',
		data: {
			_token: token,
		},
		success: function(data){
			$('#inboxArea').html(data);
		}
	});
});

//sends a reply to the current message via ajax'
$('#inboxArea').on('click', '#msgSendReply', function(){
	var message = $('#msgReply').val();
	var token = $('#msg_token').val();
	var tix_id = $(this).data('tid');

	$.ajax({
		type: 'POST',
		url: 'user/messages/reply',
		data: {
			_token: token,
			message: message,
			ticket_id: tix_id
		},
		success: function(data){
			$('#msgBody').append(data);
		}
	});
	$('#msgReply').val('');
	$('#msgScroll').animate({ scrollTop: $('#msgScroll')[0].scrollHeight}, 500);
});

//deletes message
$('#inboxArea').on('click', '#msgDelete', function(){
	var tix_id = $(this).data('tid');

	$.ajax({
		type: 'GET',
		url: 'user/messages/delete/'+tix_id,
		success: function(){
			alert('Ticket #'+tix_id+' successfully deleted.');
			setTimeout(function () {
					window.location.reload();
				},
				0
			);
		}
	});

});

//activates navbar dropdown on hover
$('ul.nav li.dropdown').hover(function() {
  		$(this).find('.dropdown-menu').stop(true, true).fadeIn(300);
	}, function() {
  		$(this).find('.dropdown-menu').stop(true, true).fadeOut(300);
});

//login particle controller
$('.canvas').particles({
  maxParticles: 150,
  size: 5,
  speed: 1,
  color: '#212d40',
  minDist: 140,
  connectParticles: true
});