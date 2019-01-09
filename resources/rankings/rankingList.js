function getRankings(){

    setTimeout(()=>{    //Wait for history logs to save/load before loading ranks 
        let rankDoc = document.querySelector("#iframeRank").contentDocument;

        //Prevent more than one table in the rank list iframe document
        let item = rankDoc.querySelector("table");
        if(item != null){
            item.remove();
        }

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){

                //Gets name : percentageLost from getRanks.php
                let result = JSON.parse(this.responseText);

                //Save array of sorted names DESCENDING -- (largest number == more weight lost == higher rank)
                let sortedNames = Object.keys(result).sort((a,b) => {return result[b] - result[a]});
            
                //Create a table
                let tb = document.createElement("table");
                tb.classList.add("table");

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
                

                //Iterate through JSON object and make each a table row
                for(let i = 0; i < sortedNames.length; i++){
                    let tr = document.createElement("tr");
                    tb.appendChild(tr);

                    let td1 = document.createElement("td");
                    let td2 = document.createElement("td");


                    let name = sortedNames[i];
                    let percent = result[sortedNames[i]];
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

            }
        }

        xhttp.open("GET", "/database_functions/getRanks.php", true);
        xhttp.send();

    }, 500);
}