
document.addEventListener("DOMContentLoaded", function(){
    //dom is fully loaded, but maybe waiting on images & css files
    console.log('loaded');
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


