<?php

require_once __DIR__ . "/../Repository/GetConnection.php";

function addTodoList(string $todo): void
{
    $conn = getConnection();

    $sql = "INSERT INTO todolist (todolist) VALUES (:todo)";
    $statement = $conn->prepare($sql);
    $statement->bindParam("todo", $todo);
    $statement->execute();

    $conn = null;
}
