<?php
$conn = mysqli_connect("localhost", "root", "", "equipments_db");
session_start();
if (!isset($_SESSION['username'])) {
    header('location:sign-in.php');
    exit;
} else {
    $user = $_SESSION['username'];
}

if (isset($_POST["submit"])) {
    $assessmentName = mysqli_real_escape_string($conn, $_POST['assessmentName']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $appearance = mysqli_real_escape_string($conn, $_POST['appearance']);
    $conduct = mysqli_real_escape_string($conn, $_POST['conduct']);
    $creativity = mysqli_real_escape_string($conn, $_POST['creativity']);
    $initiative = mysqli_real_escape_string($conn, $_POST['initiative']);
    $delivery = mysqli_real_escape_string($conn, $_POST['delivery']);
    $traffic = mysqli_real_escape_string($conn, $_POST['traffic']);
    $dataEntry = mysqli_real_escape_string($conn, $_POST['dataEntry']);
    $sponsorship = mysqli_real_escape_string($conn, $_POST['sponsorship']);
    $revenue = mysqli_real_escape_string($conn, $_POST['revenue']);
    $social = mysqli_real_escape_string($conn, $_POST['social']);
    $consistency = mysqli_real_escape_string($conn, $_POST['consistency']);
    $teamwork = mysqli_real_escape_string($conn, $_POST['teamwork']);

    $sql = "INSERT INTO assessment (assessmentName, department, time, appearance, conduct, creativity, initiative, delivery, traffic, dataEntry, sponsorship, revenue, social, consistency, teamwork)
            VALUES ('$assessmentName', '$department', '$time', '$appearance', '$conduct', '$creativity', '$initiative', '$delivery', '$traffic', '$dataEntry', '$sponsorship', '$revenue', '$social', '$consistency', '$teamwork')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>Record inserted successfully</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
                <div class="p-3 bg-white rounded">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-uppercase mb-0">ASSESSMENT</h3>
                            <hr class="horizontal dark">
                                <form method="post" action="assessment.php">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Name of Worker</label>
                                                <input class="form-control" type="text" name="assessmentName" autocomplete="off" required>
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
                                                                                    <select class="form-control" name="department" required>
                                                                                        <option disabled selected hidden>Choose Department</option>
                                                                                    <?php
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row['department_name'] . '">' . $row['department_name'] . '</option>';
}
?>
											</select>
									</div>
								</div>

                                </div>
							</div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <label class="font-bold text-dark font-xl">INDICATOR</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <label>POOR</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <label>FAIR</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <label>GOOD</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <label>VERY GOOD</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <label>EXCELLENT</label>
                                                </div>
                                                <div class="col-md-2 text-center">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <label>Time</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="poor" name="time" value="1">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="fair" name="time" value="2">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="good" name="time" value="3">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="verygood" name="time" value="4">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="excellent" name="time" value="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <label>Appearance</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="poor" name="appearance" value="1">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="fair" name="appearance" value="2">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="good" name="appearance" value="3">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="verygood" name="appearance" value="4">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="excellent" name="appearance" value="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <label>Conduct</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="poor" name="conduct" value="1">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="fair" name="conduct" value="2">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="good" name="conduct" value="3">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="verygood" name="conduct" value="4">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="excellent" name="conduct" value="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <label>Creativity / Innovation</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="poor" name="creativity" value="1">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="fair" name="creativity" value="2">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="good" name="creativity" value="3">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="verygood" name="creativity" value="4">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="excellent" name="creativity" value="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <label>Initiative</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="poor" name="initiative" value="1">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="fair" name="initiative" value="2">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="good" name="initiative" value="3">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="verygood" name="initiative" value="4">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="excellent" name="initiative" value="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <label>Delivery</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="poor" name="delivery" value="1">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="fair" name="delivery" value="2">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="good" name="delivery" value="3">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="verygood" name="delivery" value="4">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="excellent" name="delivery" value="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <label>Ability to drive traffic</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="poor" name="traffic" value="1">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="fair" name="traffic" value="2">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="good" name="traffic" value="3">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="verygood" name="traffic" value="4">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="excellent" name="traffic" value="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <label>Data Entry</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="poor" name="dataEntry" value="1">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="fair" name="dataEntry" value="2">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="good" name="dataEntry" value="3">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="verygood" name="dataEntry" value="4">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="excellent" name="dataEntry" value="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <label>Sponsorship</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="poor" name="sponsorship" value="1">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="fair" name="sponsorship" value="2">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="good" name="sponsorship" value="3">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="verygood" name="sponsorship" value="4">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="excellent" name="sponsorship" value="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <label>Revenue Generation</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="poor" name="revenue" value="1">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="fair" name="revenue" value="2">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="good" name="revenue" value="3">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="verygood" name="revenue" value="4">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="excellent" name="revenue" value="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <label>Time</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="poor" name="time" value="1">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="fair" name="time" value="2">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="good" name="time" value="3">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="verygood" name="time" value="4">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="excellent" name="time" value="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <label>Social Media Views</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="poor" name="social" value="1">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="fair" name="social" value="2">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="good" name="social" value="3">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="verygood" name="social" value="4">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="excellent" name="social" value="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <label>Consistencies</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="poor" name="consistency" value="1">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="fair" name="consistency" value="2">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="good" name="consistency" value="3">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="verygood" name="consistency" value="4">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="excellent" name="consistency" value="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <label>Team Work</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="poor" name="teamwork" value="1">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="fair" name="teamwork" value="2">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="good" name="teamwork" value="3">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="verygood" name="teamwork" value="4">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <input type="radio" id="excellent" name="teamwork" value="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" class="form-control btn btn-primary" value="Submit" name="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
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
