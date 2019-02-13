      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <form action="search.php" method="post">
                <div class="input-group">
                  <input type="text" name="keyword" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button name="submit" class="btn btn-secondary" type="submit">Go!</button>
                  </span>
                </div>
            </form>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <?php 
                    $query = "SELECT * FROM category_data";
                    $category = $database->select($query);
                    if ($category) {
                        while ($result = $category->fetch_assoc()) {
                ?>
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="posts.php?categoryId=<?php echo $result['id'] ?>"><?php echo $result['name']; ?></a>
                  </li>
                </ul>
            <?php }}else{ ?>
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">No category found</a>
                  </li>
                </ul>
            <?php } ?>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Login</h5>
          <div class="card-body">
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $format->validate($_POST['username']);
                $password = $format->validate($_POST['password']);

                $username = mysqli_real_escape_string($database->connection, $username);
                $password = mysqli_real_escape_string($database->connection, md5($password));

                $query = "SELECT * FROM user_table WHERE username = '$username' AND password = '$password'";
                $result = $database->select($query);
                if ($result != false) {
                    $value = mysqli_fetch_array($result);
                    $rows = mysqli_num_rows($result);
                    if ($rows > 0) {
                        Session::set("login", true);
                        Session::set("username", $value['username']);
                        Session::set("userid", $value['id']);
                        echo "<script>window.location = 'admin/index.php';</script>";
                    }else{
                        echo "<p style='color:red'>Data didn't found</p>";
                    }
                }else{
                    echo "<p style='color:red'>Username/Password didn't match</p>";
                }
            }
        ?>
          <form method="post" action="">
            <div class="input-group mb-2">
              <input type="text" class="form-control col-10" name="username" placeholder="type your email">
            </div>
            <div class="input-group mb-2">
              <input type="password" class="form-control col-10" name="password" placeholder="type your password">
            </div>
            <div class="input-group mb-2">
              <button type="submit" name="loginSubmit" class="btn btn-primary mb-2">Submit</button>
            </div>
        </form>
          </div>
        </div>

      </div>