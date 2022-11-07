const estEmail = document.getElementById('estEmail')
const estSenha = document.getElementById('estSenha')
const check = document.getElementById('check')
const spinner = document.getElementById('spinner')
const button = document.getElementById('button')

var estEmail_valid = false
var estSenha_valid = false

estEmail.oninput = function(){
    if(this.value.length > 4) {
        estEmail_valid = true
    }else{
        estEmail_valid = false
    }
    form_valid(estEmail_valid, estSenha_valid)
}

estSenha.oninput = function(){
    if(this.value.length > 8) {
        estSenha_valid = true
    }else{
        estSenha_valid = false
    }
    form_valid(estEmail_valid, estSenha_valid)
}

function form_valid(estEmail_valid, estSenha_valid) {
    if(estEmail_valid && estSenha_valid){
        spinner.style.display = 'none'
        check.style.display = 'block'
        button.classList.add('valid')
        check.classList.add('up')
    }else{
        spinner.style.display = 'block'
        check.style.display = 'none'
        button.classList.remove('valid')
        check.classList.remove('up')
    }
}

