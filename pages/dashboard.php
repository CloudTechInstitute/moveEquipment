<?php
    $conn = mysqli_connect("localhost", "root", "", "equipments_db");
    session_start();
    if(!isset($_SESSION['username'])){
       header('location:sign-in.php');
       exit;
  } else{
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

<body class="g-sidenav-show   bg-gray-100">
	<div class="min-height-300 bg-primary position-absolute w-100"></div>

	<?php include('aside.php'); ?>
	<main class="main-content position-relative border-radius-lg ">
		<!-- Navbar -->
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
			<div class="container-fluid py-1 px-3">

				<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
					<div class="ms-md-auto pe-md-3 d-flex align-items-center">
						<div class="input-group">

						</div>
					</div>
					<ul class="navbar-nav  justify-content-end">
						<li class="nav-item d-flex align-items-center">
							<a href="javascript:;" class="nav-link text-white font-weight-bold px-0">

							</a>
						</li>
						<li class="nav-item d-xl-none ps-3 d-flex align-items-center">
							<a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line bg-white"></i>
									<i class="sidenav-toggler-line bg-white"></i>
									<i class="sidenav-toggler-line bg-white"></i>
								</div>
							</a>
						</li>
						<li class="nav-item px-3 d-flex align-items-center">
							<a href="javascript:;" class="nav-link text-white p-0">

							</a>
						</li>
						<li class="nav-item dropdown pe-2 d-flex align-items-center">
							<a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">

							</a>
							<ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">


							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End Navbar -->
		<div class="container-fluid py-4">
			<div class="row">

				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="card">
						<a href="equipments.php">
							<div class="card-body p-3">
								<div class="row">
									<div class="col-8">
										<div class="numbers">
											<p class="text-sm mb-0 text-uppercase font-weight-bold">Total Equipment</p>
											<?php
											$query = "SELECT COUNT(*) FROM `equipment`";
											$res = mysqli_query($conn, $query);
											$row = mysqli_fetch_array($res);
											$total = $row[0];
											echo '<h3 class="text-center">'.$total.'</h3>';
										?>

										</div>
									</div>
									<div class="col-4 text-end">
										<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
											<i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="card">
						<a href="users.php">
							<div class="card-body p-3">
								<div class="row">
									<div class="col-8">
										<div class="numbers">
											<p class="text-sm mb-0 text-uppercase font-weight-bold">Total Users</p>
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
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="card">
						<a href="all-equipment.php">
							<div class="card-body p-3">
								<div class="row">
									<div class="col-8">
										<div class="numbers">
											<p class="text-sm mb-0 text-uppercase font-weight-bold">Equip... Moved</p>
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
				<div class="col-xl-3 col-sm-6">
					<div class="card">
						<a href="departments.php">
							<div class="card-body p-3">
								<div class="row">
									<div class="col-8">
										<div class="numbers">
											<p class="text-sm mb-0 text-uppercase font-weight-bold">Departments</p>
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

			<div class="row mt-4">
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
                             while($row = mysqli_fetch_assoc($result)) {
                                  
                      	?>
							<table class="table align-items-center ">
								<tbody>
									<tr>
										<td class="w-30">
											<div class="d-flex px-2 py-1 align-items-center">
												<div>
													<img src="uploads/<?php echo $row['imgFile'];?>  " alt="Country flag" class="w-80 border-radius-lg shadow-sm">
												</div>
												<div class="ms-4">
													<p class="text-xs font-weight-bold mb-0">Serial:</p>
													<h6 class="text-sm mb-0"><?php echo $row['serial'];?></h6>
												</div>
											</div>
										</td>
										<td>
											<div class="text-center">
												<p class="text-xs font-weight-bold mb-0">Equipment:</p>
												<h6 class="text-sm mb-0"><?php echo $row['item'];?></h6>
											</div>
										</td>
										<td>
											<div class="text-center">
												<p class="text-xs font-weight-bold mb-0">From:</p>
												<h6 class="text-sm mb-0"><?php echo $row['deptTaking'];?></h6>
											</div>
										</td>
										<td>
											<div class="text-center">
												<p class="text-xs font-weight-bold mb-0">To:</p>
												<h6 class="text-sm mb-0"><?php echo $row['deptReceiving'];?></h6>
											</div>
										</td>
										<td class="align-middle text-sm">
											<div class="col text-center">
												<p class="text-xs font-weight-bold mb-0">Date:</p>
												<h6 class="text-sm mb-0"><?php echo $row['date'];?></h6>
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

							</ul>
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
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
	<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
	<script src="../assets/js/plugins/chartjs.min.js"></script>
	<script>
		var ctx1 = document.getElementById("chart-line").getContext("2d");

		var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

		gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
		gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
		gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
		new Chart(ctx1, {
			type: "line",
			data: {
				labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Mobile apps",
					tension: 0.4,
					borderWidth: 0,
					pointRadius: 0,
					borderColor: "#5e72e4",
					backgroundColor: gradientStroke1,
					borderWidth: 3,
					fill: true,
					data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
					maxBarThickness: 6

				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						display: false,
					}
				},
				interaction: {
					intersect: false,
					mode: 'index',
				},
				scales: {
					y: {
						grid: {
							drawBorder: false,
							display: true,
							drawOnChartArea: true,
							drawTicks: false,
							borderDash: [5, 5]
						},
						ticks: {
							display: true,
							padding: 10,
							color: '#fbfbfb',
							font: {
								size: 11,
								family: "Open Sans",
								style: 'normal',
								lineHeight: 2
							},
						}
					},
					x: {
						grid: {
							drawBorder: false,
							display: false,
							drawOnChartArea: false,
							drawTicks: false,
							borderDash: [5, 5]
						},
						ticks: {
							display: true,
							color: '#ccc',
							padding: 20,
							font: {
								size: 11,
								family: "Open Sans",
								style: 'normal',
								lineHeight: 2
							},
						}
					},
				},
			},
		});

	</script>
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
