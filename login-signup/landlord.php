





<!DOCTYPE html>
<html>
<head>
	<title>VendaHeight</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <style>



    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #333;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Adjust font size for small screens */
    @media screen and (max-width: 600px) {
        th, td {
            font-size: 12px;
        }
    }

  </style>


</head>
<body>
  <nav>
      <ul>
          <li><a href="home.html">Home</a></li>
          

      </ul>
  </nav>
	<h1>Landlord Page</h1>
	<h2>Visitor Sign-Ins</h2>
	<table>
		<tr>
			<th>ID</th>
			<th>FULL NAMES</th>
			<th>ID NUMBER</th>
			<th>PERSON VISITED</th>
			<th>checkin_time</th>
			<th>checkout_time</th>
		</tr>
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

			// Retrieve all data from visitor_signin table
			$sql = "SELECT * FROM visitor_signin";
			$result = mysqli_query($conn, $sql);

			// Loop through all rows and display data in table
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['full_name'] . "</td>";
				echo "<td>" . $row['id_number'] . "</td>";
				echo "<td>" . $row['person_visiting'] . "</td>";
				echo "<td>" . $row['checkin_time'] . "</td>";
				echo "<td>" . $row['checkout_time'] . "</td>";
				echo "</tr>";
			}

			// Close database connection
			mysqli_close($conn);
		?>
	</table>

	<h2>Bookings</h2>
	<table>
		<tr>
			<th>ID</th>
			<th>FIRST NAME</th>
			<th>LAST NAME</th>
			<th>EMAIL</th>
			<th>checkin_date</th>
      <th>checkout_date</th>
      <th>room_type</th>

		</tr>
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

			// Retrieve all data from bookings table
			$sql = "SELECT * FROM bookings";
			$result = mysqli_query($conn, $sql);

			// Loop through all rows and display data in table
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['firstname'] . "</td>";
				echo "<td>" . $row['lastname'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['checkin_date'] . "</td>";
        echo "<td>" . $row['checkout_date'] . "</td>";
        echo "<td>" . $row['room_type'] . "</td>";

				echo "</tr>";
			}

			// Close database connection
			mysqli_close($conn);
		?>
	</table>

	<h2>Registered Users</h2>
	<table>
		<tr>
			<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>ID Number</th>
<th>Gender</th>
<th>Password</th>
</tr>
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

// Retrieve data from tableusers
$sql = "SELECT * FROM tableusers";
$result = mysqli_query($conn, $sql);

// Check if there are any registered users
if (mysqli_num_rows($result) > 0) {
  // Output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]."</td><td>".$row["surname"]."</td><td>".$row["idnumber"]."</td><td>".$row["gender"]."</td><td>".$row["password"]."</td></tr>";
  }
} else {
  echo "<tr><td colspan='6'>No registered users found</td></tr>";
}

// Close database connection
mysqli_close($conn);
?>
</table>

<footer style="background-color: #333; color: #fff; padding: 10px;">
  <div class="container">
    <p style="text-align: center; font-size: 14px;">&copy; 2023 Vendaheight. All rights reserved.</p>
  </div>
</footer>

</body>
</html>
