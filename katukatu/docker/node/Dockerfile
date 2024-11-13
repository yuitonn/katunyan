# Node.js の LTS バージョンをベースにする
FROM node:lts

# 作業ディレクトリを指定
WORKDIR /var/www/html

# Laravel Breezeのインストール後にNPMの依存関係をインストール
CMD if [ -f package.json ]; then \
        npm install && npm run dev; \
        fi