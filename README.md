# DevPla2.0(updated 23/12/2021)

This app is a Platform where people can gather web developers for their developments.
We call it as Devpla2.0 and this is an updated version of [Devpla](https://github.com/tinaba96/DevPla/tree/devpla) where Laravel is used for Frontend and Backend.
Devpla2.0 has been developed by using Vue.js for Fronend and Laravel for Backend.

## Instructions

【clone source from github】
1. Clone this repository
    ```
    git clone https://github.com/tinaba96/devpla2.0.git
    ```


【prepare the docker for staring】
1. Set your own `.env` file (put environment variables in .env file)

1. Build the images
    ```
    docker compose build
    ```

1. Start the containers
    ```
    docker compose up -d
    ```

【Install packages】
1. Login to Docker
    ```
    docker compose exec app bash
    ```

    - Install Laravel, if needed

1. install composer
    
    ```
    composer install
    ```
    [Reference](http://vdeep.net/laravel-git-clone)

【In case of having 500 http error】
1. create .env file under `app` directory in laravel
    
    ```
    cp .env.example .env
    ```


【Facing `No application encryption key has been specified` when you access to localhost】
1. go inside app container, run

    ```
    php artisan key:generate
    ```


【Install Vue】
1. Install npm
    ```
    npm install
    ```

    - Install vuejs, if needed
    ```
    npm install -D vue
    npm install -D vue-router
    ```

【Verify Vue】
1. Please run
    ```
    npm run watch
    ```

【Try to access `http://localhost:$port/#/`　or `/login`　to verify your local environment】
1. Access to the localhost
1. If you can access to the `/` and `/login`, your setup is finished.


