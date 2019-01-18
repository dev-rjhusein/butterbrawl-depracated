function getBMI(wt, hFT, hIN){
    setTimeout(()=>{    //Calculation relies on data that needs to be processed first

    //Convert feet and inches to inches only
    let totalInches = (hFT * 12) + hIN;

    //Calc Body Mass Index
    let BMI = (wt / (totalInches * totalInches)) * 703;
    
    parent.document.querySelector("#bmiLabel").innerHTML = ("Current BMI: " + BMI.toFixed(1));

    //Get rid of the loading spinner when BMI is displayed
    parent.document.querySelector("#loadDashSpinner").style.visibility = "hidden";
    }, 750);

}