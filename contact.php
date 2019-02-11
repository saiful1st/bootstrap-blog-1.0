<?php
    include 'inc/header.php';
?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h1 class="my-4">Contact Us
        </h1>
        <form>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Message</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Write your message" rows="8"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>

      </div>

    <?php include 'inc/sidebar.php'; ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<?php include 'inc/footer.php'; ?>