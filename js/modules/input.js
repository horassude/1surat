const inputList = (formID, inputs) => {
    
    var input_rules = []

    switch (formID) {
        case 'form-login-user':
            inputs.forEach(function(input) {
                if(input.name === 'email') {
                    input_rules.push({id: 'email-error',  field: input.name, value: input.value, rules: ['email', 'required', 'max=50', 'min=0']})
                }
                if(input.name === 'password') {
                    input_rules.push({id: 'password-error', field: input.name, value: input.value, rules: ['required']})
                }
            })    
            break;

        case 'form-setting-user':
            inputs.forEach(function(input) {
                if(input.name === 'first_name') {
                    input_rules.push({id: 'first-name-error',  field: input.name, value: input.value, rules: ['required', 'max=30', 'min=5']})
                }
                if(input.name === 'last_name') {
                    input_rules.push({id: 'last-name-error',  field: input.name, value: input.value, rules: ['required', 'max=30', 'min=5']})
                }
                if(input.name === 'username') {
                    input_rules.push({id: 'user-name-error',  field: input.name, value: input.value, rules: ['required', 'max=30', 'min=5']})
                }
                if(input.name === 'phone_number') {
                    input_rules.push({id: 'phone-error', field: input.name, value: input.value, rules: ['required']})
                }
                if(input.name === 'foto') {
                    input_rules.push({id: 'foto-error',  field: input.name, value: input.value, rules: []})
                }
            })
            break;
        
        case 'form-signup-user':
            inputs.forEach(function(input) {
                if(input.name === 'email') {
                    input_rules.push({id: 'email-error',  field: input.name, value: input.value, rules: ['email', 'required']})
                }
                if(input.name === 'password') {
                    input_rules.push({id: 'password-error', field: input.name, value: input.value, rules: ['required']})
                }
            })
            break;
    }
    
    return input_rules;

}


export { inputList }