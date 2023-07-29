fetch('./products.json')
    .then((response) => response.json())
    .then((data)=> {
        displayProducts(data);
    });

function displayProducts(products) {
 let length = products.length;
 let result = document.getElementById("products");

    for(let x =0; x < length; x++){
        console.table({"ID": `${products[x].id}`,
                    "Name": `${products[x].name}`,
                    "Image": `${products[x].image}`,
                    "Price": `${products[x].price}` });
        
        result.innerHTML = `
        <div style='width: 200px; background-color:#ccc'>
            <h1>${products[0].name}</h1><br>
            <img src='assets/img/${products[0].image}' /><br>
            <h6>${products[0].price}</h6>
        </div>        
    `;
    }
}