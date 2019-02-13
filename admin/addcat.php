<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="main-wrapper">
	<div class="view-wrapper">
		<div class="container">
			<h2>Add Category</h2>
			<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$category = mysqli_real_escape_string($database->connection, $_POST['category']);
					if ($category == "") {
						echo "<p style='color:red'>Field must not be empty</p>";
					}else{
						$query = "INSERT INTO category_data(name) VALUES('$category')";
						$catQuery = $database->insert($query);
						if ($catQuery) {
							echo "<p style='color:green'>Category inserted successfully</p>";
						}else{
							echo "<p style='color:red'>Category could not add</p>";
						}
					}

				}

			?>
			<form action="" method="post">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Category Name</label>
			    <input type="text" name="category" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your category name">
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>

	</div>
</div>
<?php include 'inc/footer.php'; ?>