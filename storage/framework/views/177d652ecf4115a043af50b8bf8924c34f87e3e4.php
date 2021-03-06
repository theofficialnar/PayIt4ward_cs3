<?php $__env->startSection('title'); ?>
	Payit4ward | Admin Panel
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_section'); ?>
<div class="topPadding">
<!-- add users -->
	<div class="well">
		<div class="panel-group">
		  <div class="panel panel-default">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" href="#collapse1"><h2 class="text-center cfont"><b>Add New User</b></h2></a>
		      </h4>
		    </div>
		    <div id="collapse1" class="panel-collapse collapse">
		      <div class="panel-body">
		      	<form method="post" action="admin_panel/add_user">
			      	<?php echo e(csrf_field()); ?>

			      	<div class="row">	
				      	<div class="form-group col-lg-6">
							<label for="usr">Name:</label>
						  	<input required type="text" class="form-control" id="usr" name="name" placeholder="Juan Tamad" pattern="[A-Za-z ]{5,}" title="Name can only contain letters and a minimum of 5 characters.">
						</div>
						<div class="form-group col-lg-6">
						  	<label for="email">Email:</label>
						  	<input required type="email" class="form-control" id="email" name="email" placeholder="juan_tamad@imba_gaming.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please input a valid email address.">
						</div>
						<div class="form-group col-lg-4">
						  	<label for="add">Date Hired:</label>
						  	<input required type="date" class="form-control date-picker" id="add" name="hired">
						</div>
						<div class="form-group col-lg-4">
						  	<label for="dept">Department:</label>
						  	<input required type="text" class="form-control" id="dept" name="dept" placeholder="Operations Department">
						</div>
						<div class="form-group col-lg-4">
						  	<label for="pos">Position:</label>
						  	<input required type="text" class="form-control" id="pos" name="post" placeholder="Caster">
						</div>
						<div class="form-group col-lg-4">
						  	<label for="sal">Salary:</label>
						  	<input required type="number" class="form-control" id="sal" name="sal" placeholder="25000" min="0" max="999999">
						</div>
						<div class="form-group col-lg-4">
						  	<label for="bank">Bank Account Number:</label>
						  	<input required type="number" class="form-control" id="bank" name="bank" placeholder="12345678" min="0" maxlength="8" minlength="8">
						</div>
						<div class="form-group col-lg-4">
						  	<label for="dependents">Number of Dependents:</label>
						  	<input required type="number" class="form-control" id="dependents" name="dependents" placeholder="5" min="0">
						</div>
						<div class="form-group col-lg-4">
						  	<label>Days per Week:</label><br>
						  	<label class="radio-inline">
						  	<input required type="radio" name="days_week" value="5">5 Days</label>
						  	<label class="radio-inline">
						  	<input required type="radio" name="days_week" value="6">6 Days</label>
						</div>
						<div class="form-group col-lg-4">
							<label>Status: &nbsp;</label><br>
						  	<label class="radio-inline">
						  	<input required type="radio" name="stat" value="0">Active</label>
						  	<label class="radio-inline">
						  	<input required type="radio" name="stat" value="1">On Leave</label>
						</div>
						<div class="form-group col-lg-4">
							<label>Marital Status: &nbsp;</label><br>
						  	<label class="radio-inline">
						  	<input required type="radio" name="mar_stat" value="0">Single</label>
						  	<label class="radio-inline">
						  	<input required type="radio" name="mar_stat" value="1">Married</label>
						</div>
						<div class="form-group col-lg-4">
						  	<label for="bday">Birthday:</label>
						  	<input required type="date" class="form-control date-picker" id="bday" name="bday">
						</div>
						<div class="form-group col-lg-8">
						  	<label for="add">Address:</label>
						  	<input required type="text" class="form-control" id="add" name="add" placeholder="Metro Manila">
						</div>
					</div>
		      </div>
		      <div class="panel-footer text-center">
		      	<button type="submit" class="btn btn-success" style="width: 25%"><span class="glyphicon glyphicon-floppy-save"></span> <b>Save</b></button>
		      	</form>
		      </div>
		    </div>
		  </div>
		</div>
	</div>

<!-- users list -->
	<div class="well">
		<h2 class="text-center cfont"><b>USERS</b></h2>
		<hr>
		<div class="row">
			<div id="usrFilter" class="collapse col-lg-4 col-lg-offset-4">
				<form action="/admin_panel" method="get">
					<div class="form-group">
						<label for="userFilter">Filter by employee status:</label>
						<select id="userFilter" onchange="this.form.submit()" name="selected" class="form-control">
							<option <?php if($selected == 0): ?> selected <?php endif; ?> value="0">All</option>
							<option <?php if($selected == 1): ?> selected <?php endif; ?> value="1">Active / On Leave</option>
							<option <?php if($selected == 2): ?> selected <?php endif; ?> value="2">Retired / Terminated</option>
						</select>
					</div>
				</form>
			</div>
		</div>
		<?php echo $__env->make('../includes/users_list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<!-- modal displaying individual user info and edit option -->
<div id="userPanel">
	  	<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#tabUserInfo">User Info</a></li>
		  <li><a data-toggle="tab" href="#tabUserUpdate">Update Account Info</a></li>
		  <li><a data-toggle="tab" href="#tabUserUpdatePw">Update Password</a></li>
		</ul>
		<div id="userPanelDetails"></div>
</div>

<!-- modal displaying the payroll form -->
<div id="payrollModal">
	<div id="payrollFormContent"></div>
	<div class="text-center">
		<button id="payrollSubmit" class="btn btn-primary"><span class="glyphicon glyphicon-tasks"></span> <b>Calculate</b></button>
	</div>
	
	
</div>


<div id="errUserPanel"></div>


<div id="succUpdateUser"></div>


<div id="succUpdatePayroll"></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>