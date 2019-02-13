<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
	if (!isset($_GET["postEditId"]) || $_GET["postEditId"] == NULL) {
		header("Location: postlist.php");
	}else{
		$viewPostId = $_GET["postEditId"];
	}
?>
<div class="container">
<div class="main-wrapper">
<div class="view-wrapper">
<h2>Add New Post</h2>
<div class="block">
	<?php
		$query = "SELECT * FROM post_table WHERE id='$viewPostId'";
		$getPost = $database->select($query);
		if ($getPost) {
			while ($postResult = $getPost->fetch_assoc()) {
	?>  
	<form action="" method="" enctype="multipart/form-data">
        <table class="form">
           
            <tr class="col-sm">
                <td>
                    <label>Title</label>
                </td>
                <td>
                    <input type="text" value="<?php echo $postResult['title'] ?>" class="medium" />
                </td>
            </tr>
         
            <tr>
                <td>
                    <label>Category</label>
                </td>
                <td>
                    <select id="select" name="select">
                        <option>Select Category</option>
                        <?php
                        	$query = "SELECT * FROM category_data";
                        	$category_data = $database->select($query);
                        	if ($category_data) {
                        		while ($result = $category_data->fetch_assoc()) {
                        ?>
                        <option 
						<?php
							if ($postResult['category'] == $result['id']) {?>
								selected="selected"
							<?php } ?>value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>
                    <?php }} ?>
                    </select>
                </td>
            </tr>
       
        
            <tr>
                <td>
                    <label>Date Picker</label>
                </td>
                <td>
                    <input type="text" id="basic_example_1" value="<?php echo $postResult['date'] ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Upload Image</label>
                </td>
                <td>
                    <input type="file" />
                    <img style="height: 200px; width: 200px" src="<?php echo $postResult['image'] ?>">
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding-top: 9px;">
                    <label>Content</label>
                </td>
                <td>
                    <textarea class="tinymce"><?php echo $postResult['body'] ?></textarea>
                </td>
            </tr>
			<tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Update" />
                </td>
            </tr>
        </table>
    </form>
<?php }} ?>
</div>
</div>
</div>
</div>
<script type="text/javascript">
	$('#basic_example_1').datetimepicker();
</script>
<?php include 'inc/footer.php'; ?>