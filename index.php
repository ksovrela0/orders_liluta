<?php
session_start();

if(isset($_SESSION['user_id'])){
  include("data.php");
}
else{
  include("login.php");
}
?>
