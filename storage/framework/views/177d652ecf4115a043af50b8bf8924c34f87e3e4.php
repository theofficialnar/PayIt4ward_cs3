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
					  	<input type="text" class="form-control" id="usr" name="name">
					</div>
					<div class="form-group">
					  	<label for="email">Email:</label>
					  	<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
					  	<label for="emp">Employee Number:</label>
					  	<input type="number" class="form-control" id="emp" name="emp">
					</div>
					<div class="form-group">
					  	<label for="add">Date Hired:</label>
					  	<input type="date" class="form-control date-picker" id="add" name="hired">
					</div>
					<div class="form-group">
					  	<label for="dept">Department:</label>
					  	<input type="text" class="form-control" id="dept" name="dept">
					</div>
					<div class="form-group">
					  	<label for="pos">Position:</label>
					  	<input type="text" class="form-control" id="pos" name="post">
					</div>
					<div class="form-group">
						<label>Status: &nbsp;</label>
					  	<label class="radio-inline">
					  	<input type="radio" name="stat" value="0">Active</label>
					  	<label class="radio-inline">
					  	<input type="radio" name="stat" value="1">On Leave</label>
					  	<label class="radio-inline">
					  	<input type="radio" name="stat" value="2">Retired</label>
					  	<label class="radio-inline">
					  	<input type="radio" name="stat" value="3">Terminated</label>
					</div>
					<div class="form-group">
					  	<label for="add">Address:</label>
					  	<input type="text" class="form-control" id="add" name="add">
					</div>
					<div class="form-group">
					  	<label for="bday">Birthday:</label>
					  	<input type="date" class="form-control date-picker" id="bday" name="bday">
					</div>
					<div class="form-group">
						<label>Marital Status: &nbsp;</label>
					  	<label class="radio-inline">
					  	<input type="radio" name="mar_stat" value="0">Single</label>
					  	<label class="radio-inline">
					  	<input type="radio" name="mar_stat" value="1">Married</label>
					</div>
					<div class="form-group">
					  	<label for="bank">Bank Account Number:</label>
					  	<input type="text" class="form-control" id="bank" name="bank">
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
				<td><a data-toggle="modal" data-target="#userPanel" data-uid="<?php echo e($user->id); ?>" class="openUserPanel"> <?php echo e($user->name); ?></a></td>
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
				<td><button class="btn btn-xs btn-default">Update Payroll</button></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</div>

<div id="userPanel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
	    <div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal" id="closeUserEdit">&times;</button>
	   		<h4 class="modal-title" id="userModalHead">User Info</h4>
	  	</div>
	  	<div class="modal-body">
	  	</div>
	  	<div class="modal-footer">
	  		<button id="triggerUserEdit">Edit</button>
	  		<button id="saveUserEdit" data-dismiss="modal">Save</button>
	  	</div>
    </div>

  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>