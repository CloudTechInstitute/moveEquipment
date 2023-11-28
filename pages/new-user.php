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
if (isset($_POST['regBtn'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $privillege = $_POST['privillege'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $gps = $_POST['gps'];
    $date = date('Y-m-d');

    // Validate and sanitize user inputs
    $fullname = htmlspecialchars($fullname);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : '';
    $department = htmlspecialchars($department);
    $position = htmlspecialchars($position);
    $address = htmlspecialchars($address);
    $privillege = htmlspecialchars($privillege);
    $city = htmlspecialchars($fullname);
    $phone = htmlspecialchars($phone);
    $gps = htmlspecialchars($gps);

    if ($fullname && $email && $department && $position && $address && $city && $phone && $gps && $privillege) {
        // Create connection
        $conn = new mysqli('localhost', 'root', '', 'equipments_db');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Check if user already exists
        $checkQuery = "SELECT * FROM users WHERE email = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            echo "<script>alert('User with this email already exists.')</script>";
        } else {

            // Validate and process uploaded image
            $targetDir = "uploads/";
            $profilePic = $_FILES['profilePic']['name'];
            $targetFilePath = $targetDir . $profilePic;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES['profilePic']['tmp_name'], $targetFilePath)) {
                    // Prepare and execute SQL statement
                    $sql = "INSERT INTO users (fullname, email, department, position, privilege, address, password, city, phone, gps, profile_pic, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssssssssss", $fullname, $email, $department, $position, $privillege, $address, $password, $city, $phone, $gps, $profilePic, $date);

                    if ($stmt->execute()) {
                        echo "<script>alert('User added successfully')</script>";
                    } else {
                        echo "<script>alert('Error adding user.')</script>";
                    }
                    $stmt->close();
                } else {
                    echo "<script>alert('Could not upload image.')</script>";
                }
            } else {
                echo "<script>alert('Invalid image format. Allowed formats: JPG, JPEG, PNG, GIF.')</script>";
            }

        }
    } else {
        echo "<script>alert('Invalid input data.')</script>";
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
		Add New User
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
							<img src="uploads/<?=$row['profile_pic']?>" alt="profile_image" style="height: 80px; width: 80px;" class="rounded-circle">
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
							<div class="d-flex align-items-center">
								<p class="mb-0">Add New User</p>
							</div>
						</div>
						<div class="card-body">
							<p class="text-uppercase text-sm">User Information</p>
							<form method="post" action="new-user.php" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Full Name</label>
											<input class="form-control" type="text" name="fullname">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Email address</label>
											<input class="form-control" type="email" name="email">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Department</label>
											<?php $sql = "SELECT id, department_name FROM departments";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>
											<select class="form-control" name="department">
												<option disabled selected hidden>Choose One</option>
												<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row['department_name'] . '">' . $row['department_name'] . '</option>';
}
?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Position</label>
											<input class="form-control" type="text" name="position">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Image</label>
											<input class="form-control" type="file" name="profilePic">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Privillege</label>
											<select class="form-control" name="privillege">
												<option disabled selected hidden>Choose one</option>
												<option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
											</select>
										</div>
									</div>
								</div>
								<hr class="horizontal dark">
								<p class="text-uppercase text-sm">Contact Information</p>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Address</label>
											<input class="form-control" type="text" name="address">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Password</label>
											<input class="form-control" type="text" name="password">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">City</label>
											<input class="form-control" type="text" name="city">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Mobile No.</label>
											<input class="form-control" type="text" name="phone">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">GPS Address</label>
											<input class="form-control" type="text" name="gps">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control btn btn-primary" type="submit" value="Register" name="regBtn">
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
