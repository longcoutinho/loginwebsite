<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/index_main.css">
  <link rel="stylesheet" href="assets/css/index_container.css">
  <link rel="stylesheet" href="assets/css/container.css">
  <title>Login</title>
</head>
<body>
  <?php 
    $usernameErr = $passwordErr = "";
    $username = $password = $notification = "";
    if($_SERVER["REQUEST_METHOD"] == "POST" && (!isset($_POST["submit"]))) {
      if(empty($_POST["username"])) {
        $usernameErr = "Username is required";
      }
      else {
       $username = $_POST["username"];
        if(!preg_match("/^[a-zA-z0-9]*$/",$username)) {
          $usernameErr = "Only letters and numbers allowed";
        }
        else $usernameErr = "";
      }

      if(empty($_POST["password"])) {
        $passwordErr = "Password is required";
       }
      else {
       $password = $_POST["password"];
        if(!preg_match("/^[a-zA-z0-9]*$/",$password)) {
          $passwordErr = "Only letters and numbers allowed";
        }
        else $passwordErr = "";
      }
    if ($usernameErr==""&&$passwordErr=="") {
      $username.="@";
      if (!empty($_SESSION[$username])) {
        if ($_SESSION[$username] != $password) $notification = "Username or password incorrect!";
        else {
          $notification = "";
          header("Location: loginsuccessfull.php");
        }
      }
      else {
        $notification = "Username or password incorrect!";
      }
    }
  }
  ?> 
  <div id="container">
    <div id="content">
      <div id="titlelogin">
        <p id="psignin">SIGN IN</p>
      </div>
      <form id="formlogin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="text" name="username" placeholder="Username">
        <p style="color:red; position: absolute; top:106px;"><?php echo $usernameErr;?></p>
        <input type="password" name="password" placeholder="Password">
        <p style="color:red; position: absolute; top:180px;"><?php echo $passwordErr;?></p>
        <p id="forgotpassword">Forgot <a href="forgot.php">Username/Password</a></p>
				<button type="submit">SIGN IN</button>
        <p style="color:red; position: absolute; top:350px;"><?php echo $notification;?></p>
      </form>
      <div id="signup">
				<p style="color: gray; position: absolute; top: 20px;">Don't have an account?</p>
        <a href="signup.php" id="linksignup">SIGN UP NOW</a>
			</div>
    </div>
	</div>
</body>
</html>
