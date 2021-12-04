require('./bootstrap');
import Alpine from 'alpinejs';
import CurrentLocation from "./components/CurrentLocation";

window.Alpine = Alpine;

Alpine.start();

document.querySelector('[data-use-current-location]').addEventListener('click', () => CurrentLocation.init());
