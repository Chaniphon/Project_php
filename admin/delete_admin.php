<?php
 require('../query/connect.php');
 header("Content-Type:application/json;charset=UTF-8");

$id = $_GET['a_id'];
$sql = "DELETE FROM admin where a_id = '$id'";
mysqli_query($con,$sql) or die ( "DELETE จากตาราง admin มีข้อผิดพลาดเกิดขึ้น"
.mysqli_error());
mysqli_close ( $con);
header("Location:admin1.php");
?>