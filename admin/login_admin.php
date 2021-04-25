<?php
session_start();
require('../query/connect.php');
?>
<html>
<head>
    <meta charset="UTF-8">
   <!-- <link rel="stylesheet" href="assets/css/index.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous"> 
    <title>apple.com</title>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body style="background-image: url('../2.png')" > 
<center>
   <div class"#CC8236">
    <div class="login-container">
        <h1 style="font-family:FC Lamoon; size: 22px; color:black"><strong> Login </strong></h1>
       
        <form method="post" style="font-family:FC Lamoon">
            <div class="container">
                <div class="row">
                    <div class="mb-3 col-md-12 col-sm-12 mt-5"> 
                         <label for="username" class="text-white"><font size="6" color="black">Username</font></label>
                        <input id="a_username" type="text" placeholder="Username" name="username" class="form-control" style="width:50%">
                    </div>
                    <div class="mb-3 col-md-12 col-sm-12">
                    <label for="password" class="text-white"><font size="6" color="black">Password</font></label>
                        <input id="a_password" type="password" placeholder="Password" name="password" class="form-control" style="width:50%">
                    </div><center>
                    <div class="mb-3 col-md-6 col-sm-12" style="width:70%">
                    <button type="button" id="sendData"class="btn btn-success form-control"  style="width:50%"><font size="5" color="black">Login</font></button>  
                    </div></center>
                </div>
            </div>
            </form>
        </div>
    </div>
</center>
<!-- script-->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
    
    <script>
    $('#sendData').click(function(){

        var user = $('#a_username').val();
        var pass = $('#a_password').val();

        if(user == ''){
            swal("ผิดพลาด","กรุณากรอกข้อมูลให้ครบถ้วน","error");
        } else if(pass == ''){
            swal("ผิดพลาด","กรุณากรอกข้อมูลให้ครบถ้วน","error");
        } else {
            $.ajax({
                url:'ch-login_admin.php',
                type:'post',
                data:{
                    a_username:user,
                    a_password:pass
                },
                success:function(value){
                    console.log(value);
                    if(value.status == 1){
                        console.log(1)
                        swal("เข้าสู่ระบบสำเร็จ",value.text,"success").then(()=>{
                        window.location.href="admin.php";
                        });
                    } else if(value.status == 2){
                        console.log(2)
                        swal("เข้าสู่ระบบไม่สำเร็จ",value.text,"error").then(()=>{
                            $('#ClearData').click();
                        });
                    } else if(value.status == 3){
                        console.log(3)
                        swal("เข้าสู่ระบบไม่สำเร็จ",value.text,"error").then(()=>{
                            $('#ClearData').click();
                        });
                    }
                }
            })
        }
        
    })
</script>
</body>
</html