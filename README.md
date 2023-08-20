# How to Run the Laravel Application

This guide will walk you through the process of setting up and running the Laravel application after cloning it from the repository.

## Prerequisites

Before you begin, make sure you have the following installed on your system:

1. **PHP**: Laravel requires PHP 7.4 or later.
2. **Composer**: A dependency manager for PHP. You can download it from https://getcomposer.org/download/.
3. **Node.js**: Laravel Mix requires Node.js and npm for asset compilation.
4. **MySQL**: The database server for storing application data.

## Installation Steps

### 1. Clone the Repository

Clone the repository using Git:

```bash
git clone https://github.com/WilsonKinyua/guidance-and-counseling-cms
cd guidance-and-counseling-cms
```

### 2. Install Dependencies

Navigate to the project directory and install PHP and JavaScript dependencies:

```bash
composer install
```

### 3. Configure Environment

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Edit the `.env` file and configure your database connection settings:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 4. Generate Application Key

Generate a unique application key:

```bash
php artisan key:generate
```

### 5. Run Migrations and Seeders

Run the database migrations and seeders to create the necessary tables and populate initial data:

```bash
php artisan migrate --seed
```

### 6. Start the Development Server

Start the Laravel development server:

```bash
php artisan serve
```

By default, the application will be accessible at `http://localhost:8000`.

## Running the Application

You can now access the Laravel application in your web browser by visiting `http://localhost:8000`. If you want to use a different port, you can specify it when running the `php artisan serve` command.

Remember that this setup is intended for development purposes. For a production environment, you should consider additional steps such as configuring a proper web server (e.g., Nginx or Apache) and optimizing application settings.

Happy coding!

---

Make sure to replace placeholders like `your-username`, `your-laravel-app`, `your_database_name`, `your_database_username`, and `your_database_password` with the appropriate values for your project.

Additionally, keep in mind that Laravel's installation process and requirements might change over time, so it's always a good idea to refer to the official Laravel documentation for the most up-to-date information.