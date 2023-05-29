liked = url = ("images/like.png");
unliked = url = ("images/likee.png")
obj = {
    'Kamisato-Ayaka': "ayaka",
    'Raiden-Shogun': "raiden",
    'Kujou-Sara': "sara",
    'Sangonomiya-Kokomi': "kokomi",
    'Kaedehara-Kazuha': "kazuha"
};

visions = {
    'Anemo' : "traveler-anemo",
    'Geo' : "traveler-geo",
    'Electro' : "traveler-electro",
    'Dendro' : "traveler-dendro"
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
    event.currentTarget.src = unliked;
    event.currentTarget.addEventListener('click', saveCharacter);
    event.currentTarget.removeEventListener('click', deleteCharacter);
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

function saveCharacter(event) {
    console.log("Saving...");
    event.currentTarget.src = liked;
    event.currentTarget.removeEventListener('click', saveCharacter);
    event.currentTarget.addEventListener('click', deleteCharacter);
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
    fetch("save_characters.php", { method: 'POST', body: formData }).then(dispatchResponse, dispatchError);
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
    

    const container = document.querySelector('#container');
    container.innerHTML = '';


    fetchCharacters();

    for (let res in json) {

        const result = document.createElement('div');


        result.dataset.name = ((json[res].name).split(" ")).join("-");
        result.dataset.nation = json[res].nation;
        result.dataset.birthday = json[res].birthday;
        result.dataset.vision = json[res].vision;
        result.dataset.affiliation = json[res].affiliation;
        result.dataset.description = json[res].description
        result.dataset.weapon = json[res].weapon;
        let nsplit = json[res].name
        if (result.dataset.name in obj) {

            result.dataset.name = obj[result.dataset.name];

        }
        if (result.dataset.name ==="Traveler"){
            result.dataset.name = visions[result.dataset.vision];

        }


        const big = document.createElement('section');



        const card = document.createElement('img');
        card.src = "https://api.genshin.dev/characters/" + result.dataset.name.toLowerCase() + '/card';

        big.dataset.card = card.src;
        big.appendChild(card);

        const name = document.createElement('h1');
        name.textContent = (result.dataset.name).split("-").join(" ");
        result.appendChild(name);

        const vision = document.createElement('h3');
        vision.textContent = 'Vision: ' + json[res].vision;
        result.appendChild(vision);

        const nation = document.createElement('span');
        nation.textContent = 'Nation: ' + json[res].nation;
        result.appendChild(nation);

        const birthday = document.createElement('span');
        birthday.textContent = 'Birthday: ' + json[res].birthday;
        result.appendChild(birthday);

        const affiliation = document.createElement('span');
        affiliation.textContent = 'Affiliation: ' + json[res].affiliation;
        result.appendChild(affiliation);

        const description = document.createElement('span');
        description.textContent = 'Description: ' + json[res].description;
        result.appendChild(description);

        const weapon = document.createElement('span');
        weapon.textContent = 'Weapon: ' + json[res].weapon;
        result.appendChild(weapon);

        const save = document.createElement('img');
        save.src = unliked;
        save.classList.add("save");
        result.appendChild(save);
        save.addEventListener('click', saveCharacter);

        big.appendChild(result);
        container.appendChild(big);


    }

}
function onJsonCharactersLiked(json) {
    console.log('Carico i preferiti')
    console.log(json);

    const elements = document.querySelectorAll('h1');

    for (let res in json) {

        for (let elem of elements) {

            if (elem.innerHTML === ((json[res].name).split("-").join(" "))) {


                const img = elem.parentNode.querySelector('img');

                img.src = liked;
                img.removeEventListener('click', saveCharacter)
                img.addEventListener('click', deleteCharacter)
            }
        }
    }


}
function onResponseImg(response) {
    if (!response.ok) {
        console.log('Risposta non valida');
        return null;

    }
    else
        console.log("Risposta ricevuta dell'immagine");
    console.log("Immagine " + response);
    return response;
}

function onSearch(json) {

    const container = document.querySelector('#results');
    container.innerHTML = '';
    fetchCharacters();
    const result = document.createElement('div');


    if (json.length === 0 || json.name === undefined) {
        console.log("Nessun risultato");
        const error = document.createElement('h2');
        error.textContent = ("Results not found");
        error.classList.add('error');
        container.appendChild(error);
        return;
    }


    result.dataset.name = ((json.name).split(" ")).join("-");
    result.dataset.nation = json.nation;
    result.dataset.birthday = json.birthday;
    result.dataset.vision = json.vision;
    result.dataset.affiliation = json.affiliation;
    result.dataset.description = json.description
    result.dataset.weapon = json.weapon;

    if (result.dataset.name in obj) {

        result.dataset.name = obj[result.dataset.name];

    }
    if (result.dataset.name ==="Traveler"){
        result.dataset.name = visions[result.dataset.vision];

    }

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

    const description = document.createElement('span');
    description.textContent = 'Description: ' + result.dataset.description;
    result.appendChild(description);

    const weapon = document.createElement('span');
    weapon.textContent = 'Weapon: ' + result.dataset.weapon;
    result.appendChild(weapon);

    const save = document.createElement('img');
    save.src = unliked;
    save.classList.add("save");
    result.appendChild(save);
    save.addEventListener('click', saveCharacter);

    container.appendChild(big);
    big.appendChild(result);


}

function loadCharacters(event) {
    event.preventDefault();
    fetch("apigenshin.php").then(onResponse).then(onJsonCharacters);


}

function fetchCharacters() {
    fetch("fetch_character.php").then(onResponse).then(onJsonCharactersLiked);
}
function Search(event) {


    const val = document.querySelector('#searchbar').value;
   
    fetch("searchapigenshin.php?character=" + val).then(onResponse).then(onSearch);
   
    const img = fetch("searchapigenshin.php?character=" + val + "/card").then(onResponseImg);
    event.preventDefault();


}
function offAlert() {
    document.querySelector('#dash span').classList.remove('show');
}

function onAlert(event) {
    document.querySelector('#dash span').classList.add('show');
    const avviso = document.querySelector('#alert');
    avviso.addEventListener('mouseout', offAlert);
}


window.addEventListener('load', loadCharacters)




const form = document.querySelector('form');
form.addEventListener('submit', Search)

const avviso = document.querySelector('#alert');
avviso.addEventListener('mouseover', onAlert);

document.querySelector("#menu").addEventListener('click', openMenu)