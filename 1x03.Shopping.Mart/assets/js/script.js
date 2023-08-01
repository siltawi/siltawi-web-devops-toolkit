// Initialize DOM elements
let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCart = document.querySelector('.listCart');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

let prod;

// Add events on clicked to open and close cart page
openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
});
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
});

// Get our products data
try{
    fetch('./products.json')
    .then((response) => response.json())
    .then((data)=> {
        displayProducts(data);
    });
}catch(msg){
    console.warning(msg);
}

let listCarts  = [];


function displayProducts(products) {
    prod = products;
    let length = products.length;

    for(let x =0; x < length; x++){
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
        <img src='assets/img/products/${products[x].image}' >
        <div class='title'>${products[x].name}</div>
        <div class='price'>${products[x].price} ETB</div>
        <button onclick="addToCart(${x})">Add to Cart</button>`;
        list.appendChild(newDiv);
    }
}

function addToCart(key){
}