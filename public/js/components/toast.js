var option = {
    animation: true,
    delay: 1000
}

var toastStyleClasses = ["bg-success", "bg-danger", "bg-warning"];


var createToast = function(type, text) {
    var elem = document.getElementById('toastInfo');
    toastStyleClasses.forEach(e => {
        elem.classList.remove(e);
    });

    if(type == 'success') {
        type = 'bg-success';
    }
    else if(type == 'error') {
        type = 'bg-danger';
    }
    else if(type == 'warning') {
        type = 'bg-warning';
    }
    else {
        return;
    }

    elem.classList.add(type);
    elem.querySelector('.toast-body').innerHTML = text;

    t = new bootstrap.Toast(elem, option);
    t.show();
}
