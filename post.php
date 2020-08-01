<?php include 'includes/header.php'; ?>
<?php
	$db = new Database();

	$id = $_GET['id'];
	
	//Select Query
	$query = "SELECT * FROM `posts` WHERE id=".$id;

	//Fire Query
	$post = $db->select($query)->fetch_assoc();

	// Create Query
  $query = "SELECT * FROM `categories`";

  //Run Query
  $categories = $db->select($query);
?>
<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $post['title'];?></h2>
            <p class="blog-post-meta"><?php echo formatDate($post['date']);?> by <a href="#"><?php echo $post['author'];?></a></p>
				<p><?php echo $post['body'];?></p>
          </div><!-- /.blog-post -->
<?php include 'includes/footer.php'; ?>