import { button } from './modules/button.js';
import { error } from './modules/errors.js'


const container = {
    show: function(id) { 
        document.getElementById(id).style.display = "block";
        window.onclick = function (event) {
            if (event.target === document.getElementById(id)) {
                document.getElementById(id).style.display = "none";
            }
        }
    }
}


function menu() {
    var button = []
    button['btn-surat'] = 'menu-surat'
    button['btn-user'] = 'menu-user'
    // button['btn-about'] = 'about'
   
    return button
}


const Home = {

    index: function() {
        // console.log(menu())
        const buttons = document.querySelectorAll('button')
        const btnDisposisi = document.getElementById("btn-disposisi")
        
        buttons.forEach(function(button) {
            button.addEventListener('click', () => {
                if(button.id in menu()) {
                    container.show(menu()[button.id])
                }
            })
        })

     
        // button.onClick(btnDisposisi, function() {
        //     if(!admin_online) {
        //         error("You are not authorized");
        //     }
        // })


    }
}


export { Home }