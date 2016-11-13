<?php
include_once("./db_config.php");
if(isset($_COOKIE['uid'])){
        $sid = $_COOKIE['uid'];
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $rid=$_REQUEST['rid'];
            $sub=strip_tags($_REQUEST['sub']);
            $msg=strip_tags($_REQUEST['message']);
            //css function
            $error=add_msg($sid,$rid,$sub,$msg);
        }
}
header("location:./home.php");

?>