<?php ob_start(); ?>
<?php include 'includes/header.php'; ?>
<?php include 'config/config.php'; ?>
<?php include 'database.php'; ?>
<?php
	$db = new Database();
	$id = $_GET['id'];
	$query = "SELECT * FROM images WHERE id=".$id;
	$post = $db->select($query)->fetch_assoc();
	$img_dir = "../img/";
	$imgpath = $img_dir.$post['imglink'];
?>
<?php
	if(isset($_POST['submit'])){
		//Assign post vars
		$tags = $_POST['tags'];
		$tagstring = implode(", ", $tags);
		$imglink = $_POST['imglink'];
		$caption = $_POST['caption'];
		$oldfile = $_POST['oldfile'];
		//validation
		if($tagstring == '' || $imglink == '' || $caption == ''){
			//set error
			$error = 'Please fill out all required fields.';
		}else{
			//rename file
			rename($imgpath, $img_dir.$imglink);
			//query
			$query = "UPDATE images SET imglink = '$imglink', caption = '$caption', category = '$tagstring' WHERE id = ".$id;
			$update_row = $db->update($query);
		}

	}
	if(isset($_POST['delete'])){
		if(file_exists($imgpath)){
			unlink($imgpath);
		}
		//delete query
		$query = "DELETE FROM images WHERE id = ".$id;
		$delete_row = $db->delete($query);
		//validate delete
		if(file_exists($imgpath)){
			echo "problem deleting...";
		}else{
			echo "Successfully deleted ".$imgpath;
		}
	}
?>
<form role="form" method="post" action="edit_image.php?id=<?php echo $id; ?>">
	<div class="form-group">
		<label>Image</label>
		<div style="width:250px; height:250px;">
			<img src="<?php echo $imgpath; ?>" height="100%">
		</div>
	</div>
	<div class="form-group">
		<label>Tags</label><br>
		<input type="checkbox" name="tags[]" value="art" />Art<br>
		<input type="checkbox" name="tags[]" value="life" />Life<br>
		<input type="checkbox" name="tags[]" value="nature" />Nature<br>
		<input type="checkbox" name="tags[]" value="random" />Random<br>
		<input type="hidden" name="oldfile" value="<?php echo $post['imglink']; ?>">
	</div>
	<div class="form-group">
		<label>File Name</label>
		<input name="imglink" class="form-control" placeholder="Enter File Name" type="text" value="<?php echo $post['imglink']; ?>"></input>
	</div>
	<div class="form-group">
		<label>Caption</label>
		<input name="caption" class="form-control" placeholder="Enter Caption" type="text" value="<?php echo $post['caption']; ?>"></input>
	</div>
	<div>
		<input name="submit" type="submit" class="btn btn-default" value="Submit" />
		<a href="index.php" class="btn btn-default">Cancel</a>
		<input name="delete" type="submit" class="btn btn-danger" value="Delete" />
	</div>

</form>
			</div>
		</div>
	</body>
</html>
