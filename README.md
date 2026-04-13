# GovDoc - Secure Management System

A professional Document Management and Internal Messaging System designed for government and corporate environments.

## 🚀 Features
- **Multilingual Support:** Full interface in Turkmen (TK), Russian (RU), and English (EN).
- **Secure Documents:** Role-based access (Admin/Manager/Employee) with private file storage.
- **Internal Messaging:** Real-time chat using Laravel Reverb (WebSockets).
- **Audit Logging:** Every action (Login, Upload, Download, Delete) is tracked with IP and User Agent.
- **Admin Control:** User approval system and Department management.
- **Local Network Ready:** Optimized for Intranets (No external CDNs used for core JS/CSS).

## 🛠 Tech Stack
- **Backend:** Laravel 12 (PHP 8.2+)
- **Frontend:** Bootstrap 5 (Blade Templates)
- **Database:** PostgreSQL / MySQL
- **Real-time:** Laravel Reverb
- **Security:** Spatie Laravel-Permission

## 📦 Installation
1. Clone the repo: `git clone https://github.com/mad808/gov-doc-management.git`
2. Install dependencies: `composer install`
3. Setup .env: `cp .env.example .env` (Configure your DB)
4. Run migrations: `php artisan migrate --seed`
5. Start server: `php artisan serve`
