// menu toggle
let toggle = document.querySelector('.toggle');
let menu = document.querySelector('.nav');
let main = document.querySelector('.main-body');

toggle.onclick = function(){
    menu.classList.toggle('active');
    main .classList.toggle('active');
}