const login_element =  
{
    inputList: function() { return document.querySelectorAll('input[type="text"], input[type="password"]') },
    button: function() { return document.getElementById("btn-Signin") },
    email_error: function() {return document.getElementById("email-error")},
    password_error: function() {return document.getElementById("password-error")}
};


const setting_element = 
{
    inputList: function() { return document.querySelectorAll('input') },
    button: function() { return document.getElementById("btn-Save") },
    email_error: function() {return document.getElementById("email-error")},
    password_error: function() {return document.getElementById("password-error")}
}


const signup_element = 
{
    inputList: function() { return document.querySelectorAll('input') },
    email_error: function() {return document.getElementById("email-error")},
    password_error: function() {return document.getElementById("password-error")}
}


const create_register_element = 
{
    input: function() { return document.querySelectorAll('input, textarea')},
    // textArea: function() { return document.querySelectorAll('textarea')},
    // select: function() { return document.querySelectorAll('select')},
    // perihal_error: function() {return document.getElementById("perihal-error")},
    // no_surat_error: function() {return document.getElementById("no-surat-error")},
    // tanggal_surat_error: function() {return document.getElementById("tanggal-surat-error")},
    // tanggal_diterima_error: function() {return document.getElementById("tanggal-diterima-error")},
    // pdf_error: function() {return document.getElementById("pdf-error")}
}


export { login_element, setting_element, signup_element, create_register_element }