const form = document.querySelector(".container form");
const continueBtn = form.querySelector(".btn input");
const errorText = form.querySelector(".error-txt");

form.addEventListener('submit', (e) => {
    e.preventDefault();
});

continueBtn.addEventListener('click', () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "Login inc.php", true);
    xhr.onload = () => {
        if(xhr.status === 200){
            let data = xhr.responseText;
            console.log(data);
            if(data.trim() === "success"){
                location.href = "Main-dash.php";
            } else {
                errorText.style.display = "block";
                errorText.textContent = data;
                
            }
        } else {
            // Handle non-200 status codes
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.onerror = () => {
        console.error('Request failed');
    };
    let formData = new FormData(form);
    xhr.send(formData);
});
