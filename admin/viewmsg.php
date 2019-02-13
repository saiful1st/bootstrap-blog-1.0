<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="container">
<div class="main-wrapper">
	<h2>View Message</h2>
	<div class="view-wrapper">
		<?php
		if (isset($_GET['msgId'])) {
			$msgId = $_GET['msgId'];
			$query = "SELECT * FROM contact_table WHERE id='$msgId'";
			$viewmsg = $database->select($query);
			if ($viewmsg) {
				while ($result = $viewmsg->fetch_assoc()) {
		?>
	<div class="card-group">
	  <div class="card">
	  	 <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              	echo "<script>window.location = 'inbox.php';</script>";
            }
        ?>
	  	<form action="" method="post">
	    <div class="card-body">
	      <hp class=""><?php echo $result['name'] ?></h2>
	      <p class="card-body"><?php echo $result['message'] ?></p>
	      <footer class="blockquote-footer">Email - <cite title="Source Title"><?php echo $result['email'] ?></cite></footer>
	      <p class="card-text"><small class="">Sent - <?php echo $format->formatDate($result['date']) ?></small></p>
	    <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" Value="Back to inbox" />
            </td>
        </tr>
	    </div>
		</form>
	  </div>
	</div>
<?php }}} ?>
</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>