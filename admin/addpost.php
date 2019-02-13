<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="container">
<div class="main-wrapper">
<div class="view-wrapper">
<h2>Add New Post</h2>
<div class="block">
    <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $title = mysqli_real_escape_string($database->connection, $_POST['title']);
            $category = mysqli_real_escape_string($database->connection, $_POST['category']);
            $date = mysqli_real_escape_string($database->connection, $_POST['date']);
            $body = mysqli_real_escape_string($database->connection, $_POST['body']);
            $tags = mysqli_real_escape_string($database->connection, $_POST['tags']);
            $author = mysqli_real_escape_string($database->connection, $_POST['author']);

            // image file validation
            $permitted = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;

            if ($title == "" || $category == "" || $date == "" || $body == "" || $tags == "" || $author == "" || $file_name == "") {
                echo "<p class='error' style='color: red;'>Fiels must not be empty</p>";
            }elseif ($file_size > 1048567) {
                echo "<p class='error' style='color: red;'>Image size should be less than 1mb</p>";
            }elseif (in_array($file_ext, $permitted) == false) {
                echo "<p class='success' style='color: red;'>You can upload only:-".implode(', ', $permitted)."</p>";
            }else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO post_table(category, title, body, image, author, tags, date) VALUES('$category','$title','$body','$uploaded_image', '$author', '$tags', '$date')";
                $inserted_rows = $database->insert($query);
                if ($inserted_rows) {
                    echo "<p class='error' style='color: green;'>Post Inserted successfully</p>";
                }else{
                    echo "<p class='error' style='color: red;'>Post not inserted successfully</p>";
                }
            }
        }

    ?>
	<form action="" method="post" enctype="multipart/form-data">
        <table class="form">
           
            <tr class="col-sm">
                <td>
                    <label>Title</label>
                </td>
                <td>
                    <input name="title" type="text" class="medium" placeholder="Post Title Please" />
                </td>
            </tr>
         
            <tr>
                <td>
                    <label>Category</label>
                </td>
                <td>
                    <select id="select" name="category">
                        <option>Select Category</option>
                        <?php
                        	$query = "SELECT * FROM category_data";
                        	$category_data = $database->select($query);
                        	if ($category_data) {
                        		while ($result = $category_data->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>
                    <?php }} ?>
                    </select>
                </td>
            </tr>
        
            <tr>
                <td>
                    <label>Date Picker</label>
                </td>
                <td>
                    <input name="date" type="text" id="basic_example_1" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Upload Image</label>
                </td>
                <td>
                    <input name="image" type="file" />
                    
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding-top: 9px;">
                    <label>Content</label>
                </td>
                <td>
                    <textarea name="body" class="tinymce"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Tags</label>
                </td>
                <td>
                    <input name="tags" type="text" id="" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Author</label>
                </td>
                <td>
                    <input name="author" type="text" id="" placeholder="Author name"/>
                </td>
            </tr>
			<tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Save" />
                </td>
            </tr>
        </table>
    </form>
</div>
</div>
</div>
</div>
<script type="text/javascript">
	$('#basic_example_1').datetimepicker();
</script>
<?php include 'inc/footer.php'; ?>