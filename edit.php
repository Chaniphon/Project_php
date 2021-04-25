<?php
session_start();
error_reporting(0);

include 'query/connect.php';
$user_id = "";
if (isset($_SESSION['m_id'])) $user_id = $_SESSION['m_id'];
$p_id = $_REQUEST['pro_id'];
$act = $_REQUEST['act'];
if($act == 'add' && !empty($p_id)){
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    if(isset($_SESSION['cart']) && $act == 'update'){
        $_SESSION['cart'][$p_id]++;
    } else {
        $_SESSION['cart'][$p_id] = 1;
    }

}

//print_r($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    
    
    <!-- END CSS -->
    <link rel="shortcut icon" href="assets/images/concert.png" type="image/x-icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>History</title>
    <style>
    .dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    z-index:999;
    right:1rem;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
body {
    font-family: "FC Lamoon";
    font-size: 22px;
}

.mySlides {display: none}
</style>
</head>

<script>
    function showResult(str){
      if(str.length ==0){
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.border="0px";
        document.getElementById("livesearch").style.display="none";

        return;
      }
      var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.display="block";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>

<body>

<div class="w3-top">
  <div class=" w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="ipad.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">IPAD</a>
    <a href="iphone.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">IPHONE</a>
    <a href="mac.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">MAC</a>
    <a href="watch.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">WATCH</a>
    <a href="airpods.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">AIRPODS</a>


    <div class="dropdown w3-right w3-padding" >
        <button class="btn btn-outline-danger"><font size="4">USER</font></button>
            <ul class="dropdown-content">
                <li>
                    <a href ="login.php" class="btn"><font size="4">เข้าสู่ระบบ</font></a>
                </li>
                <li>
                    <a href ="user.php" class="btn"><font size="4">ประวัติการสั่งซื้อ</font></a>
                </li>
                <li>
                    <a href ="user_setting.php" class="btn"><font size="4">แก้ไขข้อมูลส่วนตัว</font></a>
                </li>
                <li >
                    <a href="logout.php" class="btn.green"><font size="4">ออกจากระบบ</font></a>
                </li>
            </ul>
    </div>

    <a href="view_order.php" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox=" 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
</svg></a>  
<a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>
  </div>
</div>

<div class="container" style="margin-top: 2rem!important;">
    <div class="row">
        <div class="col-lg-12">
            <h4 style="text-align:center; padding:50px; font-size:50px; font-family:FC Lamoon">ประวัติคำสั่งซื้อ</h4>
            
            <table class="table table-hover">
                <thead>
                    <tr align="center" style="font-size:22px">
                        <th>ลำดับที่</th>
                        <th>รหัสการสั่งจอง</th>
                        <th>ชื่อสินค้า</th>
                        <th>วันที่การสั่งซื้อ</th>
                      
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($_SESSION['cart'] as $p_id => $qty){

                    
                    // LOAD ORDER DATA
                    $sql = "select * from product where p_id = '$p_id' ";
                    $load = $con->query($sql);
                    $i=0;
                    while($data = $load->fetch_assoc()):
                ?>
                        <tr align="center" valign="middle">
                            <td><?php echo $i += 1 ; ?></td>
                            <td><?php echo $data['p_id']; ?></td>
                            <td><?=$data['p_name']?></td>
                            <td><?php echo date('d-F-Y ') ?></td>
                           
                        </tr>
                <?php
                    $i++;
                endwhile;
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-12 d-flex flex-row-reverse">
            <a href="view_order.php" class="btn btn-outline-success" style="font-size:22px" type="button">คำสั่งซื้อ</a>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>

<script>
    $('#buy').click(function(){
        swal("คุณต้องการสั่งซื้อสินค้าใช่หรือไม่",{
            buttons:{
                yes:{
                    text:"ดำเนินการต่อ",
                    value:"ok"
                },
                cancel:"ไม่ทำรายการต่อ"
            }
        })
        .then((value)=>{
            switch(value){
                case "ok" :
                    $.ajax({
                        url:'query/buy.php',
                        type:'post',
                        data:'',
                        success:(value)=>{
                            if(value.status == 1){
                                swal("ดำเนินการสำเร็จ",value.text,"success").then(()=>{
                                    window.location.href="view_order.php";
                                })
                            }
                            else {
                                swal("ผิดพลาด",value.text,"error");
                            }
                        },
                        error:(err)=>{
                            swal("ผิดพลาด",err.responseText,"error");
                        }
                    })
                    break;
            }
        })
    })
</script>
</body>
</html>