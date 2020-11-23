
## About Laravel CRM

A CRM, for managing clients and transactions made by clients

####Setup project
1. `git clone https://github.com/peter2796b/laravel_crm.git`
2. `cd laravel_crm`
3. `composer install`
4. `cp .env.example .env`
5. `php artisan key:generate`
6. `npm install`
7. `npm run dev`
8. set MIX_APP_TOKEN in the .env file `MIX_APP_TOKEN=peter_test_token` - can change it later once the admin user is seeded.

####Setup database and migrations
1. Set `DB_DATABASE`,`DB_USERNAME`,`DB_PASSWORD` in the `.env` file to connect to your database server.
2. `php artisan migrate:fresh`.
3. `php artisan db:seed` to run the seeders (creates an admin user: `email`: admin@admin.com, `password`:password, `api_token`:peter_test_token  )

####Run the App
1. `php artisan storage:link`
2. `npm run watch`
3. `php aritsan serve`



