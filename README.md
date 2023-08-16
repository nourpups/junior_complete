
# Installation

`git clone https://github.com/nourpups/junior_complete.git`

`cd junior_complete`

`composer install`

#### rename .env.example to .env

`php artisan key:generate`

## Set database settings

`DB_DATABASE=your_db`

`DB_USERNAME=your_username`

`DB_PASSWORD=your_password`

## Migrations & Seeders

`php artisan migrate`

`php artisan db:seed`

## Login credentials
### Admin credentials
- Email: admin@admin.com
- Password: admin
### User credentials
- Email: user@user.com
- Password: user

## Final! Running on local server

`npm install && npm run dev`

`php artisan serve`

You can now access the server at [http://localhost:8000](http://localhost:8000)

