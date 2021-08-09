<?php
require('/home/phpprogr/domains/phpprogrammer.in.ua/public_html/test/connect.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $total_hours=$_POST['total_hours'];
    $status=$_POST['status'];

    $mysqli->query("UPDATE partners SET name='$name',surname='$surname',total_hours='$total_hours',status='$status' WHERE id=$id") or die($mysqli->mysqli_error);
    
}
header('Location: /');