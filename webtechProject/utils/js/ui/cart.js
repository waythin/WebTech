const cartOverlay = document.getElementById('cart-overlay')
const cart = document.getElementById('cart')
const closeCart = document.getElementById('close-cart-overlay')

let cartOverlayOpen = false;

cart.addEventListener('click', () => {
    if(!cartOverlayOpen) {
        cartOverlay.style.transform = 'translateX(0)'
    } else {
        cartOverlay.style.transform = 'translateX(100%)'
    }
    cartOverlayOpen != cartOverlayOpen
})
closeCart.addEventListener('click', () => {
    cartOverlay.style.transform = 'translateX(100%)'
    cartOverlayOpen = false;
})
