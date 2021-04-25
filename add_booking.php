<?php
session_start();
require("query/connect.php");
header("Content-Type:application/json");

$M_id = $_POST['login_id'];
//$n_pro = $_POST['amount'];
$chk = true;
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $p_id => $qty) {
        $sql = "SELECT p_price from product where p_id = '$p_id'";
        $load = $con->query($sql);
        $data = $load->fetch_assoc();
        $price = $data['p_price'] * $qty;
        $insert = "INSERT into booking (m_id,p_id,n_pro,b_price,b_save) values ('$M_id','$p_id','$qty','$price',CURRENT_TIMESTAMP)";
       if($con->query($insert)){
        echo json_encode(array("status" => 1, "text" => "ทำการสั่งซื้อสำเร็จ"));

       }
       else {
    echo json_encode(array("status" => 2, "text" => "ทำการสั่งซื้อไม่สำเร็จ"));

       }
}
    }
