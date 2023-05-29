function checkName(event) {
    const input = event.currentTarget;
    const error = document.querySelector('#name');


    if (input.value.length > 0) {
        error.classList.remove('error')
        error.classList.add('hidden');


    } else {


        error.classList.add('error');


    }


}

function checkSurname(event) {
    const input = event.currentTarget;
    const error = document.querySelector('#surname');


    if (input.value.length > 0) {
        error.classList.remove('error')
        error.classList.add('hidden');


    } else {


        error.classList.add('error');


    }


}
function onJsonCheckUsername(json) {
    
    const error =  document.querySelector('#username');

    if (username = !json.exists) {
        console.log('il nome è disponibile')
       error.classList.remove('error');
       error.classList.add('hidden');
    } else {

        error.querySelector('span').classList.add('error');
        error.querySelector('span').textContent = 'Username already used'


    }

}
function onResponse(response) {
    if (!response.ok) return null;
    console.log(response)
    return response.json();
}
function checkUsername(event) {
    const input = event.currentTarget;
    const error = document.querySelector('#username');
    if (!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        error.classList.add('error');
       

    } else {
        fetch("username_check.php?q=" + encodeURIComponent(input.value)).then(onResponse).then(onJsonCheckUsername);
    }
}
function onJsonCheckEmail(json) {
    console.log('onJsonCheckEmail');
    const error =  document.querySelector('#email');
   
    if (email = !json.exists) {
        console.log('email disponibile')
        error.classList.remove('error');
        error.classList.add('hidden')
    } else {
       
        error.querySelector('span').classList.add('error');
        error.querySelector('span').textContent = 'Email already used'
    }

}


function checkEmail(event) {

    const error = document.querySelector('#email');
    const emailInput = document.querySelector('.email input');
    if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
       error.classList.add('error');
    } else {
        error.classList.remove('error')
        fetch("email_check.php?q=" + encodeURIComponent(String(emailInput.value).toLowerCase())).then(onResponse).then(onJsonCheckEmail);
    }
}

function checkPassword(event) {
    const input = event.currentTarget;
    const error = document.querySelector('#password');


    if (input.value.length >= 8) {
        error.classList.remove('error')
        error.classList.add('hidden');


    } else {


        error.classList.add('error');


    }
}

function checkConfirmPassword(event) {
    const pwd = document.querySelector('.password input').value;
    const input = document.querySelector('.confirm_password input').value;
    if (input  === pwd) {
        document.querySelector('#confirm_password').classList.remove('error');
    } else {
        document.querySelector('#confirm_password').classList.add('error');
    }
}



document.querySelector('.confirm_password input').addEventListener('blur', checkConfirmPassword);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.username input').addEventListener('blur', checkUsername);
document.querySelector('.surname input').addEventListener('blur', checkSurname);
document.querySelector('.name input').addEventListener('blur', checkName);
