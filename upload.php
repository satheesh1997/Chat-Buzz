<?php
    if(isset($_COOKIE['uid'])){
        //
        include_once("./db_config.php");
        $u_id = $_COOKIE['uid'];
        $Error="";
        $upload=true;
        $img_size=$_FILES['img']['size'];
        $img_type=$_FILES['img']['type'];
        $tname=$_FILES['img']['tmp_name'];
        $img_name=$u_id.".jpg";
        $add="./images/users/$img_name";
        //must be image/jpeg
        if($img_size>2000000){
            $Error="Img Size Must Be Below 10 Mb";
            $upload=true;
            //error msg if img size is greater
        }
        if($img_type!="image/jpeg"){
            $Error="Img Must Be Jpeg/jpg File Format";
            $upload=false;
            //error msg if img is not jpeg
        }
        
        if($upload==false){
                setcookie("uerror",$Error);
                header("location:./ep.php");
        }
        else{
            if(file_exists($add)){
                unlink($add);
            }
            move_uploaded_file($tname,$add);
            $sql = "UPDATE users SET dp  ='$add' WHERE u_id = '$u_id'";
		    $query = mysql_query($sql);
            header("location:./ep.php");
        }
}
else{
   header("location:./restricted.php");
}
?>
