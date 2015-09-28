<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../img/favicon.ico" />
	<title>jimmyk.rocks | Admin Panel</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script> 
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!-- Custom styles for this template -->
	<link rel="stylesheet" href="css/custom.css">
	<script type="text/javascript" src="js/script.js"></script>

</head>
<body>
	<div class="blog-masthead">
		<div class="container">
			<nav class="blog-nav">
				<a class="blog-nav-item active" href="index.php">Dashboard</a>
				<a class="blog-nav-item" href="add_image.php">Add Image</a>
				<a class="blog-nav-item pull-right" href="http://jimmyk.rocks/">Visit jimmyk.rocks!</a>
			</nav>
		</div>
	</div>
	<div class="container">
		<div class="blog-header">
			<h2 class="blog-title">jimmyk.rocks | Admin Panel</h2><br>
		</div>

		<div class="row">
			<div class="col-sm-12 blog-main">
				<?php if(isset($_GET['msg'])) : ?>
					<div class="alert alert-success"><?php echo htmlentities($_GET['msg']); ?></div>
				<?php endif; ?>