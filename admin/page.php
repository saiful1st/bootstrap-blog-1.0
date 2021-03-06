<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="main-wrapper">
	<div class="view-wrapper">
<?php
	if (!isset($_GET['delpageid']) || $_GET['delpageid'] == NULL) {
		echo "<script>window.location = 'pagelist.php';</script>";
	}else{
		$delpageid = $_GET['delpageid'];
	}
?>
		<div class="container">
			<h2>Add New Page</h2>
			<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$pagename = mysqli_real_escape_string($database->connection, $_POST['pagename']);
					$pagebody = mysqli_real_escape_string($database->connection, $_POST['pagebody']);
					if ($pagename == "" || $pagebody == "") {
						echo "<p style='color:red'>Field must not be empty</p>";
					}else{
						$query = "UPDATE page_table SET name = '$pagename', body = '$pagebody' WHERE id = '$delpageid'";
						$pageQuery = $database->insert($query);
						if ($pageQuery) {
							echo "<p style='color:green'>Page Updated successfully</p>";
						}else{
							echo "<p style='color:red'>Page could not created</p>";
						}
					}

				}

			?>
			<form action="" method="post">
			<?php
				$query = "SELECT * FROM page_table WHERE id = '$delpageid'";
				$pageData = $database->select($query);
				if ($pageData) {
					while ($result = $pageData->fetch_assoc()) {
			?>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Page Name</label>
			    <input type="text" name="pagename" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['name'] ?>">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Body Name</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="pagebody" value=""><?php echo $result['body'] ?></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">Update</button>
			 <?php }} ?>
			</form>
		</div>

	</div>
</div>
<?php include 'inc/footer.php'; ?>