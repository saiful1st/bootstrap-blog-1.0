<?php
include "inc/header.php";

?>
<?php 
	if (!isset($_GET['id']) || $_GET['id'] == NULL) {
		header("Location: 404.php");
	}else{
		$id = $_GET['id'];
	}
?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <?php
            $query = "SELECT * FROM post_table WHERE id='$id'";
            $posts = $database->select($query);
            if ($posts) {
                while ($result = $posts->fetch_assoc()) {
        ?>
      <div class="col-md-8">
        <h2 class="card-title"><?php echo $result['title'] ?></h2>
        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
          <div class="card-footer text-muted">
            Posted on <?php echo $format->formatDate($result['date']) ?> by
            <a href="#"><?php echo $result['author'] ?></a>
          </div>
          <div class="card-body">
            <p class="card-text"><?php echo $result['body'] ?></p>
          </div>
        </div>
        

      </div>
	<?php }} ?>
    <?php include 'inc/sidebar.php'; ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<?php include 'inc/footer.php'; ?>