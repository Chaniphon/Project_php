<?php
 require('../query/connect.php');
 header("Content-Type:application/json;charset=UTF-8");

$id = $_GET['p_id'];
$sql = "DELETE FROM product where p_id = '$id'";
mysqli_query($con,$sql) or die ( "DELETE จากตาราง product มีข้อผิดพลาดเกิดขึ้น"
.mysqli_error());
mysqli_close ( $con);
header("Location:show_pd.php");
?>