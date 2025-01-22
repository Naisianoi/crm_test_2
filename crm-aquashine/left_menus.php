<div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
<ul class="nav flex-column pl-1 left-menus">	
<li class="nav-item"><a class="nav-link" href="dashboard.php"><strong>Dashboard</strong></a></li>	
<?php if($_SESSION["usertype"] == 'General Manager') { ?>
	<li class="nav-item"><a class="nav-link" href="users.php"><strong>Users</strong></a></li>
<?php } ?>

<?php if($_SESSION["usertype"] == 'Marketing') { ?>

<?php } ?>

<?php if($_SESSION["usertype"] == 'Sales') { ?>

<?php } ?>
</ul>
</div>




