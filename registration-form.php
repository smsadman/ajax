<?php 
	define("filepath", "user.json");
	$fullName = $userName = $password = "";
	$isValid = true;
	$fullNameErr = $userNameErr = $passwordErr = "";
	$successfulMessage = $errorMessage = "";
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$fullName = $_POST['fullname'];
		$userName = $_POST['username'];
		$password = $_POST['password'];
		if(empty($fullName)) {
			$fullNameErr = "Full name can not be empty!";
			$isValid = false;
		}
		if(empty($userName)) {
			$userNameErr = "User name can not be empty!";
			$isValid = false;
		}
		if(empty($password)) {
			$passwordErr = "Password can not be empty!";
			$isValid = false;
		}
		if($isValid) {
			$fullName = test_input($fullName);
			$userName = test_input($userName);
			$password = test_input($password);

			$arr1 = array('fullname' => $fullName, "username" => $userName, "password" => $password);
			$arr1_encode = json_encode($arr1);
			$response = write($arr1_encode);
			if($response) {
				$successfulMessage = "Successfully saved.";
			}
			else {
				$errorMessage = "Error while saving.";
			}
		}
	}
	function write($content) {
			$resource = fopen(filepath, "a");
			$fw = fwrite($resource, $content . "\n");
			fclose($resource);
			return $fw;
	}
	function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>
</head>
<body>

	<h1>Registration Form</h1>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<fieldset>
			<legend>Registration Form:</legend>

			<label for="fullname">Full Name:</label>
			<input type="text" name="fullname" id="fullname">
			<span style="color:red"><?php echo $fullNameErr; ?></span>

			<br><br>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username">
			<span style="color:red"><?php echo $userNameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"><?php echo $passwordErr; ?></span>

			<br><br>

			<input type="submit" name="submit" value="Register">
		</fieldset>
	</form>

	<p style="color:green;"><?php echo $successfulMessage; ?></p>
	<p style="color:red;"><?php echo $errorMessage; ?></p>

	<br>

	<p>Back to<a href="login-form.php">Login</a></p>

</body>
</html>