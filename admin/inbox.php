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
	            <th>Name</th>
	            <th>Email</th>
	            <th width="30%">Message</th>
	            <th>Date</th>
	            <th>Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    <?php
	    	$query = "SELECT * FROM contact_table WHERE status='0'";
	    	$msglist = $database->select($query);
	    	if ($msglist) {
	    		$i = 0;
	    		while ($result = $msglist->fetch_assoc()) {
	    			$i++;
	    ?>
	        <tr>
	            <td><?php echo $i; ?></td>
	            <td><?php echo $result['name']; ?></td>
	            <td><?php echo $result['email']; ?></td>
	            <td><?php echo $result['message']; ?></td>
	            <td><?php echo $result['date']; ?></td>
	            <td>
					<a href="viewmsg.php?msgId=<?php echo $result['id'] ?>">View</a> || 
					<a href="replyMsg.php?replymsgid=<?php echo $result['id'] ?>">Reply</a>
				</td>
	        </tr>
	    <?php }} ?>
	    </tbody>
	</table>
	</div>
</div>
<?php include 'inc/footer.php'; ?>