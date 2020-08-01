<?php include"includes/header.php";?>

<?php
	$db = new Database();
	
	// Create query to get the categories id
  $query =  "SELECT * FROM categories";

  // Fire the Query
  $categories = $db->select($query);
?>

<?php
	if(isset($_POST['submit']))
	{
		$title = mysqli_real_escape_string($db->link, $_POST['title']);
		$body = mysqli_real_escape_string($db->link, $_POST['body']);
		$category = mysqli_real_escape_string($db->link, $_POST['category']);
		$author = mysqli_real_escape_string($db->link, $_POST['author']);
		$tags = mysqli_real_escape_string($db->link, $_POST['tags']);

		if($title == '' || $body == '' || $category == '' || $author == '')
		{
			$error = "Please fill out all required fields..";
		}
		else
		{
			$query =  "INSERT INTO `posts` (title, body, category, author, tags) VALUES ('$title', '$body', '$category', '$author', '$tags')";

			$insertRow = $db->insert($query);
		}

	}
?>

	<form role="form" method="POST" action="add_post.php">
	  <div class="form-group">
	    <label>Post Title</label>
	    <input name="title" type="text" class="form-control" placeholder="Enter post title">
	    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
	  </div>
	  <div class="form-group">
	    <label>Post Body</label>
	    <textarea name="body" class="form-control" placeholder="Enter post body"></textarea>
	    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
	  </div>
	  <div class="form-group">
	    <label>Category</label>
	    <select name="category" class="form-control">
	    	<?php while($category = $categories->fetch_assoc()):?>
	    	<option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
	    <?php endwhile;?>
	    </select>
	  </div>
	  <div class="form-group">
	    <label>Author</label>
	    <input name="author" type="text" class="form-control" placeholder="Enter Author Name">
	    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
	  </div>
	  <div class="form-group">
	    <label>Tags</label>
	    <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
	    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
	  </div>
	  <div>
	  	<button type="submit" name="submit" class="btn btn-primary">Submit</button>
	  	<a href="index.php" class="btn btn-danger">Cancel</a>
	  </div>
	  <br>
	</form>



<?php include"includes/footer.php";?>