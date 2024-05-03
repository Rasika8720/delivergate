# Dilivergate Pharmacy 

Internship Assigmentment

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- PHP >= 8.0
- Composer

### Installing

1. Clone the repository:

   ```bash
   git clone https://github.com/Rasika8720/delivergate.git
   ```

2. Navigate into the project directory:

   ```bash
   cd your-project
   ```

3. Install dependencies:

   ```bash
   composer install
   ```

4. Copy `.env.example` to `.env` and configure your environment variables:

   ```bash
   cp .env.example .env
   ```

   Update `.env` file with your database credentials and other settings.

5. Generate application key:

   ```bash
   php artisan key:generate
   ```

6. Run database migrations:

   ```bash
   php artisan migrate
   ```

7. Seed the database:

   ```bash
   php artisan db:seed
   ```

### Usage

Start the development server:

```bash
php artisan serve
```

Access the application in your browser at `http://localhost:8000`.

### Admin user (owner) - Login Credentials

- **Username:** admin@admin.com
- **Password:** 12345678

### Manager user - Login Credentials

- **Username:** manager@manager.com
- **Password:** 12345678

### Cashier user - Login Credentials

- **Username:** cashier@cashier.com
- **Password:** 12345678

## Built With

- [Laravel](https://laravel.com/) - The PHP framework for web artisans.

## Authors

- [Rasika Prasad](https://github.com/Rasika8720)


