# Getting started

## Installation

Clone the repository

    git clone https://github.com/louise-matt/blog_laravel.git

Switch to the repo folder

    cd blog_laravel

Install all the dependencies

    composer install
    npm install

Regenerate APP_KEY

    php artisan key:generate

Run the database migrations (**This project use SQlite as database**)

    php artisan migrate

Database seeding

    php artisan migrate --seed 

Start the local development server and the developpment 

    php artisan serve
    npm run dev

Show images

    php artisan storage:link

You can now access the server at http://localhost:8000