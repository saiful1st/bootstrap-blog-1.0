<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="container">
<div class="main-wrapper">
	<div class="view-wrapper">
		<?php
			if (isset($_GET['viewPostId'])) {
				$viewPostId = $_GET['viewPostId'];
				$query = "SELECT * FROM post_table WHERE id='$viewPostId'";
				$viewPost = $database->select($query);
				if ($viewPost) {
					while ($result = $viewPost->fetch_assoc()) {
		?>
	<div class="card-group">
	  <div class="card">
	    <img style="height: 400px; width: 872px;" src="<?php echo $result['image'] ?>" class="card-img-top" alt="...">
	    <div class="card-body">
	      <h2 class="card-title"><?php echo $result['title'] ?></h2>
	      <p class="card-text"><?php echo $result['body'] ?></p>
	      <footer class="blockquote-footer">Author - <cite title="Source Title"><?php echo $result['author'] ?></cite></footer>
	      <p class="card-text"><small class="">Posted On - <?php echo $format->formatDate($result['date']) ?></small></p>
	    </div>
	  </div>
	</div>
<?php }}} ?>
</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>