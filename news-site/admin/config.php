<?php
$hostname = "http://localhost/news-site";// //${$hostname} variable name baar baar likhna na pade aur use config.php file me deaclare karna hai 
// header("Location: http://localhost/news-site/admin/users.php")

$conn = mysqli_connect("localhost:3309","root","","news-site") or die("Connection failed : " . mysqli_connect_error());

?>
