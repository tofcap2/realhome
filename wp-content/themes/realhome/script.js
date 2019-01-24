var btn = document.querySelector(".toggle_btn");
var header = document.querySelector(".header");
var burger = document.querySelector(".toggle_btn");

btn.onclick = function () {
    header.classList.toggle('nav');
    burger.classList.toggle('open');
}


