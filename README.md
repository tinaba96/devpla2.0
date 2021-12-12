# DevPla2.0

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


