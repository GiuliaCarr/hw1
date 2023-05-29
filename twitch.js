unliked = url = ("images/heartp.png");
liked = url = ("images/cuoreviola.png");

esc = url = ("images/esc.png");
sidebar = url = ("images/sidebar.png");

function closeMenu(event) {

    console.log("Closing the menu")
    
   document.querySelector('#menu').addEventListener('click', openMenu);

   

    const menu = document.querySelector("#minimenu");

    menu.classList.remove("onmenu");
    menu.classList.add("offmenu");
}






function openMenu(event) {
    console.log("Opening the menu")
    const exit = document.querySelector('#esc');
    exit.addEventListener('click', closeMenu);

    const menu = document.querySelector("#minimenu");

    menu.classList.remove("offmenu");
    menu.classList.add("onmenu");
}






function onResponse(response) {

    if (!response.ok) {
        console.log('Risposta non valida');
        return null;

    }
    else
        console.log('Risposta ricevuta');
    console.log(response);
    console.log(response.json);
    return response.json();


}
function deleteStream(event) {
    console.log("Deleting...");
    event.currentTarget.src = unliked;
    event.currentTarget.addEventListener('click', saveStream);
    event.currentTarget.removeEventListener('click', deleteStream);
    const card = event.currentTarget.parentNode;

    const formData = new FormData();
    formData.append('thumbnail_url', card.dataset.thumbnail_url);
    formData.append('user_login', card.dataset.user_login);
    formData.append('user_name', card.dataset.user_name);
    formData.append('title', card.dataset.title);
    formData.append('language', card.dataset.language);
    fetch("delete_stream.php", { method: 'POST', body: formData }).then(dispatchResponse, dispatchError);
    event.stopPropagation();
}

function saveStream(event) {

    console.log("Saving...");
    event.currentTarget.src = liked;

    event.currentTarget.removeEventListener('click', saveStream);
    event.currentTarget.addEventListener('click', deleteStream);

    const card = event.currentTarget.parentNode;

    const formData = new FormData();

    formData.append('thumbnail_url', card.dataset.thumbnail_url);
    formData.append('user_login', card.dataset.user_login);
    formData.append('user_name', card.dataset.user_name);
    formData.append('title', card.dataset.title);
    formData.append('language', card.dataset.language);


    fetch("save_streams.php", { method: 'POST', body: formData }).then(dispatchResponse, dispatchError);
    event.stopPropagation();

}
function dispatchResponse(response) {

    console.log(response);

    return (response.json()).then(databaseResponse);
}

function dispatchError(error) {
    console.log("Errore");
}

function databaseResponse(json) {
    if (!json.ok) {
        console.log(json);
        dispatchError();
        return null;
    }
}


function onJson(json) {
    console.log('Ricevuto');


    fetchStreams();
    const container = document.querySelector('#results');

    for (let res in json.data) {

        const elem = document.createElement('div');

        console.log("Arrivano i risultati....")
        elem.dataset.thumbnail_url = (json.data[res].thumbnail_url).replace("-{width}x{height}", "");;
        elem.dataset.user_login = json.data[res].user_login;
        elem.dataset.user_name = json.data[res].user_name;
        elem.dataset.title = json.data[res].title;
        elem.dataset.viewer_count = json.data[res].viewer_count;
        elem.dataset.language = json.data[res].language;
        elem.dataset.started_at = json.data[res].started_at;

        const thumbnail_url = document.createElement('img');
        thumbnail_url.src = elem.dataset.thumbnail_url


        const user_login = document.createElement('h1');
        user_login.textContent = elem.dataset.user_login;

        const user_name = document.createElement('h2');
        user_name.textContent = "User name: " + elem.dataset.user_name;

        const title = document.createElement('h1');
        title.textContent = 'Title: ' + elem.dataset.title;

        const viewer_count = document.createElement('span');
        viewer_count.textContent = "Views: " + elem.dataset.viewer_count;

        const language = document.createElement('span');
        language.textContent = "Language: " + elem.dataset.language;

        const started_at = document.createElement('span');
        started_at.textContent = "Started at: " + elem.dataset.started_at;

        const button = document.createElement('a');
        button.textContent = "Join now!"
        button.href = "https://www.twitch.tv/" + elem.dataset.user_login;

        const save = document.createElement('img');
        save.src = unliked;
        save.classList.add("save")
        elem.appendChild(save);
        save.addEventListener('click', saveStream);


        elem.appendChild(user_login);
        elem.appendChild(thumbnail_url);
        elem.appendChild(button);
        elem.appendChild(user_name);
        elem.appendChild(title);
        elem.appendChild(viewer_count);
        elem.appendChild(language);
        elem.appendChild(started_at);


        container.appendChild(elem);



    }

}


function onJsonStreamsLiked(json) {
    console.log("Carico i preferiti...");
    console.log(json);

    const elements = document.querySelectorAll('h1');

    for (let res in json) {

        for (let elem of elements) {
            if (elem.innerHTML === json[res].name) {

                const img = elem.parentNode.querySelector('.save');

                img.src = liked;
                img.removeEventListener('click', saveStream)
                img.addEventListener('click', deleteStream)
            }


        }
    }

}

function fetchStreams() {
    fetch("fetch_streams.php").then(onResponse).then(onJsonStreamsLiked);
}


function loadStreams(event) {
    event.preventDefault();
    fetch("apitwitch.php").then(onResponse).then(onJson);


}





window.addEventListener('load', loadStreams)

document.querySelector("#menu").addEventListener('click', openMenu)