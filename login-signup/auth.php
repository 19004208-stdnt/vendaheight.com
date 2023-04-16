<?php
session_start();

// Generate a random verification code and store it in the session
$verificationCode = '1234';
$_SESSION['verification_code'] = $verificationCode;

// Send the verification code to the user via email or SMS
// ...

// Process the submitted verification code
if (isset($_POST['code'])) {
  $submittedCode = $_POST['code'];
  if ($submittedCode === $verificationCode) {
    header('Location: landlord.php');
    exit();
  } else {
   echo '<span style="color: red;">Incorrect verification code. Please try again.</span>';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Verification Code</title>
    <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
    }
    #container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    h1 {
      margin-top: 0;
      font-size: 24px;
      text-align: center;
    }
    label {
      display: block;
      margin-bottom: 10px;
      font-size: 16px;
      font-weight: bold;
    }
    input[type="text"] {
      display: block;
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ddd;
      border-radius: 3px;
      box-sizing: border-box;
    }
    button[type="submit"] {
      display: block;
      margin-top: 20px;
      padding: 10px;
      font-size: 16px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    button[type="submit"]:hover {
      background-color: #3e8e41;
    }
  </style>
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
  <div id="container">
    <h1>Enter Verification Code</h1>
    <form method="POST">
      <label for="code">Verification Code:</label>
      <input type="text" name="code" id="code" required>
      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>
