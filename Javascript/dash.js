const form = document.querySelector("form"),
      nextBtn = form.querySelector(".nextBtn"),
      backBtn = form.querySelector(".backBtn"),
      allInputs = form.querySelectorAll(".first input");

nextBtn.addEventListener("click", () => {
    allInputs.forEach(input => {
        if (input.value != "") {
            form.classList.add('secActive');  
        
    } else {
        form.classList.remove('secActive');
    }
    })
})

backBtn.addEventListener("click", () => form.classList.remove('secActive'));
