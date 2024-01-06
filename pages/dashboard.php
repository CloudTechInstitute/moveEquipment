<?php
$conn = mysqli_connect("localhost", "root", "", "equipments_db");
session_start();
if (!isset($_SESSION['username'])) {
    header('location:sign-in.php');
    exit;
} else {
    $user = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<title>
		Dashboard
	</title>
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<!-- Nucleo Icons -->
	<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
	<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
	<!-- CSS Files -->
	<link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
	<div class="min-height-300 bg-primary position-absolute w-100"></div>

	<?php include 'aside.php';?>
	<main class="main-content position-relative border-radius-lg ">
		<!-- Navbar -->
		<?php include 'navbar.php';?>
		<!-- End Navbar -->
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-6 col-xl-3 col-md-6 mb-xl-0 mb-4">
					<div class="card">
						<a href="equipments.php">
							<div class="card-body p-3">
								<div class="row">
									<div class="col-8">
										<div class="numbers">
											<p class="d-none d-md-block text-sm mb-0 text-uppercase font-weight-bold">Total Equipment</p>
											<?php
$query = "SELECT COUNT(*) FROM `equipment`";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);
$total = $row[0];
echo '<h3 class="font-weight-bolder">' . $total . '</h3>';
?>

										</div>
									</div>
									<div class="col-4 text-end">
										<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
											<i class="ni ni-settings-gear-65 text-lg opacity-10" aria-hidden="true"></i>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-6 col-xl-3 col-md-6 mb-xl-0 mb-4">
					<div class="card">
						<a href="users.php">
							<div class="card-body p-3">
								<div class="row">
									<div class="col-8">
										<div class="numbers">
											<p class="d-none d-md-block text-sm mb-0 text-uppercase font-weight-bold">Total System Users</p>
											<h3 class="font-weight-bolder">
												<?php
$query = "SELECT COUNT(*) FROM `users`";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);
$total = $row[0];
echo $total;
?>
											</h3>


										</div>
									</div>
									<div class="col-4 text-end">
										<div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
											<i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-6 col-xl-3 col-md-6 mb-xl-0 mb-4">
					<div class="card">
						<a href="all-equipment.php">
							<div class="card-body p-3">
								<div class="row">
									<div class="col-8">
										<div class="numbers">
											<p class="d-none d-md-block text-sm mb-0 text-uppercase font-weight-bold">Equipment Moved</p>
											<h3 class="font-weight-bolder">
												<?php
$query = "SELECT COUNT(*) FROM `movements_tbl`";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);
$total = $row[0];
echo $total;
?>
											</h3>

										</div>
									</div>
									<div class="col-4 text-end">
										<div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
											<i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-6 col-xl-3 col-md-6 mb-xl-0 mb-4">
					<div class="card">
						<a href="departments.php">
							<div class="card-body p-3">
								<div class="row">
									<div class="col-8">
										<div class="numbers">
											<p class="d-none d-md-block text-sm mb-0 text-uppercase font-weight-bold">Departments</p>
											<h3 class="font-weight-bolder">
												<?php
$query = "SELECT COUNT(*) FROM `departments`";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);
$total = $row[0];
echo $total;
?>
											</h3>

										</div>
									</div>
									<div class="col-4 text-end">
										<div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
											<i class="ni ni-building text-lg opacity-10" aria-hidden="true"></i>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-6 col-xl-3 col-md-6 mb-xl-0 mb-4">
					<div class="card">
						<a href="departments.php">
							<div class="card-body p-3">
								<div class="row">
									<div class="col-8">
										<div class="numbers">
											<p class="d-none d-md-block text-sm mb-0 text-uppercase font-weight-bold">Students</p>
											<h3 class="font-weight-bolder">
												<?php
$query = "SELECT COUNT(*) FROM `students_tbl`";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);
$total = $row[0];
echo $total;
?>
											</h3>

										</div>
									</div>
									<div class="col-4 text-end">
										<div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
											<i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-6 col-xl-3 col-md-6 mb-xl-0 mb-4">
					<div class="card">
						<a href="departments.php">
							<div class="card-body p-3">
								<div class="row">
									<div class="col-8">
										<div class="numbers">
											<p class="d-none d-md-block text-sm mb-0 text-uppercase font-weight-bold">Workers</p>
											<h3 class="font-weight-bolder">
												<?php
$query = "SELECT COUNT(*) FROM `workers_tbl`";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);
$total = $row[0];
echo $total;
?>
											</h3>

										</div>
									</div>
									<div class="col-4 text-end">
										<div class="icon icon-shape bg-gradient-secondary shadow-warning text-center rounded-circle">
											<i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
</div>
			<div class="row mt-4 p-4">
				<div class="col-lg-7 mb-lg-0 mb-4">
					<div class="card ">

						<div class="card-header pb-0 p-3">
							<div class="d-flex justify-content-between">
								<h6 class="mb-2">Recent Movements</h6>
							</div>
						</div>
						<div class="table-responsive">
							<?php
