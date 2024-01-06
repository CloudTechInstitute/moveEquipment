
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
		Worker Report
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

	<main class="main-content position-relative">
		<div class="row">
			<div class="col-12">
				<div class="p-3 m-3">

				</div>
			</div>
		</div>
		<!-- Navbar -->
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none  " id="navbarBlur" data-scroll="false">

			<div class="container-fluid py-1 px-3">
				<div class="row">
				<div class="col-9">
				<nav aria-label="breadcrumb">
					<h4 class="font-weight-bolder text-white mb-0 text-uppercase">Workers Report</h4>

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
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Staff ID</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telephone</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gender</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of birth</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Duties</th>
											<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
											<th class="text-secondary opacity-7"></th>
										</tr>
									</thead>

									<tbody>
										<?php
$sql = "SELECT * FROM workers_tbl ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        ?>
										<tr>
											<td>
												<div class="">
													<div>
                                                    <h6 class="m-2"><?php echo $row['fname'] . ' ' . $row['lname']; ?></h6>
														</h6>

													</div>
												</div>
											</td>
											<td>
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['staffID']; ?></p>

											</td>
											<td class="align-middle text-center text-sm">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['address']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['email']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['telephone']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['gender']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['dob']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['duties']; ?></p>
											</td>
											<td class="align-middle text-center">
												<p class="text-xs font-weight-bold mb-0"><?php echo $row['department']; ?></p>
											</td>
											<td class="align-middle">
											<button type="button" class="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" title="edit" style="border:none">
                                            <i class="fas fa-edit text-primary text-center"></i>
                                            </button>
                                            <button type="button" class="" title="delete" style="border:none">
                                            <i class="fas fa-trash-alt text-danger text-center"></i>
                                            </button>
											</td>
										</tr>
										<?php
}

} else {
    echo "No equipment moved.";
}

?>
										</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>
			</div>

			<footer class="footer pt-3  ">
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
						</div>
				</div>
			</footer>
		</div>
	</main>

	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        content will go here
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
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
