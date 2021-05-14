<?php
session_start();
//error_reporting(0);

include 'query/connect.php';
$user_id = "";
if (isset($_SESSION['m_id'])) $user_id = $_SESSION['m_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/61073c59a0.js" crossorigin="anonymous"></script>
    <title>Index</title>
<style>
    body {font-family: "Lato", sans-serif}
    .mySlides {display: none}

    h1 {
                font-size: 60px;
                color: black;
                text-align: center;
                margin-top: 100px;
                letter-spacing: 2px;
                line-height: 0.6;
                /*text-shadow: 4px 2px rgb(178, 181, 182);*/
            }
</style>
    
</head>

<script>
    function showResult(str) {
        if (str.length == 0) {
            document.getElementById("livesearch").innerHTML = "";
            document.getElementById("livesearch").style.border = "0px";
            document.getElementById("livesearch").style.display = "none";

            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("livesearch").innerHTML = this.responseText;
                document.getElementById("livesearch").style.display = "block";
            }
        }
        xmlhttp.open("GET", "livesearch.php?q=" + str, true);
        xmlhttp.send();
    }
</script>
<style>
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

</style>
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

<br><br>
<?php
if (isset($_GET['act'])):
    ?>

    
<?php
endif;
?>
<?php
$sql = "select * from product where p_id = '" . $_GET['p_id'] . "'";
$load = $con->query($sql);
if ($data = $load->fetch_assoc()):
    ?>
    <div class="abcdefghijklmnopqurtuvwxyz">
       <!-- <img class="imgx" src="img/<?= $data['p_pic'] ?>" alt=""> -->
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-5">
                    <center><img src="img/<?= $data['p_pic'] ?>" width="50%" alt="" class="img-fluid"></center>
                </div>
                <div class="col-md-8 mt-5">
                    <span class="header-t"></span>
                    <div class="header-text" style="padding:5px;">
                        <h1 style="font-family:FC Lamoon"><?= $data['p_name'] ?></h1>
                    </div>
                    <div class="container" style ="margin-top:3.5rem;">
                        <div class="row">
                            <div class="col-md-4; width:100%">
                                <div class="row">
                                    <div class="col-md-9 " style="padding:15px;">
                                        <div class="col-header">
                                            <i class="fas fa-info-circle"></i>  <font size="5"><strong>ข้อมูลตัวเครื่อง</strong></font>
                                        </div>
                                        <div class="col-text">
                                            <?= $data['p_detail'] ?>
                                        </div>
                    </div>
            </div>
        </div>
                           
                            <div class="col-md-4; width:100%">
                                <div class="row">
                                    <div class="col-md-9" style="padding:10px;margin-top:5px">
                                        <div class="col-header" >
                                            <i class="fas fa-hand-holding-usd"></i>  <font color="red"><strong>ราคาสินค้า</strong></font>
                                        </div>
                                        <div class="col-text" style="line-height:20px;padding-left:20px;margin-top:5px">
                                            <?= $data['p_price'] ?>
                                        </div>
                                    <div class="col-md-9 " style="padding:10px;">
                                        <div class="col-header" style="margin-top:10px">
                                         Memory
                                        </div> 
                                        <div class="col-md-9 " style="padding:5px;margin-top:5px">
                                        <select id="pro_memory" name="pro_memory" class="form-select" readonly="true">
                                                <?php
                                                $sql = "select pro_name from pro_memory";
                                                $load = $con->query($sql); 
                                                while ($data = $load->fetch_assoc()):
                                                    echo "<option value=".$data['pro_name'].">".$data['pro_name']."</option>";
                                                endwhile;
                                                ?>
                                        </select>
                                    </div>
                                        <div style="padding:5px;margin-top:10px">
                                            <a href="view_order.php?pro_id=<?=$_GET['p_id']?>&act=add" class="btn btn-danger mt-4 form-control" style="font-size:20px">กดซื้อสินค้า</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="black-black">
            
        </div>
    </div>
<?php
endif;
?>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    function add(){
          console.log($('#memory').val())    
          window.location.href = "view_order.php?pro_id=<?= $_GET['pro_memory']?>&act=add&price=" + $('#memory').val();
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>
</body>
</html>