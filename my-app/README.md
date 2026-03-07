# 🚌 SATAS Bus - Online Bus Reservation System

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-red?style=for-the-badge&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.2+-blue?style=for-the-badge&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css" alt="Tailwind">
  <img src="https://img.shields.io/badge/MySQL-8.0-orange?style=for-the-badge&logo=mysql" alt="MySQL">
</p>

## 📋 Table of Contents
- [About](#about)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Setup](#database-setup)
- [Default Accounts](#default-accounts)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Screenshots](#screenshots)
- [License](#license)

## 🎯 About

SATAS Bus is a modern, full-featured online bus reservation system built with Laravel 11. It provides a seamless booking experience for passengers and a comprehensive management dashboard for administrators.

## ✨ Features

### 🎫 User Features
- **Smart Search System** - Search buses by departure/arrival cities and date
- **Real-time Availability** - View available seats and schedules
- **Secure Booking** - Complete reservation with payment processing
- **User Dashboard** - Manage reservations and download tickets
- **Profile Management** - Update personal information and password
- **Ticket Download** - Generate PDF tickets for confirmed bookings

### 👨‍💼 Admin Features
- **Admin Dashboard** - Overview of reservations, revenue, and statistics
- **Reservation Management** - View and manage all bookings
- **Fleet Management** - Manage buses and their capacities
- **Route Management** - Configure routes, segments, and pricing
- **User Management** - Monitor passenger accounts

### 🎨 Design Features
- **Professional UI** - Modern, clean interface with Tailwind CSS
- **Responsive Design** - Works seamlessly on desktop and mobile
- **Smooth Animations** - CSS keyframe animations for better UX
- **Unified Navigation** - Consistent navbar across all pages
- **Role-based Access** - Separate interfaces for users and admins

## 🛠 Tech Stack

- **Backend:** Laravel 11.x
- **Frontend:** Blade Templates, Tailwind CSS
- **Database:** MySQL 8.0
- **PDF Generation:** DomPDF
- **Authentication:** Laravel Breeze
- **Icons:** Heroicons (SVG)

## 📦 Installation

### Prerequisites
- PHP >= 8.2
- Composer
- MySQL >= 8.0
- Node.js & NPM

### Steps

1. **Clone the repository**
```bash
git clone https://github.com/yourusername/satas-bus.git
cd satas-bus/my-app
```

2. **Install PHP dependencies**
```bash
composer install
```

3. **Install Node dependencies**
```bash
npm install
```

4. **Create environment file**
```bash
copy .env.example .env
```

5. **Generate application key**
```bash
php artisan key:generate
```

6. **Configure database in .env**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bookbus
DB_USERNAME=root
DB_PASSWORD=
```

7. **Run migrations and seeders**
```bash
php artisan migrate:fresh --seed
php artisan db:seed --class=AdminSeeder
```

8. **Build assets**
```bash
npm run build
```

9. **Start development server**
```bash
php artisan serve
```

Visit: `http://localhost:8000`

## ⚙️ Configuration

### Admin Middleware
The admin middleware is registered in `bootstrap/app.php`:
```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ]);
})
```

### Storage Link
Create symbolic link for storage:
```bash
php artisan storage:link
```

## 🗄️ Database Setup

The project includes comprehensive seeders:

- **VilleSeeder** - 20 Moroccan cities
- **BusSeeder** - 100 buses with varying capacities
- **RouteSeeder** - Multiple routes between cities
- **ProgrammeSeeder** - Daily schedules for next 30 days
- **TestDataSeeder** - Sample reservations
- **AdminSeeder** - Admin account

## 🔐 Default Accounts

### Admin Account
- **Email:** admin@satasbus.ma
- **Password:** admin123
- **Access:** Full admin panel access

### Test User Account
- **Email:** test@test.com
- **Password:** password
- **Access:** User dashboard with sample reservations

## 🚀 Usage

### For Passengers
1. Visit homepage and search for buses
2. Select departure/arrival cities and date
3. Choose from available buses
4. Complete booking with payment
5. Download ticket from dashboard

### For Administrators
1. Login with admin credentials
2. Access admin panel via "Admin" link in navbar
3. View statistics on dashboard
4. Manage reservations, buses, and routes
5. Monitor system performance

## 📁 Project Structure

```
my-app/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminController.php
│   │   │   ├── ReservationController.php
│   │   │   ├── SearchController.php
│   │   │   ├── ProfileController.php
│   │   │   └── PageController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── User.php
│       ├── Bus.php
│       ├── Route.php
│       ├── Programme.php
│       └── Reservation.php
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── VilleSeeder.php
│       ├── BusSeeder.php
│       ├── RouteSeeder.php
│       ├── ProgrammeSeeder.php
│       └── AdminSeeder.php
├── resources/
│   └── views/
│       ├── partials/
│       │   ├── navbar.blade.php
│       │   └── admin-navbar.blade.php
│       ├── admin/
│       │   ├── dashboard.blade.php
│       │   ├── reservations.blade.php
│       │   ├── buses.blade.php
│       │   └── routes.blade.php
│       ├── pages/
│       │   ├── about.blade.php
│       │   ├── contact.blade.php
│       │   ├── faq.blade.php
│       │   ├── terms.blade.php
│       │   └── privacy.blade.php
│       ├── profile/
│       │   ├── show.blade.php
│       │   └── edit.blade.php
│       ├── auth/
│       ├── dashboard.blade.php
│       └── welcome.blade.php
└── routes/
    └── web.php
```

## 📸 Screenshots

### Homepage
Modern search interface with city selection and date picker

### User Dashboard
View and manage all reservations with download options

### Admin Panel
Comprehensive dashboard with statistics and management tools

### Booking Flow
Seamless reservation process from search to confirmation

## 🔑 Key Routes

### Public Routes
- `/` - Homepage with search
- `/about` - About page
- `/contact` - Contact form
- `/faq` - Frequently asked questions
- `/terms` - Terms and conditions
- `/privacy` - Privacy policy

### Authenticated Routes
- `/dashboard` - User reservations
- `/profile` - User profile
- `/profile/edit` - Edit profile
- `/reservation/{id}` - Booking form
- `/ticket/{id}/download` - Download ticket PDF

### Admin Routes (requires admin role)
- `/admin/dashboard` - Admin overview
- `/admin/reservations` - All reservations
- `/admin/buses` - Fleet management
- `/admin/routes` - Route management

## 🎨 Design System

### Colors
- **Primary:** Orange (#F97316)
- **Secondary:** Purple (#9333EA)
- **Success:** Green (#10B981)
- **Danger:** Red (#EF4444)
- **Neutral:** Gray shades

### Typography
- **Font Family:** System fonts (sans-serif)
- **Headings:** Bold, 2xl-4xl sizes
- **Body:** Medium weight, base size

## 🔒 Security Features

- CSRF protection on all forms
- Password hashing with bcrypt
- Role-based access control
- SQL injection prevention via Eloquent ORM
- XSS protection via Blade templating

## 🐛 Troubleshooting

### Common Issues

**Issue:** White page after login
**Solution:** Clear view cache
```bash
php artisan view:clear
php artisan route:clear
php artisan config:clear
```

**Issue:** Admin link not showing
**Solution:** Ensure user role is set to 'admin'
```bash
php artisan tinker
$user = User::where('email', 'your@email.com')->first();
$user->role = 'admin';
$user->save();
```

**Issue:** Assets not loading
**Solution:** Rebuild assets
```bash
npm run build
```

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Author

**SATAS Bus Development Team**

## 🤝 Contributing

Contributions, issues, and feature requests are welcome!

## 📞 Support

For support, email contact@satasbus.ma or create an issue in the repository.

---

<p align="center">Made with ❤️ using Laravel</p>
