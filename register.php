<?php
    $error ="";
    if(isset($_COOKIE['REG_ERROR'])){
        $error="<div class=\"msg center\">{$_COOKIE['REG_ERROR']}</div>";
        setcookie("REG_ERROR","",time()-3600);
    }
    //$error="<div class=\"msg center\">Welcome</div>";
    if(isset($_COOKIE['uid'])){
        header("location:./home.php");
    }

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Chat Buzz | Signup</title>
        <link href="./css/style.css" rel="stylesheet" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="Satheesh Kumar,http://www.facebook.com/satheesh1997">
        <!-- <link rel="shortcut icon" href="./assets/images/clogo.gif" type="image/x-icon"> -->
        <meta name="description" content="Chat Buzz Is A Php Chat Application Designed By Aplus Softwares">
        <meta name="theme-color" content="#ea713d">
        <script>
            if(screen.width <= 699){
                document.location = "./mobile.php";
            }
        </script>

    </head>
    <body>
        <div class="nav nav-overlay">
        <p class="nav-head" id="nav_head">CHAT BUZZ | REGISTERATION</p>
    </div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="login_container mint">
    <div class="space"></div>
        <div id="error_msg">
            <?php echo $error; ?>
        </div>
        <form name="reg" method="POST" action="./reg.php">
            <input required="" type="text" id="name1" name="username" class="iinput-box orange overlay center" placeholder="Username" onkeyup="checker()">
            <input required="" type="text" name="fullname" class="iinput-box orange overlay center" placeholder="Full Name">
            <input required="" type="email" name="mail" class="iinput-box orange overlay center" placeholder="Email Id">
            <input required="" type="password" name="upassword" class="iinput-box orange overlay center" placeholder="Password">
            <input required="" type="password" name="cpassword" class="iinput-box orange overlay center" placeholder="Confirm Password">
            <input type="submit" id="post_btn" class="post-btn" value="SUBMIT">
        </form>

    </div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
   <div class=" copyright overlay">

        <h4 class="mint cptext">COPYRIGHT CHAT BUZZ</h4>
        <p class="copy cptext">Design By Satheesh Kumar&nbsp; | &nbsp;Hosted By Aplus Softwares
        </p>
        <hr>
    </div>

    </body>
    <script type="text/javascript" src="./js/main.js"></script>
    <script type="text/javascript" src="./js/cbuzz.js"></script>
</html>