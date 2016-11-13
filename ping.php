<?php
        include("./db_config.php");
        $u_id = $_COOKIE['uid'];
        if($_GET["msg"]){
            $muser=$u_id;
            $msg=strip_tags($_GET["msg"]);
            if(strlen($msg)< 45 and strlen($msg)>2){
                $response=add_chat($muser,$msg);
                if($response == 1){
                    echo "ok";
                    exit(0);                    
                    //header("location:./home.php");
                }
            }
            else{
                echo "notok";
                exit(0);
                //header("location:./home.php");
            }
        }
        if($_GET["action"] ==1){
        $msgs="SELECT * FROM chat ORDER by chat_id DESC";
        $res=mysql_query($msgs);
        $mg="";
        if(mysql_num_rows($res) > 0){
            while($row=mysql_fetch_array($res)){
                $userid=$row['user_id'];
                $umsg=strip_tags($row['message']);
                $sql = "SELECT * FROM users WHERE u_id = '$userid'";
                $query = mysql_query($sql);
                if(mysql_num_rows($query) > 0){
                    $udata=mysql_fetch_array($query);
                    $mdp=$udata['dp'];
                }
                    if($u_id==$userid){
                    $mg=$mg."
                        <div class=\"overlay lchat\">
                        <div class=\"lchat_msg\">{$umsg}</div>
                        <a href=\"./profile.php?u_id={$userid}\">
                        <img src=\"{$mdp}\" class=\"lchat_img\">
                        </a>
                        </div><br><br>
                        "; 
                    }
                    else{
                        $mg=$mg."
                            <div class=\"overlay uchat\">
                            <div class=\"uchat_msg\">{$umsg}</div>
                            <a href=\"./profile.php?u_id={$userid}\">
                            <img src=\"{$mdp}\" class=\"uchat_img\">
                            </div><br><br>
                        ";                    
                    }
            }
            
        }
        else{
            $mg=$mg."<div class=\"overlay lchat\">
                    <div class=\"lchat_msg\" \"center\">No Chats Found | Error In App</div>
                    <img src=\"./images/users/1.jpg\" class=\"lchat_img\">
                    </div><br><br>";
        }
        echo "{$mg}";
    }

?>