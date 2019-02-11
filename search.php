<?php
include "inc/header.php";
?>
<?php 
	if (!isset($_POST['keyword']) || $_POST['keyword'] == NULL) {
		header("Location: 404.php");
	}else{
		$keyword = $_POST['keyword'];
	}
 ?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <?php
            $query = "SELECT * FROM post_table WHERE title LIKE '%$keyword%' OR body LIKE '%$keyword%'";
            $posts = $database->select($query);
            if ($posts) {
                while ($result = $posts->fetch_assoc()) {
        ?>
        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
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

    <?php } else{ echo "<p>Your search query not found</p>"; }?>
      </div>

    <?php include 'inc/sidebar.php'; ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<?php include 'inc/footer.php'; ?>