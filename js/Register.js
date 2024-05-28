import { element } from './modules/event.js'
import { login_element, setting_element, signup_element, create_register_element } from './modules/element.js'
import { formValidate, validate } from './modules/form_validate.js';
import { button } from './modules/button.js'
import { file } from './modules/file.js'
import { Date_ } from './modules/Date_.js'
import { rules } from './modules/rules.js'


const Register = {
    
    index: function() {

        const items = document.querySelectorAll('li')
        const focused = document.querySelectorAll('form');
        const buttonDelete = document.querySelectorAll('a[id="link-delete"]')
        var first = true
        
        items.forEach(function(item) {
            const buttonUpdate = item.querySelector('#button-update')
            var tanggal = item.querySelectorAll('input[type=\'text\']');
            var tanggal_surat = tanggal[2]
            var tanggal_diterima = tanggal[5]

            item.querySelectorAll('input').forEach(function(input) {
                input.addEventListener("input", function() {
                    if(input.id === 'pickup-tanggal-surat') {          
                        tanggal_surat.value = Date_.set_date(input.value)
                    }
    
                    if(input.id === 'pickup-tanggal-diterima') {
                        tanggal_diterima.value = Date_.set_date_time(input.value)
                    }
    
                    button.enable(buttonUpdate)
                })
            })

            item.querySelectorAll('textarea').forEach(function(textarea) {
                textarea.addEventListener('input', function() {
                    button.enable(buttonUpdate)
                })
            })

            item.querySelectorAll('select').forEach(function(select) {
                select.addEventListener('input', function() {
                    button.enable(buttonUpdate)
                })
            })

            item.querySelectorAll('button').forEach(function(button) {
                button.addEventListener('click', function() {
                    if(button.id === 'button-get-pdf') {
                        const inputPdf = item.querySelector('input[type=\'file\']')
                        // console.log(inputPdf)
                        file.open(inputPdf)
                    }
                    
                    if(button.id === 'button-update') {
                        // console.log('save')
                    }
                })
            })

        })

        focused.forEach(function(item) {
            if(first) {
                item.classList.add("bg-blue-200");
                first = false
            } else {
                item.classList.add("bg-blue-100");
            }
            item.addEventListener("click", function() {
                focused.forEach(function(otherItem) {
                    if (otherItem !== item) {
                        otherItem.classList.remove("bg-blue-200");
                    }
                });
                item.classList.add("bg-blue-200");
            });
        })


        buttonDelete.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                document.getElementById("confirm-delete").style.display = "block";

                const autoLink = this.href;

                const buttonYes = document.getElementById("yes")
                const buttonCancel = document.getElementById("cancel")
                const confirmDelete = document.getElementById("confirm-delete")

                buttonYes.addEventListener("click", function() {
                    confirmDelete.style.display = "none";
                    window.location.href = autoLink;
                });

                buttonCancel.addEventListener("click", function() {
                    confirmDelete.style.display = "none";
                });
            });
        });
        
    },

    linkTo: function(id) {
       
        document.addEventListener('DOMContentLoaded', (event) => {
            const link = document.querySelector(id);
            if(link) {
                window.location.href = link.href;
            }
        });
    },

    create: 
        function() {
            
            if(link) {
                this.linkTo('#back-link')
            }

            const form = document.querySelector('form')
            const inputs = form.querySelectorAll('input, textarea, select, li')
            const buttonSave = form.querySelector('#button-save')
            const tanggalSurat = form.querySelector('#tanggal-surat')
            const tanggalSuratPickup = form.querySelector('#pickup-tanggal-surat')
            const tanggalDiterima = form.querySelector('#tanggal-diterima')
            const tanggalDiterimaPickup = form.querySelector('#pickup-tanggal-diterima')
            const buttonPdf = form.querySelector('#button-pdf')
            
            tanggalDiterima.value = Date_.current('ID');

            inputs.forEach(function(input) {
                input.addEventListener('input', function() {
                    buttonSave.disabled = false;  buttonSave.style.opacity = 1;
                })

                input.addEventListener('input', function() {
                    buttonSave.disabled = false;  buttonSave.style.opacity = 1;
                })

                input.addEventListener("input", function() {
                    if(input.id === 'pickup-tanggal-surat') {
                        tanggalSurat.value = Date_.set_date(tanggalSuratPickup.value);
                    }
                    if(input.id === 'pickup-tanggal-diterima') {
                        tanggalDiterima.value = Date_.set_date_time(tanggalDiterimaPickup.value);
                    }
                })
            })

            buttonPdf.addEventListener('click', function() {
                file.load('pdf-input', 'preview-pdf')
            })

            const inputPdf = document.querySelector('#pdf-input')
            inputPdf.addEventListener('change', function() {
                file.size('pdf-input', 'preview-pdf')
            })
        
        
            buttonSave.addEventListener('click', function() {
                const error = formValidate(rules(form.id, create_register_element.input()))
                error.length > 0 ? validate(error) : null
            })
          
            const li = form.querySelectorAll('li')
            li.forEach(function(li) {
                li.addEventListener('click', function() {
                    buttonSave.disabled = false;
                    buttonSave.style.opacity = 1;
                })
            })
        }

    }


export { Register }