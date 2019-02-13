<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="main-wrapper">
	<div class="view-wrapper">
	<?php
		if (isset($_GET['delId'])) {
			$delId = $_GET['delId'];
			$query = "SELECT * FROM post_table WHERE id='$delId'";
			$delPost = $database->select($query);
			if ($delPost) {
				$delQuery = "DELETE FROM post_table WHERE id='$delId'";
				$delData = $database->delete($delQuery);
				if ($delData) {
					echo "<p style='color:green'>Data Deleted Successfully</p>";
				}else{
					echo "<p style='color:red'>Data Deleted Successfully</p>";
				}
			}
		}

	?>
	<table id="table_id" class="display">
	    <thead>
	        <tr>
	            <th width="2%">No:</th>
	            <th>Category</th>
	            <th width="10%">Title</th>
	            <th width="20%">Body</th>
	            <th>Image</th>
	            <th>Author</th>
	            <th>Tags</th>
	            <th>Date</th>
	            <th width="10%">Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    <?php
	    	$query = "SELECT * FROM post_table";
	    	$postlist = $database->select($query);
	    	if ($postlist) {
	    		$i = 0;
	    		while ($result = $postlist->fetch_assoc()) {
	    			$i++;
	    ?>
	        <tr>
	            <td><?php echo $i; ?></td>
	            <td><?php echo $result['category']; ?></td>
	            <td><?php echo $result['title']; ?></td>
	            <td><?php echo $format->textShorten($result['body'], 70); ?></td>
	            <td><img height="50px" width="50px" src="<?php echo $result['image'] ?>"></td>
	            <td><?php echo $result['author']; ?></td>
	            <td><?php echo $result['tags']; ?></td>
	            <td><?php echo $result['date']; ?></td>
	            <td>
					<a href="viewpost.php?viewPostId=<?php echo $result['id'] ?>">View</a>||
					<a href="editPost.php?postEditId=<?php echo $result['id'] ?>">Edit</a> || 
					<a onclick="return confirm('Are you sure to delete this?');" href="?delId=<?php echo $result['id'] ?>">Delete</a>
				</td>
	        </tr>
	    <?php }} ?>
	    </tbody>
	</table>
	</div>
</div>
<?php include 'inc/footer.php'; ?>