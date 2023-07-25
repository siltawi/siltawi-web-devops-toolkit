window.onload = () => {
    // Initialize variables
    let btn = document.getElementById('btnCalc');
    btn.addEventListener("click", calcBMI);
}

function calcBMI(){
    let firstName = document.getElementById('firstName').value;
    let lastName = document.getElementById('lastName').value;
    let height = document.getElementById('height').value;
    let weight = parseInt(document.getElementById('weight').value);

    let result = document.getElementById('result');

    if(firstName == "")
        result.innerHTML = `<p>Please enter at least your <span class='info'>name</span>!</p>`;
    else if(height == "" || isNaN(height))
        result.innerHTML = `<p>Please enter a valid <span class='info'>height</span>!</p>`;
    else if(weight == "" || isNaN(weight))
        result.innerHTML = `<p>Please enter a valid <span class='info'>weight</span>!</p>`;
    else {
        let bmi = (weight / ((height*height) / 10000)).toFixed(2);
        if(bmi < 18.6)
            result.innerHTML = `<p>Hi ${firstName} ${lastName}, <br> The BMI is <span class='info'>${bmi}</span> <br> Your Weight is <span class='warning'>Under</span></p>`;
        else if(bmi >= 18.6 && bmi < 24.9)
            result.innerHTML = `<p>Hi ${firstName} ${lastName}, <br> The BMI is <span class='info'>${bmi}</span> <br> Your Weight is <span class='success'>Normal</span></p>`;
        else 
            result.innerHTML = `<p>Hi ${firstName} ${lastName}, <br> The BMI is <span class='info'>${bmi}</span> <br> Your Weight is <span class='danger'>Over</span></p>`;
            
    }

}
