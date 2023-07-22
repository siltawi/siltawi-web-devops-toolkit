const x = 'Hello World';


let c = x.length;
c = x[4];
c = x.charAt(5);
c = x.indexOf('W');

// transform
c = x.toUpperCase();
c = x.substring(0, 5);

// Change
c = x.replace('World', 'Ethiopia');

// Search
c = x.includes('Ethiopia');

// Hello World
// Challenge
// replace world by developer
// Make uppercase the first character of developer

// let newString = 'developer';
// let cp = newString.charAt(0).toUpperCase();
// let cp = newString[0].toUpperCase()+newString.substring(1);

c = x.replace('World', 'developer');

//  let cp = c.substring(6);
let cp = c[6].toUpperCase();

console.log(c.substring(0, 6) + cp + c.substring(8));
// console.log(x.replace('World', cp));