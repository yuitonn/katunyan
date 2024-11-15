import './bootstrap';
import Alpine from 'alpinejs';
import Echo from 'laravel-echo';

window.Alpine = Alpine;

Alpine.start();


window.Pusher = require("pusher-js");

console.log('Initializing Echo...');
window.Echo = new Echo({
    broadcaster: "pusher",
    key: "3f8f67e81e3f35d56815",
    cluster: "ap3",
    forceTLS: true,
});
console.log(window.Echo);

window.Echo.channel('hp-channel')
    .listen('HPChanged', (e) => {
        console.log('Event received:', e); // イベントデータをログ出力
        const userId = e.userId;
        const hp = e.hp;

        const userHpElement = document.querySelector(`#user-${userId}-hp`);
        if (userHpElement) {
            userHpElement.textContent = `HP: ${hp}`;
        }
    });