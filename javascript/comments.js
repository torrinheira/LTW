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
        draw_comment(comments[i]['id'], comments[i]['username'], comments[i]['content'], comments[i]['date']);
    }
}

if (session_username != undefined) {
    let submit = document.querySelector('#submit');
    submit.addEventListener('click', post_comment);
}

function post_comment() {
    let content = document.querySelector('#content').value;

    if (!content)
        return;

    request('post', '../api/insert_comment.php', { property_id: property_id, content: content }, post);
}

function post() {
    let id = JSON.parse(this.response);
    let content = document.querySelector('#content');
    let date = new Date().toJSON().slice(0, 10);
    
    draw_comment(id, session_username, content.value, date);
    content.value = '';
}


function draw_comment(id, username, content, date) {
    let comment = document.createElement('article');
    comment.setAttribute('class', 'comment');

    let header = document.createElement('header');
    header.innerHTML = '<a href="../pages/profile.php?username=' + username + '">' + username + '</a>';

    if (username == session_username) {
        let del_comment = document.createElement('span');
        del_comment.setAttribute('class', 'del_comment');
        del_comment.setAttribute('data-id', id);
        del_comment.innerHTML = 'Delete';
        header.appendChild(del_comment);
    }

    comment.appendChild(header);

    let paragraphs = content.split('\n');
    for (let i = 0; i < paragraphs.length; i++) {
        if (!paragraphs[i])
            break;
        comment.innerHTML += '<p>' + paragraphs[i] + '</p>';
    }
    comment.innerHTML += '<footer>' + date + '</footer>';

    comment_section.appendChild(comment);
}

document.addEventListener('click', function(event) {
    if (event.target && event.target.getAttribute('class') == 'del_comment') {
        let id = event.target.getAttribute('data-id');

        event.target.parentElement.parentElement.remove();
        request('post', '../api/delete_comment.php', { comment_id: id }, null);
    }
});
