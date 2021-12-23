# DevPla2.0(2021年12月23日　追記)

This app is a Platform where people can gather web developers for their developments.
We call it as Devpla2.0 and this is an updated version of `Devpla` where Laravel is used for Frontend and Backend.
Devpla2.0 has been developed by using Vue.js for Fronend and Laravel for Backend.

## Instructions

1. Clone this repository
    ```
    git clone https://github.com/tinaba96/devpla2.0.git
    ```

1. Set your own `.env` file 

1. Build the images
    ```
    docker compose build
    ```

1. Start the containers
    ```
    docker compose up -d
    ```

1. Login to Docker
    ```
    docker compose exec app bash
    ```

    - Install Laravel, if needed

1. composer をインストールする（追記）
    
    コマンド：composer install

1. laravelプロジェクト配下に.envが無い場合、以下のコマンドで.envファイル作成
    
    コマンド：cp .env.example .env

1. ローカルホストにアクセスした際に、No application encryption key has been specified と表示された場合...
　  appコンテナに入り、下記のコマンド入力

    コマンド：php artisan key:generate


1. Install npm
    ```
    npm install
    ```

    - Install vuejs, if needed
    ```
    npm install -D vue
    npm install -D vue-router
    ```

1. Run
    ```
    npm run watch
    ```

1. Access to the localhost
1. If you can access to the `/` and `/login`, your setup is finished.


