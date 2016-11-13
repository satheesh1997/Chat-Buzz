<?php

    include_once("./db_config.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_REQUEST['username'];
        $password = md5($_REQUEST['upassword']);
        $result=login($username,$password);
        if($result==1){
            header("location: ./home.php");
        } 
        else{
            header("location: ./index.php");
        } 
    }
    else{
        header("location: ./restricted.php");
        exit(0);
    }
?>