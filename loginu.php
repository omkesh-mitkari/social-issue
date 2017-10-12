<?php
session_start();
?>
<html>
<head>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="login-page">
   <div class="form">
    <div class="login">
      <div class="login-header">
        <h3>
          <i
            class="fa fa-lock"
            aria-hidden="true"></i>LOGIN
        </h3>
        <p>Please enter your credentials to login.</p>
      </div>
    </div>
    <form class="login-form" method="POST" action="profile.php">
      <input type="text" placeholder="username" name="email"/>
      <input type="password" placeholder="password" name="password"/>
      <button type="submit">login</button>
    </form>
  </div>
</div>
</body>
</html>
