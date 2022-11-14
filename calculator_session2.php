<?php
  session_start();
  if(!empty($_SESSION["expression"])){
    echo "Последнее действие: " . $_SESSION["expression"]; 
  }      
?>