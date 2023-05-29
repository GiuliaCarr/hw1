function checkUsername(event) {
    const input = event.currentTarget;
    const error = document.querySelector('#username');


    if (input.value.length > 0) {
        error.classList.remove('error')
        error.classList.add('hidden');


    } else {


        error.classList.add('error');


    }


}

function checkPassword(event) {
    const input = event.currentTarget;
    const error = document.querySelector('#password');


    if (input.value.length > 0) {
        error.classList.remove('error')
        error.classList.add('hidden');


    } else {


        error.classList.add('error');


    }


}










document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.username input').addEventListener('blur', checkUsername);