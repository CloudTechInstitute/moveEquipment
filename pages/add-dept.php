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

<?php
// Check if the form has been submitted
if(isset($_POST['submitBtn'])) {
    // Get form data
    $deptName = $_POST['deptName'];
    $deptPhone = $_POST['deptPhone'];
    $deptOfficer = $_POST['deptOfficer'];
     
    // Create connection
    $conn = new mysqli('localhost', 'root', '', 'equipments_db');
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare and execute SQL statement
    $sql = "INSERT INTO departments (department_name, department_phone, department_officer) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $deptName, $deptPhone, $deptOfficer);
    
    if ($stmt->execute()) {
        echo "<script>alert('Department Created successfully')</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close statement and connection
    $stmt->close();
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
		Add Department
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
	<div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('../assets/img/moving.avif'); background-position-y: 50%;">
		<span class="mask bg-primary opacity-6"></span>
	</div>

	<?php include('aside.php'); ?>

	<div class="main-content position-relative max-height-vh-100 h-100">
		<div class="card shadow-lg mx-4 card-profile-bottom">
			<div class="card-body p-3">
				<div class="row gx-4">
					<div class="col-auto">
						<?php
							$fetchuser = $_SESSION['username'];
							$stmt = $conn->prepare("SELECT * FROM users WHERE fullname = '$fetchuser'");
							$stmt->execute();
							$result = $stmt->get_result();
							while ($row = $result->fetch_assoc()):
						  ?>
						<div class="avatar avatar-xl position-relative">
							<img src="uploads/<?= $row['profile_pic'] ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
						</div>
					</div>
					<div class="col-auto my-auto">
						<div class="h-100">
							<h5 class="mb-1">
								<?= $row['fullname'] ?>
							</h5>
							<p class="mb-0 font-weight-bold text-sm">
								<?= $row['position'] ?>
							</p>
						</div>
					</div>
					<?php endwhile; ?>
					<div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
						
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header pb-0">
							<div class="d-flex align-items-center">
								<p class="mb-0">Add New Department</p>
							</div>
						</div>
						<div class="card-body">
							<form method="post" role="form" action="add-dept.php">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Department Name</label>
											<input class="form-control" type="text" name="deptName">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Department Phone</label>
											<input class="form-control" type="text" name="deptPhone">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Department Officer</label>
											<input class="form-control" type="text" name="deptOfficer">
										</div>
									</div>
								</div>
								<hr class="horizontal dark">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control btn btn-primary" type="submit" value="Add Department" name="submitBtn">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer pt-3  ">
				<div class="container-fluid">
					<div class="row align-items-center justify-content-lg-between">
						<div class="col-lg-6 mb-lg-0 mb-4">
							<div class="copyright text-center text-sm text-muted text-lg-start"> All Rights Reserved,
								© <script>
									document.write(new Date().getFullYear())

								</script>
							</div>
						</div>
					</div>
				</div>
			</footer>
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
