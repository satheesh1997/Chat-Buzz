<?php 
    include_once("./db_config.php");
 if(isset($_COOKIE['uid'])){   
    $online="SELECT * FROM users WHERE online = 1";
    $u_query=mysql_query($online);
    if(mysql_num_rows($u_query)>0){
        while($row=mysql_fetch_array($u_query)){
            $cname=$row['name'];
            $cid=$row['u_id'];
            $users=$users."<a id=\"usr\" class=\"alist\" href=\"./profile.php?u_id={$cid}\">
    <span class=\"online\">&bull;</span>  {$cname}</a><br><br>";
        }
    }
 }
 else{
     $users="Connection Error";
 }
    echo $users;
?>