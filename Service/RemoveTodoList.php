<?php

require_once __DIR__ . "/../Repository/GetConnection.php";

function removeTodoList(int $id): void
{
    $conn = getConnection();

    $sql = "DELETE FROM todolist WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->bindParam("id", $id);
    $statement->execute();

    $conn = null;
}
