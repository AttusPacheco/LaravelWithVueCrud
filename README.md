<h1>
    CRUD with
    <span style="opacity:.5;color:#fb503b;">Laravel</span>
    and
    <span style="opacity:.5;color:#42b883;">VueJs</span>
</h1>

---

## Requirements for new project

- Start [Laravel](https://laravel.com/) project
    - `composer create-project --prefer-dist laravel/laravel projectName`
    - Or `laravel new projectName`
- Install [VueJs](https://vuejs.org/)
    - This dependencies will be used for integrate laravel with vue
        - Vue: `npm i vue`
        - Vue Router: `npm i vue-router`
            - Used for have navigation control
        - Vue Axios: 
          - `npm i axios`
          - `npm i vue-axios`
          - Used to call laravel backend api's
        - Vue Template Compiler: `npm i vue-template-compiler`
        - Vue plugin for Vite: `npm install @vitejs/plugin-vue`

---

## Prepare application

- Install project dependencies
    - `composer install`
    - `npm i`
- Set application key
    - `php artisan key:generate`
- Configure the environment(`.env`) file with your database settings
- Run migrations
    - `php artisan migrate`
- Run Serve
  - `php artisan serve`
- Build Vue
  - `npm run build`
