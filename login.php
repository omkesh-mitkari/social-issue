<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel = "stylesheet"
   type = "text/css"
   href = "loginstyle.css" />
</head>
<body>
<div class="login-page">
<div class="form">
    <form method="post" action="profile.php?login=1">
      <input type="text" placeholder="username" name="email"/>
      <input type="password" placeholder="password" name="password"/>
      <button type="submit">Login</button>
      <p class="message">Not registered? <a href="signup.html">Create an account</a></p>
    </form>
  </div>
  </div>
</div>
</html>