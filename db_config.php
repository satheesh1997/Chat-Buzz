<?php

define ("DB_HOST", "sql202.rf.gd"); // set database host

define ("DB_USER", "rfgd_19137621"); // set database user

define ("DB_PASS","vaioxloud"); // set database password

define ("DB_NAME","rfgd_19137621_Imad"); // set database name



$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make sql connection.");

$db = mysql_select_db(DB_NAME, $link) or die("Couldn't select sql database");


function add_msg($sid,$rid,$title,$msg){
    $sql="INSERT INTO `msgs` (`msg_id`, `sid`, `rid`, `title`, `msg`, `date`, `time`, `read`) VALUES (NULL, '$sid', '$rid', '$title', '$msg', CURRENT_DATE(), CURRENT_TIME(), '0')";
    $query=mysql_query($sql);
    if(!$query){
        $error="Database Error".mysql_error();
        return $error;
    }
    else{
        return 1;
    }
}

function add_user($username,$mpass,$fullname,$email,$default_dp,$ip){
    $sql="INSERT INTO users (username,password,name,email,dp,ip) VALUES ('$username', '$mpass', '$fullname', ' $email', '$default_dp', '$ip')";
    $query=mysql_query($sql);
    if($query){
        return 1;
    }
    else{
        $error="Database Error".mysql_error();
        return 0;
    }
}

function add_session($sid){
    $sql = "INSERT INTO chat_sid (session) VALUES ('$sid')" ;
    $query = mysql_query($sql);
    if($query){
        return 1;
    }
    else{
        $error="Database Error".mysql_error();
        return $error;
    }
}

function add_chat($muser,$msg){
    $sql="INSERT INTO chat (user_id,message,date) VALUES ('$muser', '$msg',CURRENT_DATE())";
    $query=mysql_query($sql);
    if($query){
        return 1;
    }
    else{
        $error="Database Error".mysql_error();
        return $error;
    }

}

function setonline($u_id){
    $sql="UPDATE users SET online =1 WHERE u_id = '$u_id'";
    $query = mysql_query($sql);
}

function login($name,$pwd){
        echo ($name);
        echo "<br>";
        echo ($pwd);
        $sql = "SELECT * FROM users WHERE username = '$name' AND password = '$pwd'";
        $query = mysql_query($sql);
        if(mysql_num_rows($query) > 0){
            $row=mysql_fetch_array($query);
            $uid=$row['u_id'];
            echo "<br>";
            echo $uid;
            $sid=md5($username+time());
            $sql = "UPDATE `chat_sid` SET `session` =  '$sid' WHERE `sid` = '$uid'";
            $query = mysql_query($sql);
            $ip=$_SERVER['REMOTE_ADDR'];
            $iql = "UPDATE `users` SET `ip` =  '$ip' WHERE `u_id` = '$uid'";
            $iquery = mysql_query($isql);
            setcookie("uid",$uid);
            setcookie("SESSION_ID",$sid);
            return 1;
            //header("location: ./home.php");
        }
        else{
            setcookie("LOGIN_ERROR","User Not Found");
            return 0;
            //header("location: ./index.php");
        }
}

function show_msgs($uid){
            $sql="SELECT * FROM msgs WHERE rid = '$uid'";
            $msgs=mysql_query($sql);
            if(mysql_num_rows($msgs) > 0){
                while($row=mysql_fetch_array($msgs)){
                    $msid=$row['rid'];
                    $msg_s=$row['msg'];
                    $mtitle=$row['title'];
                    $send_id=$row['sid'];
                    $date=$row['date'];
                    $time=$row['time'];
                    $ssql="SELECT * FROM users WHERE u_id = '$send_id'";
                    $squry=mysql_query($ssql);
                    if(mysql_num_rows($squry) > 0){
                        $srow=mysql_fetch_array($squry);
                        $sname=$srow['name'];
                    }
                    echo "
                    <div class=\"container\">      
                    <div class=\"bio\">
                        <div class=\"overlay\">
                            <h4 class=\"mint mtitle\">{$mtitle}</h4>
                            <div class=\"minfo\">
                            <a class=\"ma\" href=\"./profile.php?u_id={$send_id}\">
                            {$sname}</a>&nbsp;&nbsp;&nbsp;[{$date}&nbsp; | &nbsp;{$time}]</div>
                            <details>
                                <summary> Click To Read Msg!</summary>
                            <div class=\"mmsg\"><br><br>{$msg_s}</div>
                        </details>
                        <hr>
                        </div>
                        
                    </div>
                        <div class=\"space\"></div>
                </div>
                <div class=\"space\"></div>
                
                ";
                }
            }
}


function online($uid){
    $csql = "SELECT * FROM users WHERE u_id = '$uid'";
    $cquery=mysql_query($csql);
    if(mysql_num_rows($cquery) > 0){
        $cdata=mysql_fetch_array($cquery);
        $isonline=$cdata['online'];
    }
    return $isonline;
}



?>
