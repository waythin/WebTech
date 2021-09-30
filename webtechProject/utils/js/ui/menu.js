console.log("Hello")
let menu = {};
let activeMenu = '';
let currentItem = '';
let cartList = [];

fetchMenu((result) => {
    menu = result;
    activeMenu = 'appetizer'
    let startingIndex = 0;    
    console.log(menu);
    loadMenu(startingIndex, menu); 
    addClickEvent();
    currentItem = menu[activeMenu][0].menu_id;
    document.querySelectorAll('.menu-type ul li').forEach(item => {
        item.addEventListener('click', (e) => {
            activeMenu = e.target.id;
            currentItem = menu[activeMenu][0].menu_id;
            document.querySelectorAll('.menu-type ul li').forEach(item => {
                item.classList.remove('selected-menu');
            })
            e.target.classList.add('selected-menu');
            // Load full menu to UI
            loadMenu(startingIndex, menu);
            // Add event listener after loading menu each time
            addClickEvent();
        })
    }) 
     
})
function addtocart() {
    cartList.push(currentItem);
    $.post("../../../webtechProject/controllers/handlers/handleCart.php", {
        count: cartList.length,
        cartList: JSON.stringify(cartList)
    }, function(data, status) {
        console.log(data, status);
        updateCartPage(data);
    })
}
function updateCartPage(data) {
    let subtotal = 0;
    document.getElementById('cart-item-number').innerHTML = data.length;
    const itemsContainer = document.querySelector(".cart-container .items");
    itemsContainer.innerHTML = "";
    data.forEach(item => {
        subtotal += parseInt(item.price);
        itemsContainer.innerHTML += `
            <div class="item">
                <img src="../${item.image} ?>" alt="">
                <div class="desc">
                    <h2>${item.title}&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-times-circle"></i></h2>
                    <p>${item.subtitle}u</p>
                </div>
            </div>
            <div class="amount">
                <p>${1}</p>
            </div>
            <div class="price">
                <p>${item.price}</p>
            </div>
        `
    })

    document.getElementById("memo_amount").innerHTML = data.length;
    document.getElementById("memo_subtotal").innerHTML = subtotal;
    document.getElementById("memo_calculated_vat").innerHTML = subtotal*0.15;
    document.getElementById("memo_total").innerHTML = subtotal*0.15 + subtotal;
}
function addClickEvent() {
    document.querySelectorAll('.menu-items').forEach(item => {
        item.addEventListener('click', (e) => {
            document.querySelectorAll('.menu-items').forEach(item => {
                item.classList.remove('selected-menu-item');
            }) 
            e.target.classList.add('selected-menu-item')
            menu[activeMenu].forEach(item => {
                if(e.target.id === item.menu_id) {
                    currentItem = item.menu_id;
                    updateMenuDetails(item.image, item.title, item.subtitle, item.description)
                }
            })
        })
    })
    
}
// Shows seperate blocks of menu
function showMenuItem(id, imgPath) {
    var output = `<div class="menu-items" id="${id}"><img src="../${imgPath}" class="menu" alt=""></div>`;
    document.querySelector(".menu").innerHTML += output;
}
// Show the detail menu to the right side of the menu container
function loadMenuDetails(menu) {
    var output = `
        <div class="preview">
        <button id="addtocart" class="addtocart" onclick="addtocart()"></button>
            <img src="../${menu[activeMenu][0].image}" alt="">
            <h2>${menu[activeMenu][0].title}</h2>
            <h3>${menu[activeMenu][0].subtitle}</h3>
            <p>${menu[activeMenu][0].description}</p>
        </div>
    `
    document.querySelector(".menu").innerHTML += output;
}
function updateMenuDetails(imgPath, title, subtitle, desc) {
    var preview = document.querySelector('.menu .preview');
    preview.innerHTML = `
        <button id="addtocart" class="addtocart" onclick="addtocart()"></button>
        <img src="../${imgPath}" alt="">
        <h2>${title}</h2>
        <h3>${subtitle}</h3>
        <p>${desc}</p>
    `;
    
}
//Menu pagination select
function menuPaginate(num, startingIndex) {
    let total = Math.ceil(num/4)
    const navigator = document.querySelector('.navigator')
    navigator.innerHTML = "";
    for(let i = 0; i < total; i++) {
        navigator.innerHTML += '<div></div>';
    }
    document.querySelector(`.navigator div:nth-child(${Math.floor(startingIndex/4) + 1})`).classList.add('selected-navigator')
}
function loadMenu(startingIndex, menu) {
    document.querySelector(".menu").innerHTML = '';
    // Show the detail menu to the right side of the menu container
    loadMenuDetails(menu);
    // Logic behind loading four menus from menu list to UI
    for(let i = startingIndex; i < menu[activeMenu].length; i++) {
        if(i >= startingIndex + 4) break;
        showMenuItem(menu[activeMenu][i].menu_id, menu[activeMenu][i].image);
    }
    // Give pagination to menu
    menuPaginate(menu[activeMenu].length, startingIndex);
}



