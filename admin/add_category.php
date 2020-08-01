<?php include"includes/header.php";?>

<?php

	$db = new Database();

	if(isset($_POST['submit']))
	{
		$name = mysqli_real_escape_string($db->link, $_POST['name']);

		if($name == '')
		{
			$error = "Please fill out all required fields..";
		}
		else
		{
			$query =  "INSERT INTO `categories` (name) VALUES ('$name')";

			$insertRow = $db->insert($query);
		}

	}
?>

<form role="form" method="POST" action="add_category.php">
	  <div class="form-group">
	    <label>Category</label>
	    <input name="name" type="text" class="form-control" placeholder="Enter Category name">
	  </div>
	  <div>
	  	<button type="submit" name="submit" class="btn btn-primary">Submit</button>
	  </div>
	  <br>
	</form>


<?php include"includes/footer.php";?>