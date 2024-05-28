const rules = (formID, inputs) => {
    
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
                    input_rules.push({id: 'email-error', field: input.name, value: input.value, rules: ['email', 'required']})
                }
                if(input.name === 'password') {
                    input_rules.push({id: 'password-error', field: input.name, value: input.value, rules: ['required']})
                }
            })
            break;
        
        case 'form-register-create':
            inputs.forEach(function(input) {
                // console.log(input)
                if(input.name === 'perihal') {
                    input_rules.push({id: 'perihal-error', field: input.name, value: input.value, rules: ['required']})
                }
                if(input.name === 'no_surat') {
                    input_rules.push({id: 'no-surat-error', field: input.name, value: input.value, rules: ['required']})
                }
                if(input.name === 'tgl_surat') {
                    input_rules.push({id: 'tanggal-surat-error', field: input.name, value: input.value, rules: ['required']})
                }
                if(input.name === 'tgl_diterima') {
                    input_rules.push({id: 'tanggal-diterima-error', field: input.name, value: input.value, rules: ['required']})
                }
                if(input.name === 'surat_pdf') {
                    input_rules.push({id: 'pdf-error', field: input.name, value: input.value, rules: ['required']})
                }
            })
            break;


            case 'form-disposisi':
                inputs.forEach(function(input) {
                    console.log(input.name)
                    // console.log(formID)
                    if(input.name === 'Kasubbagrenmin') {
                        input_rules.push({id: 'disposisi-error', field: input.name, value: input.value, rules: ['required']})
                    }
            })
            break;
            
    }
    
    return input_rules;

}


export { rules }