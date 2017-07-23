<nav class="navbar navbar-inverse navbar-fixed-top" style="background: #364156; border: none">
  <div class="container">
    <ul class="nav navbar-nav">
      <li><a href="/home">Home</a></li>
      <li><a href="#">My Payroll</a></li>
      <li><a href="#">My Account</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Welcome, <?php echo e(Auth::user()->name); ?></span></a>
        <ul class="dropdown-menu">
            <li><a href="admin_panel">Admin Panel</a></li>
            <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<!-- message modal -->
