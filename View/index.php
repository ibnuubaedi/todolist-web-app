<?php
require_once __DIR__ . "/../Service/ShowAllTodoList.php";
require_once __DIR__ . "/../Service/RemoveTodoList.php";
require_once __DIR__ . "/../Service/AddTodoList.php";
session_start();

if (isset($_SESSION['login']) != true) {
  header('Location: /TodolistApp/View/login.php');
  exit();
}

$error = false;
if (isset($_POST['add'])) {
  if ($_POST['add'] != "") {
    $todolist = htmlspecialchars($_POST['add']);
    addTodoList($todolist);
    header('Location: /TodolistApp/View/index.php');
    exit();
  } else {
    $error = "Todolist is can't blank!";
  }
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  removeTodoList($id);
  header('Location: /TodolistApp/View/index.php');
  exit();
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
    <!-- Start Alert -->
    <?php if ($error) { ?>
      <div class="p-2 alert alert-danger">
        <?php echo $error ?>
      </div>
    <?php } ?>
    <!-- End Alert -->
    <form method="POST">
      <div class="input-group">
        <input type="text" name="add" class="form-control" placeholder="Todolist">
        <button class="btn btn-success" type="submit">Add</button>
      </div>
    </form>
  </div>
  <!-- End Form -->

  <!-- Start Table-->
  <div class="container mt-1 p-3 w-50">
    <table class="table border table-hover text-center">
      <thead>
        <tr class="table-active">
          <th>#</th>
          <th>Todolist</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $number = 1;
        $todolist = showAllTodoList();
        foreach ($todolist as $todo) : ?>
          <tr>
            <td><?= $number++; ?></td>
            <td><?= $todo['todolist']; ?></td>
            <td>
              <a href="/TodolistApp/View/change-todolist.php?id=<?= $todo['id']; ?>" class="btn btn-success btn-sm" name="edit">Edit</a>
              <a href="/TodolistApp/View/index.php?id=<?= $todo['id']; ?>" class="btn btn-danger btn-sm" name="delete">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- End Table -->

  <!-- Start Button Logout-->
  <div class="container w-50">
    <a href="/TodolistApp/View/logout.php" class="btn btn-danger btn-sm btn-center" name="Logout">Logout</a>
  </div>
  <!-- End Button Logout-->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>