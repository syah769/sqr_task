# SQR Task

A Laravel-based project with authentication using Breeze.

## Tech Stack

- Laravel 11
- Alpine.js 3
- Tailwind CSS

## How to Run the Project

- Clone the repository
- Create `.env` file, based on `.env.example` file
- Run `composer install`
- Run `npm install`
- Run `npm run dev`
- Run `php artisan migrate`
- Run `php artisan db:seed`
- Serve the project through a web server

## Admin Login

- Email: admin@sqr.com
- Password: abcd1234

## Notes
- You can try uploading with the file `sample_data_students.xlsx` that I uploaded.
- You can test the limit of uploaded students by adjusting the `CUSTOM_STUDENT_LIMIT` variable in the `.env` file. For example, set `CUSTOM_STUDENT_LIMIT=100` to allow up to 100 students.
