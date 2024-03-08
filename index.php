<?php require "config/db.php";

$form = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
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

  $sql = "INSERT INTO form (Title, Author, Body) VALUES ('$title', '$author', '$body')";
  // Execute the SQL query
  if (mysqli_query($conn, $sql)) {
    echo "Post added successfully.";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
$query = "SELECT * FROM form ORDER BY form . Author ASC";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $form = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
} else {
  echo "No post found.";
}
mysqli_close($conn);
?>
<form class="visible" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
  <input required type="search" name="title" id="title" placeholder="Title">
  <input required type="search" name="author" id="Author" placeholder="Author please">
  <textarea required name="body" id="body" cols="30" rows="10"></textarea>
  <input type="submit" value="Post">
</form>
<main>
  <?php foreach ($form as $post) : ?>
    <div>
      <p>
        <em>
          <h2><?php echo $post['Title'] ?></h2>
        </em>
        <em>
          <h4><?php echo $post['Author'] ?></h4> <?php echo $post['Time'] ?>
        </em>
      </p>
      <p>
        <a class="btn btn-default" href="post.php?id=<?php echo $post['ID']; ?>">
          Read more...
        </a>
      <?php endforeach; ?>
    </div>
</main>
</body>

</html>