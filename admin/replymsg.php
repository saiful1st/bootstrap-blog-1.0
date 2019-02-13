<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
	if (!isset($_GET['replymsgid']) && $_GET['replymsgid'] == NULL) {
		echo "<script>window.location = 'inbox.php';</script>";
	}else{
		$replymsgid = $_GET['replymsgid'];
	}
?>
<div class="container">
<div class="main-wrapper">
	<h2>View Message</h2>
	<div class="view-wrapper">
		<?php
		if (isset($_GET['replymsgid'])) {
			$msgId = $_GET['replymsgid'];
			$query = "SELECT * FROM contact_table WHERE id='$msgId'";
			$viewmsg = $database->select($query);
			if ($viewmsg) {
				while ($result = $viewmsg->fetch_assoc()) {
		?>
	<div class="card-group">
	  <div class="card">
	  	 <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              	$toemail = $format->validate($_POST['toemail']);
              	$fromemail = $format->validate($_POST['fromemail']);
              	$subject = $format->validate($_POST['subject']);
              	$message = $format->validate($_POST['message']);

              	$sendMail = mail($to, $subject, $message, $fromemail);
              	if ($sendMail) {
              		echo "<p>Message sent successfully</p>";
              	}else{
              		echo "<p>Message could not sent</p>";
              	}
            }
        ?>
	  	<form action="" method="post">

            <div class="form-group">
              <label for="exampleInputEmail1">To</label>
              <input name="email" type="toemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['email'] ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">From</label>
              <input name="email" type="fromemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email address">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Subject</label>
              <input name="subject" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Subject">
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Message</label>
              <textarea name="message" class="form-control" id="exampleFormControlTextarea1" placeholder="Write your message" rows="8"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>

        </form>
	  </div>
	</div>
<?php }}} ?>
</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>