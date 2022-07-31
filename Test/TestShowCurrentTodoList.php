<?php

require_once __DIR__ . "/../Service/ShowCurrentTodoList.php";

$currentTodolist = showCurrentTodolist(26);

var_dump($currentTodolist);
