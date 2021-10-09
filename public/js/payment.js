
function pay(token, productID) {
    var xhr = new XMLHttpRequest();
    var form = new FormData();

    form.append('productID', productID);

    console.log(token)

    var url = '/product/pagSession';

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            PagSeguroDirectPayment.setSessionId(xhr.responseText);
            showPaymentMethods();
        }
    }

    xhr.open('POST', url, true);
    xhr.setRequestHeader('X-CSRF-TOKEN', token);
    xhr.send(form);
}

function showPaymentMethods() {

    PagSeguroDirectPayment.getPaymentMethods({
        amount: 500.00,
        success: function (data) {

            Object.values(data.paymentMethods.CREDIT_CARD.options).forEach(function (obj, i) {
                document.getElementById('allowedCardBrands').innerHTML += "<p style='font-size: 10px; margin-bottom: 0px;'>" + obj.name + "</p>";
            });

            Object.values(data.paymentMethods.ONLINE_DEBIT.options).forEach(function(obj, i){
                document.getElementById('allowedDebit').innerHTML += "<p>" + obj.name + "</p>";
            });
        },
        complete: function (data) {
        }
    });
}

function getBrand(){
    var card = document.getElementById('cardNumber').value;
    var qtd = card.length;

    if(qtd == 6){
        PagSeguroDirectPayment.getBrand({
            cardBin: card,
            success: function(response) {
                var brand = response.brand.name;
                document.getElementById('brand').innerHTML = "<img src=https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/" + brand + ".png>";
                getInstallments(brand);
            },
            error: function (response) {
                document.getElementById('brand').innerHTML = "<p class='text-danger'>Cartão não reconhecido!</p>";
            }
        });
    }
}

function getInstallments(brand)
{
    PagSeguroDirectPayment.getInstallments({
        amount: 500.00,
        brand: brand,
        success: function(response)
        {
            Object.values(response.installments).forEach(function (obj, i) {
                Object.values(obj).forEach(function (obj2, i2) {

                    var value = obj2.installmentAmount;
                    var num= "R$ "+ value.toFixed(2).replace(".",",");
                    document.getElementById('InstallmentsNum').innerHTML += "<option value='" + obj2.quantity + "'>" + obj2.quantity + " parcelas de "+ num +"</option>";

                });
            });

            getTokenCard();
        }
    });
}

function getTokenCard()
{
    PagSeguroDirectPayment.createCardToken({
        cardNumber: '4111111111111111',
        brand: 'visa',
        cvv: '123',
        expirationMonth: '12',
        expirationYear: '2030',
        success: function(response)
        {
            document.getElementById('tokenCard').value = response.card.token;
        }
    });
}


function end(form){
    PagSeguroDirectPayment.onSenderHashReady(function(response){
        document.getElementById('hashCard').value = response.senderHash;
        form.submit();
    });

}
