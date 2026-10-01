# Real Estate Marketplace (Tunisia) — Laravel

A full-stack real estate web platform connecting **clients** with **real estate professionals** in Tunisia. Professionals list properties (*"biens"*), clients browse, search, and contact them directly, and an admin back-office moderates all listings and users.

> **Note:** The application's user interface is entirely in **French**, as it was built for the Tunisian market.

## About this project

This project was designed and developed **end-to-end (conception → development)** by a single developer during a **1-month internship (stage) in July 2022**, as part of a bachelor's degree (licence) curriculum. It covers the full lifecycle of a small marketplace application: database design, authentication and role management, CRUD operations, a moderation back-office, real-time notifications, and transactional email.

## Features

### Client side
- Registration and login as **Client** or **Professional**
- Browse and search real estate listings (by price, surface, etc.)
- View detailed property pages with images
- Contact a professional directly about a listing (sends a real email)
- Manage personal profile and account information
- Track sent requests ("mes demandes")

### Professional side
- Publish, edit, and manage property listings ("biens")
- Upload multiple images per property
- Receive and respond to client requests

### Admin back-office
- Secure admin login (separate from client/professional auth)
- Dashboard overview
- Moderate listings: activate / deactivate / delete properties
- Manage users: view, archive/unarchive clients and professionals
- View and manage contact requests between clients and professionals
- **Real-time notifications** (via Pusher) when a new property is submitted
- Edit admin profile
- Contact form to reach the site administrator

### Emailing
- Transactional emails sent via **Mailtrap** (SMTP) for client → professional contact requests and client → admin contact messages

## Tech Stack

### Backend
| Technology | Version |
|---|---|
| PHP | ~8.1.0 |
| Laravel Framework | ^8.75 |
| Laravel Sanctum | ^2.11 |
| Laravel UI | ^3.4 |
| Laravel Tinker | ^2.5 |
| Guzzle HTTP | ^7.0.1 |
| Pusher PHP Server | ^7.0 |
| fruitcake/laravel-cors | ^2.0 |

### Frontend
| Technology | Version |
|---|---|
| Blade templates | (Laravel 8) |
| Bootstrap | ^5.1.3 |
| Laravel Mix (Webpack) | ^6.0.6 |
| Axios | ^0.21 |
| Sass | ^1.32.11 |
| Popper.js | ^2.10.2 |
| Pusher JS | (real-time notifications) |

### Database & Services
- **MySQL** — relational database
- **Mailtrap** — SMTP email testing/delivery
- **Pusher** — real-time event broadcasting (admin notifications)

### Testing / Tooling
- PHPUnit ^9.5.10
- Laravel Sail ^1.0.1
- Facade Ignition ^2.5 (error page)
- Faker (test data)

## Architecture

- **MVC** structure (standard Laravel), with controllers split by domain: `AdminController`, `AuthentificationController`, `BienController`, `ContactController`, `ProfilController`, `ClientController`, `IndexController`
- **Eloquent models**: `User` (role-based: client / professional / admin), `Bien` (property), `Image`, `Contact`
- **Role-based access** with middlewares: `admin`, `client` and `professionnel`
- **Separate view namespaces** for `admin` and `client` interfaces (`resources/views/admin`, `resources/views/client`)
- **Event/Notification system**: `NewNotification` event broadcast over Pusher, `CreateBienNotification` for database notifications

## Local Setup

> All dependencies are locked to the versions of 2022 (`composer.lock`, Laravel 8.83.19, Carbon 2.59.1).
> They require **PHP 8.1** (PHP 8.2+ is not supported by these versions).

1. Clone the repository and install PHP dependencies:
   ```bash
   composer install
   ```
2. Copy the environment file and generate an app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. Configure your database (MySQL) and Mailtrap credentials in `.env`, plus:
   - `MAIL_FROM_ADDRESS` — sender address of the emails
   - `ADMIN_EMAIL` / `ADMIN_PASSWORD` — admin account created by the seeder
   - `PUSHER_APP_*` and `BROADCAST_DRIVER=pusher` for real-time notifications (optional)
4. Run migrations:
   ```bash
   php artisan migrate
   ```
5. Seed the admin account:
   ```bash
   php artisan db:seed
   ```
6. Serve the application:
   ```bash
   php artisan serve
   ```

## Disclaimer

This project was built as a learning exercise during an academic internship. It is not maintained for production use and reflects the technology versions available in 2022 (Laravel 8, now end-of-life).
