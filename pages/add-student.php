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
if (isset($_POST['addBtn'])) {
    extract($_POST);
    $date = date("Y-m-d");

    // // Validate and sanitize user inputs (additional validation may be needed)
    // $serial = $conn->real_escape_string(htmlspecialchars($serial));
    // $item = $conn->real_escape_string(htmlspecialchars($item));
    // $brand = $conn->real_escape_string(htmlspecialchars($brand));
    // $department = $conn->real_escape_string(htmlspecialchars($department));
    // $officer = $conn->real_escape_string(htmlspecialchars($officer));

    $sql = "INSERT INTO `students_tbl`(`fname`, `lname`, `studentID`, `address`, `email`, `telephone`, `gender`, `dob`, `course`, `start`, `end`, `duration`, `date`)VALUES('$fname','$lname', '$id', '$address','$email','$telephone','$gender','$dob','$course','$beginDate','$endDate','$duration', '$date')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Student added successfully')</script>";
    } else {
        echo "<script>alert('Something went wrong...Try again')</script>";
    }
    // if ($serial && $brand && $department && $officer) {
    //     // Validate and process uploaded image
    //     $targetDir = "uploads/";
    //     $profilePic = $_FILES['equipmentImage']['name'];
    //     $targetFilePath = $targetDir . $profilePic;
    //     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    //     $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
    //     if (in_array($fileType, $allowTypes)) {
    //         if (move_uploaded_file($_FILES['equipmentImage']['tmp_name'], $targetFilePath)) {
    //             // Prepare and execute SQL statement
    //             $sql = "INSERT INTO equipment (`serial`, `item`, `brand`, `department`, `officer`, `image`, `date`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    //             $stmt = $conn->prepare($sql);
    //             $stmt->bind_param("sssssss", $serial, $item, $brand, $department, $officer, $profilePic, $date);

    //             $date = date('Y-m-d');

    //             if ($stmt->execute()) {
    //                 echo "<script>alert('Equipment added successfully')</script>";
    //             } else {
    //                 echo "<script>alert('Error adding equipment.')</script>";
    //             }
    //             $stmt->close();
    //         } else {
    //             echo "<script>alert('Could not upload image.')</script>";
    //         }
    //     } else {
    //         echo "<script>alert('Invalid image format. Allowed formats: JPG, JPEG, PNG, GIF.')</script>";
    //     }
    // } else {
    //     echo "<script>alert('Invalid input data.')</script>";
    // }

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
		Add student
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

	<div class="main-content position-relative max-height-vh-100 h-100 top-0">
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
							<div class="d-flex align-items-center">
								<p class="mb-0">Add Student</p>
							</div>
						</div>
						<div class="card-body">
							<form method="post" role="form" action="add-student.php">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="example-text-input" class="form-control-label">Firstname</label>
										<input class="form-control" type="text" name="fname" autocomplete="off" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="example-text-input" class="form-control-label">Lastname</label>
										<input class="form-control" type="text" name="lname" autocomplete="off" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="example-text-input" class="form-control-label">Student ID</label>
										<input class="form-control" type="text" name="id" autocomplete="off" required>
									</div>
								</div>
                                <div class="col-md-3">
									<div class="form-group">
										<label for="example-text-input" class="form-control-label">Residential Address</label>
										<input class="form-control" type="text" name="address" autocomplete="off" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="example-text-input" class="form-control-label">Email</label>
										<input class="form-control" type="email" name="email" autocomplete="off" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="example-text-input" class="form-control-label">Telephone</label>
										<input class="form-control" type="text" name="telephone" autocomplete="off" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="example-text-input" class="form-control-label">Gender</label>
										<select class="form-control" name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
									</div>
								</div>
                                <div class="col-md-3">
									<div class="form-group">
										<label for="example-text-input" class="form-control-label">Date of birth</label>
										<input class="form-control" type="date" name="dob" autocomplete="off" required>
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label for="example-text-input" class="form-control-label">Programme of study</label>
										<?php $sql = "SELECT id, department_name FROM departments";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>
											<select class="form-control" name="course" required>
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Start Date</label>
                                                <input class="form-control" type="date" name="beginDate" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">End Date</label>
                                                <input class="form-control" type="date" name="endDate" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Course duration</label>
                                        <input class="form-control" type="text" name="duration" required>
                                    </div>
                                </div>
                                </div>
							</div>
							<hr class="horizontal dark">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input class="form-control btn btn-primary" type="submit" value="Add Student" name="addBtn">
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
