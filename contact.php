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
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $format->validate($_POST['name']);
            $email = $format->validate($_POST['email']);
            $message = $format->validate($_POST['message']);

            $name = mysqli_real_escape_string($database->connection, $name);
            $email = mysqli_real_escape_string($database->connection, $email);
            $message = mysqli_real_escape_string($database->connection, $message);

            $errorname = "";
            $erroremail = "";
            $errormsg = "";

            if (empty($name)) {
                $errorname = "Name Must not be empty";
            }
            if (empty($email)) {
                $erroremail = "Email must not be empty";
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erroremail = "Invalid Email";
            }
            if(empty($message)) {
                $errormsg = "Message must not be empty";
            }else{
                $query = "INSERT INTO contact_table(name, email, message) VALUES('$name', '$email', '$message')";
                $insertrows = $database->insert($query);
                if ($insertrows) {
                    echo "<p style='color:green'>Message Sent Successfully</p>";
                }else{
                    echo "<p style='color:red'>Message could not  sent</p>";
                }
            }

           /* if (empty($name)) {
                $error = "Name Must not be empty";
            }elseif (empty($email)) {
                $error = "Email must not be empty";
            }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Invalid Email";
            }elseif (empty($message)) {
                $error = "Message must not be empty";*/
            
        }
        ?>
        <?php
           /* if (isset($error)) {
                echo "<span style='color:red'>$error</span>";
            }
            if (isset($msg)) {
                echo "<span style='color:green'>$msg</span>";
            }*/
        ?>

        <form action="" method="post">
            <div class="form-group">
                <?php if (isset($errorname)) { echo "<p style='color:red'>$errorname</p>";}?>
                <label for="">Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <?php if (isset($erroremail)) { echo "<p style='color:red'>$erroremail</p>";}?>
              <label for="exampleInputEmail1">Email address</label>
              <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <?php if (isset($errormsg)) { echo "<p style='color:red'>$errormsg</p>";}?>
              <label for="exampleFormControlTextarea1">Message</label>
              <textarea name="message" class="form-control" id="exampleFormControlTextarea1" placeholder="Write your message" rows="8"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>

      </div>


    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<?php include 'inc/footer.php'; ?>