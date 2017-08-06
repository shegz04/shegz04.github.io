//menu button script
function menubtn(x) {    
    x.classList.toggle("change");
    
    var open = document.querySelector('.sidebar');
    if (open.style.width === '200px') {
        open.style.width = '0';
    }
    else {
        open.style.width = '200px';
        open.style.display === 'block'
    }
       
    
}

function nav_close() {
    var close = document.querySelector('.sidebar');
    close.style.width = '0';
    
    toggle.classList.toggle("change");
}