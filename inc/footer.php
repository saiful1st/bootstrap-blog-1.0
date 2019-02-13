  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
    <?php 
        $query = "SELECT * FROM copyright_data WHERE id='1'";
        $copyright = $database->select($query);
        if ($copyright) {
            while ($result = $copyright->fetch_assoc()) {
    ?>
      <p class="m-0 text-center text-white"><?php echo $result['text']; ?></p>
    <?php }} ?>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
