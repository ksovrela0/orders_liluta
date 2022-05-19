<?php
session_start();
include('db.php');

GLOBAL $db;

$db = new dbClass();
if(isset($_SESSION['user_id'])){
  $userid = $_SESSION['user_id'];
  $db->setQuery("SELECT group_id
                  FROM users
                  WHERE id = $userid");
  $user_group = $db->getResultArray();

  if($user_group['result'][0]['group_id'] == 1){
    include("data.php");
  }
  else{
    include("other.php");
    
  }
  
}
else{
  include("login.php");
}
?>
