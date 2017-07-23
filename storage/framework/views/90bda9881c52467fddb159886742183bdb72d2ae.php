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
	<button class="trigger"></button>
	<div id="izimodal">
		test
	</div>
	<button class="trigger2">t2</button>
	<div id="trigger2">
		Trigger 2
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>