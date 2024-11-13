# PHP 8.1以上のバージョンをベースにする
FROM php:8.1-fpm

# Composerと必要なパッケージのインストール
RUN apt-get update \
    && apt-get install -y \
    git \
    unzip \
    procps \
    curl \
    openssl \
    && docker-php-ext-install pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Composerをダウンロードしてインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 作業ディレクトリを指定
WORKDIR /var/www/html

# LaravelのインストールとBreezeのセットアップ
CMD if [ ! -f artisan ]; then \
        composer create-project --prefer-dist laravel/laravel . "10.*"; \
        composer require laravel/breeze --dev; \
        php artisan breeze:install; \
        fi \
        && php-fpm