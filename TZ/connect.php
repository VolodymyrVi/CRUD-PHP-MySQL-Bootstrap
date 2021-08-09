<?php

$host = 'localhost';
$login = 'phpprogr_mrfish';
$password = 'mrfish';
$db_name = 'phpprogr_mrfish';


$mysqli = new mysqli($host, $login, $password, $db_name) or 
                    die(mysqli_error($mysqli));


/* echo getcwd();
 */