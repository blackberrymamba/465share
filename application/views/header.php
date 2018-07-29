<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>465Share - File Sharing Service</title>
	<meta name="description" content="465Share - File Sharing Service">
	<meta name="keywords" content="465Share, file, files, sharing, service">
	<link rel="stylesheet" href="<?php echo base_url('assets/spectre/dist/spectre.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/spectre/dist/spectre-exp.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/spectre/dist/spectre-icons.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>

<body>
	<header class="navbar">
		<section class="navbar-section">
			<a href="<?php echo base_url(); ?>" class="navbar-brand mr-2">465Share</a>
		</section>
		<section class="navbar-center">
			<!-- centered logo or brand -->
		</section>
		<section class="navbar-section">
			<?php echo ($this->ion_auth->is_admin() ? anchor('auth/index', 'Users', array('class' =>'btn btn-link')) : null);?>
			<?php echo ($this->ion_auth->logged_in() ? anchor('auth/logout', 'Logout', array('class' =>'btn btn-link')) : null);?>
		</section>
	</header>
	<!-- .navbar -->