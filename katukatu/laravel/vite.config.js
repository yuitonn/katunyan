import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0', // 外部アクセスを許可
        port: 5173,      // 固定ポート
        hmr: {
            host: '192.168.40.203', // ホストマシンのローカルIP
            port: 5173,             // HMRポートを一致させる
        },
    },
});