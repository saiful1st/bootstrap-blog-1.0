<?php
    include 'inc/header.php';
?>

  <!-- Page Content -->
  <div class="container">
    <!-- Pagination -->
        <?php
            $per_page = 2;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            $start_from = ($page-1) * $per_page;
        ?>
    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>
        <?php
            $query = "SELECT * FROM post_table LIMIT $start_from, $per_page";
            $posts = $database->select($query);
            if ($posts) {
                while ($result = $posts->fetch_assoc()) {
        ?>
        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title"><?php echo $result['title'] ?></h2>
            <p class="card-text"><?php echo $format->textShorten($result['body'], 400) ?></p>
            <a href="post.php?id=<?php echo $result['id'] ?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?php echo $format->formatDate($result['date']) ?> by
            <a href="#"><?php echo $result['author'] ?></a>
          </div>
        </div>
        <?php } ?>

        <!-- Pagination -->
        <?php
            $query = "SELECT * FROM post_table";
            $result = $database->select($query);
            $total_rows = mysqli_num_rows($result);
            $total_pages = ceil($total_rows/$per_page);
        ?>
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="<?php echo "index.php?page=$total_pages"?> ">&larr; Older</a>
          </li>
         <?php 
            for ($i=1; $i < $total_pages; $i++) {
            echo "<a href='index.php?page=$i'>$i</a>";
        }?>
          <li class="page-item">
            <a class="page-link" href="<?php echo "index.php?page=1" ?>">Newer &rarr;</a>
          </li>
        </ul>
    <?php } else{ header("Location: 404.php"); }?>
      </div>

    <?php include 'inc/sidebar.php'; ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<?php include 'inc/footer.php'; ?>