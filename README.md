# Aura E-commerce Platform

A modern, minimalist e-commerce platform built with Laravel 11. Features a Zara-inspired fully responsive UI Tailwind CSS, dynamic product filtering, seamless user authentication, and an admin dashboard for inventory management.

## Features
- **Modern UI/UX**: Premium aesthetic featuring minimalist design, thin borders, and Inter typography.
- **Responsive Layout**: Fully optimized for mobile, tablet, and desktop viewing.
- **Product Management**: Robust admin dashboard for adding, editing, and managing shop inventory.
- **Dynamic Filtering**: Alpine.js powered interactions for instant filtering and dynamic UI rendering.
- **Secure Authentication**: Integrated user and admin login/registration with robust session management.

## Tech Stack
- **Framework**: Laravel 11
- **Frontend**: Tailwind CSS, Alpine.js, Blade components
- **Database**: MySQL / SQLite
- **Asset Compiler**: Vite

## Getting Started

1. Clone the repository
2. Run `composer install` to install PHP dependencies
3. Run `npm install` and `npm run build` to compile frontend assets
4. Copy `.env.example` to `.env` and configure your database
5. Run `php artisan key:generate`
6. Run migrations: `php artisan migrate --seed`
7. Start the development server: `php artisan serve`
