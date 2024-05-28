import { inputList } from './modules/input.js'
import { openFileDialog } from './modules/dialogue.js'
import { error } from './modules/errors.js'
import { rules } from './modules/rules.js'
import { formValidate, validate } from './modules/form_validate.js';
import { Date_ } from './modules/Date_.js'
import { button } from './modules/button.js'


const Disposisi = {

    linkTo: function(id) {
       
        document.addEventListener('DOMContentLoaded', (event) => {
            const link = document.querySelector(id);
            if(link) {
                window.location.href = link.href;
            }
        });
    },


    index: function() {
        const el = document.querySelector('#disposisi')
        // console.log(el)
    },


    create: function() {

        if(back) {this.linkTo('#back-link')}

        const form = document.querySelector('#register-create')
        const checkBoxs = form.querySelectorAll('input[type="checkbox"]')
        const buttonSave = form.querySelector('#btn-save');
        const tanggalPickup = form.querySelector('#tanggal-pickup');
        const disposisiTanggal = form.querySelector('#tgl-disposisi');
        const inputs = form.querySelectorAll('#tgl-disposisi, #tanggal-pickup, input[type="checkbox"], #isi-disposisi')
        
        // disposisiTanggal.value = Date_.set_date_time(Date_.current())
        // console.log(Date_.now());
        // tanggalPickup.value = Date_.current()

        inputs.forEach(function(input) {
            input.addEventListener('input', () => {
                button.enable(buttonSave)
            })
        })

        buttonSave.addEventListener('click', function() {
            var item = []
            checkBoxs.forEach(function(box) {
                box.checked ? item.push(true) : item.push(false)
            })

            var error = form.querySelector('#disposisi-error')
            if(!item.includes(true)) {
                event.preventDefault()
                error.innerHTML = 'Choose penerima disposisi'
            } else {
                error.innerHTML = ''
            }

            var isiDisposisi = form.querySelector('#isi-disposisi').value
            var error = form.querySelector('#isi-disposisi-error')
            if(!isiDisposisi) {
                event.preventDefault()
                error.innerHTML = 'Disposisi is empty'
            } else {
                error.innerHTML = ''
            }

            const tanggalDiterima = form.querySelector('#tgl-disposisi').value
            var error = form.querySelector('#tanggal-disposisi-error')
            if(!tanggalDiterima) {
                event.preventDefault()
                error.innerHTML = 'Tanggal is empty'
            } else {
                error.innerHTML = ''
            }
        })

        tanggalPickup.addEventListener('input', function() {
            disposisiTanggal.value = Date_.set_date_time(tanggalPickup.value)
        })

    },


    update: function() {
        console.log('disposisi update')
    }

}


export { Disposisi }