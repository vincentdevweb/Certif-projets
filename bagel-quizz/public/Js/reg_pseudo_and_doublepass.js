let d = document;


//CHECK THE DOUBLE PASS
let inputpass = d.querySelector('#reg-pass');
let inputdoublepass = d.querySelector('#reg-rep-pass');
let reg_button = d.querySelector('#reg-btn');

function checkMatchingInputs(input1, input2) {
    if (input1.value === input2.value) {
        return true;
    } else {
        return false;
    }
}

inputdoublepass.addEventListener('change', (e) => {
    if (checkMatchingInputs(inputpass, inputdoublepass)) {
        //console.log('match');
        inputdoublepass.classList.remove('is-invalid');
        inputdoublepass.classList.add('is-valid');
        reg_button.innerHTML = '<button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>';
    } else {
        //console.log('not matching');
        inputdoublepass.classList.remove('is-valid');
        reg_button.innerHTML = '<button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" disabled>Register</button>';
        inputdoublepass.classList.add('is-invalid');
    }
    if (inputdoublepass.value == '') {
        inputdoublepass.classList.remove('is-invalid');
        inputdoublepass.classList.remove('is-valid');
        reg_button.innerHTML = '<button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>';
    }
});

inputpass.addEventListener('change', (e) => {
    if (inputdoublepass.value != '') {
        if (checkMatchingInputs(inputpass, inputdoublepass)) {
            inputdoublepass.classList.remove('is-invalid');
            inputdoublepass.classList.add('is-valid');
            reg_button.innerHTML = '<button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>';
        } else {
            inputdoublepass.classList.add('is-invalid');
            inputdoublepass.classList.remove('is-valid');
            reg_button.innerHTML = '<button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" disabled>Register</button>';
        }
    }
});

//GESTION CHECK THE PSEUDO
let pseudo = d.querySelector('#reg-pseudo');

pseudo.addEventListener('change', (e) => {
    fetch('/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            pseudotest: pseudo.value
        })
    }).then((reponse_ajax) => {//promise
        return reponse_ajax.json();
    }).then(data => {
        if (data.success) {
            pseudo.value = data.content;
            pseudo.classList.add('is-valid');
            pseudo.classList.remove('is-invalid');
            reg_button.innerHTML = '<button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>';
        } else {
            pseudo.value = data.content;
            pseudo.classList.add('is-invalid');
            pseudo.classList.remove('is-valid');
            reg_button.innerHTML = '<button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" disabled>Register</button>';
        }
        //console.log(data)
    });
});


