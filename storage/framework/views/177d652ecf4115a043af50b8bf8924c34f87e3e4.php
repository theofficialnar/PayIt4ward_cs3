<?php $__env->startSection('title'); ?>
	Admin Panel
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_section'); ?>
<!-- add users -->
	<div class="well">
		<div class="panel-group">
		  <div class="panel panel-default">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" href="#collapse1">Add New User</a>
		      </h4>
		    </div>
		    <div id="collapse1" class="panel-collapse collapse">
		      <div class="panel-body">
		      	<form method="post" action="admin_panel/add_user">
			      	<?php echo e(csrf_field()); ?>	
			      	<div class="form-group">
						<label for="usr">Name:</label>
					  	<input required type="text" class="form-control" id="usr" name="name" placeholder="Juan Tamad" pattern="[A-Za-z ]{5,}" title="Name can only contain letters and a minimum of 5 characters.">
					</div>
					<div class="form-group">
					  	<label for="email">Email:</label>
					  	<input required type="email" class="form-control" id="email" name="email" placeholder="juan_tamad@imba_gaming.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please input a valid email address.">
					</div>
					<div class="form-group">
					  	<label for="add">Date Hired:</label>
					  	<input required type="date" class="form-control date-picker" id="add" name="hired">
					</div>
					<div class="form-group">
					  	<label for="dept">Department:</label>
					  	<input required type="text" class="form-control" id="dept" name="dept" placeholder="Operations Department">
					</div>
					<div class="form-group">
					  	<label for="pos">Position:</label>
					  	<input required type="text" class="form-control" id="pos" name="post" placeholder="Caster">
					</div>
					<div class="form-group">
					  	<label for="sal">Salary:</label>
					  	<input required type="number" class="form-control" id="sal" name="sal" placeholder="25000" min="0" max="999999">
					</div>
					<div class="form-group">
					  	<label>Days per Week:</label>
					  	<label class="radio-inline">
					  	<input required type="radio" name="days_week" value="5">5 Days</label>
					  	<label class="radio-inline">
					  	<input required type="radio" name="days_week" value="6">6 Days</label>
					</div>
					<div class="form-group">
						<label>Status: &nbsp;</label>
					  	<label class="radio-inline">
					  	<input required type="radio" name="stat" value="0">Active</label>
					  	<label class="radio-inline">
					  	<input required type="radio" name="stat" value="1">On Leave</label>
					  	<label class="radio-inline">
					  	<input required type="radio" name="stat" value="2">Retired</label>
					  	<label class="radio-inline">
					  	<input required type="radio" name="stat" value="3">Terminated</label>
					</div>
					<div class="form-group">
					  	<label for="add">Address:</label>
					  	<input required type="text" class="form-control" id="add" name="add" placeholder="Metro Manila">
					</div>
					<div class="form-group">
					  	<label for="bday">Birthday:</label>
					  	<input required type="date" class="form-control date-picker" id="bday" name="bday">
					</div>
					<div class="form-group">
						<label>Marital Status: &nbsp;</label>
					  	<label class="radio-inline">
					  	<input required type="radio" name="mar_stat" value="0">Single</label>
					  	<label class="radio-inline">
					  	<input required type="radio" name="mar_stat" value="1">Married</label>
					</div>
					<div class="form-group">
					  	<label for="dependents">Number of Dependents:</label>
					  	<input required type="number" class="form-control" id="dependents" name="dependents" placeholder="5" min="0">
					</div>
					<div class="form-group">
					  	<label for="bank">Bank Account Number:</label>
					  	<input required type="number" class="form-control" id="bank" name="bank" placeholder="12345678" min="0" maxlength="8" minlength="8">
					</div>
		      </div>
		      <div class="panel-footer">
		      	<button type="submit">Submit</button>
		      	</form>
		      </div>
		    </div>
		  </div>
		</div>
	</div>

<!-- users list -->
<div class="well">
Users
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Department</th>
				<th>Position</th>
				<th>Status</th>
				<th>Actions</th>
				<th><input type="hidden" value="<?php echo e(csrf_token()); ?>" id="token"></th>
			</tr>
		</thead>
		<tbody id="usersViewBody">
		<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><a data-uid="<?php echo e($user->id); ?>" class="openUserPanel" href="#tabUserInfo"> <?php echo e($user->name); ?></a></td>
				<td><?php echo e($user->department); ?></td>
				<td><?php echo e($user->position); ?></td>
				<?php if($user->status == 0): ?>
					<td>Active</td>
				<?php elseif($user->status == 1): ?>
					<td>On leave</td>
				<?php elseif($user->status == 2): ?>
					<td>Retired</td>
				<?php else: ?>
					<td>Terminated</td>
				<?php endif; ?>
				<td><button class="btn btn-xs btn-default payrollModalTrigger" data-uid="<?php echo e($user->id); ?>">Update Payroll</button></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php echo e($users->links()); ?>

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
	<button id="payrollSubmit">Submit</button>
	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>