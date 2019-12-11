'use strict';

import { request } from './network.js';


request('post', '../api/fetch_messages.php', {}, true, function() {
    let messages = JSON.parse(this.response);

    if (messages == null)
        return;

    let parent = document.querySelector('.modal_bg');
    if (parent == null) {
        parent = document.querySelector('body');
    }

    let message_elem = document.createElement('div');
    message_elem.setAttribute('class', 'messages');

    for (let i = 0; i < messages.length; i++) {
        message_elem.innerHTML = "<p class=\"" + messages[i]['type'] + "\">" + messages[i]['content'] + "</p>";
    }

    parent.insertBefore(message_elem, parent.childNodes[0]);
    setTimeout(remove_messages, 1500);
});


function remove_messages() {
    document.querySelector('.messages').remove();
}

