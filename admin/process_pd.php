<?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "applestore";

        $p_id = $_POST['p_id'];
        $p_name = $_POST['p_name'];
        $p_detail = $_POST['p_detail'];
        $p_price = $_POST['p_price'];
        $p_cat = $_POST['cat_id'];

        $conn = mysqli_connect($hostname, $username, $password); 

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error()); }
            
        
        mysqli_select_db($conn , $dbname) ;
        $sql = "UPDATE product SET p_id ='$p_id',p_name ='$p_name',p_detail='$p_detail',p_price='$p_price',p_cat = '$p_cat' WHERE p_id = $p_id";
        

        $result = mysqli_query($conn,$sql);

        $conn->close();

        header("Location: show_pd.php");
?>