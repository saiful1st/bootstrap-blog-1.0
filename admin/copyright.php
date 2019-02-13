<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="main-wrapper">
	<div class="view-wrapper">
		<div class="container">
			<h2>Copyright</h2>
			<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$text = mysqli_real_escape_string($database->connection, $_POST['text']);
					if ($text == "") {
						echo "<p style='color:red'>Field must not be empty</p>";
					}else{
						$query = "UPDATE copyright_data SET text='$text' WHERE id='1'";
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
				$query = "SELECT * FROM copyright_data WHERE id='1'";
				$text = $database->select($query);
				if ($text) {
					while ($result = $text->fetch_assoc()) {
			?>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Add Title</label>
			    <input type="text" name="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['text'] ?>">
			  </div>
			  <button type="submit" class="btn btn-primary">Update</button>
			<?php }} ?>
			</form>
		</div>

	</div>
</div>
<?php include 'inc/footer.php'; ?>