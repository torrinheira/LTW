'use strict';

import { request } from './network.js';

let draw = null;
request('post', '../api/fetch_modal.php', {}, false, function() {
    draw = JSON.parse(this.response);
});


const login = document.querySelector('.login');
if (login != null)
    login.addEventListener('click', draw_login);

const signup = document.querySelector('.signup');
if (signup != null)
    signup.addEventListener('click', draw_signup);

const body = document.querySelector('body');
let active_modal = false;


if (draw == 'login') {
    draw_login();
}
else if (draw == 'signup') {
    draw_signup();
}


function draw_login() {
    if (active_modal)
        close_modal();

    let header = document.createElement('div');
    header.innerHTML = '<h1>Log in</h1>'; 
    
    let form = document.createElement('form');
    form.setAttribute('class', 'login_form');
    form.setAttribute('action', '../actions/action_login.php');
    form.setAttribute('method', 'post');
    form.innerHTML += "<input name=\"username\" type=\"text\" placeholder=\"Username\" required>";
    form.innerHTML += "<input name=\"password\" type=\"password\" placeholder=\"Password\" required>";
    form.innerHTML += "<input type=\"submit\" value=\"Log in\">";
    
    let paragraph = document.createElement('p');
    paragraph.innerHTML = 'Don\'t have an account? ';
    let span = document.createElement('span');
    span.setAttribute('class', 'signup');
    span.innerHTML = 'Sign up';
    span.addEventListener('click', draw_signup);
    paragraph.appendChild(span);

    let content = document.createElement('div');
    content.appendChild(form);
    content.appendChild(paragraph);

    draw_modal(header, content);
}

function draw_signup() {
    if (active_modal)
        close_modal();

    let header = document.createElement('div');
    header.innerHTML = '<h1>Sign up</h1>'; 
    
    let form = document.createElement('form');
    form.setAttribute('class', 'login_form');
    form.setAttribute('action', '../actions/action_signup.php');
    form.setAttribute('method', 'post');
    form.innerHTML += "<input name=\"username\" type=\"text\" placeholder=\"Username\" required>";
    form.innerHTML += "<input name=\"email\" type=\"email\" placeholder=\"E-Mail\" required>";
    form.innerHTML += "<input name=\"first_name\" type=\"text\" placeholder=\"First Name\" required>";
    form.innerHTML += "<input name=\"last_name\" type=\"text\" placeholder=\"Last Name\" required>";
    form.innerHTML += "<input name=\"password\" type=\"password\" placeholder=\"Password\" required>";
    form.innerHTML += "<input type=\"submit\" value=\"Sign up\">";
    
    let paragraph = document.createElement('p');
    paragraph.innerHTML = 'Already have an account? ';
    let span = document.createElement('span');
    span.setAttribute('class', 'login');
    span.innerHTML = 'Log in';
    span.addEventListener('click', draw_login);
    paragraph.appendChild(span);

    let content = document.createElement('div');
    content.appendChild(form);
    content.appendChild(paragraph);

    draw_modal(header, content);
}

function draw_modal(header, content) {
    let modal_bg = document.createElement('div');
    modal_bg.setAttribute('class', 'modal_bg');

    let modal = document.createElement('div');
    modal.setAttribute('class', 'modal');

    let close = document.createElement('span');
    close.setAttribute('class', 'close');
    close.innerHTML = 'close';
    close.addEventListener('click', close_modal);

    header.setAttribute('class', 'modal_header');
    header.appendChild(close);

    content.setAttribute('class', 'modal_body');

    modal.appendChild(header);
    modal.appendChild(content);
    modal_bg.appendChild(modal);
    body.appendChild(modal_bg);

    active_modal = true;
}

function close_modal() {
    document.querySelector('.modal_bg').remove();
    active_modal = false;
}
