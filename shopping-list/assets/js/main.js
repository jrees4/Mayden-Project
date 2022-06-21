
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
    "XHR":false,
    "init":function(){
        // This is the old way to do XHR. Jquery has this built in..
        Food.XHR = new XMLHttpRequest();
        Food.XHR.onreadystatechange = function() {
            if (Food.XHR.readyState === 4){
                // document.getElementById('result').innerHTML = Food.XHR.responseText;
                console.log(Food.XHR.responseText);
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
        console.log(d + 'public/foodAdd');

        // var FD = new FormData();
        // FD.append('foodID', this.getAttribute('data-id'));
        // // FD.append('listID', listID);
        // Food.XHR.open('POST', d + 'public/foodAdd', true);
        // Food.XHR.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        // Food.XHR.send(FD);

        var foodid = this.getAttribute('data-id')

        $.ajax({
            method: "post",
            url: d + 'public/foodAdd',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            data: {
                'foodID': foodid,
            },
            success: function (response) {
                console.log(response);
            }
        });

        console.log('done');
    }
}


