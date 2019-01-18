function passwordMatch(){
    let pass1 = document.getElementById("password1");
    let pass2 = document.getElementById("password2");
    let submitBtn = document.querySelector("#submitNewAccount");

    if(pass1.value == "" || pass2.value == ""){   
        submitBtn.setAttribute("disabled", "true");
    }else{
        if(pass1.value == pass2.value){
            pass1.style.backgroundColor = "lightgreen";
            pass2.style.backgroundColor = "lightgreen";
            submitBtn.removeAttribute("disabled");
        }else{
            pass1.style.backgroundColor = "red";
            pass2.style.backgroundColor = "red";   
            submitBtn.setAttribute("disabled", "true");         
        }
    }
}

// Shows error if username exists in DB already
function checkExists(username){
    let warnMsg = document.querySelector("#usernameFeedback");
    let submitBtn = document.querySelector("#submitNewAccount");
    if(username.length < 5){
        warnMsg.style.color = "red";
        warnMsg.innerHTML = "That username is too short";
        submitBtn.setAttribute("disabled", "true");
        return;
    }
    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == 0){
                warnMsg.style.color = "green";
                warnMsg.innerHTML = "Available!";
                submitBtn.removeAttribute("disabled");
            }else{
                warnMsg.style.color = "red";
                warnMsg.innerHTML = "That username already exists";
                submitBtn.setAttribute("disabled", "true");
            }
        }
    }

    xhttp.open("GET", "database_functions/usernameCheck.php?q="+username, true);
    xhttp.send();

}