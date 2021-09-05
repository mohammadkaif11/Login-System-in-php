<?php
// when user login then it will come on welcome page
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
    header("location:login.php");
    exit;
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome page</title>
</head>
<body>

<?php
require 'navbar.php';
 ?>
 
 <h1> hii welcome here <?php echo $_SESSION['email']?></h1>
  <p>for logout <a href="/loginsystem/logout.php">logout</a></p>
</body>
</html>