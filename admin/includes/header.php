<?php include"../config/config.php";?>
<?php include"../libraries/database.php";?>
<?php include"../helpers/format_helper.php";?>

<?php
  // Creating the database object
  $db = new Database();


  // Create Query
  $query = "SELECT * FROM `posts`";

  //Run Query
  $posts = $db->select($query);

  // Create Query
  $query = "SELECT * FROM `categories`";

  //Run Query
  $categories = $db->select($query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="../css/custom.css" rel="stylesheet">
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Dashboard</a>
          <a class="blog-nav-item" href="add_post.php">Add Post</a>
          <a class="blog-nav-item" href="add_category.php">Add Category</a>
          <a class="blog-nav-item" href="posts.php">Visit Blog</a>
        </nav>
      </div>
    </div>

    <div class="container">
      <div class="blog-header">
		<div class="logo"><img src="../images/logo.png" /></div>
        <h1 class="blog-title">PHP Lovers Blog</h1>
        <p class="lead blog-description">PHP News, tutorials, videos & more</p>
        <h2 class="text-center">Admin Area</h2>
      </div>

      <div class="row">

        <div class="col-sm-12 blog-main">