<?php ob_start(); ?>
<?php include 'includes/header.php'; ?>
<?php include 'config/config.php'; ?>
<?php include 'database.php'; ?>
<?php 

	$db = new Database();

	//If submit was pressed, get all info from form
	if(isset($_POST['submit'])){
		$errors = array();
		$dir = '../img/';
		//Get tags
		$tags = $_POST['tags'];
		$tagstring = implode(", ", $tags);

		//Get caption
		$caption = $_POST['caption'];

		//Get name
		$rename = $_POST['rename'];

		//Get image
		if($_FILES['image']['name']){
			$valid = true;
			if(!$_FILES['image']['error']){
				//file name
				$ext = end((explode('.', strtolower($_FILES['image']['name']))));
				if($rename != null){
					$name = $rename . '.' . $ext;
				}else{
					$name = $_FILES['image']['name'];
				}
				
				//Validation
				
				//Size
				if($_FILES['image']['size'] > 5000000){
					$valid = false;
					array_push($errors, 'File size is too large.');
				}
				//Extension
				$valid_ext = array("jpg", "jpeg", "png", "gif");
				if(!in_array($ext, $valid_ext)){
					$valid = false;
					array_push($errors, 'File must be of type jpg, jpeg, png, or gif.');
				}
				//Exists in img/ directory?
				if(file_exists(($dir.$name))){
					$valid = false;
					array_push($errors, 'File with name '.$name.' already exists in image folder.');
				}
			}else{
				$valid = false;
				array_push($errors, 'ERROR: '.$_FILES['image']['error'].'.');
			}
		}else{
			$valid = false;
			array_push($errors, 'You must select a file to upload.');
		}
		//Check if tags were checked
		if($tags == null || $tagstring == null){
			$valid = false;
			array_push($errors, 'You must select some categories.');
		}
		//Check if caption was entered
		if($caption == null){
			$valid = false;
			array_push($errors, 'You must enter a caption.');
		}

		//Print Errors
		if($valid == false){
			foreach($errors as $err){
				echo '<div class="alert alert-danger"><strong>Oops!</strong> '.$err.'<br></div>';
			}
		}else{
			//Upload the file
			if(move_uploaded_file($_FILES['image']['tmp_name'], $dir.$name)){
				echo '<div class="alert alert-success"><strong>Success!</strong> File was uploaded.<br></div>';
				//Add file to DB
				$db = new Database();
				$query = "INSERT INTO images (imglink, caption, category) VALUES('".$name."', '".$caption."', '".$tagstring."');";
				$insert_row = $db->insert($query);
			}
		}	
	}
?>
<form enctype="multipart/form-data" name='imageform' role="form" id="imageform" method="post" action="add_image.php">
	<div class="form-group">
		<p>Please Choose Image: </p>
		<input class='file' type="file" class="form-control" name="image" id="image" placeholder="Please choose image"> <br>
		<input type="checkbox" name="tags[]" value="art" />Art<br>
		<input type="checkbox" name="tags[]" value="life" />Life<br>
		<input type="checkbox" name="tags[]" value="nature" />Nature<br>
		<input type="checkbox" name="tags[]" value="random" />Random<br><br>
		<p>Enter caption: <input type="text" name="caption" placeholder="jimmyk rocks..."></p><br>
		<p>(Optional)Rename file: <input type="text" name="rename" placeholder="name"></p><br>
		<span class="help-block"></span>
	</div>
	<div id="loader" style="display:none;">
		Please wait, image uploading...
	</div>
	<input type="submit" value="Upload" name="submit" id="submit" class="btn"/>
	<a href="index.php" class="btn btn-default">Cancel</a>
</form>
			</div>
		</div>
	</body>
</html>
