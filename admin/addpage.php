<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="main-wrapper">
	<div class="view-wrapper">
		<div class="container">
			<h2>Add New Page</h2>
			<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$pagename = mysqli_real_escape_string($database->connection, $_POST['pagename']);
					$pagebody = mysqli_real_escape_string($database->connection, $_POST['pagebody']);
					if ($pagename == "" || $pagebody == "") {
						echo "<p style='color:red'>Field must not be empty</p>";
					}else{
						$query = "INSERT INTO page_table(name, body) VALUES('$pagename', '$pagebody')";
						$pageQuery = $database->insert($query);
						if ($pageQuery) {
							echo "<p style='color:green'>Page created successfully</p>";
						}else{
							echo "<p style='color:red'>Page could not created</p>";
						}
					}

				}

			?>
			<form action="" method="post">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Page Name</label>
			    <input type="text" name="pagename" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Page Name">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Body Name</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="pagebody" placeholder="Page Body"></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>

	</div>
</div>
<?php include 'inc/footer.php'; ?>