'use strict';

import { request } from './network.js';


const urlParams = new URL(window.location).searchParams;
const property_id = urlParams.get('id');


// Get the user that is logged in, null in case no user is logged
let session_username = null;
request('post', '../api/fetch_session.php', {}, false, function (){
    session_username = JSON.parse(this.response);
});

// Add listener for the user to post a comment
if (session_username != null) {
    let submit = document.querySelector('#submit');
    submit.addEventListener('click', function() {
        let content = document.querySelector('#content').value;
        if (!content)
            return;
        // request to insert the comment into the database
        request('post', '../api/insert_comment.php', { property_id: property_id, content: content }, true, post_comment);
    });
}

// Draw the new comment on the page
function post_comment() {
    let id = JSON.parse(this.response);
    let content = document.querySelector('#content');
    let date = new Date().toJSON().slice(0, 10);
    
    draw_comment(id, session_username, content.value, date);
    content.value = '';
}

// Draw the comments of the property
request('post', '../api/fetch_comments.php', { id: property_id }, true, function (){
    let comments = JSON.parse(this.response);

    for (let i = 0; i < comments.length; i++) {
        draw_comment(comments[i]['id'], comments[i]['username'], comments[i]['content'], comments[i]['date']);
    }
});

// Draw a comment
const comment_section = document.querySelector('#comments');

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

// Add event listener for comments delete method
document.addEventListener('click', function(event) {
    if (event.target && event.target.getAttribute('class') == 'del_comment') {
        let id = event.target.getAttribute('data-id');

        event.target.parentElement.parentElement.remove();
        request('post', '../api/delete_comment.php', { comment_id: id }, true, null);
    }
});
