var cbtn=document.getElementById("c_sub");

cbtn.onclick=function(){
    cbtn.innerHTML="Sending";
    setTimeout(postmsg,2000);
}

function postmsg(){
    var XMLHttpRequestObject=false;
    var msg=document.getElementById("abc").value;
    document.getElementById("abc").value="";
    var source= "ping.php?msg=" + msg;
    XMLHttpRequestObject= new XMLHttpRequest();
    if(XMLHttpRequestObject){
        XMLHttpRequestObject.open("GET",source);
        XMLHttpRequestObject.onreadystatechange = function(){
            if(XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200){
                if(XMLHttpRequestObject.responseText == "ok"){
                    cbtn.innerHTML="SEND";
                    msg_loader();
                }
                else{
                    cbtn.innerHTML="TRY AGAIN";
                    msg_loader();
                }
            }
        }
        XMLHttpRequestObject.send(null);
    }
}

function checker(){
    var targetdiv=document.getElementById("error_msg");
    if(document.getElementById("name1").value){
        getData("check_user.php?qu=" + document.getElementById("name1").value);
    }
}

function getData(datasource){
    var XMLHttpRequestObject=false;
    XMLHttpRequestObject= new XMLHttpRequest();
    if(XMLHttpRequestObject){
        XMLHttpRequestObject.open("GET",datasource);
        var targetdiv=document.getElementById("error_msg");
        var submit=document.getElementById("post_btn");
        XMLHttpRequestObject.onreadystatechange = function(){
            if(XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200){
                if(XMLHttpRequestObject.responseText == "notok"){
                    targetdiv.innerHTML="<div class=\"rmsg center\">Username Already Exists!</div>";
                }
                else{
                    targetdiv.innerHTML="";
                }
            }
        }
        XMLHttpRequestObject.send(null);
    }
}

function msg_loader(){
        getmData("ping.php?action=1");
}

function getmData(datasource){
    var XMLHttpRequestObject=false;
    XMLHttpRequestObject= new XMLHttpRequest();
    if(XMLHttpRequestObject){
        XMLHttpRequestObject.open("GET",datasource);
        var targetdiv=document.getElementById("msg_cont");
        XMLHttpRequestObject.onreadystatechange = function(){
            if(XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200){
                if(XMLHttpRequestObject.responseText != null){
                    targetdiv.innerHTML= XMLHttpRequestObject.responseText;
                }
                else{
                    targetdiv.innerHTML=`<div class=\"overlay lchat\">
                    <div class=\"lchat_msg\" \"center\">No Chats Found | Error In App</div>
                    <img src=\"./images/users/1.jpg\" class=\"lchat_img\">
                    </div><br><br>`;
                }
            }
        }
        XMLHttpRequestObject.send(null);
    }
}


function chat_loader(){
        getcData("online_users.php");
}

function getcData(datasource){
    var XMLHttpRequestObject=false;
    XMLHttpRequestObject= new XMLHttpRequest();
    if(XMLHttpRequestObject){
        XMLHttpRequestObject.open("GET",datasource);
        var targetdiv=document.getElementById("onlist");
        XMLHttpRequestObject.onreadystatechange = function(){
            if(XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200){
                if(XMLHttpRequestObject.responseText != null){
                    targetdiv.innerHTML= XMLHttpRequestObject.responseText;
                }
                else{
                    targetdiv.innerHTML=`<a id="usr" class="alist>
    <span class="online">&bull;</span>  ERROR</a><br>`;
                }
            }
        }
        XMLHttpRequestObject.send(null);
    }
}







