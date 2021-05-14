<?php
session_start();
include 'query/connect.php';
if(!isset($_SESSION['m_id'])){
    $_SESSION['error'] = "กรุณาเข้าสู่ระบบ";
    header("location:index.php");
}
$M_id = $_SESSION['m_id'];
// LOAD CUSTOMER NAME
$nsql = "select m_fname from member where m_id = '$M_id'";
$nload = $con->query($nsql);
if($ndata = $nload->fetch_assoc()) $fname = $ndata['m_fname'];
?>
<html>
<head>
    <meta charset="UTF-8">
    <!-- CSS -->
    
    <link rel="stylesheet" href="css/main.css">
    <!-- END CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <title>Edit Profile</title>
</head>
<body style="background-color: #D3D3D3">

<div class="container" style="margin-top: 7.0rem!important;">
    <div class="row">
        <div class="col-lg-12" >
            <h1 class="text-black" style="text-align:center; padding:50px; font-size:50px; font-family:FC Lamoon">แก้ไขข้อมูลส่วนตัว</h1>
            <form  method="post">
                    <div class="row my-8" style="font-family:FC Lamoon">
                        <?php
                        // LOAD DATA
                        $sql ="select * from member where m_id = '$M_id'";
                        $load =$con->query($sql);
                        if($data = $load->fetch_assoc()):
                        ?> 
                    <div class="mb-3 col-lg-6 mt-5" >
                        <label for="fname" class="text-white" style="font-size:26px; font-family:FC Lamoon; font-color:black">ชื่อจริง</label>
                        <input id="fname" type="text" name="fname" value="<?php echo $data['m_fname'] ?>" required style="font-size:22px" class="form-control">
                    </div>
                    <div class="mb-3 col-lg-6 mt-5">
                        <label for="lname" class="text-white" style="font-size:26px; font-family:FC Lamoon">นามสกุล</label>
                        <input id="lname" type="text" name="lname" value="<?php echo $data['m_lname'] ?>" required style="font-size:22px" class="form-control">
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="date" class="text-white" style="font-size:26px; font-family:FC Lamoon">วันเกิด</label>
                        <input id="date" type="text" onfocus="(this.type='date')" name="date" value="<?php echo $data['m_date'] ?>" required style="font-size:22px" class="form-control">
                    </div>
                    <div class="mb-3 col-lg-8">
                        <label for="tel" class="text-white" style="font-size:26px; font-family:FC Lamoon">เบอร์โทรศัพท์</label>
                        <input id="tel" type="text" name="tel" maxlength="10" value="<?php echo $data['m_tel'] ?>" required style="font-size:22px" class="form-control">
                    </div>
                   
                    <div class="mb-3 col-lg-12">
                        <label for="mail" class="text-white" style="font-size:26px; font-family:FC Lamoon">Email</label>
                        <input id="mail" type="text" name="mail" value="<?php echo $data['m_maill'] ?>"  required style="font-size:22px" class="form-control">
                    </div>
                    
                    
                    <div class="mb-3 col-lg-6">
                        <label for="username" class="text-white" style="font-size:26px; font-family:FC Lamoon">Username</label>
                        <input id="username" type="text" name="username" value="<?php echo $data['m_username'] ?>" required style="font-size:22px" class="form-control">
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="password" class="text-white" style="font-size:26px; font-family:FC Lamoon">Password</label>
                        <input id="password" type="password" name="password" value="<?php echo $data['m_password'] ?>" required style="font-size:22px" class="form-control">
                    </div>
                    <div class="mb-3 col-lg-12">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:1rem;">
                        <tr>
                            <td></td>
                            <td colspan="6" align="right">
                                <button type="button" ID="sendData" class="btn btn-success" style="float: right; font-size:22px">บันทึกข้อมูล</button> 
                            </td>
                            <td></td>
                            <td colspan="6" align="right">
                                <button type= "button" class="btn btn-danger" onclick="window.location.href='/PROJECT_PHP/index.php'" style="float: right; font-size:22px">กลับหน้าหลัก</button>
                            </td>
                        </tr>
                    </table>
                    </div>
                    
                        <?php
                        endif;
                        ?>
                    </div>
            </form>
        </div>
    </div>
</div>



<!-- Script -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>

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
            url:'user_update.php',
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