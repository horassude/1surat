import { element } from './modules/event.js'
import { button } from './modules/button.js'
import { formValidate, validate } from './modules/form_validate.js'
import { setting_element, signup_element, create_register_element } from './modules/element.js'
import { file } from './modules/file.js'

const rules = (inputs) => {
    
    var rule = []
    rule['email'] = {id: 'email-username-error', rule: ['required']}
    rule['password'] = {id: 'password-error', rule: ['required']}

    var x = []

    inputs.forEach(input => {
        x.push({id: rule[input.id].id, value: input.value, rules: rule[input.id].rule})
    })

    console.log(x)

    return x
    
}

const User = {

    login: function() {
        const login = document.querySelector('#user-login')
        const inputs = login.querySelectorAll('input');
        const buttonSignin = login.querySelector('#button-signin')

        inputs.forEach(function(input) {
            input.addEventListener("input", function() {
                button.enable(buttonSignin)
            })
        })

        buttonSignin.addEventListener("click", function() {
            // event.preventDefault()
            const errors = formValidate(rules(inputs))
            errors.forEach(function(error) {
                // console.log(error)
                const idError = Object.keys(error)[0];
                const valueError = error[Object.keys(error)]
                if(valueError.length > 0) {
                    event.preventDefault()
                    document.getElementById(idError).innerHTML = valueError
                } else {
                    document.getElementById(idError).innerHTML = ''
                }
            })
        })

    },


    signup: function() {
        const signup = document.querySelector('#user-signup')
        console.log(signup)
        const inputs = signup.querySelectorAll('input')
        const buttonSignUp = signup.querySelector('#button-signup')
        const formID = signup.querySelector('form').id
      
        inputs.forEach(function(input) {
            input.addEventListener('input', () => {
                button.enable(buttonSignUp);
            })
        })

        buttonSignUp.addEventListener('click', () => {
            const errors = formValidate(rules(inputs))

            errors.forEach(function(error) {
                const idError = Object.keys(error)[0];
                const valueError = error[Object.keys(error)]

                if(valueError.length > 0) {
                    event.preventDefault()
                    document.getElementById(idError).innerHTML = valueError
                } else {
                    document.getElementById(idError).innerHTML = ''
                }
            })
        })

    },


    setting: function() {
        const setting = document.querySelector('#user-setting')
        const inputs = setting.querySelectorAll('input');        
        const buttonSave = setting.querySelector('#button-save')
        const buttonImage = setting.querySelector('#button-image')
        const formID = setting.querySelector('form').id
        
        function rules() {
    
            var rule = []
            rule['first-name'] = {id : 'first-name-error', rules:  ['required', 'min=4', 'max=50'] }
            rule['last-name'] = {id : 'last-name-error', rules:  ['required', 'min=4', 'max=50'] }
            rule['user-name'] = {id : 'user-name-error', rules:  ['required', 'min=4', 'max=50'] }
            rule['email'] = {id : 'email-error', rules:  ['email'] }
            rule['phone-number'] = {id : 'phone-number-error', rules:  ['required'] }

            var x = []
            inputs.forEach(function(input) {
                // x.push(input)
                x[input.id] = {value: input.value}
            })

            // console.log(x)

            var rules = []
    
            inputs.forEach(input => {
                if(rule[input.id]) {
                    // console.log(input.value)
                    rules.push({id: rule[input.id].id, value: input.value, rules: rule[input.id].rules})
                }
            })

            return rules
            
        }

        inputs.forEach(function(input) {
            input.addEventListener('input', function() {
                button.enable(buttonSave);
            })
        })

        buttonImage.addEventListener('click', function() {
            file.load('file-input', 'image-preview')
        }) 
        

        buttonSave.addEventListener("click", function() {
            // event.preventDefault()
            // console.log(rules())
            // rules()
            const errors = formValidate(rules())
            errors.forEach(function(error) {
                // console.log(error)
                const idError = Object.keys(error)[0];
                const valueError = error[Object.keys(error)]

                if(valueError.length > 0) {
                    event.preventDefault()
                    document.getElementById(idError).innerHTML = valueError
                } else {
                    document.getElementById(idError).innerHTML = ''
                }
            })
        })
    },


    logout() {}

}

export { User }