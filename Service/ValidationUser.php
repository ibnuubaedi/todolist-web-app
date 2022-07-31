<?php
require_once __DIR__ . "/../Repository/GetConnection.php";

function validationUser(string $username, string $password): bool
{
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $statement = $conn->prepare($sql);
    $statement->bindParam("username", $username);
    $statement->bindParam("password", $password);
    $statement->execute();
    $result = $statement->fetch();

    if ($result) {
        return true;
    } else {
        return false;
    }
}
