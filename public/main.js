var mn = $(".nav");
var mns = "nav-scrolled";
var hdr = $('#services').height();
hdr = 300 
var logo = $(".logo");
var links =$('.nav-links>li>a');
//console.log(logo[0].attributes['src'])

$(window).scroll(function () {
    if ($(this).scrollTop() > hdr) {
        // mn.addClass(mns);
        links.addClass('a-scrolled')
        document.getElementById("logo").src = "img/logo.png";

    } else {
        mn.removeClass(mns);
        links.removeClass('a-scrolled');
        document.getElementById("logo").src = "img/logo.png";
    }
});

var menu = document.getElementsByClassName('nav-links')[0].getElementsByTagName('li');
for (var i = 0; i < menu.length; i++) {
    menu[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace("active", "");
        this.getElementsByTagName('a')[0].className += " active";
    });}


var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementsByClassName("notif")[0];

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function () {
    modal.style.animation = "fadeIn .2s ease-in-out"
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}