# Boat Registration and Information Management System

## Requirements

-   Composer
-   NodeJS
-   Git
-   PHP ^8.0.0
-   Laragon

### Cloning the project from github

1. Open the terminal and navigate to the directory where you want to clone the project. In Laragon it is located in `C:\laragon\www`.

2. Type the command `git clone https://github.com/johnkenneth24/boat_registration_capstone.git`

3. Press enter and the project will be cloned to your local machine.
4. Open the project in your preferred IDE.

### Installing the dependencies

-   Open the terminal and navigate to the project directory.
-   Copy the `.env.example` file and rename it to `.env`.
-   Type the command `composer install` to install the dependencies.
-   Type the command `php artisan key:generate` to generate the application key.
-   Type the command `npm install` to install the dependencies.
-   Type the command `npm run dev` to compile the assets.
-   In Laragon, make sure to add the phpmyadmin dependency by clicking the `Menu > Tools > Quick add > phpmyadmin`.
-   Start the server by clicking the `Menu > Start All`.
-   Type the command `php artisan migrate --seed` to migrate the database and seed the data.
-   Type the command `php artisan storage:link` to create a symbolic link from `public/storage` to `storage/app/public`.
-   Go to `http://boat_registration_capstone.test` in your browser to view the application.
