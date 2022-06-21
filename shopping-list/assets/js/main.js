
document.addEventListener("DOMContentLoaded", function(){
    //dom is fully loaded, but maybe waiting on images & css files
    console.log('loaded');
    Main.init();
    Food.init();
});

var Main = {
    "init":function(){
        var elem = document.getElementById('navbar-toggler');
            elem.addEventListener('click', Main.toggleMenu);

    },
    "toggleMenu":function() {
        var menuItems = document.getElementsByClassName('nav-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
}

var Food = {
    "init":function(){
        // This is the old way to do XHR. Jquery has this built in..
        var XHR = new XMLHttpRequest();
        XHR.onreadystatechange = function() {
            if (XHR.readyState === 4){
                document.getElementById('result').innerHTML = XHR.responseText;
            }
        };

        var elems = document.getElementsByClassName('af');
        for (let i = 0; i < elems.length; i++) {
            elems[i].addEventListener('click', Food.addFood);
        }

    },
    "addFood":function(){
        console.log(this.getAttribute('data-id'));
        // base_url 
        // console.log(d);
        // 


        var FD = new FormData();
        FD.append('foodID', this.getAttribute('data-id'));
        XHR.open('post', d + 'list/foodAdd');
        XHR.send(FD);
    }
}


