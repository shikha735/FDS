<?php
function in_session(){
  if(!isset($_SESSION)) 
  {
    session_start(); 
  }
  if(!isset($_SESSION['employee_id']) || empty($_SESSION['employee_id'])){
    return false;
  }
  else{
    return true;
  }
}

function is_locked(){
  session_start();
  // if(isset($_COOKIE['user']) && $_COOKIE['user'] != ''){
  if(isset($_SESSION['locked']) && !$_SESSION['locked']){
    return false;
  }
  else{
    return true;
  }
}
?>
