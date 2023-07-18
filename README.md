## Laravel Vue Js CRUD App 


## FEATURES
* Creation and management of contacts
* Admin panel to manage users and their contacts.

## INSTALLATION/RUNNING OF THE APP
Note: Make sure you have git, composer, xampp, or wampp installed locally on your computer first.
cd into the directory where you want to clone the project

1. Clone GitHub repo for this project locally
   git clone https://github.com/andymush/PhoneBook.git
      
2. cd into your project

3. Install Composer Dependencies
   composer install

4. Create a copy of your .env file
  cp .env.example .env

5. Generate an app encryption key
    php artisan key:generate

6. Create an empty database for our application

7. In the .env file, add database information to allow Laravel to connect to the database

8. Migrate the database
    php artisan migrate

9. Seed the database
    php artisan db:seed

10. Start the artisan server for the Laravel backend. The default port is 8000, so you should reach it at http://localhost:8000
    php artisan serve

11. Compile the front-end files
    npm run dev

12.The Admin panel can be accessed by adding '/admin' to the URL e.g  http://localhost:8000/admin
