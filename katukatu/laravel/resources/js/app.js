import './bootstrap';
import Alpine from 'alpinejs';
import Echo from 'laravel-echo';

window.Alpine = Alpine;

Alpine.start();


window.Pusher = require("pusher-js");

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "your-app-key",
    cluster: "your-cluster",
    forceTLS: true,
});

window.Echo.channel('hp-channel')
    .listen('HPChanged', (e) => {
        const userId = e.userId;
        const hp = e.hp;

        // 対象ユーザーのHPをリアルタイム更新
        const userHpElement = document.querySelector(`#user-${userId}-hp`);
        if (userHpElement) {
            userHpElement.textContent = `HP: ${hp}`;
        }
    });