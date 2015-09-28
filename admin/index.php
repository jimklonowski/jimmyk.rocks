<?php include 'includes/header.php'; ?>
<?php include 'config/config.php'; ?>
<?php include 'database.php'; ?>
<?php
	$db = new Database();
	$query = "SELECT * from images ORDER BY id DESC";
	$result = $db->select($query);
?>
				<table class="table table-striped">
					<tr>
						<th>ID#</th>
						<th>Image</th>
						<th>Caption</th>
						<th>Tags</th>
					</tr>
					<?php while($row = $result->fetch_assoc()) :?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><a href="edit_image.php?id=<?php echo $row['id']; ?>"><?php echo $row['imglink']; ?></a></td>
						<td><?php echo $row['caption']; ?></td>
						<td><?php echo $row['category']; ?></td>
					</tr>
					<?php endwhile; ?>
				</table>
			</div>
		</div>
	</body>
</html>
