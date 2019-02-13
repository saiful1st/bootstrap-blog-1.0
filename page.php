<?php
    include 'inc/header.php';
?>
<?php
if (!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
    header("Location: 404.php");
}else{
    $pageid = $_GET['pageid'];
}

?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">
    <?php
        $query = "SELECT * FROM page_table WHERE id='$pageid'";
        $page = $database->select($query);
        if ($page) {
            while ($result = $page->fetch_assoc()) {
    ?>
      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h1 class="my-4"><?php echo $result['name']; ?></h1>
        <!-- Abouts Us -->
    
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
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