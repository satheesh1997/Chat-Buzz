<?php

    include_once("./db_config.php");
    include_once("./check_user.php");
    if(isset($_COOKIE['uid'])){
        $u_id = $_COOKIE['uid'];
        $sql = "SELECT * FROM users WHERE u_id = '$u_id'";
        $query = mysql_query($sql);
        if(mysql_num_rows($query) > 0){
            $row=mysql_fetch_array($query);
            $name=$row['username'];
        }
        $response=setonline($u_id);
        check_user();
    }
    else{
        header("location: ./restricted.php");
        exit(0);
    }
    
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Chat Buzz | Home</title>
        <link href="./css/style.css" rel="stylesheet" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="Satheesh Kumar,http://www.facebook.com/satheesh1997">
        <meta name="description" content="Chat Buzz Is A Php Chat Application Designed By Aplus Softwares">
        <meta name="theme-color" content="#ea713d">
    </head>
    <body>
        <div class="nav nav-overlay">
        <?php
        $uid=$_COOKIE['uid'];
        $msgcount=0;
        $sql="SELECT * FROM msgs WHERE rid = '$uid'";
        $msgs=mysql_query($sql);
        if(mysql_num_rows($msgs) > 0){
            while($data=mysql_fetch_array($msgs)){
                $uread=$data['read'];
                if($uread == 0){
                    $msgcount = $msgcount +1;
                }
            }
        }
        echo "<a href=\"./profile.php?u_id={$u_id}\">
        <p class=\"nav-head\" id=\"nav_head\">CHAT BUZZ&nbsp; | &nbsp;{$name}</p></a>
        <a href=\"./show_messages.php\">
        <button class=\"nav-btn1\">Messages ({$msgcount})</button></a>
        <a href=\"./logout.php\">
        <button class=\"nav-btn\">Logout</button></a>";
        ?>
    </div>
    <div class="chatbox">
    <br><br>
            
            <br><br>
    </div>
    <h4 class="chtext">ONLINE USERS</h4>
    
    <div class="chuser">
    <br>
    <p class="ilist" id="onlist"></p>
    <br>
    </div>
           <div class="msg_container overlay"> 
        <input id="abc" type="text" required="" name="mymsg" class="mymsg overlay" placeholder="Enter Your Status (MAX:50 chars)">
        <button id="c_sub" class="mymsg_submit overlay">SEND</button>
    </div>
    <div class="mycontainer" id="msg_cont">
    </div>
 </body>
 	<script type="text/javascript" src="./js/cbuzz.js"></script>
 	
    <script>msg_loader();
        setInterval(msg_loader,5000);
        chat_loader();
        setInterval(chat_loader,8000);
     </script>
    <script type="text/javascript" src="./js/main.js"></script>
    
</html>
