var nextProduct;
var productName;
var productPrice;
var amount;

function setProduct(id, name, price) {
    nextProduct = id;
    productName = name;
    productPrice = price;

    document.getElementById('amountProductModal').querySelector('#productName').innerHTML += name;
}

function setAmount(a) {
    amount = a;

    document.getElementById('amountProductModal').querySelector('#totalPrice').innerHTML = Number(amount * productPrice).toFixed(2);
}

function refreshCart() {
    var url = '/cart';

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('cart').innerHTML = this.responseText;
        }
    }

    xhr.open('GET', url, true);
    xhr.send();
}

function addToCart(token) {
    if(amount === undefined) {
        amount = 1
    }

    var form = new FormData();
    form.append('idProduct', nextProduct);
    form.append('amount', amount);

    var url = '/cart/add';

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            createToast('success', 'Item adicionado ao carrinho');
            refreshCart();
        }
    }

    xhr.open('POST', url, true);
    xhr.setRequestHeader('X-CSRF-TOKEN', token);
    xhr.send(form);
}

function clearCart(token) {
    var url = '/cart/clear';

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            refreshCart();
        }
    }

    xhr.open('POST', url, true);
    xhr.setRequestHeader('X-CSRF-TOKEN', token);
    xhr.send();
}

function removeFromCart(token, i) {
    var form = new FormData();
    form.append('index', i);

    var url = '/cart/delete';

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            refreshCart();
        }
    }

    xhr.open('POST', url, true);
    xhr.setRequestHeader('X-CSRF-TOKEN', token);
    xhr.send(form);
}
