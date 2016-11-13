<?php
    if(isset($_COOKIE['uid'])){
        include_once("./db_config.php");
        include_once("./check_user.php");
        $u_id = $_COOKIE['uid'];
        $sql = "SELECT * FROM users WHERE u_id = '$u_id'";
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
        check_user();
    }
    else{
        header("location:./restricted.php");
        exit(0);
    }
    if(isset($_COOKIE['uerror'])){
        $uerror= $_COOKIE['uerror'];
        setcookie("uerror","",time()-3900);
    }
    else{
        $uerror="UPLOAD AN IMAGE";
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        include_once("./db_config.php");
        $ename= $_REQUEST['name'];
        $eemail = $_REQUEST['mail'];
        $edob = $_REQUEST['dob'];
        $emob = $_REQUEST['mobile'];
        $ebio = $_REQUEST['bio'];
        $efb= $_REQUEST['fb'];
        $egoogle = $_REQUEST['google'];
        $eyou = $_REQUEST['you'];
        $etwitter = $_REQUEST['twitter'];
        $ework1 = $_REQUEST['work1'];
        $ework2 = $_REQUEST['work2'];
        $eclg1 = $_REQUEST['clg1'];
        $eclg2 = $_REQUEST['clg2'];
        $sql ="UPDATE `users` SET `name` =  '$ename',
            `email` =  '$eemail',
            `bio` =  '$ebio',
            `clg1` =  '$eclg1',
            `clg2` =  '$eclg2',
            `mobile` =  '$emob',
            `dob` =  '$edob',
            `work1` =  '$ework1',
            `work2` =  '$ework2',
            `facebook` =  '$efb',
            `google` =  '$egoogle',
            `youtube` =  '$eyou',
            `twitter` =  '$etwitter' WHERE `u_id` ='$u_id'";
        $query = mysql_query($sql);
        header("location:./profile.php?u_id=$u_id");
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
            echo "<a href=\"./ep.php\">
            <p class=\"nav-head\" id=\"nav_head\">CHAT BUZZ&nbsp; | &nbsp;EDIT MODE</p></a>
            <a href=\"./profile.php?u_id={$u_id}\">
            <button class=\"nav-btn1\">Cancel</button></a>
            <a href=\"./logout.php\">
            <button class=\"nav-btn\">Logout</button></a>";
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

    <div class="modal  mint" id="myModal">
    <div class="space"></div>
        <div id="error_msg center">
            <div class="msg center"><?php echo $uerror; ?><span class="close">X</span></div>
        </div>
       <form name="uploaddp" action="./upload.php" enctype="multipart/form-data" method="post">
            <input type="file" name="img" class="input-box orange overlay center" placeholder="Choose an image">
            <input type="submit" class="post-btn" value="UPLOAD">
        </form>
    <div class="space"></div>
    </div>
    <div class="container">
        <div class="center">
           <?php
            echo"<img src=\"{$dp}\" id=\"up\" class=\"img-medium\"\/>";
            ?>
        </div>
        <br>
        <div class="space"></div>
        <div class="space"></div>
        <div class="space"></div>
        <div class="space"></div>
        <form name="edit-pro" method="post">
        <div class="center text-big bold overlay">

            <?php echo "<input name=\"name\" type =\"text\" class=\"input-box overlay\" value=\"{$name}\">"; ?>
            <hr>
        </div>
        <br>
        <div class="center bio overlay">

            <h3 class="orange">
                <u>EMAIL</u>
            </h3>
            <blockquote><?php echo "<input name=\"mail\" type =\"text\" class=\"input-box overlay\" value=\"{$mail}\">"; ?></blockquote>
            <br>
            <hr>
        </div>
        <br>
        <div class="center bio overlay">

            <h3 class="orange">
                <u>WORK</u>
            </h3>
            <small><?php echo "<input name=\"work1\" type =\"text\" class=\"input-box overlay\" value=\"{$work1}\">"; ?></small><br>
          <br> <small><?php echo "<input name=\"work2\" type =\"text\" class=\"input-box overlay\" value=\"{$work2}\">"; ?></small>
            <br>
            <hr>
        </div>
        <br>
        <div class="center bio overlay">

            <h3 class="orange">
                <u>UNIVERSITY</u> / <u>COLLEGE</u>
            </h3>
            <small><?php echo "<input name=\"clg1\" type =\"text\" class=\"input-box overlay\" value=\"{$clg1}\">"; ?></small><br><br>
            <small><?php echo "<input name=\"clg2\" type =\"text\" class=\"input-box overlay\" value=\"{$clg2}\">"; ?></small>
            <br>
            <hr>
        </div>
        <br>
        <div class="center bio overlay">

            <h3 class="orange">
                <u>DATE OF BIRTH</u>
            </h3>
            <blockquote><?php echo "<input name=\"dob\" type =\"text\" class=\"input-box overlay\" value=\"{$dob}\">"; ?></blockquote>
            <br>
            <hr>
        </div>
        <br>
        <div class="center bio overlay">

            <h3 class="orange">
                <u>MOBILE</u>
            </h3>
            <blockquote><?php echo "<input name=\"mobile\" type =\"text\" class=\"input-box overlay\" value=\"{$mobile}\">"; ?></blockquote>
            <br>
            <hr>
        </div>
        <br>
        <div class="center bio overlay">

            <h3 class="orange">
                <u>BIO</u>
            </h3>
            <blockquote><?php echo "<textarea name=\"bio\" type =\"text\" class=\"input-text overlay\">{$bio}</textarea>"; ?></blockquote>
            <br>
            <hr>
        </div>
        <br>
        <div class="center footer overlay">

            <h3 class="orange">
                <u>SOCIAL LINKS</u>
            </h3>
            <?php 
                echo"<a href=\"{$fb_link}\" target=\"data_blank\"> <img src=\"./images/fb1.png\" class=\"img-logo\" /></a>";
                echo "<input name=\"fb\" type =\"text\" class=\"input-box overlay\" value=\"{$fb_link}\"><br>";
                echo"<a href=\"{$google_link}\" target=\"data_blank\"> <img src=\"./images/google.png\" class=\"img-logo\" /></a>";
                echo "<input name=\"google\" type =\"text\" class=\"input-box overlay\" value=\"{$google_link}\"><br>";
                echo"<a href=\"{$you_link}\" target=\"data_blank\"> <img src=\"./images/you.png\" class=\"img-logo\" /></a>";
                echo "<input name=\"you\" type =\"text\" class=\"input-box overlay\" value=\"{$you_link}\"><br>";
                echo"<a href=\"{$twitter_link}\" target=\"data_blank\"> <img src=\"./images/twitter.png\" class=\"img-logo\" /></a>";
                echo "<input name=\"twitter\" type =\"text\" class=\"input-box overlay\" value=\"{$twitter_link}\"><br>";
            ?>
            <br>
            <hr>
        </div>
        <div class="center footer overlay">

                <input type="submit" value="SAVE" class="post-btn">
            <br>
            <hr>
        </div>
    </div>
    </form>
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