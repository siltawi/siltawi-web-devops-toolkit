// Initialize DOM elements
let openShopping = document.querySelector(".shopping");
let closeShopping = document.querySelector(".closeShopping");
let list = document.querySelector(".list");
let listCart = document.querySelector(".listCart");
let body = document.querySelector("body");
let total = document.querySelector(".total");
let quantity = document.querySelector(".quantity");

let prod;

// Add events on clicked to open and close cart page
openShopping.addEventListener("click", () => {
  body.classList.add("active");
});
closeShopping.addEventListener("click", () => {
  body.classList.remove("active");
});

// Get our products data
try {
  fetch("./products.json")
    .then((response) => response.json())
    .then((data) => {
      displayProducts(data);
    })
    .catch(Promise);
} catch (msg) {
  console.warning(msg);
}

let listCarts = [];

function displayProducts(products) {
  prod = products;

  for (let x = 0; x < products.length; x++) {
    let newDiv = document.createElement("div");
    newDiv.classList.add("item");
    newDiv.innerHTML = `
        <img src='assets/img/products/${products[x].image}' >
        <div class='title'>${products[x].name}</div>
        <div class='price'>${products[x].price} ETB</div>
        <button onclick="addToCart(${x})">Add to Cart</button>`;
    list.appendChild(newDiv);
  }
}

function addToCart(key) {
  if (listCarts[key] == null) {
    listCarts[key] = prod[key];
    listCarts[key].quantity = 1;
  } else {
    listCarts[key].quantity += 1;
  }
  reloadCart();
}

function reloadCart() {
  listCart.innerHTML = "";
  let count = 0;
  let totalPrice = 0;
  listCarts.forEach((item, key) => {
    totalPrice = totalPrice + item.price;
    count = count + item.quantity;
    if (item != null) {
      let newDiv = document.createElement("li");
      newDiv.innerHTML = `
                <div><img src="assets/img/products/${item.image}"/></div>
                <div>${item.name}</div>
                <div>${item.price.toLocaleString()}</div>
                <div>
                    <button onclick="updateQuantity(${key}, ${item.quantity - 1})">-</button>
                    <div class="count">${item.quantity}</div>
                    <button onclick="updateQuantity(${key}, ${item.quantity + 1})">+</button>
                </div>`;
      listCart.appendChild(newDiv);
    }
  });

  total.innerHTML = totalPrice.toLocaleString();
  quantity.innerHTML = count;
} 
function updateQuantity(key, quantity){
    if(quantity == 0){
        delete listCarts[key];
    } else {
        listCarts[key].quantity = quantity;
        listCarts[key].price = quantity * prod[key].price;
    }

    reloadCart();
}