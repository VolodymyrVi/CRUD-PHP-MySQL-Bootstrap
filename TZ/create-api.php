<?php
require('/OpenServer/domains/mr.fish/TZ/connect.php');
/* $mysqli = new mysqli('localhost', 'root', 'root', 'mrfish') or die(mysqli_error($mysqli));
 */
if (isset($_POST['save'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $totalHours = $_POST['total_hours'];
    if ($totalHours == Null) {
        $totalHours = 0;
    }
    $status = $_POST['status'];
}
$mysqli->query("INSERT INTO partners (name, surname, total_hours, status) VALUES('$name', '$surname', '$totalHours', '$status')") or
    die($mysqli->error);
header('Location: /TZ/');