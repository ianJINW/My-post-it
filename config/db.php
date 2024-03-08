<?php
$conn = new mysqli('localhost', 'root', 'qweras12zx', 'php-blog');

if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>DataBase SPA</title>
  <style>
    .visible {
      display: none;
    }

    body {
      background-color: lightslategray;
    }

    header {
      position: sticky;
      display: flex;
      flex-direction: row;
      justify-content: space-evenly;
      align-items: center;
    }

    header div {
      display: flex;
      flex-direction: row;
      justify-content: space-evenly;
      align-items: center;
    }

    main {
      overflow: scroll;
    }

    ::-webkit-scrollbar {
      display: none;
    }

    header h2 {
      color: aqua;
    }

    header div {
      display: flex;
      flex-direction: row;
    }

    form {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 2vh;
    }

    form input {
      border-radius: 10px;
      outline: 1px dotted lightslategray;
      max-width: 60vw;
    }

    main div {
      display: flex;
      flex-direction: column;
      border: 1px dotted lightslategray;
      justify-content: space-evenly;
      align-items: center;
    }
  </style>
</head>

<body>
  <header>
    <h2>Post It!! </h2>
    <div>
      <a class="btn btn-home" href="/phpsandbox\Full b\index.php">Home</a>
      <a class="btn btn-home" href="/">Contact</a>
      <input class="btn btn-home" type="button" value="Add post" id="post-btn" onclick="
                document.querySelector('form').classList.toggle('visible')
  ">
    </div>
  </header>