<?php
include "config.php";
if($_SESSION["user_role"] == '0'){
  header("Location: {$hostname}/admin/post.php");
}
$userid = $_GET['id'];//$_GET['id] superglobal variable

$sql = "DELETE FROM user WHERE user_id = {$userid}";// USER IS DATABASE TABLE NAME AND WHERE MEANS user_id of column name

if(mysqli_query($conn, $sql)){
  header("Location: {$hostname}/admin/users.php");
}else{
  echo "<p style='color:red;margin: 10px 0;'>Can\'t Delete the User Record.</p>";
}

mysqli_close($conn);

?>
