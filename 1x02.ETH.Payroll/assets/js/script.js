// initialize button 
let btn = document.getElementById('btnPayrollCalc');
 btn.addEventListener("click", calcPayroll);


function calcPayroll(){
    // initialize elements
    let fullName = document.getElementById('fullName').value;
    let salary = document.getElementById('salary').value;
    let pension = document.getElementById('pension').value;
    let errorMsg = document.getElementById('errorMsg');
    let result = document.getElementById('result');

    // declare & initialize variables
    let pensionPrice = 0;
    let incomeTax = 0;
    let netPay = 0;

    // condition
    if(fullName == "")
        errorMsg.innerHTML = `<p class='error'>Please enter your <span class='info'>name</span></p>`
    else if(salary == "" || isNaN(salary))
        errorMsg.innerHTML = `<p class='error'>Please enter valid <span class='info'>salary</span></p>`
    else if(pension == "Select One")
        errorMsg.innerHTML = `<p class='error'>Please select <span class='info'>pension status</span> first</p>`
    else {
        errorMsg.innerHTML = "";

        // set pension
        pensionPrice = pension == "Yes" ?  salary * 0.07 : 0;
        pensionPrice = pensionPrice.toFixed(2);

        // calculate tax rate
        if(salary <= 600)
            incomeTax = 0;
        else if(salary <= 1650 && salary >= 601)
            incomeTax = (salary * 0.10) - 60;
        else if(salary <= 3200 && salary >= 1651)
            incomeTax = (salary * 0.15) - 142.50;
        else if(salary <= 5250 && salary >= 3201)
            incomeTax = (salary * 0.20) - 302.50;
        else if(salary <= 7800 && salary >= 5251)
            incomeTax = (salary * 0.25) - 565;
        else if(salary <= 10900 && salary >= 7801)
            incomeTax = (salary * 0.30) - 955;
        else
            incomeTax = (salary * 0.35) - 1500;

        // set net pay
        netPay = salary - incomeTax - pensionPrice;
        result.innerHTML = `<tr>
                                <td>${fullName}</td>
                                <td>${salary}</td>
                                <td class='warning'>${incomeTax}</td>
                                <td>${pensionPrice}</td>
                                <td class='success'>${netPay}</td>
                            </tr>`;

        }

}