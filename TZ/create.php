<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


    <title>Result Test Task</title>
</head>
<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'mrfish') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM partners") or die($mysqli->error);
?>

<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="nav nav-pills ">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/TZ/">List Partners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/TZ/create.php">Add Partner</a>
                </li>
                
            </ul>
        </nav>

        <h1 class="text-center">Add new partner</h1>

        <div class="row justify-content-center align-items-center">
            <form class="col-md-6 col-md-offset-3" action="create-api.php" method="POST">
                <div class="form-group mb-3 ">
                    <label class="font-weight-bold">Name</label> <br>
                    <input type="text" name="name" class="col-md-6 form-controll rounded border border-bottom bg-light" placeholder="Enter name" required>
                </div>
                <div class="form-group mb-3 ">
                    <label class="font-weight-bold">Surname</label><br>
                    <input type="text" name="surname" class="col-md-6 form-controll rounded border border-bottom bg-light " placeholder="Enter surname" required>
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Total Hours</label><br>
                    <input type="number" min="0" name="total_hours" class="col-md-6 form-controll rounded border border-bottom bg-light" placeholder="Enter surname">
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Status</label><br>
                    <select class="custom-select bg-light" name="status" id="status">
                        <option value="1">Available</option>
                        <option value="0">Not available</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="save">Save</button>

            </form>
        </div>

    </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</html>