const email = (email) => {
    var result = false;
    const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (pattern.test(email)) {
        result = true;
    }
    return result;
}


const required = (value) => {
    var result = true;
    if (!value || value.trim() === '') {
        result = false;
    }
    return result;
}

const max = (value, max) => {
    var result = true;
    if(value.length > max) {
        result = false;
    }
    return result;
}

const min = (value, min) => {
    var result = true;
    if(min === 0) {
        return true;
    }
    if(value.length < min) {
        result = false;
    }
    return result;
}


function formValidate(inputs = array) {
    var id_error = [], errorList = [];
    inputs.forEach(function(input) {
        input.rules.forEach(function(rule) {
            if(rule === 'email') {
                if(!email(input.value)) {
                    id_error.push('Invalid email');
                }
            }
            if(rule === 'required') {
                if(!required(input.value)) {
                    id_error.push('Field is required');
                }
            }
            const rule_max = 'max'
            if(rule.indexOf(rule_max) !== -1) {
                const parts = rule.split('=')
                const max_char = parts[1] 
                if(!max(input.value, max_char)) {
                    id_error.push(`Maxium ${max_char} characters`)
                }
            }
            
            const rule_min = 'min'
            if(rule.indexOf(rule_min) !== -1) {
                const parts = rule.split('=')
                const min_char = parts[1] 
                if(!min(input.value, min_char)) {
                    id_error.push(`Minimum ${min_char} characters`)
                }
            }
        })
        
        // errorList.push(id_error);
        errorList.push({[input.id] : id_error});
        id_error = [];
    })
    
    return errorList;
}


const validate = (errors) => {
    // event.preventDefault()
    console.log(errors)
    errors.forEach(function(error) {
        const id = Object.keys(error)[0];
        const value = error[Object.keys(error)]

        if(value.length !== 0) {
            event.preventDefault();
            document.getElementById(id).innerHTML = value;
        } else {
            document.getElementById(id).innerHTML = ''
        }
    })
    
}


export { formValidate, validate }