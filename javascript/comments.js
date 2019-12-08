'use strict';


const urlParams = new URL(window.location).searchParams;

const property_id = urlParams.get('id');
const comment_section = document.querySelector('#comments');

let request = new XMLHttpRequest();
request.onload = requestListener;

request.open('post', '../api/fetch_comments.php', true);
request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
request.send(encodeForAjax({id: property_id}));

function requestListener() {
    let comments = JSON.parse(this.response);

    for (let i = 0; i < comments.length; i++) {
        draw_comment(comments[i]['username'], comments[i]['content'], comments[i]['date']);
    }
}


let submit = document.querySelector('#submit');
submit.addEventListener('click', post_comment);


// TODO: ask how to get the username from the session
function post_comment() {
    let content = document.querySelector('#content').value;

    if (!content)
        return;

    console.log(content);
    let comment_req = new XMLHttpRequest();
    comment_req.open('post', '../api/insert_comment.php', true);
    comment_req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    comment_req.send(encodeForAjax({property_id: property_id, content: content}));
    
    // TODO: check if this is the correct way of doing this
    let date = new Date().toJSON().slice(0, 10);

    draw_comment('implement this', content, date);
}


function draw_comment(username, content, date) {
    let comment = document.createElement('article');
    comment.setAttribute('class', 'comment');

    comment.innerHTML = '<header><a href="../pages/profile.php?username=' + username + '">' + username + '</a></header>';
    let paragraphs = content.split('\n');    
    for (let i = 0; i < paragraphs.length; i++) {
        if (!paragraphs[i])
            break;
        comment.innerHTML += '<p>' + paragraphs[i] + '</p>';
    }
    comment.innerHTML += '<footer>' + date + '</footer>';

    comment_section.appendChild(comment);
}

function encodeForAjax(data) {
    return Object.keys(data).map(function (k) {
        // replace instances of certain characters by escape sequences 
        // representing the utf-8 encoding of the character
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]);
        // the join method creates and returns a new string by concatenating
        // all of the elements in an array separated bt commas or the specified 
        // separator string, in this case '&'
    }).join('&');
}
