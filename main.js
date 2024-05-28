import { Home } from "../js/Home.js";
import { User } from '../js/User.js'
import { Register } from "../js/Register.js";
import { Disposisi } from "../js/Disposisi.js";


((path) => {
    
    console.log("@: ", path)

    if(path === '/') {Home.index()}

    if(path === '/about') {}

    if(path === '/user/login') { User.login()}
       
    if(path === '/user/logout') {User.logout() }
   
    if(path === '/user/signup') { User.signup() }
   
    if(path === '/user/update') { User.setting()  }

    if(path === '/register') {Register.index()}

    if(path === '/register/create') {Register.create()}

    if(path === '/register/delete') {Register.delete()}

    if(path === '/register/update') {Register.update()}
        
    if(path === '/disposisi') {Disposisi.index()}
    
    if(path === '/disposisi/create') {Disposisi.create()}

})(window.location.pathname)