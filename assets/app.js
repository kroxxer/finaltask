import './bootstrap.js';
import Cookies from "js-cookie";
import './styles/app.css';
import 'bootstrap/dist/css/bootstrap.min.css';

function checkTheme() {
    console.log(Cookies.get('theme') + " aaaa");
    if (Cookies.get('theme') === '') {
        setTheme();
    } else {
        document.documentElement.setAttribute('data-bs-theme', Cookies.get('theme'));
    }
}

function setTheme() {
    let date = new Date(Date.now() + 86400e3);
    Cookies.set('theme', 'dark', { expires : date});
    document.documentElement.setAttribute('data-bs-theme','dark');
}

window.addEventListener("load", checkTheme);
document.getElementById('btnSwitch').addEventListener('click',()=>{
    if (Cookies.get('theme') === 'dark') {
        document.documentElement.setAttribute('data-bs-theme','light');
        Cookies.set('theme', 'light');
    } else {
        document.documentElement.setAttribute('data-bs-theme','dark');
        Cookies.set('theme', 'dark');
    }
})

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
