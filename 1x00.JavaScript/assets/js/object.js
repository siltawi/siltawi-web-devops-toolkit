let x;

const menu = {
    title: 'Special Burger',
    category: {
        type: 'Burger',
        time: 'Lunch'
    },
    ingredients: ['Cheese', 'Onion', 'Egg', 'Beef'], 
    weight: '120g',
    price : '250',
    img : 'https//......'
}

menu.whatsTheMenu = function () {
    console.log(`Today menu is ${menu.title}`);
}

menu.whatsTheMenu();
console.log(menu.title);