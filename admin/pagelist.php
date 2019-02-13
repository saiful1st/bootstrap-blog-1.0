<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="main-wrapper">
	<div class="view-wrapper">
	<?php
		if (isset($_GET['delpage'])) {
			$delpageid = $_GET['delpage'];
			$query = "SELECT * FROM page_table WHERE id='$delpageid'";
			$delpage = $database->select($query);
			if ($delpage) {
				$delQuery = "DELETE FROM page_table WHERE id='$delpageid'";
				$delPageData = $database->delete($delQuery);
				if ($delPageData) {
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
	            <th>Page Name</th>
	            <th>Body</th>
	            <th>Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    <?php
	    	$query = "SELECT * FROM  page_table";
	    	$pagelist = $database->select($query);
	    	if ($pagelist) {
	    		$i = 0;
	    		while ($result = $pagelist->fetch_assoc()) {
	    			$i++;
	    ?>
	        <tr>
	            <td><?php echo $i; ?></td>
	            <td><?php echo $result['name']; ?></td>
	            <td><?php echo $format->textShorten($result['body'], 100); ?></td>
	            <td>
					<a href="page.php?delpageid=<?php echo $result['id'] ?>">Edit</a> || 
					<a onclick="return confirm('Are you sure to delete this?');" href="?delpage=<?php echo $result['id'] ?>">Delete</a>
				</td>
	        </tr>
	    <?php }} ?>
	    </tbody>
	</table>
	</div>
</div>
<?php include 'inc/footer.php'; ?>