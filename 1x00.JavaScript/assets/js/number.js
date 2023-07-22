let x = 3.141592;

let num;

// num = x.toString();
num = x.toString().length;
num = x.toFixed(3);

// Math
num = Math.round(3.4245);
num = Math.floor(3.4243);
num = Math.pow(2, 3);
num = Math.sqrt(25);
num = Math.abs(-5);

num = Math.max(2, 3, 4, 6, 8);
num = Math.min(2, 3, 4, 6, 8);

num = Math.random();
const num1 = Math.floor(num * 100)  + Math.floor(num * 100);

// Local Numbers
let y = 50;
console.log(y.toLocaleString('am-ET'));
console.log(y.toLocaleString('ar-EG'));

// Template Literals
let firstName = 'Abebe';
let grade = '12';

console.log(`Hello my name is ${firstName}, i am grade ${grade}`);