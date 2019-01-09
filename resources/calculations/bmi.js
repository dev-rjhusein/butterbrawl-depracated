function getBMI(wt, hFT, hIN){
    setTimeout(()=>{

    //Convert feet and inches to inches only
    let totalInches = (hFT * 12) + hIN;

    let BMI = (wt / (totalInches * totalInches)) * 703;

    document.querySelector("#bmiLabel").innerHTML = ("Current BMI: " + BMI.toFixed(1));
    }, 1000);

}