

var button = document.getElementById("submitBtn");
button.addEventListener("click",function(e){

    var nextBtn = document.getElementById("nextBtn");

    if(nextBtn.style.display == "none"){
        nextBtn.style.display = "block";
    }else{
        nextBtn.style.display = "none";
    }

   
});