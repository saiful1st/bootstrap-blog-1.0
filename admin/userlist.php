<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="main-wrapper">
	<div class="view-wrapper">
	<?php
		if (isset($_GET['delUserId'])) {
			$delUserId = $_GET['delUserId'];
			$delQuery = "DELETE FROM user_table WHERE id='$delUserId'";
			$delData = $database->delete($delQuery);
			if ($delData) {
				echo "<p style='color:green'>Data Deleted Successfully</p>";
			}else{
				echo "<p style='color:red'>Data Deleted Successfully</p>";
			}
		}

	?>
	<table id="table_id" class="display">
	    <thead>
	        <tr>
	            <th width="2%">No:</th>
	            <th>Name</th>
	            <th width="10%">Username</th>
	            <th width="">Email</th>
	            <th>Details</th>
	            <th>Role</th>
	            <th width="10%">Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    <?php
	    	$query = "SELECT * FROM user_table";
	    	$postlist = $database->select($query);
	    	if ($postlist) {
	    		$i = 0;
	    		while ($result = $postlist->fetch_assoc()) {
	    			$i++;
	    ?>
	        <tr>
	            <td><?php echo $i; ?></td>
	            <td><?php echo $result['name']; ?></td>
	            <td><?php echo $result['username']; ?></td>
	            <td><?php echo $result['email']; ?></td>
	            <td><?php echo $format->textShorten($result['details'], 70); ?></td>
	            <td>
	            <?php 
	            	if($result['role'] == 0){
	            		echo "Admin";
	            	}elseif($result['role'] == 1){ 
	            		echo "Author"; 
	            	}elseif($result['role'] == 2){
	            	 echo "Editor"; }; 
	            ?>
	            	 	
	            </td>
	            <td>
	            	<a href="viewuser.php?viewUserId=<?php echo $result['id'] ?>">View</a>
	            	<?php if (Session::get('userrole') == 0) {?>
	            		||<a onclick="return confirm('Are you sure to delete this?');" href="?delUserId=<?php echo $result['id'] ?>">Delete</a>
	            	<?php } ?>
					
					
				</td>
	        </tr>
	    <?php }} ?>
	    </tbody>
	</table>
	</div>
</div>
<?php include 'inc/footer.php'; ?>