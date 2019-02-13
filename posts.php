<?php
    include 'inc/header.php';
?>
<?php 
	if (!isset($_GET['categoryId']) || $_GET['categoryId'] == NULL) {
		header("Location: 404.php");
	}else{
		$category = $_GET['categoryId'];
	}
?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <br>
        <?php
            $query = "SELECT * FROM post_table WHERE category = '$category'";
            $posts = $database->select($query);
            if ($posts) {
                while ($result = $posts->fetch_assoc()) {
        ?>
        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" id="imageSize" src="http://placehold.it/750x300" alt="Card image cap">
          <div class="card-body">
            <a href="post.php?id=<?php echo $result['id'] ?>"><h2 class="card-title"><?php echo $result['title'] ?></h2></a>
            <p class="card-text"><?php echo $format->textShorten($result['body'], 400) ?></p>
            <a href="post.php?id=<?php echo $result['id'] ?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?php echo $format->formatDate($result['date']) ?> by
            <a href="#"><?php echo $result['author'] ?></a>
          </div>
        </div>
        <?php } ?>

    <?php } else{ echo "<h class='card mb-4'>No posts available in this category</h4>"; }?>
      </div>

    <?php include 'inc/sidebar.php'; ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<?php include 'inc/footer.php'; ?>