<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="main-wrapper">
	<div class="view-wrapper">
	<?php
		if (isset($_GET['delCat'])) {
			$delCatId = $_GET['delCat'];
			$query = "SELECT * FROM category_data WHERE id='$delCatId'";
			$delCategory = $database->select($query);
			if ($delCategory) {
				$delQuery = "DELETE FROM category_data WHERE id='$delCatId'";
				$delCatData = $database->delete($delQuery);
				if ($delCatData) {
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
	            <th>No:</th>
	            <th>Category Name</th>
	            <th>Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    <?php
	    	$query = "SELECT * FROM category_data";
	    	$postlist = $database->select($query);
	    	if ($postlist) {
	    		$i = 0;
	    		while ($result = $postlist->fetch_assoc()) {
	    			$i++;
	    ?>
	        <tr>
	            <td><?php echo $i; ?></td>
	            <td><?php echo $result['name']; ?></td>
	            <td>
					<a href="editcat.php?catEditId=<?php echo $result['id'] ?>">Edit</a> || 
					<a onclick="return confirm('Are you sure to delete this?');" href="?delCat=<?php echo $result['id'] ?>">Delete</a>
				</td>
	        </tr>
	    <?php }} ?>
	    </tbody>
	</table>
	</div>
</div>
<?php include 'inc/footer.php'; ?>