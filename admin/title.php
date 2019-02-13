<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="main-wrapper">
	<div class="view-wrapper">
		<div class="container">
			<h2>Add Title</h2>
			<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$title = mysqli_real_escape_string($database->connection, $_POST['title']);
					if ($title == "") {
						echo "<p style='color:red'>Field must not be empty</p>";
					}else{
						$query = "UPDATE title_logo SET title='$title' WHERE id='1'";
						$titleQuery = $database->insert($query);
						if ($titleQuery) {
							echo "<p style='color:green'>Title updated successfully</p>";
						}else{
							echo "<p style='color:red'>Title could not add</p>";
						}
					}

				}

			?>
			<form action="" method="post">
			<?php
				$query = "SELECT * FROM title_logo WHERE id='1'";
				$title = $database->select($query);
				if ($title) {
					while ($result = $title->fetch_assoc()) {
			?>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Add Title</label>
			    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['title'] ?>">
			  </div>
			  <button type="submit" class="btn btn-primary">Update</button>
			<?php }} ?>
			</form>
		</div>

	</div>
</div>
<?php include 'inc/footer.php'; ?>