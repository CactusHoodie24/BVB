const searchbar = document.querySelector(".search input"),
      searchbtn = document.querySelector(".search button"),
      usersList = document.querySelector(".users-list");

searchbtn.onclick = () => {
    searchbar.classList.toggle("active");
    searchbar.focus();
    searchbtn.classList.toggle("active");
    searchbar.value = "";
}

searchbar.onkeyup = ()=>{
    let searchTerm = searchbar.value;
    if(searchTerm != ""){
        searchbar.classList.add("active");
    }else{
        searchbar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "search.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                usersList.innerHTML = data;  // Corrected property name
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "users inc.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
               if(!searchbar.classList.contains("active")){
                usersList.innerHTML = data;
               }
            }
        }
    }
    xhr.send();
}, 500);
