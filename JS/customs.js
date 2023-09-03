
// stick navbar to top when scrolled

document.addEventListener("DOMContentLoaded", function () {
    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            document.getElementById('navbar_top').classList.add('sticky-top');
            // add padding top to show content behind navbar
            navbar_height = document.querySelector('.navbar').offsetHeight;
            document.body.style.paddingTop = navbar_height + 'px';
            document.getElementById('navbar_top').style.backgroundColor = "white";

        } else {
            document.getElementById('navbar_top').classList.remove('sticky-top');
            document.getElementById('navbar_top').style.background = "transparent";
            // remove padding top from body
            document.body.style.paddingTop = '0';

        }
    });
});

