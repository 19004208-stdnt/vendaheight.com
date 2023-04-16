<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav>
      <ul>

          <li><a href="register.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="visitors.php">visitor</a></li>
          <li><a href="aboutus.html">About Us</a></li>
          <li><a href="book.php">book</a></li>
					<li><a href="auth.php">Landlord</a></li>
      </ul>
  </nav>
	<h1>Registration Form</h1>

	<?php



// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_signup";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

		// Initialize variables
		$firstname = $surname = $idnumber = $gender = $password = $confirmpassword = "";
		$firstname_error = $surname_error = $idnumber_error = $gender_error = $password_error = $confirmpassword_error = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Check if fields are not empty
			if (empty($_POST["firstname"])) {
				$firstname_error = "First name is required";
			} else {
				$firstname = test_input($_POST["firstname"]);
			}

			if (empty($_POST["surname"])) {
				$surname_error = "Surname is required";
			} else {
				$surname = test_input($_POST["surname"]);
			}

			if (empty($_POST["idnumber"])) {
				$idnumber_error = "ID number is required";
			} else {
				$idnumber = test_input($_POST["idnumber"]);
			}

			if (empty($_POST["gender"])) {
				$gender_error = "Gender is required";
			} else {
				$gender = test_input($_POST["gender"]);
			}

			if (empty($_POST["password"])) {
				$password_error = "Password is required";
			} else {
				$password = test_input($_POST["password"]);
			}

			if (empty($_POST["confirmpassword"])) {
				$confirmpassword_error = "Confirm password is required";
			} else {
				$confirmpassword = test_input($_POST["confirmpassword"]);
			}

			// Check if passwords match
			if ($password !== $confirmpassword) {
				$confirmpassword_error = "Passwords do not match";
			}

			// Check if ID number already exists in the database
			$sql = "SELECT * FROM tableusers WHERE idnumber='$idnumber'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				$idnumber_error = "ID number already exists";
			}

			// If there are no errors, insert user data into the database
			if (empty($firstname_error) && empty($surname_error) && empty($idnumber_error) && empty($gender_error) && empty($password_error) && empty($confirmpassword_error)) {
				$sql = "INSERT INTO tableusers (firstname, surname, idnumber, gender, password) VALUES ('$firstname', '$surname', '$idnumber', '$gender', '$password')";

				if (mysqli_query($conn, $sql)) {
					echo "Registration successful!";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}

		// Function to sanitize input data
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="firstname">First Name:</label>
		<input type="text" name="firstname" value="<?php echo $firstname;?>">
<span class="error"><?php echo $firstname_error;?></span>
<br><br>

<label for="surname">Surname:</label>
<input type="text" name="surname" value="<?php echo $surname;?>">
<span class="error"><?php echo $surname_error;?></span>
<br><br>

<label for="idnumber">ID Number:</label>
<input type="text" name="idnumber" value="<?php echo $idnumber;?>">
<span class="error"><?php echo $idnumber_error;?></span>
<br><br>

<label for="gender">Gender:</label>
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
<span class="error"><?php echo $gender_error;?></span>
<br><br>

<label for="password">Password:</label>
<input type="password" name="password" value="<?php echo $password;?>">
<span class="error"><?php echo $password_error;?></span>
<br><br>

<label for="confirmpassword">Confirm Password:</label>
<input type="password" name="confirmpassword" value="<?php echo $confirmpassword;?>">
<span class="error"><?php echo $confirmpassword_error;?></span>
<br><br>

<input type="submit" name="submit" value="Submit">
</form>
 <p>Already have an account? <a href="login.php">Login here</a></p>

 <footer style="background-color: #333; color: #fff; padding: 10px;">
  <div class="container">
    <p style="text-align: center; font-size: 14px;">&copy; 2023 Vendaheight. All rights reserved.</p>
  </div>
</footer>

</body>
</html>
