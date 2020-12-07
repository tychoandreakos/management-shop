const customersEl = document.getElementById('form-customers');
const button = document.getElementById('submit');
const customersInput = customersEl.querySelectorAll('.form-control');
const meta = document.querySelector('meta[name="_token"]').content
const url = document.getElementById('url').value;
const back = document.getElementById('back').value
const error = []
const rule = [8, 8, 11]
const message = ["name", "email", "phone"]

async function postData(url = '', data = {}) {
    // Default options are marked with *
    const response = await fetch(url, {
        method: 'POST', // *GET, POST, PUT, DELETE, etc.
        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
        credentials: 'same-origin', // include, *same-origin, omit
        headers: {
            'Content-Type': 'application/json',
            // 'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-Token': meta
        },
        redirect: 'follow', // manual, *follow, error
        referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: JSON.stringify(data) // body data type must match "Content-Type" header
    });
    return response.json(); // parses JSON response into native JavaScript objects
}


function validator(element, index) {
    return element.length >= rule[index] ? true : false
}

function elementRender() {
    return `The ${message[0]} field is required.`
}

function toastr() {
    $.toast({
        heading: 'Welcome to Monster admin',
        text: elementRender(),
        position: 'top-right',
        loaderBg: '#ff6849',
        icon: 'error',
        hideAfter: 3500
    });
}

button.addEventListener('click', () => {
    let data = {};
    for (let i = 0; i < customersInput.length; i++) {
        const item = customersInput[i];
        const value = item.value;
        if (validator(value, i)) {
            data = {
                ...data,
                [item.getAttribute('name')]: value
            }
        } else error.push(i)
    }

    if (error.length < 1) {
        postData(url, data).then(data => {
            if (data.next) {
                window.location.href = back
            }
        })
    } else {
        toastr()
    }
})

