<?php
error_reporting(0);
session_start();


$p_id = $_REQUEST['pro_id'];
$act = $_REQUEST['act'];

if ($act == 'add' && !empty($p_id)) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();

    }
    if (isset($_SESSION['cart'][$p_id]) && $act == 'update') {
        $_SESSION['cart'][$p_id]++;
    } else {
        $_SESSION['cart'][$p_id] = 1;
    }
}

if ($act == 'remove' && !empty($p_id)) {
    unset($_SESSION['cart'][$p_id]);
}

if ($act == 'cancel') {
    unset($_SESSION['cart']);
}

if ($act == 'update') {
    $amount = $_POST['amount'];
    foreach ($amount as $p_id => $total) {
        $_SESSION['cart'][$p_id] = $total;
    }
}

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
    <title>Index</title>
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
<body class="homepage is-preload">
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

    <a href="view_order.php" class="w3-padding-large w3-hover-red w3-hide-small w3-right">></a>  
    <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>
  </div>
</div>

<br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="?act=update" id="frmcart" name="frmcart" method="post">
                <table width="100%" border="0" align="center" class="table table-hover">
                    <thead style="font-size:28px">
                        <td align="center"><strong>No.</strong></td>
                        <td align="center"><strong>Product</strong></td>
                        <td align="center"><strong>Product name</strong></td>
                        <td align="center"><strong>Price</strong></td>
                        <td align="center"><strong>Amount</strong></td>
                        <td align="center"><strong>Total</strong></td>
                        <td align="center"><strong>Delete</strong></td>
                    </tr>
                    </thead>

                    <?php

                    if (!empty($_SESSION['cart'])) {
                        include 'query/connect.php';
                        $total = 0;

                        foreach ($_SESSION['cart'] as $p_id => $n_pro) {
                            $sql = "SELECT * FROM product WHERE p_id ='$p_id'";
                            $qry = $con->query($sql);
                            while ($row = $qry->fetch_assoc()) {

                                $sum = $row['p_price'] * $n_pro;
                                $total += $sum;
                                ?>
                                <tr>
                                    <td align="center"><?= $i += 1 ?></td>
                                    <td align="center">
                                        <img src="img/<?= $row['p_pic'] ?>" width="100">
                                    </td>
                                    <td align="center">
                                        <?= $row['p_name'] ?>
                                    </td>
                                    <td align="center">
                                        <?= $row['p_price'] ?>
                                    </td>
                                    <td align="center" width="45px">
                                        <input type="text" name="amount[<?= $p_id ?>]" value="<?= $n_pro ?>"
                                               class="form-control">
                                    </td>
                                    <td align="center">
                                        <?= number_format($sum, 2) ?>
                                    </td>
                                    <td align="center">
                                        <a href="view_order.php?pro_id=<?= $p_id ?>&act=remove" class="btn btn-danger" style="font-size:20px">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        <tr>
                            <td colspan='6' align="right">รวมราคา</td>
                            <td><?= number_format($total, 2) ?></td>
                        </tr>

                        <?php
                            }
                        ?>
                    <tr>
                        <td></td>
                        <td colspan="6" align="right">
                            <a href="index.php" class="btn btn-dark" style="font-size:20px"> Back </a>
                            <button type="reset" class="btn btn-danger" onclick="window.location.href='/PROJECT_PHP/index.php'" style="font-size:20px"> Clear Order</button>
                            <button type="submit" name="button" id="button" class="btn btn-warning" style="font-size:20px"> Recalculate Price</button>
                            <a id="bookingData" type="button" class="btn btn-success" style="font-size:20px">Confirm</a>
                        </td>
                    </tr>
            </form>

        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

        <script>
    $('#bookingData').click(function () {
        swal("คุณต้องการที่สั่งซื้อสินค้าใช่หรือไม่", {
            buttons: {
                yes: {
                    text: "สั่งซื้อ",
                    value: "ok"
                },
                cancel: "ยกเลิก"
            }
        }).then((value) => {
            switch (value) {
                case "ok":
                    $.ajax({
                        url: 'add_booking.php',
                        type: 'post',
                        data: "login_id=<?=$_SESSION['m_id']?>",
                        success: function (result) {
                            if (result.status == 1) {
                                swal("ดำเนินการสำเร็จ", result.text, "success").then(()=>{
                                    window.location.href="receipt.php";
                                });
                            } else {
                                swal("ดำเนินการไม่สำเร็จ", result.text, "error");
                            }
                        } ,
                        error:err=>{
                            console.log(err.responseText);
                        }
                    })
                    break;
            }
        })
    })

</script>

</body>
</html>