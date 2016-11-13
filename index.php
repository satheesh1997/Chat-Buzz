<?php
    $error ="";
    if(isset($_COOKIE['LOGIN_ERROR'])){
        $error="<div class=\"msg center\">{$_COOKIE['LOGIN_ERROR']}</div>";
        setcookie("LOGIN_ERROR","",time()-3600);
    }
    //$error="<div class=\"msg center\">Welcome</div>";
    if(isset($_COOKIE['uid'])){
        header("location:./home.php");
    }

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Chat Buzz</title>
        <link href="./css/style.css" rel="stylesheet" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="Satheesh Kumar,http://www.facebook.com/satheesh1997">
        <!-- <link rel="shortcut icon" href="./assets/images/clogo.gif" type="image/x-icon"> -->
        <meta name="description" content="Chat Buzz Is A Php Chat Application Designed By Aplus Softwares">
        <meta name="theme-color" content="#ea713d">

    </head>
    <body>
        <div class="nav nav-overlay">
        <p class="nav-head" id="nav_head">CHAT BUZZ</p>
        <a href="./register.php">
        <button class="nav-btn1">New Here ?</button></a>
    </div>
    <div class="lspace"></div>
    <div class="login_container mint">
    <div class="space"></div>
        <div id="error_msg">
            <?php echo $error; ?>
        </div>
        <form name="login" method="post" action="./login.php">
            <input type="text" name="username" class="iinput-box orange overlay center" placeholder="Username">
            <input type="password" name="upassword" class="iinput-box orange overlay center" placeholder="Password">
            <input type="submit" class="post-btn" value="LOGIN">
        </form>
    <div class="space"></div>
    </div>
    <div class="lspace"></div>
   <div class=" copyright overlay">

        <h4 class="mint cptext">COPYRIGHT CHAT BUZZ</h4>
        <p class="copy cptext">Design By Satheesh Kumar&nbsp; | &nbsp;Hosted By Aplus Softwares
        </p>
        <hr>
    </div>

    </body>
    <script type="text/javascript" src="./js/main.js"></script>
</html>