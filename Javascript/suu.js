const pswrdfield = document.querySelector(".field input[type='password']"),
toggleBtn = document.querySelector(".field i");

toggleBtn.onclick = ()=>{
    if(pswrdfield.type == "password"){
        pswrdfield.type = "type";
        toggleBtn.classList.add("active");
    }else{
        pswrdfield.type = "password";
        toggleBtn.classList.remove("active");
    }
}