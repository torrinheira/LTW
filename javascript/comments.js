'use strict';

import { request } from './network.js';


const urlParams = new URL(window.location).searchParams;
const property_id = urlParams.get('id');


let session_username;
request('post', '../api/fetch_session.php', {}, get_username);
function get_username() {
    session_username = JSON.parse(this.response);
}


const comment_section = document.querySelector('#comments');

request('post', '../api/fetch_comments.php', { id: property_id }, draw_comments);
function draw_comments() {
    let comments = JSON.parse(this.response);

    for (let i = 0; i < comments.length; i++) {
        draw_comment(comments[i]['username'], comments[i]['content'], comments[i]['date']);
    }
}


let submit = document.querySelector('#submit');
submit.addEventListener('click', post_comment);

function post_comment() {
    let content = document.querySelector('#content').value;
    document.querySelector('#content').value = '';

    if (!content)
        return;

    request('post', '../api/insert_comment.php', { property_id: property_id, content: content }, null);

    // TODO: check if this is the correct way of doing this
    let date = new Date().toJSON().slice(0, 10);

    draw_comment(session_username, content, date);
}


function draw_comment(username, content, date) {
    let comment = document.createElement('article');
    comment.setAttribute('class', 'comment');

    let header = document.createElement('header');
    header.innerHTML = '<a href="../pages/profile.php?username=' + username + '">' + username + '</a>';

    if (username == session_username) {
        let delete = document.createElement('span');
        delete.innerHTML = 'Delete';
        delete.addEventListener('click', delete_comm)
    }

    let paragraphs = content.split('\n');
    for (let i = 0; i < paragraphs.length; i++) {
        if (!paragraphs[i])
            break;
        comment.innerHTML += '<p>' + paragraphs[i] + '</p>';
    }
    comment.innerHTML += '<footer>' + date + '</footer>';

    comment_section.appendChild(comment);
}

