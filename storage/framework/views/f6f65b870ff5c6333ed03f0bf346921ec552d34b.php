<?php $__env->startSection('title'); ?>
	Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_section'); ?>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
			<img src="<?php echo e(URL('assets/images/office1.jpeg')); ?>" alt="office1">
				<div class="carousel-caption">
					<h3>Meeting Room</h3>
					<p>Ideas have to spring out from somewhere!</p>
				</div>
			</div>

			<div class="item">
			<img src="<?php echo e(URL('assets/images/office2.jpeg')); ?>" alt="office2">
				<div class="carousel-caption">
					<h3>Design Team's Department</h3>
					<p>Wonderful surroundings = wonderful designs!</p>
				</div>
			</div>

			<div class="item">
			<img src="<?php echo e(URL('assets/images/office3.jpeg')); ?>" alt="office3">
				<div class="carousel-caption">
					<h3>Lounge Area</h3>
					<p>All work and no play is a bad day!</p>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div>
		<div class="col-lg-7">
			<div class="well">
				<h1 class="text-center">Company News</h1>
				<hr>
				<img src="<?php echo e(URL('assets/images/news-photo.jpeg')); ?>" alt="cafe" class="img-responsive hcenter">
				<h3 class="text-center">The Lounge will be serving your favourite cuppa soon!</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita repellendus magni rerum inventore officiis id laborum culpa provident temporibus, maiores facilis autem, in saepe explicabo, consectetur necessitatibus dolorum, aliquam perspiciatis.</p>
				<a href="#">Read more</a>
				<hr>
				<div class="row">
					<div class="col-lg-7">
						<img src="<?php echo e(URL('assets/images/news-photo2.jpeg')); ?>" alt="desk" class="img-responsive hcenter">
					</div>
					<div class="col-lg-5 full-height text-center">
						<h1>What does your desk say about you?</h1>
					</div>
					<div class="col-lg-12">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit corrupti reprehenderit quas, perferendis delectus fugit ratione labore velit? Placeat reprehenderit officiis, saepe ipsum et hic, pariatur omnis eligendi debitis alias.</p>
						<a href="#">Read more</a>
					</div>
				</div>
			</div>
			
		</div>

		<div class="col-lg-5">
			<div class="well col-lg-12">
				<h1 class="text-center">Employee of the Month</h1>
				<hr>
				<img src="<?php echo e(URL('assets/images/emp.jpg')); ?>" alt="emp" class="img-responsive emp_month text-center hcenter">
				<h3 class="text-center">John Wilder</h3>
				<p class="text-center">Lead Designer</p>
			</div>
			<div class="well col-lg-12 text-center">
				<h1>Weather Forecast</h1>
				<hr>
				<div style="margin: 0 auto; width: 60%; min-width: 150px; position: relative; "><script type="text/javascript" src="https://weatherfor.us/static/js/minion/minion.js"></script><script type="text/javascript">w4uminion.run({"location":"alabang","txt_color":"#000000","unit":"metric"});</script></div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>