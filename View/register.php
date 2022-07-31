<?php
require_once __DIR__ . "/../Service/AddUser.php";
require_once __DIR__ . "/../Service/CheckUsername.php";

$error = false;
if (isset($_POST['register'])) {
    if (trim($_POST['fullname']) !== "" && trim($_POST['username']) !== "" && trim($_POST['password']) !== "") {
        $username = trim($_POST['username']);
        $username = str_replace(" ", "", $username);
        $checkUsername = checkUsername($username);
        if (!$checkUsername) {
            $fullname = htmlspecialchars($_POST['fullname']);
            $username = htmlspecialchars($_POST['username']);
            $username = str_replace(" ", "", $username);
            $password = htmlspecialchars($_POST['password']);
            addUser($fullname, $username, $password);
            header('Location: login.php');
            exit();
        } else {
            $error = "Username can exist!";
        }
    } else {
        $error = "Fullname, Username, or Password is can't blank!";
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
        <h1>Register Naya's Todolist</h1>
    </div>
    <!-- End Header -->

    <!-- Start Form -->
    <div class="container p-3 w-50 mt-3">
        <!-- Start Alert-->
        <?php if ($error) { ?>
            <div class="p-2 alert alert-danger">
                <?php echo $error ?>
            </div>
        <?php } ?>
        <!-- End Alert-->
        <form class="p-3 border" action="register.php" method="POST">
            <div class="mb-3 mt-3">
                <label for="fullname" class="form-label">Fullname:</label>
                <input type="fullname" class="form-control" id="fullname" placeholder="Enter fullname" name="fullname">
            </div>
            <div class="mb-3 mt-3">
                <label for="username" class="form-label">Username:</label>
                <input type="username" class="form-control" id="username" placeholder="Enter username" name="username">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            </div>
            <div class="mb-3 mt-3">
                <p>Have an account? <a href="login.php">Login</a></p>
            </div>
            <button type="submit" class="btn btn-success" name="register">Register</button>
        </form>
    </div>
    <!-- End Form -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>