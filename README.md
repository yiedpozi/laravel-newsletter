# Laravel Newsletter Web App

## Installation

1. Clone the repository.
```
git clone https://github.com/yiedpozi/laravel-newsletter.git
```

2. Navigate to the project folder with this command:
```
cd laravel-newsletter
```

3. Install Composer using this command:
```
composer install
```

4. Create an environment file using this command:
```
cp .env.example .env
```

5. Create a database, eg: laravel_newsletter.

6. Edit .env file:
    1. Fill in your database credentials.
    2. Fill in broadcast (Pusher) credentials.

8. Run a database migration using this command:
```
php artisan migrate
```

9. Generate application key using this command:
```
php artisan key:generate
```

10. Install NPM using this command:
```
npm install
```

11. Lastly, build production assets file using this command:
```
npm run build
```

## Run Server

Run server using this command:
```
php artisan serve
```
