<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/index_main.css">
  <link rel="stylesheet" href="assets/css/forgot_container.css">
  <title>Login</title>
</head>
<body>
  <?php
    $username = $password = $notification = ""; 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      if (!isset($_POST["submit"])) {
        $username = $_POST["username"];
        $username.="@";
        if (empty($_SESSION[$username])) {
          $notification = "Username incorrect!";
          $password = "";
        }
        else {
          $password = $_SESSION[$username];
          $notification = "Username correct! Your password is ";
          $notification .= $password;
        }
      }
    }
  ?>
  <div id="container">
    <div id="content">
      <div id="titlelogin">
        <p id="psignin">SO STUPID!<br> YOU ALWAYS FORGET ITS!!!</p>
      </div>
      <form id="formlogin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <p style="padding-top:30px;">Give me your name and email. Actually, just username :v </p>
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="email" placeholder="Email">
				<button type="submit">CONFIRM AND RETRIEVE YOUR PASSWORD</button>
        <p style="color: red; position: absolute; top:400px;"><?php echo $notification;?></p>
			</form>
      <div id="signup">
				<p style="color: gray; position: absolute; top: 20px;">Password has been retrieved?</p>
        <a href="index.php" id="linksignup">SIGN IN NOW</a>
			</div>
    </div>
	</div>
</body>
</html>
