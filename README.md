

# Laravel Project Setup Guide

## Introduction

This guide provides a step-by-step process to set up and run the Laravel project. Ensure you have the required prerequisites installed before proceeding.

---

## Prerequisites

- PHP (>= 8.1)
- Composer (latest version)
- MySQL or any other database supported by Laravel
- Node.js (>= 16.x) and npm/yarn
- Laravel installer (optional)

---

## Installation Steps

### 1. Clone the Repository

```bash
git clone <repository_url>
```

Replace `<repository_url>` with your project's Git repository URL.

Navigate to the project directory:

```bash
cd <project_directory>
```

---

### 2. Install Dependencies

Run the following command to install PHP dependencies:

```bash
composer install
```

---

### 3. Set Up Environment File

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Open the `.env` file and configure the following settings:
- **Database Connection**: Update the `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` fields.
- **App Key**: Generate a unique application key by running:
  ```bash
  php artisan key:generate
  ```

---

### 4. Run Database Migrations

Run the following command to migrate the database schema:

```bash
php artisan migrate
```

If you have seeders, run:

```bash
php artisan db:seed
```

---

### 5. Install Frontend Dependencies

Install the Node.js dependencies:

```bash
npm install
```

Build the frontend assets:

```bash
npm run dev
```

For production builds:

```bash
npm run build
```

---

### 6. Start the Development Server

Run the Laravel development server:

```bash
php artisan serve
```

The application will be accessible at `http://127.0.0.1:8000`.

---

## Additional Commands

- **Clear Cache**:
  ```bash
  php artisan cache:clear
  php artisan config:clear
  php artisan route:clear
  php artisan view:clear
  ```

- **Storage Link**:
  ```bash
  php artisan storage:link
  ```

- **Run Tests**:
  ```bash
  php artisan test
  ```

---

## Troubleshooting

1. Ensure all prerequisites are installed and configured correctly.
2. Verify that your `.env` file is properly set up.
3. Check file permissions for `storage` and `bootstrap/cache` directories:
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```
4. Review the logs in `storage/logs/laravel.log` for detailed error messages.

---

## License

This project is licensed under the [MIT License](LICENSE).

