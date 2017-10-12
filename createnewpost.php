<?php
session_start();
?>

<!DOCTYPE HTML>
<html>

<body>

<form method="POST" action="createnewpostdb.php" enctype="multipart/form-data">

Title: <textarea name="title"></textarea>
<hr>
Insert image:
<input type="file" name="image" id="image">
<hr>
Description: <textarea  name="description"></textarea>
<hr>
Location: <textarea name="location"></textarea>
<hr>
Blocked by: <textarea name="blocker"></textarea>
<hr>
<input type="submit"></input>

</form>

</body>

</html>