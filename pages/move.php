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
<?php

if (isset($_POST['moveBtn'])) {
    // Get data from the form
    $serial = $_POST['serial'];
    $brand = $_POST['brand'];
    $dept = $_POST['dept'];
    $assignedDeptDate = $_POST['assignedDeptDate'];
    $inCharge = $_POST['inCharge'];
    $defect = $_POST['defect'];
    $newDepartment = $_POST['newDepartment'];
    $officerReceiving = $_POST['officerReceiving'];
    $returnDate = $_POST['returnDate'];
    $authorization = $_POST['authorization'];
    $image = $_POST['imageFile'];
    $item = $_POST['item'];
    $date = date('Y-m-d');
    // Prepare and execute the SQL INSERT query
    $sql = "INSERT INTO `movements_tbl`(`serial`, `item`, `brand`, `imgFile`, `deptTaking`, `inCharge`, `defect`, `deptReceiving`, `inChargeReceive`, `returnDate`, `authority`, `date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssss", $serial, $item, $brand, $image, $dept, $inCharge, $defect, $newDepartment, $officerReceiving, $returnDate, $authorization, $date);

    if ($stmt->execute()) {
        echo "Equipment movement data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

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
		Move Equipment
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

	<?php include 'aside.php';?>

	<div class="main-content position-relative max-height-vh-100 h-100">
	<?php include 'navbar.php';?>
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
							<img src="uploads/<?=$row['profile_pic']?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
						</div>
					</div>
					<div class="col-auto my-auto">
						<div class="h-100">
							<h5 class="mb-1">
								<?=$row['fullname']?>
							</h5>
							<p class="mb-0 font-weight-bold text-sm">
								<?=$row['position']?>
							</p>
						</div>
					</div>
					<?php endwhile;?>
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
							<div class="row">
								<div class="col-12 col-md-4">
									<div class="d-flex align-items-center">
										<p class="mb-0 text-uppercase"><b>Move Equipment</b></p>
									</div>
								</div>
								<div class="col-12 col-md-8">
									<form method="post" role="form">
										<div class="row">
											<div class="col-8 col-md-6">
												<input class="form-control" type="text" placeholder="enter equipment serial number" name="searchSerial">
											</div>
											<div class="col-4 col-md-6">
												<input type="submit" value="Search" class="form-control btn btn-primary" name="search">
											</div>
										</div>
									</form>
								</div>
							</div>

						</div>
						<div class="card-body">
							<?php

if (isset($_POST['search'])) {
    $searchQuery = $_POST['searchSerial'];
    $sql = "SELECT * FROM equipment WHERE serial = '$searchQuery'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {

            ?>
							<form method="post" role="form" action="move.php">
								<input type="text" hidden value="<?php echo $row['image']; ?>" name="imageFile">
								<input type="text" hidden value="<?php echo $row['item']; ?>" name="item">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Serial Number</label>
											<input class="form-control" type="text" readonly name="serial" value="<?php echo $row['serial']; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Make / Brand</label>
											<input class="form-control" type="text" readonly name="brand" value="<?php echo $row['brand']; ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Department Assigned</label>
											<input class="form-control" type="text" readonly name="dept" value="<?php echo $row['department']; ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Date Assigned to
											<?php echo $row['department']; ?>
											</label>
											<input type="text" readonly class="form-control" name="assignedDeptDate" value="<?php echo $row['date']; ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Oficer In Charge at <?php echo $row['department']; ?></label>
											<input class="form-control" type="text" readonly name="inCharge" value="<?php echo $row['officer']; ?>">
										</div>
									</div>
								<?php
}

    } else {
        echo "No equipment found matching your search.";
    }
}

?>
									<div class="col-md-4">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Defects</label>
											<select class="form-control" name="defect">
												<option selected disabled hidden>Choose One</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Transfer to</label>
											<?php $sql = "SELECT id, department_name FROM departments";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>
											<select class="form-control" name="newDepartment" required>
												<option disabled selected hidden>Choose One</option>
												<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row['department_name'] . '">' . $row['department_name'] . '</option>';
}
?>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Officer In Charge</label>
											<input class="form-control" type="text" name="officerReceiving" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Date to Return</label>
											<input class="form-control" type="date" name="returnDate" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Authorization By:</label>
											<input class="form-control" type="text" name="authorization" required>
										</div>
									</div>

								</div>
								<hr class="horizontal dark">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control btn btn-primary" type="submit" value="Move Equipment" name="moveBtn">
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
	<?php include 'jsScripts.php';?>
</body>

</html>
