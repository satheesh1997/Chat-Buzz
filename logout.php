<?php
        if(isset($_COOKIE['uid'])){
        //
        include_once("./db_config.php");
        $u_id = $_COOKIE['uid'];
        $sql="UPDATE users SET online =0 WHERE u_id = '$u_id'";
        $query = mysql_query($sql);
        setcookie("uid","",time()-3600);
        setcookie("SESSION_ID","",time()-3600);
        header("location:./index.php");
    }
    else{
        header("location: ./restricted.php");
        exit(0);
    }

    
?>