<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>CodeIgniter Practice</title>

		<link rel="stylesheet" type="text/css" href="<?= base_url().'assets/css/bootstrap.min.css'?>">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

		<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
		<script src="<?= base_url().'assets/js/jquery.js'?>"></script>
	</head>
	
	<body style="background:#e9ecef;">


	<!-- Navbar -->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<!-- Brand/logo -->
		<a class="navbar-brand" href="<?= base_url(); ?>">
		CodeIgniter
		</a>
		<!-- Links -->
		<ul class="navbar-nav">


			<?php if(!$this->session->userdata('logged_in')): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url(); ?>users/login">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url(); ?>users/register">Register</a>
				</li>
			<?php endif ?>

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url(); ?>posts">Posts</a>
			</li>			
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url(); ?>categories">Categories</a>
			</li>

			<?php if($this->session->userdata('logged_in')): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url(); ?>categories/create">Create Category</a>
				</li>	
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url(); ?>about">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url(); ?>users/logout">Logout</a>
				</li>
			<?php endif ?>

	

		
		</ul>
	</nav>


	<div style="padding:2rem 2rem;"> <!-- container padding --> 



	<?php if($this->session->flashdata('login_failed')): ?>
		<?= 
		'<div class="flash-message card bg-danger text-white"><div class="flash-message card-body">'
		.$this->session->flashdata('login_failed').
		'</div></div>';
		?>
		<br>
	<?php endif; ?>

	<?php if($this->session->flashdata('login_success')): ?>
		<?= 
		'<div class="flash-message card bg-success text-white"><div class="flash-message card-body">'
		.$this->session->flashdata('login_success').
		'</div></div>';
		?>
		<br>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_logout')): ?>
		<?= 
		'<div class="flash-message card bg-success text-white"><div class="flash-message card-body">'
		.$this->session->flashdata('user_logout').
		'</div></div>';
		?>
		<br>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_registered')): ?>
		<?= '<div class="flash-message card bg-success text-white"><div class="flash-message card-body">'
		.$this->session->flashdata('user_registered').
		'</div></div>';
		?>
		<br>
	<?php endif; ?>

	<?php if($this->session->flashdata('post_created')): ?>
		<?= 
		'<div class="flash-message card bg-success text-white"><div class="flash-message card-body">'
		.$this->session->flashdata('post_created').
		'</div></div>';
		?><br>
	<?php endif; ?>

	<?php if($this->session->flashdata('post_updated')): ?>
		<?= 
		'<div class="flash-message card bg-success text-white"><div class="flash-message card-body">'
		.$this->session->flashdata('post_updated').
		'</div></div>';
		?><br>
	<?php endif; ?>

	<?php if($this->session->flashdata('post_deleted')): ?>
		<?= 
		'<div class="flash-message card bg-success text-white"><div class="flash-message card-body">'
		.$this->session->flashdata('post_deleted').
		'</div></div>';
		?><br>
	<?php endif; ?>


	<?php if($this->session->flashdata('category_created')): ?>
		<?= 
		'<div class="flash-message card bg-success text-white"><div class="flash-message card-body">'
		.$this->session->flashdata('category_created').
		'</div></div>';
		?>
	<?php endif; ?>



