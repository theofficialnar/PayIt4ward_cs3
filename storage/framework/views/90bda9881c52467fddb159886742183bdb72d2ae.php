<?php $__env->startSection('title'); ?>
	Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_section'); ?>
	<div class="banner">
	</div>
	<div class="main_fill">
		<div class="col-lg-6">
		Company news
		</div>
		<div class="col-lg-6">
		Some other shit
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>