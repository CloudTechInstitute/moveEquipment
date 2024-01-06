
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
		Movement Report
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

<body class="g-sidenav-show   bg-gray-100">
	<div class="min-height-300 bg-primary position-absolute w-100"></div>
	<?php include 'aside.php';?>

	<main class="main-content position-relative border-radius-lg ">
		<div class="row">
			<div class="col-12">
				<div class="p-3 m-3">

				</div>
			</div>
		</div>
		<!-- Navbar -->
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">

			<div class="container-fluid py-1 px-3">
			<div class="row">
				<div class="col-9">
				<nav aria-label="breadcrumb">
					<h4 class="font-weight-bolder text-white mb-0 text-uppercase">Equipment with defects</h4>

				</nav>
				</div>
				<div class="col-3">
				<?php include 'navbar.php';?>
			</div>
			</div>
			</div>
		</nav>
		<!-- End Navbar -->
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-12">
					<div class="card mb-4">
						<div class="card-body px-0 pt-0 pb-2">
							<div class="table-responsive p-0">

								<table class="table align-items-center mb-0">
									<thead>
										<tr>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Worker</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Department</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">time</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Apperance</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">conduct</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">creativity</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">initiative</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">delivery</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">traffic drive</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">data entry</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">sponsorship</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">revenue gen</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">social media views</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">consistency</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">teamwork</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">total</th>
											<!-- <th class="text-secondary opacity-7"></th> -->
										</tr>
									</thead>
									<tbody>
										<?php
$sql = "SELECT * FROM assessment ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
										<tr>
											<td>
												<p class="text-xs font-weight-bold mb-0 text-center text-uppercase"><?php echo $row['assessmentName']; ?></p>

											</td>
											<td class="align-middle text-center text-sm">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['department']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['time']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['appearance']; ?></p>
											</td>

											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['conduct']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['creativity']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['initiative']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['delivery']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['traffic']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['dataEntry']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['sponsorship']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['revenue']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['social']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['consistency']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['teamwork']; ?></p>
											</td>
											<td class="align-middle">
                                                <p class="text-xs text-center font-weight-bold mb-0"><?php echo $row['teamwork'] + $row['consistency'] + $row['social'] + $row['revenue'] + $row['sponsorship'] + $row['dataEntry'] + $row['traffic'] + $row['delivery'] + $row['initiative'] + $row['creativity'] + $row['conduct'] + $row['appearance'] + $row['time']; ?></p>
											</td>
										</tr>
										<?php
}

} else {
    echo "No assessments yet";
}

?>
										</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>
			</div>

			<footer class="footer pt-3 fixed-bottom">
				<div class="container-fluid">
					<div class="row align-items-center justify-content-lg-around">
						<div class="col-lg-6 mb-lg-0 mb-4">
							<div class="copyright text-center text-sm text-muted text-lg-start">
								© <script>
									document.write(new Date().getFullYear())

								</script>,
								All Rights Reserved
							</div>
						</div>
						</div>
				</div>
			</footer>
		</div>
	</main>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
	<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
	<script>
		var win = navigator.platform.indexOf('Win') > -1;
		if (win && document.querySelector('#sidenav-scrollbar')) {
			var options = {
				damping: '0.5'
			}
			Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
		}

	</script>
	<!-- Github buttons -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
