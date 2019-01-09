function getSelfRank(username){
    setTimeout(()=>{    //Wait for history logs to save/load before loading ranks 
       

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){

            //Gets name : percentageLost from getRanks.php
            let result = JSON.parse(this.responseText);

            //Save array of sorted names DESCENDING -- (largest number == more weight lost == higher rank)
            let sortedNames = Object.keys(result).sort((a,b) => {return result[b] - result[a]});

            let rank = (sortedNames.indexOf(username)) + 1;

            //Use placing suffixes
            let suffix;
            switch(rank){
                case 1:
                    suffix = "st!";
                    break;
                case 2:
                    suffix = "nd!";
                    break;
                case 3:
                    suffix = "rd!";
                    break;
                default:
                    suffix = "th!";
            }

            document.querySelector("#rankLabel").innerText = "You are " + rank + suffix;            

        }
    }

    xhttp.open("GET", "/database_functions/getRanks.php", true);
    xhttp.send();

    }, 500);
}