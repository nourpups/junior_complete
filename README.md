
# Installation

`git clone https://github.com/nourpups/junior_complete.git`

`cd junior_complete`

`composer install`

#### Copy .env.example to .env

`php artisan key:generate`

## Make Storage files accessible
.env: `FILESYSTEM_DISK=public`

`php artisan storage:link`

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

## Registration Note
For successful registration you will need to confirm your email. 
Set up your MAIL settings in .env or ignore registration

## Final! Running on local server

`npm install && npm run dev`

`php artisan serve`

You can now access the server at [http://localhost:8000](http://localhost:8000)

