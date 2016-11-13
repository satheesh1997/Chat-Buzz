<?php

    include_once("./db_config.php");


    if($_SERVER['REQUEST_METHOD']=='POST'){
        $enum=0;
        $error="Successfully Registered!";
        $username=$_REQUEST["username"];
        $fullname=$_REQUEST["fullname"];
        $pass=$_REQUEST["upassword"];
        $cpass=$_REQUEST["cpassword"];
        $email=$_REQUEST["mail"];
        if($pass != $cpass){
                $error="Re-Type Your Passwords Correctly!";
                setcookie("REG_ERROR",$error);
                header("location:./register.php");
        }
        else {
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $query= mysql_query($sql);
            if(mysql_num_rows($query) > 0){
                    $enum=$enum+1;
            }
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $query= mysql_query($sql);
            if(mysql_num_rows($query) > 0){
                    $enum=$enum+2;
            }
            if($enum==1){
                $error="UserName Already Exists!";
                setcookie("REG_ERROR",$error);
                header("location:./register.php");
            }
            elseif($enum==2){
                $error="Email Already Exists!";
                setcookie("REG_ERROR",$error);
                header("location:./register.php");
            }
            elseif($enum>0){
                $error="Account Already Exists!";
                setcookie("LOGIN_ERROR",$error);
                header("location:./index.php");
            }
            else{
                $default_dp="./images/users/default.jpg";
                $mpass=md5($pass);
                $ip=$_SERVER['REMOTE_ADDR'];
                $sid=md5($username+time());
                add_session($sid);
                $result=add_user($username,$mpass,$fullname,$email,$default_dp,$ip);
                $sql = "SELECT * FROM users WHERE email = '$email'";
                $query = mysql_query($sql);
                if(mysql_num_rows($query) > 0){
                    $row=mysql_fetch_array($query);
                    $rid=$row['u_id'];
                }
                $sid=1;
                $sub="Welcome To Chat Buzz";
                $msg="Welcome To My Chat Client. Have a Nice stay here. Feel free to contact me for quries";
                add_msg($sid,$rid,$sub,$msg);
                if($result){
                    setcookie("LOGIN_ERROR",$error); 
				    header("location:./index.php");
                }
                else{
                    $error="Registeration Failed ".mysql_error();
                    setcookie("REG_ERROR",$error); 
                    header("location:./register.php");
                }
            }
        }
    }
    else{
		header("location:./restricted.php");
    }

?>