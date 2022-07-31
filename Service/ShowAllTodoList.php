<?php

require_once __DIR__ . "/../Repository/GetConnection.php";

function showAllTodoList(): array
{
    $conn = getConnection();

    $sql = "SELECT * FROM todolist";
    $result = $conn->query($sql);
    $statement = $result->fetchAll();

    $conn = null;

    return $statement;
}
