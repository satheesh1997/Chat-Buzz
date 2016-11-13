<?php
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        include_once("./db_config.php");
        $u_id = $_COOKIE['uid'];
        $uid = $_REQUEST['u_id'];
        $sql = "SELECT * FROM users WHERE u_id = '$uid'";
        $query = mysql_query($sql);
        if(mysql_num_rows($query) > 0){
            $row=mysql_fetch_array($query);
            $uname=strip_tags($row['username']);
            $name=strip_tags($row['name']);
            $bio =strip_tags($row['bio']);
            $clg1 = strip_tags($row['clg1']);
            $clg2 = strip_tags($row['clg2']);
            $mail = strip_tags($row['email']);
            $mobile = strip_tags($row['mobile']);
            $dob = strip_tags($row['dob']);
            $work1 = strip_tags($row['work1']);
            $work2 = strip_tags($row['work2']);
            $fb_link = strip_tags($row['facebook']);
            $google_link = strip_tags($row['google']);
            $you_link = strip_tags($row['youtube']);
            $twitter_link = strip_tags($row['twitter']);
            $dp = strip_tags($row['dp']);
        }
        else{
            header("location:./restricted.php");
            exit(0);
        }
    }
    else{
        header("location:./restricted.php");
        exit(0);
    }
?>
<!doctype html>
<html>

<head>
    <link href="./css/style.css" rel="stylesheet" />
    <title> CHAT BUZZ | PROFILE</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Satheesh Kumar,http://www.facebook.com/satheesh1997">
    <!-- <link rel="shortcut icon" href="./assets/images/clogo.gif" type="image/x-icon"> -->
    <meta name="description" content="">
    <meta name="theme-color" content="#ea713d">
</head>

<body>
    <div class="nav nav-overlay">
        <?php
        if($u_id==$uid){
            echo "<a href=\"./home.php\">
            <p class=\"nav-head\" id=\"nav_head\">CHAT BUZZ</p></a>
            <a href=\"./ep.php\">
            <button class=\"nav-btn1\">Edit Profile</button></a>
            <a href=\"./logout.php\">
            <button class=\"nav-btn\">Logout</button></a>";
        }
        else{
            echo "<a href=\"./home.php\">
            <p class=\"nav-head\" id=\"nav_head\">CHAT BUZZ&nbsp; | &nbsp;HOME</p></a>
            <a href=\"./msg.php?id={$uid}&mail={$mail}\">
            <button class=\"nav-btn1\">Msg User</button></a>
            <a href=\"./logout.php\">
            <button class=\"nav-btn\">Logout</button></a>";
        }
        ?>
    </div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="container">
        <div class="center">
           <?php
            echo"<img src=\"{$dp}\" class=\"img-medium\"\/>";
            ?>
        </div>
        <br>
        <div class="space"></div>
        <div class="space"></div>
        <div class="space"></div>
        <div class="space"></div>

        <div class="center text-big bold overlay">

            <p class="mint"><?php echo $name; ?></p>
            <hr>
        </div>
        <br>
        <div class="center bio overlay">

            <h3 class="orange">
                <u>EMAIL</u>
            </h3>
            <blockquote><?php echo $mail; ?></blockquote>
            <br>
            <hr>
        </div>
        <br>
        <div class="center bio overlay">

            <h3 class="orange">
                <u>WORK</u>
            </h3>
            <small><?php echo $work1; ?></small><br>
            <small><?php echo $work2; ?></small>
            <br>
            <hr>
        </div>
        <br>
        <div class="center bio overlay">

            <h3 class="orange">
                <u>UNIVERSITY</u> / <u>COLLEGE</u>
            </h3>
            <small><?php echo $clg1; ?></small><br><br>
            <small><?php echo $clg2; ?></small>
            <br>
            <hr>
        </div>
        <br>
        <div class="center bio overlay">

            <h3 class="orange">
                <u>DATE OF BIRTH</u>
            </h3>
            <blockquote><?php echo $dob; ?></blockquote>
            <br>
            <hr>
        </div>
        <br>
        <div class="center bio overlay">

            <h3 class="orange">
                <u>MOBILE</u>
            </h3>
            <blockquote><?php echo $mobile; ?></blockquote>
            <br>
            <hr>
        </div>
        <br>
        <div class="center bio overlay">

            <h3 class="orange">
                <u>BIO</u>
            </h3>
            <blockquote>"<?php echo $bio; ?>"</blockquote>
            <br>
            <hr>
        </div>
        <br>
        <div class="center footer overlay">

            <h3 class="orange">
                <u>SOCIAL LINKS</u>
            </h3>
            <?php 
            if($fb_link != NULL){
                echo"<a href=\"http://fb.com/{$fb_link}\" target=\"data_blank\"> <img src=\"./images/fb1.png\" class=\"img-logo\" /></a>";
            }
            if($google_link != NULL){
                echo"<a href=\"{$google_link}\" target=\"data_blank\"> <img src=\"./images/google.png\" class=\"img-logo\" /></a>";
            }
            if($you_link != NULL){
                echo"<a href=\"{$you_link}\" target=\"data_blank\"> <img src=\"./images/you.png\" class=\"img-logo\" /></a>";
            }
            if($twitter_link != NULL){
                echo"<a href=\"http://twitter.com/{$twitter_link}\" target=\"data_blank\"> <img src=\"./images/twitter.png\" class=\"img-logo\" /></a>";
            }
            ?>
            <br>
            <hr>
        </div>
    </div>
    <div class="space"></div>
    <div class=" copyright overlay">

        <h4 class="mint cptext">COPYRIGHT CHAT BUZZ</h4>
        <p class="copy cptext">Design By Satheesh Kumar&nbsp; | &nbsp;Hosted By Aplus Softwares
        </p>
        <hr>
    </div>

    <script type="text/javascript" src="./js/main.js"></script>
</body>

</html>