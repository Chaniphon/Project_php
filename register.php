<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>apple.com</title>
    
   <!-- <link rel="shortcut icon" href="Citycons_train_icon-icons.com_67910.ico" type="images/x-icon">  -->
   
</head>
<body style="background-image: url('2.png')" >
    <div class="login-container">
        <h1><strong> Register </strong></h1>
        <form id="form_data" method="post">
            <div class="container">
                <div class="row">
                    
                    <div class="mb-3 col-lg-6 mt-5" >
                        <label for="fname" class="text-white"><font size="5" color="black">ชื่อจริง</font></label>
                        <input id="fname" type="text" name="fname" placeholder="Firstname" required class="form-control">
                    </div>
                    <div class="mb-3 col-lg-6 mt-5">
                        <label for="lname" class="text-white"><font size="5" color="black">นามสกุล</font></label>
                        <input id="lname" type="text" name="lname" placeholder="Lastname" required class="form-control">
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="date" class="text-white"><font size="5" color="black">วันเกิด</font></label>
                        <input id="date" type="text" onfocus="(this.type='date')" name="date" placeholder="Date" required class="form-control">
                    </div>
                    <div class="mb-3 col-lg-8">
                        <label for="tel" class="text-white"><font size="5" color="black">เบอร์โทรศัพท์</font></label>
                        <input id="tel" type="text" name="tel" maxlength="10" placeholder="Phone number" required class="form-control">
                    </div>
                   
                    <div class="mb-3 col-lg-12">
                        <label for="mail" class="text-white"><font size="5" color="black">Email</font></label>
                        <input id="mail" type="text" name="mail"  placeholder="E-mail" required class="form-control">
                    </div>
                    
                    <div class="mb-3 col-lg-6">
                        <label for="username" class="text-white"><font size="5" color="black">Username</font></label>
                        <input id="username" type="text" name="username" placeholder="Username" required class="form-control">
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="password" class="text-white"><font size="5" color="black">Password</font></label>
                        <input id="password" type="password" name="password" placeholder="Password" required class="form-control">
                    </div>
                    
                    <div class="mb-3 col-lg-12">
                        <button id="sendData" class="btn btn-success form-control" type="button"><font size="5" color="black">Register</font></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
        <script>
       $('#sendData').click(function(){

        
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var date = $('#date').val();
            var tel= $('#tel').val();
            var mail= $('#mail').val();
            var username = $('#username').val();
            var password = $('#password').val();
           
            if(fname == '' || lname == '' || date=='' || tel == '' || mail== '' || username == '' || password == ''){
                swal("ผิดพลาด","กรุณากรอกข้อมูลให้ครบถ้วน","error");
            }
            else {
                $.ajax({
                    url:'query/ris.php',
                    type:'post',
                    data:{
                        m_fname:fname,
                        m_lname:lname,
                        m_date:date,
                        m_tel:tel,
                        m_mail:mail,
                        m_username:username,
                        m_password:password,
                        
                    },
                    success:function(value){
                    
                        if(value.status == 1){
                            console.log(1)
                            swal("สมัครสมาชิกสำเร็จ",value.text,"success").then(()=>{
                            window.location.href="login.php";
                            });
                        } else if(value.status == 2){
                            console.log(2)
                            swal("สมัครสมาชิกไม่สำเร็จ",value.text,"error").then(()=>{
                                $('#ClearData').click();
                            });
                        }
                    },
                    error:(error)=>{
                        console.log(error.responseText);
                    }
                })    
            }

             
})
</script>
</body>
</html>