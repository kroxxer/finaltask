import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';
import 'bootstrap/dist/css/bootstrap.min.css';

document.getElementById('btnSwitch').addEventListener('click',()=>{
    if (document.documentElement.getAttribute('data-bs-theme') === 'dark') {
        document.documentElement.setAttribute('data-bs-theme','light')
    }
    else {
        document.documentElement.setAttribute('data-bs-theme','dark')
    }
})

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
