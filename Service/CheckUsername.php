<?php
require_once __DIR__ . "/../Repository/GetConnection.php";

function checkUsername(string $username): bool
{
    $connection = getConnection();
    $sql = "SELECT username FROM users WHERE username = :username";
    $statement = $connection->prepare($sql);
    $statement->bindParam("username", $username);
    $statement->execute();
    $result = $statement->fetch();

    if ($result) {
        return true;
    } else {
        return false;
    }
}
