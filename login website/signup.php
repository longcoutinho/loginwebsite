<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/index_main.css">
  <link rel="stylesheet" href="assets/css/signup_container.css">
  <title>Login</title>
</head>
<body>
  <?php
    $usernameErr = $passwordErr = $confirmpasswordErr = "";
    $username = $password = $confirmpassword = $notification = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && (!isset($_POST["submit"]))) {
      if (empty($_POST["username"])){
          $usernameErr = "Username is required";
      }
      else {
        $username = $_POST["username"];
        if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
          $usernameErr = "Only letter and number allowed";
        }
        else {
          $usernameErr = "";
        }
      }

      if (empty($_POST["password"])){
          $passwordErr = "Password is required";
      }
      else {
        $password = $_POST["password"];
        if (!preg_match("/^[a-zA-z0-9]*$/", $password)) {
          $passwordErr = "Only letter and number allowed";
        }
        else {
          $passwordErr = "";
        }
      }

      $confirmpassword = $_POST["confirmpassword"];
      if ($confirmpassword != $password) $confirmpasswordErr = "Confirm password doesn't match";
    if ($usernameErr==""&&$passwordErr==""&&$confirmpasswordErr=="") {
      $username.="@";
      if (empty($_SESSION[$username])) {
        $_SESSION[$username] = $password;
        $notification = "Sign up successfully!";
      }
      else $notification = "Username is existed";
    }
  }
  ?>
  <div id="container">
    <div id="content">
      <div id="titlelogin">
        <p id="psignin">SIGN UP</p>
      </div>
      <form id="formlogin" method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="text" name="username" placeholder="Username">
        <p style="color:red; position: absolute; top:106px;"><?php echo $usernameErr;?></p>
        <input type="password" name="password" placeholder="Password">
        <p style="color:red; position: absolute; top:180px;"><?php echo $passwordErr;?></p>
        <input type="password" name="confirmpassword" placeholder="Confirm Password">
        <p style="color:red; position: absolute; top:248px;"><?php echo $confirmpasswordErr;?></p>
        <input type="text" name="email" placeholder="Email">
        <p style="color:red; position: absolute; top:400px;"><?php echo $notification;?></p>
				<button type="submit">SIGN UP</button>
			</form>
      <div id="signup">
				<p style="color: gray; position: absolute; top: 20px;">Sign up successfully?</p>
        <a href="index.php" id="linksignup">SIGN IN NOW</a>
			</div>
    </div>
	</div>
</body>
</html>
