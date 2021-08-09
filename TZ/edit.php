<?php
error_reporting(E_ALL);
require('/home/phpprogr/domains/phpprogrammer.in.ua/public_html/test/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


    <title>Edit partner</title>
</head>
<?php
$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM partners WHERE id=$id") or die($mysqli->error);
$partners = $result->fetch_all(MYSQLI_ASSOC);
?>

<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="nav nav-pills ">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">List Partners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/create.php">Add Partner</a>
                </li>
                
            </ul>
        </nav>

        <h1 class="text-center text-primary">Edit partner</h1>

        <div class="row justify-content-center align-items-center">
            <form class="col-md-6 col-md-offset-3" action="edit-api.php" method="POST">
            <?php foreach ($partners as $partner): ?>
                <div class="form-group mb-3" style="display:none">
                    <label class="font-weight-bold">Name</label> <br>
                    <input type="text" value="<?php echo $partner['id']; ?>" name="id" class="col-md-6 form-control-plaintext rounded border border-bottom bg-light" placeholder="" required>
                </div>
                <div class="form-group mb-3 ">
                    <label class="font-weight-bold">Name</label> <br>
                    <input type="text" value="<?php echo $partner['name']; ?>" name="name" class="col-md-6 form-controll rounded border border-bottom bg-light" placeholder="Enter name" required>
                </div>
                <div class="form-group mb-3 ">
                    <label class="font-weight-bold">Surname</label><br>
                    <input type="text" value="<?php echo $partner['surname']; ?>" name="surname" class="col-md-6 form-controll rounded border border-bottom bg-light " placeholder="Enter surname" required>
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Total Hours</label><br>
                    <input type="number" min="0" value="<?php echo $partner['total_hours']; ?>" name="total_hours" class="col-md-6 form-controll rounded border border-bottom bg-light" placeholder="Enter surname">
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Status <?php echo $partner['status']; ?></label><br>
                    <select value="0" class="custom-select bg-light" name="status" id="status">

                        <option value="1" <?= ($partner['status'] == 1)? "selected" : "" ?>>Available</option>
                        <option value="0" <?= ($partner['status'] == 0)? "selected" : "" ?>>Not available</option>
                    
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="update" value="update">Save</button>
            <?php endforeach; ?>
            </form>
        </div>

    </div>
    <div class="container my-5">
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: #929fba">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Links -->
                <section class="">
                    <!--Grid row-->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                Volodymyr Vi
                            </h6>
                            <p>
                                PHP Developer.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                            <p>
                                <a href="https://github.com/VolodymyrVi" target="_blank" class="text-white">GitHub</a>
                            </p>
                            <p>
                                <a href="https://phpprogrammer.in.ua" target="_blank" class="text-white">Portfolio PHP</a>
                            </p>
                            <p>
                                <a class="text-white">Portfolio Laravel</a>
                            </p>

                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                            <p><i class="fas fa-home mr-3"></i> Zhytomyr, 10012, Ukraine</p>
                            <a href="mailto:sqlphpjs@gmail.com" style="text-decoration: none; color:white"><i class="fas fa-envelope mr-3"></i> sqlphpjs@gmail.com</a><br>
                            <a href="tel:+380970267764" style="text-decoration: none; color:white"><i class="mt-3 fas fa-phone mr-3"></i>+380970267764</a>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>
                            <!-- Linkedin -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="https://www.linkedin.com/in/vlodymyrvi/" target="_blank" role="button"><i class="fab fa-linkedin-in"></i></a>
                            <!-- Github -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="https://github.com/VolodymyrVi" target="_blank" role="button"><i class="fab fa-github"></i></a>
                            <!-- Telegram -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="https://t.me/VolodymyrVi" target="_blank" role="button"><i class="fab fa-telegram"></i></a>
                        </div>
                    </div>
                    <!--Grid row-->
                </section>
                <!-- Section: Links -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2021 Copyright:
                <a class="text-white" href="https://phpprogrammer.in.ua">VolodymyrVi</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
    <!-- End of .container -->
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</html>