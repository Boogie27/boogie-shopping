



function preloader(){
    var pageContent = document.querySelector(".page-content");
        pageContent.style.display = "none";
        setTimeout(showContent,  10);
}
function showContent(){
    document.querySelector(".preloader").style.display = "none";
    document.querySelector(".page-content").style.display = "block";
}
preloader();



function showAccount(){
    var account = document.querySelector(".account-details").style.display = "block";
}


function closeAccount(){
    var account = document.querySelector(".account-details");
    var address = document.querySelector(".container-address");
              account.style.display = "none";
             bottom = -50;
            var id = setInterval(frame, 10);
             function frame(){
             if(bottom == 0){
                 clearInterval(id);
             }else{
                bottom++;
                address.style.bottom = bottom+"px";
             }
            }

             
}






//function to remove alert after  two seconds
(function(){
    
var items = document.querySelector(".alertFormdiv");
function itemOut(){
    items.style.display = "none";
}
setTimeout(itemOut, 2000);
})();