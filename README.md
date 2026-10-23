# Employee Management System

A web-based Employee Management System built with **Laravel, PHP, and MySQL**. This application allows authenticated users to manage employee records and view employee statistics through a dashboard.

## Features

- **Authentication** — Login and logout functionality.
- **Dashboard** — View total employees, male and female counts, average employee age, and total monthly salary.
- **Employee Management** — View, add, edit, and delete employee records.
- **Form Validation** — Validate employee information before saving changes.
- **Database Integration** — Store and manage employee records using MySQL.

## Technology Stack

- **Backend:** PHP, Laravel
- **Database:** MySQL
- **Frontend:** Blade templates, HTML, CSS
- **Development Tools:** Composer, Git

## Requirements

Make sure the following tools are installed:

- PHP compatible with the project's Laravel dependencies
- Composer
- MySQL
- Node.js and npm, if required for frontend asset compilation

## Installation and Setup

### 1. Clone the Repository

```bash
git clone https://github.com/zyncdlve/employee-management-system.git
cd employee-management-system
```

### 2. Install Dependencies

Install the PHP dependencies:

```bash
composer install
```

If frontend dependencies are required, install and build the assets:

```bash
npm install
npm run build
```

### 3. Configure Environment Variables

Create your local environment configuration file by copying `.env.example` to `.env`.

On Windows, you can copy the file using File Explorer or run:

```bash
cp .env.example .env
```

Update the database configuration in `.env` to match your local MySQL setup:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_management
DB_USERNAME=your_local_mysql_username
DB_PASSWORD=your_local_mysql_password
```

Replace the example username and password with your own local MySQL credentials.

**Important:** Never commit your `.env` file or expose your database credentials.

### 4. Generate the Application Key

```bash
php artisan key:generate
```

### 5. Create the Database

Using MySQL Workbench or another MySQL client, create a database named:

```sql
CREATE DATABASE employee_management;
```

### 6. Run Database Migrations

Create the required database tables:

```bash
php artisan migrate
```

### 7. Create the Administrator Account

Run the administrator seeder to create the account used to log in:

```bash
php artisan db:seed --class=AdminUserSeeder
```

The seeder configures the administrator account for local evaluation.

### 8. Start the Application

Run the Laravel development server:

```bash
php artisan serve
```

Open the application in your browser:

http://127.0.0.1:8000

## Login

The application uses an administrator account created through the `AdminUserSeeder`. There is no public registration page.

After completing the database setup and running the seeder, log in using the configured administrator credentials.

## Security Notes

- Keep `.env` and other files containing secrets out of version control.
- Use your own local database credentials.
- The seeded administrator account is intended for local evaluation. Do not reuse its demo password for real or production accounts.
- Follow the project's evaluation instructions when sharing demo credentials.

## Author

Developed as a software development project demonstrating employee record management, authentication, database integration, form validation, and dashboard reporting.