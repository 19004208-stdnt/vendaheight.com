<!DOCTYPE html>
<html>
<head>
	<title>Booking Form</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
	<nav>
		<ul>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="visitors.php">visitors</a></li>
			<li><a href="aboutus.html">About Us</a></li>
      <li><a href="book.php">book</a></li>
			<li><a href="auth.php">Landlord</a></li>
		</ul>
	</nav>
	<h1>Booking Form</h1>
	<form method="post" action="book.php">
		<label for="firstname">First Name:</label>
		<input type="text" id="firstname" name="firstname" required>

		<label for="lastname">Last Name:</label>
		<input type="text" id="lastname" name="lastname" required>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required>

		<label for="phone">Phone:</label>
		<input type="text" id="phone" name="phone" required>

		<label for="room_type">Room Type:</label>
		<select id="room_type" name="room_type" required>
			<option value="">Select Room Type</option>
			<option value="Standard">Standard</option>
			<option value="Deluxe">Deluxe</option>
			<option value="Super Deluxe">Super Deluxe</option>
		</select>

		<label for="checkin_date">Check-In Date:</label>
		<input type="date" id="checkin_date" name="checkin_date" required>

		<label for="checkout_date">Check-Out Date:</label>
		<input type="date" id="checkout_date" name="checkout_date" required>

		<input type="submit" name="submit" value="Book Now">
	</form>


  <?php
		// check if the form has been submitted
		if (isset($_POST['submit'])) {
			// retrieve the form data
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$room_type = $_POST['room_type'];
			$checkin_date = $_POST['checkin_date'];
			$checkout_date = $_POST['checkout_date'];

			// connect to the database
			$conn = mysqli_connect("localhost", "root", "", "user_signup");


      // check if any field is empty
    if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($room_type) || empty($checkin_date) || empty($checkout_date)) {
        echo "Please fill in all fields.";
        exit();
    }


			// check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			// insert the form data into the database
			$sql = "INSERT INTO bookings (firstname, lastname, email, phone, room_type, checkin_date, checkout_date)
					VALUES ('$firstname', '$lastname', '$email','$phone', '$room_type', '$checkin_date', '$checkout_date')";
if (mysqli_query($conn, $sql)) {
echo "<p>Your booking has been confirmed!</p>";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
// close the database connection
mysqli_close($conn);
}
?>

</body>
</html>
