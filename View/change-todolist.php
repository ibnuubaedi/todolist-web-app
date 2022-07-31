<?php
require_once __DIR__ . "/../Service/ShowTodoList.php";
require_once __DIR__ . "/../Service/ChangeTodoList.php";

if (!isset($_GET['id'])) {
  header('Location: /TodolistApp/View/index.php');
  exit();
}

$id = $_GET['id'];
$todolist = showTodolist($id);

if (isset($_POST['submit'])) {
  if ($_POST['change'] != "") {
    $todolist = htmlspecialchars($_POST['change']);
    changeTodoList($id, $todolist);
    header('Location: index.php');
    exit();
  } else {
    header('Location: index.php');
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Naya's Todolist</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
</head>

<body>
  <!-- Start Header -->
  <div class="container w-50 p-3 mt-5 text-center text-white bg-primary rounded">
    <h1>Naya's Todolist</h1>
  </div>
  <!-- End Header -->

  <!-- Start Form -->
  <div class="container p-3 w-50 mt-3">
    <form method="POST">
      <div class="input-group">
        <input type="text" name="change" class="form-control" value="<?= $todolist['todolist'] ?>">
        <button class="btn btn-success" type="submit" name="submit">Change</button>
      </div>
    </form>
  </div>
  <!-- End Form -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>