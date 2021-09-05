<?php
// this for when you are not login and logout option is not showing 
 $login=false;
  if(isset($_SESSION['login']) && $_SESSION['login']==true){
    $login=true;
  } 
  
  
 
    if(!$login){
    echo '<a href="/loginsystem/wl.php">home</a>
    <a href="/loginsystem/singup.php">singup</a>
    <a href="/loginsystem/login.php">login</a>';
    }else{
        echo '<a href="/loginsystem/wl.php">home</a>
        <a href="/loginsystem/singup.php">singup</a>
        <a href="/loginsystem/login.php">login</a> 
      <a href="/loginsystem/logout.php">logout</a>';
    }
?>