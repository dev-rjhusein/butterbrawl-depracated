/* ==============================================================
             VARIABLE DECLARATIONS FOR LISTENERS
=================================================================*/

let newNameButton = document.querySelector('#newNameButton');
let newEmailButton = document.querySelector('#newEmailButton')
let newPasswordButton = document.querySelector('#newPasswordButton')
let newDOBButton = document.querySelector('#newDOBButton')
let newGenderButton = document.querySelector('#newGenderButton')
let newPhoneButton = document.querySelector('#newPhoneButton')
let newNotificationButton = document.querySelector('#newNotificationButton')


/* ==============================================================
                    CHANGE FIRST AND LAST NAME
=================================================================*/

newNameButton.addEventListener("click", () =>{
    let newFirstNameValue = document.querySelector('#newFirstName').value;
    let newLastNameValue = document.querySelector('#newLastName').value;

    //regex - only characters, no less than 1
    let nameRegex = /^[a-zA-z]+$/;
    let goodFirstMatch = nameRegex.test(newFirstNameValue);
    let goodLastMatch = nameRegex.test(newLastNameValue);

    //Change input field color to red if regex no good
    if(!goodFirstMatch && !goodLastMatch){
        document.querySelector('#newFirstName').style.backgroundColor = "red";
        document.querySelector('#newLastName').style.backgroundColor = "red";

    }else if(!goodFirstMatch){
        document.querySelector('#newFirstName').style.backgroundColor = "red";

    }else if(!goodLastMatch){    
        document.querySelector('#newLastName').style.backgroundColor = "red";

    }else{
        //If both input fields are regex good, change the username;
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                
                //Clear input field
                newFirstNameValue = "";
                newLastNameValue = "";                

                //Get ajax response
                let jObj = this.responseText;
                let response = JSON.parse(jObj);
                
                //Change the label
                document.querySelector("#firstNameLabel").innerText = response[0];
                document.querySelector("#lastNameLabel").innerText = response[1];
                
            }
        }
    
        xhttp.open("POST", "/database_functions/changeUserInfo.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("first="+newFirstNameValue+"&last="+newLastNameValue);
    }
});





/* ==============================================================
                        CHANGE EMAIL ADDRESS
=================================================================*/
newEmailButton.addEventListener("click", ()=>{

    let newEmailValue = document.querySelector('#newEmail').value;

    let emailRegex = /^[a-zA-Z\.\d-_+]+@[a-zA-Z\d\.-_]+$/;

    let goodEmailMatch = emailRegex.test(newEmailValue);

    if(!goodEmailMatch){
        document.querySelector("#newEmail").style.backgroundColor = "red";
        
    }else{

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.querySelector("#emailLabel").innerText = this.responseText;
            }
        }
    
        xhttp.open("POST", "/database_functions/changeUserInfo.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("email="+newEmailValue);
    }

})




/* ==============================================================
                        CHANGE PASSWORD
=================================================================*/
newPasswordButton.addEventListener("click", () => {
    
    newPass1 = document.querySelector('#newPassword1').value;
    newPass2 = document.querySelector('#newPassword2').value;
    let passMatch = newPass1 == newPass2;

    if(!passMatch){
        document.querySelector("#newPassword1").style.backgroundColor = "red";
        document.querySelector("#newPassword2").style.backgroundColor = "red";

    }else{

        document.querySelector("#newPassword1").style.backgroundColor = "lightgreen";
        document.querySelector("#newPassword2").style.backgroundColor = "lightgreen";

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                let pLabel = document.querySelector("#passwordLabel");
                pLabel.innerText = this.responseText;
            }
        }
    
        xhttp.open("POST", "/database_functions/changeUserInfo.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("pw="+newPass2);
    }
});


/* ==============================================================
                    CHANGE DATE OF BIRTH
=================================================================*/
newDOBButton.addEventListener("click", () => {

    let newDOBValue = document.querySelector('#newDOB').value;

    let dobRegex = /^[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])$/;

    let goodDOBMatch = dobRegex.test(newDOBValue);

    if(!goodDOBMatch){
        document.querySelector("#newDOB").style.backgroundColor = "red";

    }else{

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.querySelector("#dobLabel").innerText = newDOBValue;
            }
        }
    
        xhttp.open("POST", "/database_functions/changeUserInfo.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("dob="+newDOBValue);  
    }

});


/* ==============================================================
                        CHANGE GENDER
=================================================================*/
newGenderButton.addEventListener("click", () => {
    let newGenderValue = document.querySelector("input[name='gender']:checked").value;

   
    if(newGenderValue){
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.querySelector("#genderLabel").innerText = newGenderValue;
            }
        }

        xhttp.open("POST", "/database_functions/changeUserInfo.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("gender="+newGenderValue);
    }   
});



/* ==============================================================
                            PHONE NUMBER
=================================================================*/


// function changePhone(phone){

//     let xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status == 200){
//             //Do stuff
//         }
//     }

//     xhttp.open("POST", "/database_functions/changeUserInfo.php", true);
//     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhttp.send("phone="+phone);

// }


/* ==============================================================
                    CHANGE NOTIFICATION STATUS
=================================================================*/
newNotificationButton.addEventListener("click", () => {
    let newNotifValue = document.querySelector("input[name='notifications']:checked").value;
       
    if(newNotifValue){
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.querySelector("#notifsLabel").innerText = newNotifValue;
            }
        }

        xhttp.open("POST", "/database_functions/changeUserInfo.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("notif="+newNotifValue);
    }   
});