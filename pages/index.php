<?php
session_start(); // Start a session to store user information

if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];

    // Connect to the MySQL database
    $conn = mysqli_connect("localhost", "root", "", "equipments_db");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $username = mysqli_real_escape_string($conn, $username);

    // Prepare a SQL statement to retrieve user data
    $sql = "SELECT id, fullname, password FROM users WHERE fullname = '$username' AND password = '$password' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['fullname'];
        $_SESSION['access'] = $row['privilege'];
        echo '<script>alert("Login Successful")</script>';
        header("Location: dashboard.php");
        exit();
    } else {
        // User not found
        echo '<script>alert("Login not succesful. Try Again")</script>';
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
		CBMS | Login
	</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
	<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
	<link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
	
	<main class="main-content  mt-0">
		<section>
			<div class="page-header min-vh-100">
				<div class="container">
					<div class="row">
						<div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
							<div class="card card-plain">
								<div class="card-header pb-0 text-start">
									<h4 class="font-weight-bolder">Sign In</h4>
									<p class="mb-0">Enter your Username and password to sign in</p>
								</div>
								<div class="card-body">
									<form role="form" method="post" action="index.php">
										<div class="mb-3">
											<input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" autocomplete="off" name="username" required>
										</div>
										<div class="mb-3">
											<input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" name="pass" required>
										</div>

										<div class="text-center">
											<input type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" value="Sign In" name="signin">
										</div>
									</form>
								</div>

							</div>
						</div>
						<div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
							<div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('../assets/img/move.jpg'); background-size: cover;">
								<span class="mask bg-gradient-primary opacity-6"></span>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
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
	<script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
