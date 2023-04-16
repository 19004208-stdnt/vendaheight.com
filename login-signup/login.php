<?php


session_start();

// check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: book.php");
    exit();
}

if (isset($_POST['submit'])) {
    // retrieve form data
    $idnumber = $_POST['idnumber'];
    $password = $_POST['password'];

    // connect to database
    $conn = mysqli_connect("localhost", "root", "", "user_signup");

    // check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // query to check if user exists
    $query = "SELECT * FROM tableusers WHERE idnumber='$idnumber'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // verify password
        if (password_verify($password, $row['password'])) {
            // set session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['idnumber'] = $row['idnumber'];

            // redirect to book.php
            header("Location: book.php");
            exit();
        }
    }
    $error_msg = "Invalid ID number or password. Please try again.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
            <li><a href="auth.php">Landlord</a></li>
        </ul>
    </nav>
    <h1>Login</h1>
    <form method="post" action="">
        <label for="idnumber">ID Number:</label>
        <input type="text" id="idnumber" name="idnumber" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" name="submit" value="Login">
        <?php if (isset($error_msg)) { ?>
            <p class="error"><?php echo $error_msg; ?></p>
        <?php } ?>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>



</body>
</html>
