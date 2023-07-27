let age = 12;


// Logics
// AND (&&)
// T && T = T
// T && F = F
// F && T = F
// F && F = F

// OR (||)
// T || T = T
// T || F = T
// F || T = T
// F || F = F

// NOT (!)
// !T = F
// !F = T

// age 18 above : you are an adult 
// age between 13 - 17 : you are a teenager
// age below 12 : you are a child

if(age >= 18){
    console.log("you are an adult");
} else if (age <=17 && age >= 13){
 console.log("you are a teenager");
} else {
    console.log("you are a child");
}


// Challenge 
// age above 18 and Identification card (yes, not) : 
// you are allowed to vote
// you are not allowed to vote

window.onload = () => {
    // Initialize variables
    let btn = document.getElementById('btnCheck');
    btn.addEventListener("click", checkCitizen);
}


function checkCitizen() {
    let age = document.getElementById('age').value;
    let id = document.getElementById('id').value;
    let result = document.getElementById('result');


    if(age >=18 && id=="yes"){
        result.innerHTML = "you are allowed to vote";
    } else {
        result.innerHTML = "you are not allowed to vote";
    }
}


// Challenge Payroll Calculator 
// Employee (Name, Payroll) Abebe 15000

// Calculate
// Tax
// Pension 
// Net Pay = payroll - (tax + pension)