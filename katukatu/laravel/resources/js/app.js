import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'your-app-key',
    cluster: 'your-cluster',
    forceTLS: true
});

window.Echo.channel('hp-channel')
    .listen('HPChanged', (e) => {
        const userId = e.userId;
        const hp = e.hp;

        // 対象ユーザーのHPをリアルタイム更新
        if (document.querySelector(`#user-${userId}-hp`)) {
            document.querySelector(`#user-${userId}-hp`).textContent = `HP: ${hp}`;
        }
    });