let x;

x = new Date();

// let d = Date.now();
// let d = x.getTime();

let d;

d = x.getFullYear();
d = x.getMonth();
d = x.getDay();
d = x.getDate();
d = x.getHours();
d = x.getMinutes();
d = x.getMilliseconds();

// d = x.toLocaleString('en-US', {month: 'long'});
d = x.toLocaleString('am-ET', {month: 'short'});

console.log(d);