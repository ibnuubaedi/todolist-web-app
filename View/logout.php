<?php
session_start();
session_destroy();

header('Location: /TodolistApp/View/login.php');
exit();
