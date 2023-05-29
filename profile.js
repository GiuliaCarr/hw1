liked = url = ("images/like.png");
unliked = url = ("images/likee.png")

unlikedp = url = ("images/heartp.png");
likedp = url = ("images/cuoreviola.png");

obj = {
    'Kamisato-Ayaka': "ayaka",
    'Raiden-Shogun': "raiden",
    'Kujou-Sara': "sara",
    'Sangonomiya-Kokomi': "kokomi",
    'Traveler': "traveler-anemo",
    'Kaedehara-Kazuha': "kazuha"
};



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
    return response.json();

}




function deleteCharacter(event) {
    console.log("Deleting...");
    event.currentTarget.parentNode.parentNode.remove();
    
   
    const card = event.currentTarget.parentNode;
    const formData = new FormData();

    formData.append('name', card.dataset.name);
    formData.append('vision', card.dataset.vision);
    formData.append('nation', card.dataset.nation);
    formData.append('birthday', card.dataset.birthday);
    formData.append('affiliation', card.dataset.affiliation);
    formData.append('description', card.dataset.description);
    formData.append('weapon', card.dataset.weapon);
    formData.append('card', card.parentNode.dataset.card);
    fetch("delete_characters.php", { method: 'POST', body: formData }).then(dispatchResponse, dispatchError);



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


function onJsonCharacters(json) {
    console.log('Ricevuto');
    console.log(json);

    const previous = document.querySelector('#results');
    
    previous.innerHTML = '';

const container = document.querySelector('#preferences');
    if (json.length === 0) {
        console.log("Non ci sono preferiti");
        const noresults = document.createElement('h1');
        noresults.classList.add('error');
        noresults.textContent = ("You don't have any preferences yet");
        container.appendChild(noresults);
        return;

    }


    for (let res in json) {

        const result = document.createElement('div');


        result.dataset.name = ((json[res].content.name).split(" ")).join("-");
        result.dataset.nation = json[res].content.nation;
        result.dataset.birthday = json[res].content.birthday;
        result.dataset.vision = json[res].content.vision;
        result.dataset.affiliation = json[res].content.affiliation;
        result.dataset.description = json[res].content.description
        result.dataset.weapon = json[res].content.weapon;
        let nsplit = json[res].content.name




        const big = document.createElement('section');



        const card = document.createElement('img');
        card.src = "https://api.genshin.dev/characters/" + result.dataset.name.toLowerCase() + '/card';

        big.dataset.card = card.src;
        big.appendChild(card);

        const name = document.createElement('h1');
        name.textContent = (result.dataset.name).split("-").join(" ");
        result.appendChild(name);

        const vision = document.createElement('h3');
        vision.textContent = 'Vision: ' + result.dataset.vision;
        result.appendChild(vision);

        const nation = document.createElement('span');
        nation.textContent = 'Nation: ' + result.dataset.nation;
        result.appendChild(nation);

        const birthday = document.createElement('span');
        birthday.textContent = 'Birthday: ' + result.dataset.birthday;
        result.appendChild(birthday);

        const affiliation = document.createElement('span');
        affiliation.textContent = 'Affiliation: ' + result.dataset.affiliation;
        result.appendChild(affiliation);

        const desription = document.createElement('span');
        desription.textContent = 'Description: ' + result.dataset.description;
        result.appendChild(desription);

        const weapon = document.createElement('span');
        weapon.textContent = 'Weapon: ' + result.dataset.weapon;
        result.appendChild(weapon);

        const save = document.createElement('img');
        save.src = liked;
        save.classList.add("save");
        result.appendChild(save);
        save.addEventListener('click', deleteCharacter)


        big.appendChild(result);
        container.appendChild(big);


    }

}





function loadPreferences() {
    document.querySelector('#streams').classList.remove('chosen');
    document.querySelector('#chars').classList.add('chosen');
    
    fetch("fetch_character.php").then(onResponse).then(onJsonCharacters);
    document.querySelector('#streams').addEventListener('click', loadStreams);
    document.querySelector('#chars').removeEventListener('click', loadPreferences);
}



function onJsonProfile(json) {
    console.log("Entro nel database dell'utente...");
    console.log(json);

    if (json.length == 0) {
        console.log("Questo utente non ha scelto propic");
        return;
    }

    else {
        const propic = document.querySelector("#propic");
        console.log("Ho trovato una modifica!");
        propic.src = "https://api.genshin.dev/characters/" + json[0].propic + '/card';

    }

}
function saveChanges(event) {
    const elem = document.querySelector('#modifyProfile');
    elem.classList.add('hidden');

    const result = saveModify();
    console.log('risultato:' + result);

    const card = document.querySelector('#propic');


    console.log("Saving....");

    const formData = new FormData();
    formData.append('propic', result);
    console.log('nella card è: ' + result);

    fetch("save_changes.php", { method: 'POST', body: formData }).then(dispatchResponse, dispatchError);
    event.stopPropagation();


    card.src = "https://api.genshin.dev/characters/" + result + '/card';
    console.log(card.src);






}
 function deleteStream(event){
    console.log("Deleting...");
   
   
    event.currentTarget.parentNode.remove();
    
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

function onJsonStreams(json) {
    console.log('Ricevuto');
    console.log(json);

    const previous = document.querySelector('#preferences');
    previous.innerHTML= '';

    const container = document.querySelector('#results');



    if (json.length === 0) {
        console.log("Non ci sono preferiti");
        const noresults = document.createElement('h1');
        noresults.classList.add('error');
        noresults.textContent = ("You don't have any preferences yet");
        container.appendChild(noresults);
        return;

    }

    for (let res in json) {

        const elem = document.createElement('div');

        console.log("Arrivano i risultati....")
        elem.dataset.thumbnail_url = json[res].content.thumbnail_url;
        elem.dataset.user_login = json[res].content.user_login;
        elem.dataset.user_name = json[res].content.user_name;
        elem.dataset.title = json[res].content.title;
        elem.dataset.language = json[res].content.language;


        const thumbnail_url = document.createElement('img');
        thumbnail_url.src = elem.dataset.thumbnail_url


        const user_login = document.createElement('h1');
        user_login.textContent = elem.dataset.user_login;

        const user_name = document.createElement('h2');
        user_name.textContent = "User name: " + elem.dataset.user_name;

        const title = document.createElement('h1');
        title.textContent = 'Title: ' + elem.dataset.title;



        const language = document.createElement('span');
        language.textContent = "Language: " + elem.dataset.language;



       

        const save = document.createElement('img');
        save.src = likedp;
        save.classList.add("save")
        elem.appendChild(save);
        save.addEventListener('click', deleteStream);


        elem.appendChild(user_login);
        elem.appendChild(thumbnail_url);

        elem.appendChild(user_name);
        elem.appendChild(title);

        elem.appendChild(language);



        container.appendChild(elem);



    }


}
function loadStreams(event) {
    event.preventDefault();
   
    document.querySelector('#chars').classList.remove('chosen');
    document.querySelector('#streams').classList.add('chosen');
    fetch("fetch_streams.php").then(onResponse).then(onJsonStreams); 
    document.querySelector('#streams').removeEventListener('click', loadStreams);
    document.querySelector('#chars').addEventListener('click', loadPreferences);
}



function saveModify() {
    const card = document.createElement('img')
    card.setAttribute('id', 'propic');
    const tipo = document.querySelector('#tipo').value;
    card.dataset.propic = tipo;

    const propic = document.createElement('span');
    propic.innerHTML = card.dataset.propic;
    console.log("Tipo: " + card.dataset.propic);
    return card.dataset.propic;
}
function modify(event) {
    event.preventDefault();
    console.log("Sono su modify");

    const elem = document.querySelector('#modifyProfile');

    elem.classList.remove('hidden');
    const element = document.querySelector('#savechanges');
    element.addEventListener('click', saveChanges);




}


function loadProfile() {
    fetch("fetch_profile.php").then(onResponse).then(onJsonProfile)

}


loadProfile()
loadPreferences();



document.querySelector('#modify').addEventListener('click', modify)

document.querySelector('#streams').addEventListener('click', loadStreams);

document.querySelector('#chars').addEventListener('click', loadPreferences);

document.querySelector("#menu").addEventListener('click', openMenu)