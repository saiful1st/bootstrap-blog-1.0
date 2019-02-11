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
          <div class="input-group mb-2">
            <input type="email" class="form-control col-10" name="email" placeholder="type your email">
          </div>
          <div class="input-group mb-2">
            <input type="password" class="form-control col-10" name="password" placeholder="type your password">
          </div>
          <div class="input-group mb-2">
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
          </div>
            
          </div>
        </div>

      </div>