$sql = "SELECT * FROM movements_tbl ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        ?>
							<table class="table align-items-center">
								<tbody>
									<tr class="text-start ">
										<td class="w-30">
											<div class="d-flex px-2 py-1 align-items-center justify-content-start">
												<div>
													<img src="uploads/<?php echo $row['imgFile']; ?>  " alt="<?php echo $row['item']; ?>" class="w-50">
												</div>
												<div class="">
													<p class="text-xs font-weight-bold mb-0">Serial:</p>
													<h6 class="text-sm mb-0"><?php echo $row['serial']; ?></h6>
												</div>
											</div>
										</td>
										<td>
											<div class="text-start">
												<p class="text-xs font-weight-bold mb-0">Equipment:</p>
												<h6 class="text-sm mb-0"><?php echo $row['item']; ?></h6>
											</div>
										</td>
										<td>
											<div class="text-start">
												<p class="text-xs font-weight-bold mb-0">From:</p>
												<h6 class="text-sm mb-0"><?php echo $row['deptTaking']; ?></h6>
											</div>
										</td>
										<td>
											<div class="text-start">
												<p class="text-xs font-weight-bold mb-0">To:</p>
												<h6 class="text-sm mb-0"><?php echo $row['deptReceiving']; ?></h6>
											</div>
										</td>
										<td class="align-middle text-sm">
											<div class="col text-start">
												<p class="text-xs font-weight-bold mb-0">Date:</p>
												<h6 class="text-sm mb-0"><?php echo $row['date']; ?></h6>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
							<?php
}

} else {
    echo "No equipment moved.";
}

?>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="card">
						<div class="card-header pb-0 p-3">
							<h6 class="mb-0">Summary</h6>
						</div>
						<div class="card-body p-3">
							<ul class="list-group">
								<a href="equipments.php">
									<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
										<div class="d-flex align-items-center">
											<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
												<i class="ni ni-mobile-button text-white opacity-10"></i>
											</div>
											<div class="d-flex flex-column">
												<h6 class="mb-1 text-dark text-sm">Equipments</h6>
												<span class="text-xs">
													<?php
$query = "SELECT COUNT(*) FROM `equipment`";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);
$total = $row[0];
echo $total;
?> in total, <span class="font-weight-bold"><?php
$query = "SELECT COUNT(*) FROM `movements_tbl`";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);
$total = $row[0];
echo $total;
?> moved</span></span>
											</div>
										</div>
										<div class="d-flex">
											<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
										</div>
									</li>
								</a>
								<a href="authorizations.php">
									<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
										<div class="d-flex align-items-center">
											<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
												<i class="ni ni-tag text-white opacity-10"></i>
											</div>
											<div class="d-flex flex-column">
												<h6 class="mb-1 text-dark text-sm">Authorizations</h6>
												<span class="text-xs">Names and equipments</span>
											</div>
										</div>
										<div class="d-flex">
											<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
										</div>
									</li>
								</a>
								<a href="defects.php">
									<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
										<div class="d-flex align-items-center">
											<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
												<i class="ni ni-box-2 text-white opacity-10"></i>
											</div>
											<div class="d-flex flex-column">
												<h6 class="mb-1 text-dark text-sm">With Defects</h6>
												<span class="text-xs">
													<?php
$query = "SELECT COUNT(*) FROM `movements_tbl` WHERE defect = 'yes'";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);
$total = $row[0];
echo $total;
?> with defects... Click to check</span>
											</div>
										</div>
										<div class="d-flex">
											<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
										</div>
									</li>
								</a>
								<a href="assessments.php">
									<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
										<div class="d-flex align-items-center">
											<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
												<i class="ni ni-box-2 text-white opacity-10"></i>
											</div>
											<div class="d-flex flex-column">
												<h6 class="mb-1 text-dark text-sm">Worker Assessment</h6>
												<span class="text-xs">
													<?php
$query = "SELECT COUNT(*) FROM `assessment`";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);
$total = $row[0];
echo $total;
?> Assessment(s)... Click to check</span>
											</div>
										</div>
										<div class="d-flex">
											<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
										</div>
									</li>
								</a>

							</ul>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer pt-3 fixed-bottom">
				<div class="container-fluid">
					<div class="row align-items-center justify-content-lg-between">
						<div class="col-lg-6 mb-lg-0 mb-4">
							<div class="copyright text-center text-sm text-muted text-lg-start">
								© <script>
									document.write(new Date().getFullYear())

								</script>,
								All Rights Reserved
							</div>
						</div>
						<div class="col-lg-6">
							<ul class="nav nav-footer justify-content-center justify-content-lg-end">

							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</main>
	<!--   Core JS Files   -->
	<?php include 'jsScripts.php';?>
</body>

</html>
