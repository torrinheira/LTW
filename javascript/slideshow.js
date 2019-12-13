'use strict';


let curr_slide = 0;
show_slide();

// add event listener to the next button
let next = document.querySelector('.slideshow_container > .next');
next.addEventListener('click', function() {
    curr_slide++;
    show_slide();
});

// add event listener to the previous button
let prev = document.querySelector('.slideshow_container > .prev');
prev.addEventListener('click', function() {
    curr_slide--;
    show_slide();
});

// add event listeners to the dots
let dots = document.getElementsByClassName('dot');
for (let i = 0; i < dots.length; i++) {
    dots[i].addEventListener('click', function() {
        curr_slide = i;
        show_slide();
    });
}


// show the current slide
function show_slide() {
    let slides = document.getElementsByClassName('slide');
    let dots = document.getElementsByClassName('dot');

    if (curr_slide >= slides.length)
        curr_slide = 0;
    else if (curr_slide < 0)
        curr_slide = slides.length - 1;

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
        dots[i].className = 'dot';
    }

    slides[curr_slide].style.display = "block";
    dots[curr_slide].className += ' active';
}