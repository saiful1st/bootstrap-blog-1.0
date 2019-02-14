<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
	if (!isset($_GET['viewUserId']) || $_GET['viewUserId'] == NULL) {
		echo "<script>window.location = 'userlist.php';</script>";
	}else{
		$viewUserId = $_GET['viewUserId'];
	}

?>
<div class="main-wrapper">
	<div class="view-wrapper">
		<h1 class="title-pen"> User Profile <span>UI</span></h1>
		<?php
			$query = "SELECT * FROM user_table WHERE id='$viewUserId'";
			$profileView = $database->select($query);
			if ($profileView) {
				while ($result = $profileView->fetch_assoc()) {
		?>
			<div class="user-profile">
				<img class="avatar" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTF_erFD1SeUnxEpvFjzBCCDxLvf-wlh9ZuPMqi02qGnyyBtPWdE-3KoH3s" alt="Ash" />
			    <div class="username"><?php echo $result['name']; ?></div>
			  <div class="bio">
			  	Role :
			  	<?php 
	            	if($result['role'] == 0){
	            		echo "Admin";
	            	}elseif($result['role'] == 1){ 
	            		echo "Author"; 
	            	}elseif($result['role'] == 2){
	            	 echo "Editor"; }; 
	            ?>
	           <ul class="">
			    <li>
			      <span class="entypo-heart"><?php echo $result['username']; ?></span>
			    </li>
			 </ul>
			 <ul class="">
			    <li>
			      <span class="entypo-eye"> <?php echo $result['email']; ?></span>
			    </li>
			 </ul>

			  </div>
			    <div class="description">
			    	<?php echo $result['details']; ?>
			  </div>
			  
			</div>
		<?php }} ?>
	</div>
</div>
<?php include 'inc/footer.php'; ?>