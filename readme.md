## Installation

Download this repo.

Rename `.env.example` to `.env` and fill the options.

Run the following commands:

```
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
npm install
npm run dev
```

If you are making changes to JavaScript or Styles make sure you run `npm run dev`.
