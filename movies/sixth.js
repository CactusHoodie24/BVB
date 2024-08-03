var closeButton = document.querySelector(".close");
if (closeButton) {
    closeButton.addEventListener("click", function() {
        document.querySelector(".container-not").style.display = "none";
    });
}

window.addEventListener("load" , function(){
    setTimeout(
        function open(event){
            document.querySelector(".container-not").style.display = "block";
        },
        2000
    )
});