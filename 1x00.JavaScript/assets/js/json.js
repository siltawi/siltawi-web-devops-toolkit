let user = {
    id: 1,
    firstName: "Jen",
    lastName: "Doh",
    gender: "Female",
};
let userJ = {
    "id":1,
    "firstName":"Jen",
    "lastName":"Doh",
    "gender":"Female"
};

// user.userName2 = function (){
//     console.log(`${firstName} ${lastName}`);
// }

// user.age = 15;
//  __proto__

// function userName(firstName, lastName){
//     console.log(`${firstName} ${lastName}`);
// }
// userName(user.firstName, user.lastName);

// console.log(user);
let json = JSON.stringify(user);
console.log(json); // from object to json
console.log(JSON.parse(json)); // from json to javascript object

console.log(Object.keys(user).length);  // tod display the length of object property

fetch('./assets/data/users.json')
    .then((response) => response.json())
    .then((json)=> console.log(json));

fetch('https://randomuser.me/api')
    .then((response) => response.json())
    .then((data)=> {
        displayUser(data.results[0]);
    });

function displayUser(user) {
        console.log(user.gender);
    }