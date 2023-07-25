let x;

const num = [15, 25, 2, 50, 302];
const str = ['chair', 'table', 'white board'];

x = num.length;

// Add to last
str.push(('students'));
x = str.length;

// Adds to last
str.push('Speaker');

// adds to first
str.unshift('Teacher');

console.log(str);

// Remove the last value
str.pop();
x = str;

//Remove the first value
str.shift();

// Reverse
x = num.reverse();

console.log(x);

// Challenge
//  the final out put will be 6, 5, 4, 3, 2, 1
const arr = [0, 1, 2, 3, 4];
arr.shift();
arr.push(5);
arr.push(6);
arr.reverse();

console.log(arr);

