<?php
include 'lib/Session.php';
Session::init();
include 'config/config.php';
include 'lib/Database.php';
include 'format/Format.php';
$database = new Database();
$format = new Format();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Home - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    <?php 
        $query = "SELECT * FROM title_logo WHERE id='1'";
        $title = $database->select($query);
        if ($title) {
            while ($result = $title->fetch_assoc()) {
    ?>
      <a class="navbar-brand" href="index.php"><?php echo $result['title']; ?></a>
      <?php }} ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <?php
            $path = $_SERVER['SCRIPT_FILENAME'];
            $currentPage = basename($path, '.php');
        ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a <?php if($currentPage == 'index'){echo "id='active'";} ?> class="nav-link" href="index.php">Home
            </a>
          </li>
          <?php
            $query = "SELECT * FROM page_table";
            $pages = $database->select($query);
            if ($pages) {
                while ($result = $pages->fetch_assoc()) {
          ?>
          <li class="nav-item ">
            <a 
            <?php if (isset($_GET['pageid']) && $_GET['pageid'] == $result['id']) { echo "id='active'"; }?>
            class="nav-link" href="page.php?pageid=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a>
          </li>
      <?php }} ?>
          <li class="nav-item">
            <a <?php if($currentPage == 'contact'){echo "id='active'";} ?> class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>