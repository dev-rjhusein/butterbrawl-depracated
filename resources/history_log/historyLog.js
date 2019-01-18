function getWeightLogs(user){

    setTimeout(() => {
        let iDoc = parent.document.querySelector("#iframeLog").contentDocument; //parent.document because this is called from within an iframe
        
        //Prevent more than one table in the weight log iframe document
        let item = iDoc.querySelector("table");
        if(item != null){
            item.remove();
        }

        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                let jObj = JSON.parse(this.responseText);


                //Create a table
                let tb = document.createElement("table");
                tb.classList.add("table");

                //Add a caption
                let cap = document.createElement("caption");
                cap.innerText = "Weight Logs";
                tb.appendChild(cap);

                //Initial row with headers
                let tr = document.createElement("tr");
                tb.appendChild(tr);

                let th1 = document.createElement("th");
                let th2 = document.createElement("th");

                th1.appendChild(document.createTextNode("Date"));
                th2.appendChild(document.createTextNode("Weight"));

                tr.appendChild(th1);
                tr.appendChild(th2);

                //Iterate through JSON object and make each a table row
                for(let i = 0; i < jObj.length; i++){
                    let tr = document.createElement("tr");
                    tb.appendChild(tr);

                    let td1 = document.createElement("td");
                    let td2 = document.createElement("td");

                    td1.appendChild(document.createTextNode(getDateFormat(jObj[i].recordDate)));
                    td2.appendChild(document.createTextNode(jObj[i].weight));

                    td1.setAttribute("style", "text-align: center;");
                    td2.setAttribute("style", "text-align: center;");

                    tr.appendChild(td1);
                    tr.appendChild(td2);

                    tb.appendChild(tr);
                }

                //Append the table to an empty div 
                iDoc.querySelector("#logList").appendChild(tb);
            }
        }

        xhttp.open("GET", "/database_functions/getLogs.php?u=" + user, true);
        xhttp.send();
    }, 500);
}


function addNewLog(username, weight){
    if(weight < 100 || weight > 900){
        return;
    }

    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            getWeightLogs(username);
        }
    }

    xhttp.open("GET", "/database_functions/addLog.php?u=" + username + "&w=" + weight, true);
    xhttp.send();
}


function getDateFormat(isoDate){
    //Month enum
    let monthList = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    let date = new Date(isoDate);
    let day = date.getDay();
    let month = monthList[date.getMonth()];
    let year = date.getFullYear();

    return month + " " + day + ", " + year;

}