
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
// add navbar; 
require 'navbar.php';
 ?>
 
 <?php
 //intially $singup_complete and $password_match are false when some conditiion are true then it  will true. 
 $singup_complete=false;
 $password_match=false;

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
   // connected to database
    include 'conn.php';

    $email=$_POST['email'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];
   
    // intially $_REQUEST is false;
    // $userexits=false;

    $exitsql="SELECT * FROM `login` WHERE email='$email'";
    $result=mysqli_query($conn, $exitsql);
    $exitrows=mysqli_num_rows($result);
    if($exitrows>0){
       Echo "username already exits";
    }else{

     //  $userexits=false;
     //  password hashing;
     //  for used hash from hacker! created hashing password
     
     if(($password==$repassword)){
       $hash=password_hash($password,PASSWORD_DEFAULT);
       //password_hash TWO argument for first  password and second algo
  $sql="INSERT INTO `login` (`email`,`password`) VALUES ('$email','$hash')";
  if(mysqli_query($conn, $sql)){
       $singup_complete=true;    
  }
}else{
    $password_match=true;
}
}
 }
 ?>


 <?php
 //request is successfull

 if($singup_complete){
    echo  '<h1>login is successfull</h1>';
    }
    
 ?>


 <?php
 //when password doesnot match
 if($password_match){
    echo  '<h1>password do not match </h1>';
    }
    
 ?>

 <form action="/loginsystem/singup.php" method="post">
<label for="email">Enter email</label><br>
<input type="email" name="email" id="email"><br>
<label for="password">Enter password </label><br>
<input type="password" name="password" id="password"><br>
<label for="Re-password">confirm password </label><br>
<input type="password" name="repassword" id="repassword"><br>
<input type="submit" value="singup">singup
</form>

</body>
</html>