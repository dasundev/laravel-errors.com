# Laravel Errors

Laravel Errors is an **open-source** project designed to assist developers in finding solutions for errors encountered in their day-to-day coding life. So your contribution is invaluable to the ongoing enhancement of this project. Together, we can continue to improve Laravel Errors and make it even more beneficial for developers everywhere.

------

## 📝 Requirements

- PHP 8.2 - with SQLite, GD, and other common extensions.
- Node.js 16 or more recent.

## 👥 Contribution

To contribute, ensure you meet the aforementioned requirements and follow these steps:

Clone the repository and switch to a new branch:

```bash
git clone https://github.com/dasundev/laravel-errors.com.git

cd laravel-errors.com

git checkout -b feat/your-feature # or fix/your-fix
```

> Avoid pushing directly to the main branch. Instead, create a new branch and push your changes to it.

Install dependencies using Composer and NPM:

```bash
composer install

npm install
```

Set up your environment file:

```bash
cp .env.example .env

php artisan key:generate
```

Prepare your database and run the migrations:

```bash
touch database/database.sqlite

php artisan migrate
```

Build assets in watch mode in a separate terminal:

```bash
npm run dev
```

Finally, start the development server:

```bash
php artisan serve
```

After completing your code changes, run the test suite:

```bash
composer test
```

If all tests pass, commit your changes, push your branch, and create a pull request:

```bash
git commit -am "your commit message"

git push
```

## 📄 License

Laravel Errors is open-sourced software licensed under the [MIT](https://opensource.org/licenses/MIT) license.
