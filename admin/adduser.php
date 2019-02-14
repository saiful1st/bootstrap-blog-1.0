<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="main-wrapper">
	<div class="view-wrapper">
		<div class="container">
			<h2>Add User</h2>
			<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$username = mysqli_real_escape_string($database->connection, $_POST['username']);
					$email = mysqli_real_escape_string($database->connection, $_POST['email']);
					$password = mysqli_real_escape_string($database->connection, md5($_POST['password']));
					$role = mysqli_real_escape_string($database->connection, intval($_POST['role']));
					if (empty($username) || empty($password) || empty($role) || empty($email)) {
						echo "<p style='color:red'>Field must not be empty</p>";
					}else{
						$query = "INSERT INTO  user_table(username, password, email, role) VALUES('$username', '$password', '$email', '$role')";
						$insertuser = $database->insert($query);
						if ($insertuser) {
							echo "<p style='color:green'>User Registration successfull</p>";
						}else{
							echo "<p style='color:red'>User Registration could not complete due to technical problem</p>";
						}
					}
				}
			?>
			<form action="" method="post">

			  <div class="form-group">
			    <label for="exampleInputEmail1">Username</label>
			    <input type="text" name="username" class="form-control" placeholder="Enter username">
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input type="email" name="email" class="form-control" placeholder="Enter email">
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Password</label>
			    <input type="password" name="password" class="form-control" placeholder="Password">
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Role</label>
			    <select id="select" name="role">
			    	<option>Select User Role</option>
			    	<option value="0">Admin</option>
			    	<option value="1">Author</option>
			    	<option value="2">Editor</option>
			    </select>
			  </div>

			  <button type="submit" class="btn btn-primary">Add user</button>
			</form>
		</div>

	</div>
</div>
<?php include 'inc/footer.php'; ?>