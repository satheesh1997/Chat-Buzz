<?php
function check_user(){
    $check_id=$_COOKIE['uid'];
    $ssid=$_COOKIE['SESSION_ID'];
    $isonline=online($check_id);
    if($isonline == 1){
        $csql = "SELECT * FROM chat_sid WHERE sid = '$check_id'";
        $cquery=mysql_query($csql);
        if(mysql_num_rows($cquery) > 0){
            $cdata=mysql_fetch_array($cquery);
            $csid=$cdata['session'];
        }
    }
    else{
        setcookie("uid","",time()-3600);
        setcookie("SESSION_ID","",time()-3600);
        header("loacation:./index.php");
        exit(0);
    }

    if($ssid != $csid){
        setcookie("uid","",time()-3600);
        setcookie("SESSION_ID","",time()-3600);
        header("location:./index.php");
            exit(0);
    }
    
}

if($_GET["qu"]){
    $username=$_GET["qu"];
    include_once("./db_config.php");
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $query= mysql_query($sql);
    if(mysql_num_rows($query) > 0){
        mysql_close($link);
        echo "notok";
    }
}

?>