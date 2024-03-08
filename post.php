<?php
require "config/db.php";

$id = mysqli_real_escape_string($conn, $_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['title'], $_POST['body'], $_POST['author'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $author = $_POST['author'];

    $title = mysqli_real_escape_string($conn, $title);
    $body = mysqli_real_escape_string($conn, $body);
    $author = mysqli_real_escape_string($conn, $author);
  } else {
    echo "Error: Form fields not set.";
  }

  $upd = "UPDATE form SET Title='$title', Body='$body', Author='$author' WHERE ID=$id";
  $result = mysqli_query($conn, $upd);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
  $del = "DELETE FROM form WHERE ID = $id";
  if (mysqli_query($conn, $del)) {
    echo "Deleted successfully";
    header('Location: index.php');
    exit;
  } else {
    echo "Error deleting post: " . mysqli_error($conn);
  }
}
$query = "SELECT * FROM form WHERE ID = '$id'";
$result = mysqli_query($conn, $query);
$post = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);

?>
<form class="visible" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" method="post"> <input required
    type="search" name="title" id="title" placeholder="Title">
  <input required type="search" name="author" id="Author" placeholder="Author please">
  <textarea required name="body" id="body" cols="30" rows="10"></textarea>
  <input type="submit" value="Post">
</form>
<form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" method="post">
  <input class="btn btn-default" type="submit" value="Delete" name="delete">
</form>
<main>
  <div>
    <p>
    <h2><?php echo $post['Title'] ?></h2>
    <p><?php echo $post['Author'] ?> <?php echo $post['Time'] ?></p>
    </p>
    <p>
      <?php
      echo $post['Body'] ?></p>
    <input class="btn btn-default" type="button" value="Edit" onclick="                document.querySelector('form').classList.toggle('visible')
">

  </div>
</main>