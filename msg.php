<?php

    include_once("./check_user.php");
    include_once("./db_config.php");


    if(isset($_COOKIE['uid'])){
        check_user();
        $uid=$_COOKIE['uid'];
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $id=$_REQUEST['id'];
            $email=$_REQUEST['mail'];
            //css function
        }
    }
    else{
        header("location: ./restricted.php");
        exit(0);
    }
    
?>

<!doctype html>
<html>

<head>
    <link href="./css/style.css" rel="stylesheet" />
    <title>CHAT BUZZ | MSGS</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Satheesh Kumar,http://www.facebook.com/satheesh1997">
    <meta name="theme-color" content="#ea713d">
</head>

<body>
    <div class="nav nav-overlay">
        <?php
        echo "<a href=\"./home.php\">
        <p class=\"nav-head\" id=\"nav_head\">CHAT BUZZ&nbsp; | &nbsp;HOME</p></a>
        <a href=\"./home.php\">
        <button class=\"nav-btn1\">Chat Box</button></a>
        <a href=\"./logout.php\">
        <button class=\"nav-btn\">Logout</button></a>";
        ?>
    </div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="msgcontainer overlay">
        <form name="675" method="post" action="msg_up.php">
        <?php echo "
            <input type=\"hidden\" name=\"rid\" class=\"minput-box orange overlay\" value=\"{$id}\">
            <input type=\"text\" name=\"mail\" class=\"minput-box orange overlay\" placeholder=\"To (Email)\" value=\"{$email}\" required=\"\">";
        ?>
            <input type="text" name="sub" class="minput-box orange overlay" placeholder="Subject" required="">
            <textarea name="message" type ="text" class="minput-text overlay" placeholder="Type Your Message Here...."></textarea>
            <input type="submit" class="mpost-btn" value="SEND MESSAGE">
        </form><hr>
    </div>
 
    <div class=" copyright overlay">

        <h4 class="mint cptext">COPYRIGHT 2016 - 2017</h4>
        <p class="copy cptext">Satheesh Kumar D | Designed By Aplus Studios
        </p>
        <hr>
    </div>

    <script type="text/javascript" src="./js/main.js"></script>
    
</body>

</html>