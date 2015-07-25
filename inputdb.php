<?php
header('Location: http://localhost/JPPage/mainhome.html');
include("fmysql.php");

$sql = "INSERT INTO topic (title, description, created) VALUES ('".$_POST['title']."','".$_POST['description']."',now())"; 
$conn = connect_mysqli("localhost","root","apmsetup","ljs");
$result = mysqli_query($conn,$sql);

?>