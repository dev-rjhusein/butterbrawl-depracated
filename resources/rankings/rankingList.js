function getRankings(firstname){

    setTimeout(()=>{    //Wait for history logs to save/load before loading ranks

        let rankDoc = parent.document.querySelector("#iframeRank").contentDocument; //parent.document because this is called from within an iframe

        //Prevent more than one table in the rank list iframe document
        let item = rankDoc.querySelector("table");
        if(item != null){
            item.remove();
        }

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){

                //Get [username, first_name, percent_lost] via /database_functions/getRanks.php
                let result = JSON.parse(this.responseText);
                

                //Comparator sorts greatest to least by result[i][2] (the percent lost)
                function Comparator(a, b) {
                if (a[2] > b[2]) return -1;
                if (a[2] < b[2]) return 1;
                return 0;
                }

                //Perform sort
                result = result.sort(Comparator);

            
                //Create a table
                let tb = document.createElement("table");
                tb.classList.add("table");

                //Add a caption
                let cap = document.createElement("caption");
                cap.innerText = "Player Ranking";
                tb.appendChild(cap);

                //Initial row with headers
                let tr = document.createElement("tr");
                tb.appendChild(tr);

                let th1 = document.createElement("th");
                let th2 = document.createElement("th");
                th1.setAttribute("scope", "col");

                th1.appendChild(document.createTextNode("Name"));
                th2.appendChild(document.createTextNode("Total Lost"));

                tr.appendChild(th1);
                tr.appendChild(th2);
                
                let rank = 100;
                //Iterate through sorted array and make each a table row (sorted by result[i][2])
                for(let i = 0; i < result.length; i++){

                    //Set self rank
                    if(result[i][1] == firstname){
                        rank = i + 1;
                    }

                    let tr = document.createElement("tr");
                    tb.appendChild(tr);

                    let td1 = document.createElement("td");
                    let td2 = document.createElement("td");


                    let name = result[i][1];
                    let percent = result[i][2];

                    percent *= 100; //Convert to whole number;
                    percent = percent.toFixed(2) //truncate useless decimal places

                    td1.appendChild(document.createTextNode(name));
                    td2.appendChild(document.createTextNode(percent+"%"));

                    td1.setAttribute("style", "text-align: center;");
                    td2.setAttribute("style", "text-align: center;");

                    tr.appendChild(td1);
                    tr.appendChild(td2);

                    tb.appendChild(tr);
                }

                //Append the table to an empty div 
                rankDoc.querySelector("#rankingList").appendChild(tb);

                //Use placing suffixes
                let suffix;
                switch(rank){
                    case 1:
                        suffix = "st";
                        break;
                    case 2:
                        suffix = "nd";
                        break;
                    case 3:
                        suffix = "rd";
                        break;
                    default:
                        suffix = "th";
                }
    
                parent.document.querySelector("#rankLabel").innerText = "You are in " + rank + suffix +" place!";   //parent.document because this is called from within an iframe         
    

            }
        }

        xhttp.open("GET", "/database_functions/getRanks.php", true);
        xhttp.send();

    }, 500);
}