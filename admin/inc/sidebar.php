    <div class="mainmenu-block">
      <!-- SITE MAINMENU-->
      <nav class="menu-block">
        <ul class="nav">
          <li class="nav-item mainmenu-user-profile"><a href="user-profile.html">
              <div class="circle-box"><img src="assets/images/face/1.jpg" alt="">
                <div class="dot dot-success"></div>
              </div>
              <div class="menu-block-label"><b><?php echo Session::get('name'); ?></b><br><?php if(Session::get('userrole') == 0){ echo "Admin";}elseif(Session::get('userrole') == 1){ echo "Author"; }elseif(Session::get('userrole') == 2){ echo "Editor"; }; ?></div></a></li>
        </ul>
        <div class="p-a-2"><span class="small pull-xs-right">This Month Earnings</span>
          <canvas id="demo-bar-dark-chart"></canvas>
        </div>
        <ul class="nav">
          <li class="nav-item"><a class="nav-link" href="index.php"><i class="icon ion-home"></i>
              <div class="menu-block-label">Home</div></a></li>
         
          <li class="nav-item"><a class="nav-link" href="profile.php"><i class="icon ion-monitor"></i>
              <div class="menu-block-label">Profile</div></a>
          </li>
          <!--li.header GENERAL-->
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-ios-grid-view-outline"></i>
              <div class="menu-block-label">Post Option</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="postlist.php">Post List</a></li>
              <li class="nav-item"><a class="nav-link" href="addpost.php">Add Post</a></li>
            </ul>
          </li>
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-toggle"></i>
              <div class="menu-block-label">Category Option</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="addcat.php">Add category</a></li>
              <li class="nav-item"><a class="nav-link" href="catlist.php">Category List</a></li>
            </ul>
          </li>
          <!--li.header.nav-item APP-->
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-document"></i>
              <div class="menu-block-label">Pages</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="pagelist.php">Page List</a></li>
              <li class="nav-item"><a class="nav-link" href="addpage.php">Add Page</a></li>
            </ul>
          </li>

          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-document"></i>
              <div class="menu-block-label">Site Option</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="title.php">Title</a></li>
              <li class="nav-item"><a class="nav-link" href="copyright.php">Copyright</a></li>
            </ul>
          </li>

          <li class=""><a class="nav-link" href="inbox.php"><i class="icon ion-document"></i>Inbox
            <?php
                $query = "SELECT * FROM contact_table WHERE status='0'";
                $msglist = $database->select($query);
            ?>
          </a>
           
          </li>
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-android-people"></i>
              <div class="menu-block-label">User</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="adduser.php">Add User</a></li>
              <li class="nav-item"><a class="nav-link" href="userlist.php">User List</a></li>
            </ul>
          </li>
          <!--li.header.nav-item user interface-->
        </ul>
        <!-- END SITE MAINMENU-->
      </nav>
    </div>