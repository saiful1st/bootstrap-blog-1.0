<?php
    include 'inc/header.php';
?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h1 class="my-4">Abouts Us</h1>
        <!-- Abouts Us -->
        <?php
            $query = "SELECT * FROM copyright_data WHERE id='1'";
            $pageData = $database->select($query);
            if ($pageData) {
                while ($result = $pageData->fetch_assoc()) {
        ?>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text"><?php echo $result['text'] ?></p>
            </div>
          </div>
        <?php }} ?>

      </div>

    <?php include 'inc/sidebar.php'; ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<?php include 'inc/footer.php'; ?>