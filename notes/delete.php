<?php
require_once("includes/connection.php");

if (!isset($_GET['id'])) {
    header("Location: index.php");
}else{
    $id=$_GET['id'];
$sql="DELETE FROM notes WHERE id='" .$id. "' LIMIT 1";
  if(mysqli_query($conn,$sql)){
    header("Location: index.php");
  }
}
?>