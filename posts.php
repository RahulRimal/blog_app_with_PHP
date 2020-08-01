<?php include'includes/header.php';?>
<?php

  $db = new Database();
  
  if(isset($_GET['category']))
  {
    $category = $_GET['category'];

    //Select Query
    $query = "SELECT * FROM `posts` WHERE category = ".$category;

    //Fire Query
    $posts = $db->select($query);
  }
  else
  {
      //Select Query
      $query = "SELECT * FROM `posts`";

      //Fire Query
      $posts = $db->select($query);
  }

  // Create Query
  $query = "SELECT * FROM `categories`";

  //Run Query
  $categories = $db->select($query);

  if($posts):
?>
<?php while($post = $posts->fetch_assoc()):?>
<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $post['title'];?></h2>
            <p class="blog-post-meta"><?php echo formatDate($post['date']);?> by <a href="#"><?php echo $post['author'];?></a></p>
        <p><?php echo shortenText($post['body']);?></p>
        <a class="readmore" href="post.php?id=<?php echo urlencode($post['id']);?>">Read More</a>
          </div><!-- /.blog-post -->

<?php endwhile;?>
<?php else:?>
  <p>No Posts available yet !!</p>
<?php endif;?>
<?php include 'includes/footer.php'; ?>