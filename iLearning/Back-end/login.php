<?php
global $email;
global $password;
include 'config.php';

session_start();
$conn = dbconnection();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: ../alpha.html");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
    echo "<script>alert('work')</script>";
    header("Location: ../alpha.html");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/SignUpStyle.css">

    <title>Login</title>
</head>
<body>
    <div class="container">
	<form action="" method="POST" class="login-email">
    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login with email</p>
            <div class="input-group">
              <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
              <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
              <button name="submit" class="btn">Login</button>

            </div>
            <p class="login-register-text">Don't have an account? <a href="signUp.php">Register Here</a>.</p>
            <p class="login-register-text">Go <a href="../index.html">Home</a>.</p>

        </form>
    </div>
</body>
</html>
