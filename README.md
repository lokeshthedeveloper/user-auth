# Laravel User Authentication & CRUD

This project is a Laravel application with user authentication and CRUD functionality.

---

## 📌 Requirements
- PHP >= 8.3
- Composer
- Laravel >= 10
- MySQL
- Node.js & npm

---

## Installation Steps

### Clone the Repository
git clone https://github.com/lokeshthedeveloper/user-auth.git
cd user-auth

### Install PHP Dependencies
composer install


### Install Node.js Dependencies
npm install

### Configure Environment File
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=user_auth
DB_USERNAME=root
DB_PASSWORD=


### Run Migrations
php artisan migrate


### Start the Development Server
php artisan serve

Now open the application in your browser:  
http://127.0.0.1:8000
