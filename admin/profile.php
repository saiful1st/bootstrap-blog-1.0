<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
	$userId = Session::get('userid');
	$userrole = Session::get('userrole');
?>
<div class="main-wrapper">
	<div class="view-wrapper">
		<div class="container">
			<h2>User Profile</h2>
			<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$name = mysqli_real_escape_string($database->connection, $_POST['name']);
					$username = mysqli_real_escape_string($database->connection, $_POST['username']);
					$email = mysqli_real_escape_string($database->connection, $_POST['email']);
					$details = mysqli_real_escape_string($database->connection, $_POST['details']);

					$query = "UPDATE user_table SET name='$name', username='$username', email='$email', details='$details' WHERE id='$userId'";
					$updateuser = $database->insert($query);
					if ($updateuser) {
						echo "<p style='color:green'>User Updated successfull</p>";
					}else{
						echo "<p style='color:red'>User could not update due to technical problem</p>";
					}
					
				}
			?>
			<?php 
				$query = "SELECT * FROM user_table WHERE id='$userId' AND role='$userrole'";
				$getUserData = $database->select($query);
				if ($getUserData) {
					while ($result = $getUserData->fetch_assoc()) {
			?>
			<form action="" method="post">
			<div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" name="name" class="form-control" value="<?php echo $result['name'] ?>" ">
			  </div>

			<div class="form-group">
			    <label for="exampleInputEmail1">Username</label>
			    <input type="text" name="username" class="form-control" value="<?php echo $result['username'] ?>">
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input type="email" name="email" class="form-control" value="<?php echo $result['email'] ?>">
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Bio</label>
			    <textarea name="details" class="form-control" rows="10"><?php echo $result['details'] ?></textarea>
			  </div>

			  <button type="submit" class="btn btn-primary">Update</button>
			</form>
		<?php }} ?>
		</div>

	</div>
</div>
<?php include 'inc/footer.php'; ?>