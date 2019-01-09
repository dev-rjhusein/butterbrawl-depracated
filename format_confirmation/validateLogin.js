function checkUsername(){

}


function checkCreds(username, password){

    if(username.length < 1){
        document.getElementById("username").style.backgroundColor = "#f27b7b";
        return;
    }else if(password.length < 1){
        document.getElementById("password").style.backgroundColor = "#f27b7b";
        return;
    }

    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            switch(this.responseText){
                case '1':    //Username incorrect
                alert("Incorrect Username");
                break;
                case '2':   //Password incorrect
                alert("Incorrect Password");
                break;
                case '3':   //Creds correct - login to dashboard
                window.location.replace("/database_functions/loadAccount.php?u="+username);
                break;
                default:
            }
        }
    }

    xhttp.open("POST", "/database_functions/validateLogin.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("user="+username+"&pass="+password);
}