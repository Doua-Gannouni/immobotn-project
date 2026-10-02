# ImmoboTN — Real Estate Marketplace (Tunisia)

A web platform connecting **clients** with **real estate professionals** in Tunisia. Professionals publish properties, clients browse and contact them, and an administrator moderates listings and users.

**Live demo:** [immobotn.alwaysdata.net](https://immobotn.alwaysdata.net) · Admin panel: `/administrateur`

> The user interface is in **French**, as the platform targets the Tunisian market.

## About

Designed and developed end-to-end by a single developer during a **one-month internship in July 2022**, as part of a bachelor's degree. It was my first Laravel project.

## Features

**Clients**
- Sign up and log in as a client or a professional
- Browse and search properties by title, price or surface
- View property details with an image gallery
- Contact a professional about a property (email notification)
- Manage profile and track sent requests

**Professionals**
- Publish, edit and delete properties with multiple images
- View requests received from clients

**Administrator**
- Dashboard with key statistics
- Approve, reject or delete properties before they go public
- Archive or reactivate client and professional accounts
- View all contact requests
- Real-time notifications when a new property is submitted

## Tech Stack

| Layer | Technologies |
|---|---|
| Backend | PHP 8.1, Laravel 8 (MVC, Eloquent, middlewares, notifications) |
| Frontend | Blade, CSS, Bootstrap 5 (admin template), jQuery |
| Database | MySQL |
| Services | Pusher (real-time events), Mailtrap (SMTP) |
| Hosting | alwaysdata |

## Getting Started

Requirements: **PHP 8.1**, Composer and MySQL. Dependencies are locked to their 2022 versions and do not support PHP 8.2+.

```bash
git clone https://github.com/Doua-Gannouni/ImmoboTN-2022.git
cd ImmoboTN-2022
composer install
cp .env.example .env
php artisan key:generate
```

Set the database, Mailtrap and Pusher credentials in `.env`, along with `ADMIN_EMAIL` and `ADMIN_PASSWORD` for the administrator account. Then run:

```bash
php artisan migrate
php artisan db:seed
php artisan serve
```

## Notes

- Built in 2022 with the stack available at the time (Laravel 8 is now end-of-life).
- Reviewed in 2026 to fix security issues and deploy the project, keeping the original 2022 stack.
