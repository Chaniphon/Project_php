<?php
session_start();
  include "../query/connect.php";
  $M_id = $_SESSION['m_id'];
// LOAD CUSTOMER NAME
$nsql = "select m_fname from member where m_id = '$M_id'";
$nload = $con->query($nsql);
if($ndata = $nload->fetch_assoc()) $fname = $ndata['m_fname'];
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>apple.com</title>
    <link rel="shortcut icon" href="Citycons_train_icon-icons.com_67910.ico" type="images/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body { 
                font-family: 'FC Lamoon' !important;
                padding:0;
                margin:0;
                background-color: #D3D3D3;
        }
        h1 {
                font-size: 40px;
                color: black;
                text-align: center;
                margin-top: 160px;
                letter-spacing: 2px;
                line-height: 0.6;
                /*text-shadow: 4px 2px rgb(178, 181, 182);*/
        }
        h4 {
                font-size: 20px;
                color: black;
                text-align: center;
                margin-top: 160px;
                letter-spacing: 2px;
                line-height: 0.6;
                /*text-shadow: 4px 2px rgb(178, 181, 182);*/
            }


        .dropdown:hover .dropdown-content {
                display: block;
              }
              .dropdown {
                position: relative;
              }
              ul.dropdown-content li a {
                position: relative;
                display: block;
                padding: 15px 20px;
                text-align: center;
                border-bottom: 1px solid lightgray;
                transition: 400ms ease-in-out;
                background-color: white;
              }
              ul.dropdown-content li a:hover{
                  background:lightgray;
              }
        
              a.dropdown-container {
                background: gray;
                color: white;
                padding: 10px 20px;
                position: relative;     
                display: block;
                text-decoration: none;
                border-radius: 5px;
              }
              ul.dropdown-content {
                list-style: none;
                width: 200px;
                margin-top: 0;
                right: 0;
                opacity: 1;
                padding: 0;
                position: absolute;
                box-shadow: 0 19px 30px rgb(0 0 0 / 40%);
                z-index: 9;
                display: none;
                animation:fadein 600ms 1 ease;
              }
        
              @keyframes fadein {
                  from{
                      opacity: 0;
                      margin-top: -30px;
                  } to {
                      opacity: 1;
                      margin-top: 0;
                  }
                }

                th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
  
    </style>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">
  
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;top:0" id="mySidebar"><br>
            <div class="w3-container">
                <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
            <i class="fa fa-remove"></i>
                </a>
            <div class="row d-inline-block align-center" style="d-flex justify-content-center">
            
            <p class="w3-text-grey" style="font-size:40px">Store House</p>
            </div>
            </div>
           
            
       
        <div class="w3-bar-block" style="font-size:22px">
            <a href="admin.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal" ><i class="fa fa-th-large fa-fw w3-margin-right" style="font-size:20px"></i>HOME</a> 
            <a href="show_pd.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding "><i class="fa fa-apple fa-fw w3-margin-right" style="font-size:20px"></i>PRODUCT</a> 
            <a href="add_pd.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="	fa fa-check-square fa-fw w3-margin-right" style="font-size:20px"></i>ADD PRODUCT</a> 
            <a href="show_member.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw w3-margin-right" style="font-size:20px"></i>MEMBER</a> 
            <a href="admin1.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user-circle-o fa-fw w3-margin-right" style="font-size:20px"></i>ADMIN</a>
            <a href="logout_admin.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-expeditedssl fa-fw w3-margin-right" style="font-size:20px"></i>LOGOUT</a>
        </div>
        
        <div class="w3-panel w3-large d-flex justify-content-center padding:20px">
            <a href="https://www.facebook.com/apple/"><i class="fa fa-facebook-official w3-hover-opacity" style="padding-right:20px"></i></a>
            <a href="https://twitter.com/Apple"><i class="fa fa-twitter w3-hover-opacity"  style="padding-right:20px"></i></a>
            <a href="https://www.instagram.com/apple/"><i class="fa fa-instagram w3-hover-opacity"></i></a>
        </div>
      
        </nav>
        <div class="container-fluid" style="padding-left:300px;">
        <div class="container" style="margin-top: 7.0rem!important;">
    <div class="row">
        <div class="col-lg-12" >
            <h1 class="text-black" style="text-align:center; padding:50px; font-size:50px; font-family:FC Lamoon">แก้ไขข้อมูล User</h1>
            <form  method="post">
                    <div class="row my-8">
                        <?php
                        // LOAD DATA
                        $sql ="select * from member where m_id = '$M_id'";
                        $load =$con->query($sql);
                        if($data = $load->fetch_assoc()):
                        ?>
                        <div class="mb-3 col-lg-6 mt-5" >
                        <label for="fname" class="text-black" style="font-size:26px; font-family:FC Lamoon">ชื่อจริง</label>
                        <input id="fname" type="text" name="fname" value="<?php echo $data['m_fname'] ?>" required class="form-control" style="font-size:22px; font-family:FC Lamoon">
                    </div>
                    <div class="mb-3 col-lg-6 mt-5">
                        <label for="lname" class="text-black" style="font-size:26px; font-family:FC Lamoon">นามสกุล</label>
                        <input id="lname" type="text" name="lname" value="<?php echo $data['m_lname'] ?>" required class="form-control" style="font-size:22px; font-family:FC Lamoon">
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="date" class="text-black" style="font-size:26px; font-family:FC Lamoon">วันเกิด</label>
                        <input id="date" type="text" onfocus="(this.type='date')" name="date" value="<?php echo $data['m_date'] ?>" required class="form-control" style="font-size:22px; font-family:FC Lamoon">
                    </div>
                    <div class="mb-3 col-lg-8">
                        <label for="tel" class="text-black" style="font-size:26px; font-family:FC Lamoon">เบอร์โทรศัพท์</label>
                        <input id="tel" type="text" name="tel" maxlength="10" value="<?php echo $data['m_tel'] ?>" required class="form-control" style="font-size:22px; font-family:FC Lamoon">
                    </div>
                   
                    <div class="mb-3 col-lg-12">
                        <label for="mail" class="text-black" style="font-size:26px; font-family:FC Lamoon">Email</label>
                        <input id="mail" type="text" name="mail" value="<?php echo $data['m_maill'] ?>"  required class="form-control"style="font-size:22px; font-family:FC Lamoon">
                    </div>
                    
                    
                    <div class="mb-3 col-lg-6">
                        <label for="username" class="text-black" style="font-size:26px; font-family:FC Lamoon">Username</label>
                        <input id="username" type="text" name="username" value="<?php echo $data['m_username'] ?>" required class="form-control" style="font-size:22px; font-family:FC Lamoon">
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="password" class="text-black" style="font-size:26px; font-family:FC Lamoon">Password</label>
                        <input id="password" type="password" name="password" value="<?php echo $data['m_password'] ?>" required class="form-control" style="font-size:22px; font-family:FC Lamoon">
                    </div>
                    <div class="mb-3 col-lg-12">
                        <a href="show_member.php" class="btn btn-outline-success" tabindex="-1" role="button" aria-disabled="true" style="float: right"><font size="5">บันทึกข้อมูล</font></a>
                    </div>
                    
                        <?php
                        endif;
                        ?>
                    </div>
            </form>
        </div>
    </div>
</div>
        </div>
        
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
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
    $('#sendData').click (function(){
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var date = $('#date').val();
            var tel= $('#tel').val();
            var mail= $('#mail').val();
            var username = $('#username').val();
            var password = $('#password').val();
           
        $.ajax({
            url:'../user_update.php',
            type:'post',
            data:{
                        m_fname:fname,
                        m_lname:lname,
                        m_date:date,
                        m_tel:tel,
                        m_maill:mail,
                        m_username:username,
                        m_password:password,
                
            },
            success:function(value){
                if(value.status == 1){
                    swal("บันทึกข้อมูลสำเร็จ",value.text,"success").then(()=>{
                        location.reload();
                    });
                } else if(value.status == 2){
                    swal("บันทึกข้อมูลไม่สำเร็จ",value.text,"error")
                }
            },
            error:(err,t,x)=>{
                swal("ดำเนินการไม่สำเร็จ",err.responseText,"error");
            }
        })
    });
</script>
</body>
</html>