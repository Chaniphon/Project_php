<?php
 require('../query/connect.php');
 header("Content-Type:application/json;charset=UTF-8");

$id = $_GET['m_id'];
$sql = "DELETE FROM member where m_id = '$id'";
mysqli_query($con,$sql) or die ( "DELETE จากตาราง member มีข้อผิดพลาดเกิดขึ้น"
.mysqli_error());
mysqli_close ( $con);
header("Location:show_member.php");
?>