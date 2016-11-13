console.log("Chat Buzz js file Loaded Successfully....");

if(screen.width <= 699){
    document.location = "./mobile.php";
}


var nav_head = document.getElementById("nav_head");
nav_head.style.marginRight="700px";
nav_head.onmouseenter = function(){
    nav_head.style.color="yellow";
}
nav_head.onmouseleave = function(){
    nav_head.style.color="khaki";
}

//modal

var modal=document.getElementById('myModal');

var btn=document.getElementById('up');

var span=document.getElementsByClassName("close")[0];

btn.onclick =function(){
    modal.style.display="block";
} 

span.onclick =function(){
    modal.style.display="none";
} 

window.onclick = function(event){
    if(event.target==modal){
        modal.style.display="none"; 
    }
}

