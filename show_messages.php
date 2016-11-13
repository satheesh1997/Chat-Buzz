<?php

    include_once("./check_user.php");
    include_once("./db_config.php");


    if(isset($_COOKIE['uid'])){
        check_user();
        $messages=0;
        $uid=$_COOKIE['uid'];
        $sql="SELECT * FROM msgs WHERE rid = '$uid'";
        $msgs=mysql_query($sql);
        if(mysql_num_rows($msgs) > 0){
            $messages=mysql_num_rows($msgs);
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
 
<?php if($messages ==0 ){
    ?>
    <div class="container">      
        <div class="bio">
            <div class="overlay">
                <h4 class="mint center">No Messages For You!</h4>
                <hr>
            </div>
        </div>
            <div class="space"></div>
    </div>

    <div class="space"></div>
    <div class="space"></div>
    <div class="lspace"></div>
    <div class="lspace"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
<?php } 
    else{
        show_msgs($uid);
        if($messages<4){
            echo"
                <div class=\space\"></div>
                <div class=\"space\"></div>
                <div class=\"lspace\"></div>
                <div class=\"lspace\"></div>
                <div class=\"space\"></div>
                <div class=\"space\"></div>
              
                ";
        }
    }
    ?>
    <div class=" copyright overlay">

        <h4 class="mint cptext">COPYRIGHT 2016 - 2017</h4>
        <p class="copy cptext">Satheesh Kumar D | Designed By Aplus Studios
        </p>
        <hr>
    </div>

    <script type="text/javascript" src="./js/main.js"></script>
    
</body>

</html>