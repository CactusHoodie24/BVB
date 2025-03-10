const form = document.querySelector(".form-signup form");
continueBtn = form.querySelector(".button input");
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../pages/Researcher signup inc.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                 location.href = "../pages/Main-dash.php";
                }else{
                    errorText.style.display = "block";
                    errorText.textContent = data;

                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}