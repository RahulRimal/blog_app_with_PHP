<?php include"includes/header.php";?>
<?php

	$id = $_GET['id'];
	
	$db = new Database();

	$query = "SELECT * FROM `posts` WHERE id = $id";

	$post = $db->select($query)->fetch_assoc();

	// Create Query
	$query = "SELECT * FROM `categories`";

	//Run Query
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
			$query =  "UPDATE `posts` SET title = '$title', body = '$body', category = '$category', author = '$author', tags = '$tags' WHERE id = $id";

			$updateRow = $db->update($query);
		}

	}
?>

<?php
	if(isset($_POST['delete']))
	{
			$query =  "DELETE FROM `posts` WHERE id = $id";

			$deleteRow = $db->delete($query);

	}
?>

	<form role="form" method="POST" action="edit_post.php?id=<?php echo $id;?>">
	  <div class="form-group">
	    <label>Post Title</label>
	    <input name="title" type="text" class="form-control" placeholder="Enter post title" value="<?php echo $post['title'];?>">
	    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
	  </div>
	  <div class="form-group">
	    <label>Post Body</label>
	    <textarea name="body" class="form-control" placeholder="Enter post body"><?php echo $post['body'];?></textarea>
	    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
	  </div>
	  <div class="form-group">
	    <label>Category</label>
	    <select name="category" class="form-control">
	    	<?php while($category = $categories->fetch_assoc()):?>
	    		<?php

	    			if($category['id']==$post['category'])
	    				$isSelected = 'selected';
	    			else
	    				$isSelected = '';
	    		?>
	    	<option value="<?php echo $category['id']?>"> <?php echo $isSelected;?><?php echo $category['name'];?></option>
	    <?php endwhile;?>
	    </select>
	  </div>
	  <div class="form-group">
	    <label>Author</label>
	    <input name="author" type="text" class="form-control" placeholder="Enter Author Name" value="<?php echo $post['author'];?>">
	    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
	  </div>
	  <div class="form-group">
	    <label>Tags</label>
	    <input name="tags" type="text" class="form-control" placeholder="Enter Tags" value="<?php echo $post['tags'];?>">
	    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
	  </div>
	  <div>
	  	<button type="submit" name="submit" class="btn btn-success">Submit</button>
	  	<a href="index.php" class="btn btn-primary">Cancel</a>
	  	<button type="submit" name="delete" class="btn btn-danger">Delete</button>
	  </div>
	  <br>
	</form>



<?php include"includes/footer.php";?>