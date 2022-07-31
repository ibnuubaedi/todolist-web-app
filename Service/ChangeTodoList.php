<?php

require_once __DIR__ . "/../Repository/GetConnection.php";

function changeTodoList($id, $todo): void
{
    $conn = getConnection();

    $sql = "UPDATE todolist SET todolist=:todo WHERE id=:id";
    $statement = $conn->prepare($sql);
    $statement->bindParam("id", $id);
    $statement->bindParam("todo", $todo);
    $statement->execute();

    $conn = null;
}
