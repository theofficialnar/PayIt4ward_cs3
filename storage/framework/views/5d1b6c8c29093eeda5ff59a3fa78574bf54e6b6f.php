<?php $__env->startSection('title'); ?>
    View Payroll
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_section'); ?>
  <div class="well">
    <div class="form-group row">
		<div class="col-lg-4">
			<label for="sel1">Select Payroll to View:</label>
			<select id="payrollSelect" class="form-control">
				<?php if(is_object($payrolls)): ?>
					<?php $__currentLoopData = $payrolls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payroll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option><?php echo e($payroll->date_paid); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
					<option><?php echo e($payrolls->date_paid); ?></option>
				<?php endif; ?>
			</select>
			
		</div>
    </div>
	<div id="showPayroll"><h1>asdasdasdas</h1></div>
  </div>
  <button id="testsubmit">Submit</button>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>