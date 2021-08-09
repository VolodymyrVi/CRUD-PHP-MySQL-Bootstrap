<?php session_start();
require('/home/phpprogr/domains/phpprogrammer.in.ua/public_html/test/connect.php');
$result = $mysqli->query("SELECT * FROM partners") or die($mysqli->error);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM partners WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";
    header('Location: /');
} else {
}
$sort_list = array(
	'id_asc'   => '`id`',
	'id_desc'  => '`id` DESC',
	'name_asc'  => '`name`',
	'name_desc' => '`name` DESC',
	'surname_asc'  => '`surname`',
	'surname_desc' => '`surname` DESC',
	'total_hours_asc'   => '`total_hours`',
	'total_hours_desc'  => '`total_hours` DESC',
	'status_asc'   => '`status`',
	'status_desc'  => '`status` DESC',   
);
$sort = @$_GET['sort'];
if (array_key_exists($sort, $sort_list)) {
	$sort_sql = $sort_list[$sort];
} else {
	$sort_sql = reset($sort_list);
}


$sth = $mysqli->prepare("SELECT * FROM `partners` ORDER BY {$sort_sql}");

/* Функция вывода ссылок */
function sort_link_th($title, $a, $b) {
	$sort = @$_GET['sort'];
 
	if ($sort == $a) {
		return '<a class="active" href="?sort=' . $b . '">' . $title . ' <i>▲</i></a>';
	} elseif ($sort == $b) {
		return '<a class="active" href="?sort=' . $a . '">' . $title . ' <i>▼</i></a>';  
	} else {
		return '<a href="?sort=' . $a . '">' . $title . '</a>';  
	}
}




$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$result = $mysqli->query("SELECT * FROM partners ORDER BY {$sort_sql} LIMIT $start, $limit");
$partners = $result->fetch_all(MYSQLI_ASSOC);

$result1 = $mysqli->query("SELECT count(id) AS id FROM partners");
$custCount = $result1->fetch_all(MYSQLI_ASSOC);
$total = $custCount[0]['id'];
$pages = ceil($total / $limit);

$Previous = $page - 1;
$Next = $page + 1;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />

    <title>Результат тестового завдання</title>
</head>

<body class=" bg-light">

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="nav nav-pills ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">List Partners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/create.php">Add Partner</a>
                </li>

            </ul>
        </nav>

        <h1 class="text-primary text-center">List all partners</h1>


        <div class="row justify-content-center">

            <table id="" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th><?php echo sort_link_th('Id', 'id_asc', 'id_desc'); ?></th>
                        <th><?php echo sort_link_th('Name', 'name_asc', 'name_desc'); ?></th>
                        <th><?php echo sort_link_th('Surname', 'surname_asc', 'surname_desc'); ?></th>
                        <th><?php echo sort_link_th('Total Hours', 'total_hours_asc', 'total_hours_desc'); ?></th>
                        <th><?php echo sort_link_th('Status', 'status_asc', 'status_desc'); ?></th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($partners as $partner) :  ?>
                        <tr>
                            <td><?php echo $partner['id'] ?></td>
                            <td><?php echo $partner['name'] ?></td>
                            <td><?php echo $partner['surname'] ?></td>
                            <td><?php echo $partner['total_hours'] ?></td>
                            <td><?php
                                if ($partner['status'] == 0) {
                                    echo 'Not available';
                                } else {
                                    echo 'Available';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $partner['id']; ?>" class="btn btn-info">Edit</a>
                                <a href="index.php?delete=<?php echo $partner['id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <a href="create.php" class="btn btn-success adding btn-lg">Add New Partner</a>

            <div class="row mt-3">

                <div class="col-md-8">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="index.php?page=<?= $Previous; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo; Previous</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $pages; $i++) : ?>
                                <li class="page-item"><a href="index.php?page=<?= $i; ?>" class="page-link"><?= $i; ?></a></li>
                            <?php endfor; ?>
                            <li class="page-item">
                                <a href="index.php?page=<?= $Next; ?>" aria-label="Next" class="page-link">
                                    <span aria-hidden="true">Next &raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="col-md-4 text-center">
                    <form class="" method="post" action="#">
                        <select class="rounded border border-bottom bg-light" name="limit-records" id="limit-records">
                            <option disabled="disabled" selected="selected">---Limit Records---</option>
                            <?php foreach ([10, 15, 20, 25] as $limit) : ?>
                                <option <?php if (isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                </div>
            </div>

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
    <!-- <?php var_dump($sort_sql); ?> -->

</body>

<script type="text/javascript">
    $(document).ready(function() {
        $("#limit-records").change(function() {
            $('form').submit();
        })
    })
</script>

</html>