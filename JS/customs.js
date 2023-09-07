
// stick navbar to top when scrolled

document.addEventListener("DOMContentLoaded", function () {
    window.addEventListener("scroll", function () {
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



let rightBtn = document.getElementsByClassName("right-paddle");
let leftBtn = document.getElementsByClassName("left-paddle");

for(let itr=0;itr<rightBtn.length;itr++)
{
    rightBtn[itr].addEventListener("click", function(event) {
    console.log(rightBtn[itr]);
    const conent = document.getElementsByClassName("menu");
    conent[itr].scrollLeft += 300;
    event.preventDefault();
});
}

for(let itr=0;itr<leftBtn.length;itr++)
{
leftBtn[itr].addEventListener("click", function(event) {
  const conent =  document.getElementsByClassName("menu");
  conent[itr].scrollLeft -= 300;
  event.preventDefault();
});
}

