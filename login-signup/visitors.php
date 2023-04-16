<?php
    session_start();
    $error_msg = "";

    // check if form is submitted
    if (isset($_POST['signin'])) {
        // retrieve form data
        $full_name = $_POST['full_name'];
        $id_number = $_POST['id_number'];
        $person_visiting = $_POST['person_visiting'];

        // connect to database
        $conn = mysqli_connect("localhost", "root", "", "user_signup");

        // check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // insert sign-in data to the database
        $query = "INSERT INTO visitor_signin (full_name, id_number, person_visiting) VALUES ('$full_name', '$id_number', '$person_visiting')";
        if (mysqli_query($conn, $query)) {
            $success_msg = "You have successfully signed in!";
        } else {
            $error_msg = "Error: " . $query . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }

    // check if form is submitted
    if (isset($_POST['signout'])) {
        // retrieve form data
        $id = $_POST['id'];

        // connect to database
        $conn = mysqli_connect("localhost", "root", "", "user_signup");

        // check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // update sign-out data to the database
        $query = "UPDATE visitor_signin SET checkout_time=CURRENT_TIMESTAMP WHERE id=$id";
        if (mysqli_query($conn, $query)) {
            $success_msg = "You have successfully signed out!";
        } else {
            $error_msg = "Error: " . $query . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Visitor Sign-in</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav>
      <ul>
          <li><a href="register.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="visitors.php">visitor</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="book.php">book</a></li>
      </ul>
  </nav>
    <?php if (isset($error_msg)) { ?>
        <p class="error"><?php echo $error_msg; ?></p>
    <?php } ?>
    <?php if (isset($success_msg)) { ?>
        <p class="success"><?php echo $success_msg; ?></p>
    <?php } ?>
    <h1>Visitor Sign-in</h1>
    <form method="post" action="">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>

        <label for="id_number">ID Number:</label>
        <input type="text" id="id_number" name="id_number" required>

        <label for="person_visiting">Person Visiting:</label>
        <input type="text" id="person_visiting" name="person_visiting" required>

        <input type="submit" name="signin" value="Sign In">
    </form>
    <hr>
    <h1>Visitor Sign-out</h1>
    <form method="post" action="">
        <label for="id">ID Number:</label>
        <input type="text" id="id" name="id" required>

        <input type="submit" name="signout" value="Sign Out">
    </form>

    <footer style="background-color: #333; color: #fff; padding: 10px;">
  <div class="container">
    <p style="text-align: center; font-size: 14px;">&copy; 2023 Vendaheight. All rights reserved.</p>
  </div>
</footer>

</body>
</html>
