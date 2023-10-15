# Sistem Informasi Surat Keterangan Pendamping Ijazah

This Laravel application is designed to manage and generate Surat Keterangan Pendamping Ijazah (SKPI) documents. The application has two types of users: admin and student. Admin users can input master data and review student data, while student users can login and input their personal data and academic achievements, which will be used to generate their SKPI document.

## Requirements

The application requires the following software to be installed:

- PHP 8.1 or higher
- Composer
- MySQL

## Installation

To install the application, follow these steps:

1. Clone the repository: `git clone https://github.com/arbisyarifudin/Aplikasi-SKPI-Elrahma-Laravel.git`
2. Install dependencies: `composer install`
3. Copy `.env.example` to `.env` and configure your environment variables
4. Generate an application key: `php artisan key:generate`
5. Run database migrations: `php artisan migrate`
6. Seed the database: `php artisan db:seed`
7. Start the development server: `php artisan serve`

## Usage

To use the application, follow these steps:

1. Open the application in your web browser: `http://localhost:8000`
2. Log in as an admin with the default credentials: `admin@example.com` / `password`
3. As an admin, you can input master data and review student data
4. Log in as a student with your own credentials
5. As a student, you can input your personal data and academic achievements, which will be used to generate your SKPI document

## Contributing

Contributions to the application are welcome! To contribute, please submit a pull request with your changes.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
