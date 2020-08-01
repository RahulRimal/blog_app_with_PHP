<?php include"includes/header.php";?>

<?php
  
  $db = new Database();

  // Create Query to dispaly information on table
  $query = "SELECT posts.*, categories.name FROM posts INNER JOIN categories ON posts.category = categories.id";

  //Fire Query
  $posts = $db->select($query);

  // Create query to get the categories id
  $query =  "SELECT * FROM categories";

  // Fire the Query
  $categories = $db->select($query);

?>
          <!-- ------------------ Content Here------------- -->

  <table class="table table-striped">
    <tr>
      <th>Post ID#</th>
      <th>Post Title</th>
      <th>Category</th>
      <th>Author</th>
      <th>Date</th>
    </tr>
    <?php while($post = $posts->fetch_assoc()):?>
    <tr>
      <td><?php echo $post['id'];?></td>
      <td><a href="edit_post.php?id=<?php echo $post['id'];?>"><?php echo $post['title'];?></a></td>
      <td><?php echo $post['name'];?></td>
      <td><?php echo $post['author'];?></td>
      <td><?php echo formatDate($post['date']);?></td>
    </tr>
    <?php endwhile;?>
    

  </table>

  <table class="table table-striped">
    <tr>
      <th>Category ID#</th>
      <th>Category Name</th>
    </tr>
    <?php while($category = $categories->fetch_assoc()):?>
    <tr>
      <td><?php echo $category['id'];?></td>
      <td><a href="edit_category.php?id=<?php echo $category['id'];?>"><?php echo $category['name'];?></a></td>
    </tr>
  <?php endwhile;?>
    

  </table>

<?php include"includes/footer.php";?>