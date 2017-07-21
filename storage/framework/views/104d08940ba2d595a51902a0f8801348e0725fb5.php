<!DOCTYPE html>
<html>
<head>
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/styles.css')); ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php echo $__env->make('../includes/side_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<main class="container">
		<?php echo $__env->yieldContent('main_section'); ?>
	</main>
<?php echo $__env->make('../includes/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script type="text/javascript" src="<?php echo e(URL::asset('js/scripts.js')); ?>"></script>
</body>
</html>