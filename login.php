
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
require 'navbar.php';
 ?>

 <?php
  $login_complete=false;

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'conn.php';

    $email=$_POST['email'];
    $password=$_POST['password'];

  //   $sql="SELECT * FROM  login  where email='$email' AND password='$password' ";
  $sql="SELECT * FROM  login  where email='$email'";
  
  $result=mysqli_query($conn, $sql);

  $num = mysqli_num_rows(mysqli_query($conn, $sql));
   
     if($num==1){
      while($row = mysqli_fetch_assoc($result)){
         if(password_verify($password, $row['password'])){
            $login_complete=true;

            // start session 
            session_start();
            $_SESSION['login']=true;
            $_SESSION['email']=$email;
            header("location:wl.php");
         }
      }

    } else{
     echo "your not login ";    
    }
 }
 ?>

 <?php
 if($login_complete){
    echo  '<h1>your are login</h1>';
    }
    
 ?>
 
 

 
<form action="/loginsystem/login.php" method="post">
<label for="email">Enter your user email</label><br>
<input type="email" name="email" id="email"><br>
<label for="password">Enter password </label><br>
<input type="password" name="password" id="password"><br>

<input type="submit" value="login">
</form>

</body>
</html>