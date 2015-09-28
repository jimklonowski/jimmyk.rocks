<?php include 'config/config.php'; ?>
<?php include 'database.php'; ?>
<?php 
	$db = new Database();
	//select query
	$query = "SELECT * FROM images ORDER BY id ASC";
	//get all images
	$images = $db->select($query);
?>
<?php 
	function imagetitle($filename){
		$parts = pathinfo('/img/'.$filename);
		return $parts['filename'];
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>jimmyk.rocks! | View Gallery</title>
		<link rel="shortcut icon" href="img/favicon.ico" />
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/lightbox.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="js/script.js"></script>		
	</head>
	<body>
		<header>
			<div class="container">
				<h1 class="logo">jimmyk.rocks!</h1>
				<nav>
					<ul>
						<li><a href="#">All</a></li>
						<li><a href="#">Art</a></li>
						<li><a href="#">Life</a></li>
						<li><a href="#">Nature</a></li>
						<li><a href="#">Random</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<section class="tagline">
			<div class="container">
				<h1>jimmyk rockin'</h1>
			</div>
		</section>
		<section>
			<div class="container">
				<h1 id="heading">All Images</h1>
				<ul id="gallery">
					<?php while($row = mysqli_fetch_assoc($images)) : ?>
						<?php echo '<li class="'.$row['category'].'"><a href="img/'.$row['imglink'].'" data-lightbox="image-" data-title="'.imageTitle($row['imglink']).'" data-desc="'.$row['caption'].'">
						<img src="img/'.$row['imglink'].'">
					</a></li>'; ?>
					<?php endwhile; ?>
				</ul>
			</div>
		</section>
		<br>
		<footer>
			<p>Copyright &copy; 2015, Jimmy Klonowski</p>
		</footer>
		<script src="js/lightbox.js"></script>
		<script>
    		lightbox.option({
      			'wrapAround': true,
      			'positionFromTop': 250
    		})
		</script>
	</body>
</html>