
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Todo</title>
    <script src="<?php echo base_url(); ?>assets/js/fontawesome.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/materialize/css/materialize.min.css" >
   	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" >


    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>


</head>

<body style="color: black; background-color: white;">


<nav>
	<div class="nav-wrapper">
		<a href="#!" class="brand-logo">Todo App</a>
		<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		<ul class="right hide-on-med-and-down">
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo site_url('/'); ?>">Home <i class="fas fa-home"></i></a>
			</li>
			<?php if(isset($_SESSION['user'])){ ?>
				<li class="nav-item">
					<span style="color: white;" class="nav-link">Welcome <?php echo $_SESSION['user'].'('.$_SESSION['role'].')';  ?></span>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('users/profile/'.$_SESSION['user']); ?>">Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('users/logout'); ?>">logout</a>
				</li>
				<form class="form-inline mt-2 mt-md-0">
					<input id="search" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
				</form>
			<?php }else{?>
				<li class="nav-item">
					<span style="color: white;" class="nav-link">Welcome guest</span>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('home/login'); ?>">Log in</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('home/signup'); ?>">Sign up</a>
				</li>
			<?php } ?>
			<!--
			<li class="navbar-btn">
				<a class="nav-link" href="#contact">Contact</a>
			  </li>
-->

		</ul>
	</div>
</nav>

<ul class="sidenav" id="mobile-demo">

	<li class="nav-item active">
		<a class="nav-link" href="<?php echo site_url('/'); ?>">Home <i class="fas fa-home"></i></a>
	</li>
	<?php if(isset($_SESSION['user'])){ ?>
		<li class="nav-item">
			<span style="color: white;" class="nav-link">Welcome <?php echo $_SESSION['user'].'('.$_SESSION['role'].')';  ?></span>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo site_url('users/profile/'.$_SESSION['user']); ?>">Profile</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo site_url('users/logout'); ?>">logout</a>
		</li>
		<form class="form-inline mt-2 mt-md-0">
			<input id="search" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
		</form>
	<?php }else{?>
		<li class="nav-item">
			<span style="color: white;" class="nav-link">Welcome guest</span>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo site_url('home/login'); ?>">Log in</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo site_url('home/signup'); ?>">Sign up</a>
		</li>
	<?php } ?>
	<!--
	<li class="navbar-btn">
		<a class="nav-link" href="#contact">Contact</a>
	  </li>
-->

</ul>

<div style = "position: sticky " class="parallax-container">
	<div class="parallax"><img src="<?php echo base_url(); ?>assets/uploads/parrimg1.png"></div>
</div>
<div class="section white">
	<div class="row container">
		<h2 class="header">Parallax</h2>
		<p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>

