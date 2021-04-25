<?php
  session_start();
  include "query/connect.php";
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>AirPord</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
        <button class="btn btn-light"><font size="4">USER</font></button>
            <ul class="dropdown-content">
                <li>
                    <a href ="login.php" class="btn"><font size="4">เข้าสู่ระบบ</font></a>
                </li>
                <li>
                    <a href ="edit.php" class="btn"><font size="4">ประวัติการสั่งซื้อ</font></a>
                </li>
                <li>
                    <a href ="user_setting.php" class="btn"><font size="4">แก้ไขข้อมูลส่วนตัว</font></a>
                </li>
                <li >
                    <a href="logout.php" class="btn"><font size="4">ออกจากระบบ</font></a>
                </li>
            </ul>
    </div>

    <a href="view_order.php" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox=" 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
</svg></a>  
                         
<a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>
  </div>
</div>

<marquee style="font-family: FC Lamoon"><font size="5">ยินดีต้อนรับสู่ Apple Store</font></marquee>

<div class="container">
        <div class="row">
            <?php 
            $sql = "select * from product where p_cat = 5 order by p_id asc";//descจากน้อยไปมาก asc จากมากไปน้อย
            $load =$con->query($sql); //$load = mysqli_query($con,$sql)
            while($data = $load->fetch_assoc()):
            ?>
            <div class="col-md-4 mt-4">
                <div class="card">
                    <a href="product_detail.php?p_id=<?=$data['p_id']?>&act=add" class="btn btn-outline-light">
                    <img src="img/<?=$data['p_pic']?>" height="200px"></a>
                    <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <h5 class="card-title" style="font-family:FC Lamoon"><font size="6"><?=$data['p_name']?></font></h5>
                        </div>
                        <div class="d-flex justify-content-center">
                        <!-- <p class="card-text"><?=$data['p_details']?></p> -->
                        <a href="product_detail.php?p_id=<?=$data['p_id']?>&act=add" class="btn btn-outline-danger" style="font-size:20px">รายละเอียดเพิ่มเติม</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php 
            endwhile;
            ?>
        </div>

<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge; font-family:FC Lamoon; size:20px">
  <p class="w3-medium">Powered by <a  target="_blank">apple @2021</a></p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>    
</body>
</html>