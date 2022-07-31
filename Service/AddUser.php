<?php
require_once __DIR__ . "/../Repository/GetConnection.php";

function addUser(string $fullname, string $username, string $password): void
{
    $connection = getConnection();
    $sql = "INSERT INTO users (fullname, username, password) VALUE (:fullname, :username, :password)";
    $statement = $connection->prepare($sql);
    $statement->bindParam("fullname", $fullname);
    $statement->bindParam("username", $username);
    $statement->bindParam("password", $password);
    $statement->execute();
    $connection = null;
}
