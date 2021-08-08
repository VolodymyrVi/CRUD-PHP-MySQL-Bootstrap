<?php

$host = 'localhost';
$login = 'root';
$password = 'root';
$db_name = 'mrfish';


$mysqli = new mysqli($host, $login, $password, $db_name) or 
                    die(mysqli_error($mysqli));
