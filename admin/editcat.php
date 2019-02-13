<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
	if (!isset($_GET['catEditId']) || $_GET['catEditId'] == NULL) {
		header("Location: catlist.php");
	}else{
		$catEditId = $_GET['catEditId'];
	}

?>
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
						$query = "UPDATE category_data SET name = '$category' WHERE id='$catEditId'";
						$catQuery = $database->insert($query);
						if ($catQuery) {
							echo "<p style='color:green'>Category updated successfully</p>";
						}else{
							echo "<p style='color:red'>Category could not updated</p>";
						}
					}

				}

			?>
			<form action="" method="post">
			<?php
				$query = "SELECT * FROM category_data WHERE id ='$catEditId'";
				$catValue = $database->select($query);
				if ($catValue) {
					while ($result = $catValue->fetch_assoc()) {
				?>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Category Name</label>
			    <input type="text" name="category" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['name'] ?>">
			  </div>
			<?php }} ?>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>

	</div>
</div>
<?php include 'inc/footer.php'; ?>