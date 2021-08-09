<?php
require('/home/phpprogr/domains/phpprogrammer.in.ua/public_html/test/connect.php');

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
header('Location: /');