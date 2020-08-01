<?php include"includes/header.php";?>

<?php
  $db = new Database();
  
  $id = $_GET['id'];

  // Create query to get the categories with id
  $query =  "SELECT * FROM categories WHERE id = $id";

  // Fire the Query
  $category = $db->select($query)->fetch_assoc();

?>

<?php
	if(isset($_POST['submit']))
	{
		$name = mysqli_real_escape_string($db->link, $_POST['name']);

		if($name == '')
		{
			$error = "Please fill out all required fields..";
		}
		else
		{
			$query =  "UPDATE `categories` SET name = '$name' WHERE id = $id";

			$updateRow = $db->update($query);
		}

	}
?>

<?php
	if(isset($_POST['delete']))
	{
			$query =  "DELETE FROM `categories` WHERE id = $id";

			$deleteRow = $db->delete($query);

	}
?>

<form role="form" method="POST" action="edit_category.php?id=<?php echo $id;?>">
	  <div class="form-group">
	    <label>Category</label>
	    <input name="name" type="text" class="form-control" placeholder="Enter Category name" value="<?php echo $category['name'];?>">
	  </div>
	  <div>
	  	<button type="submit" name="submit" class="btn btn-primary">Submit</button>
	  	<a href="index.php" class="btn btn-primary">Cancel</a>
	  	<button type="submit" name="delete" class="btn btn-danger">Delete</button>
	  </div>
	  <br>
	</form>


<?php include"includes/footer.php";?>