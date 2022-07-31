<?php

require_once __DIR__ . "/../Repository/GetConnection.php";

function showTodolist(int $id): array
{
    $conn = getConnection();

    $sql = "SELECT todolist FROM todolist WHERE id = $id";

    $statement = $conn->query($sql);

    $result = $statement->fetch();

    $conn = null;

    return $result;
}
