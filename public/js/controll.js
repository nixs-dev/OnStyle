var activeFilters = [true, false, false];

function configPaymentForm(token, id, namo, price) {
    var form = document.getElementById('paymentModal');
    form.querySelector('#productName').innerHTML += namo;
    form.querySelector('#productPrice').innerHTML += price;

    pay(token, id);
}

function showPassword(e) {
    if(e.parentNode.querySelector('input').type == "password") {
        e.classList.remove('fa-eye');
        e.classList.add('fa-eye-slash');
        e.parentNode.querySelector('input').type = "text";
    }
    else {
        e.classList.remove('fa-eye-slash');
        e.classList.add('fa-eye');
        e.parentNode.querySelector('input').type = "password";
    }
}

function toggleUserOptions() {
    var options = document.querySelector('.menu');
    options.classList.toggle('active');
}

function slide(p) {
    if(p == 'left') {
        document.getElementById('products').scrollLeft -= 300;
    }
    else {
        document.getElementById('products').scrollLeft += 300;
    }
}

function hideSpinner(n) {
    p.querySelector('.spinner').style.display = 'none';
}

function checkFilters(e) {
    var ctrl = document.getElementById('filters');
    var val = e.value;

    if(activeFilters[val]) {
        activeFilters[val] = false;
    }
    else if(!activeFilters[val]) {
        activeFilters[val] = true;
    }

    if(val != 0) {
        if(activeFilters.indexOf(false, 1) == -1) {
            activeFilters[0] = true;
        }
        else {
            activeFilters[0] = false;
        } 
    }
    else {
        var aux;

        if(!activeFilters[0]) {
            aux = true;
        }
        else {
            aux = false;
        }

        Object.values(ctrl.children).forEach(e => {
            if(e.value != 0) {
                e.querySelector('.form-check-input').checked = aux;
                activeFilters[e.value] = aux;
            }
        });
    }

    ctrl.children[0].querySelector('.form-check-input').checked = activeFilters[0];
}

function showExplorer(id) {
    var elem = document.getElementById(id);

    elem.addEventListener("change", function() { previewPhoto(elem.files); }, true);
    elem.click();
}

function previewPhoto(files) {
    var preview = document.getElementById("profilePhoto");
    var photo = files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
    }

    if(photo) {
        reader.readAsDataURL(photo);
    }
}

function getImageFromExplorer() {

}