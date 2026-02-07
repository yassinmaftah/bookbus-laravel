# 🚌 SATAS Bus - Smart Booking Platform

![Project Status](https://img.shields.io/badge/status-active-success.svg)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=flat&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=flat&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=flat&logo=mysql&logoColor=white)

## 📖 About The Project

**SATAS Bus** is a modern, full-stack web application designed to digitize the intercity bus booking experience in Morocco. It allows users to search for available trips, book seats in real-time, simulate payments, and generate downloadable PDF tickets.

The platform is built with a robust architecture using **Laravel**, focusing on complex Eloquent relationships and a clean User Interface with **Tailwind CSS**.

---

## 🚀 Key Features

### 👤 User Experience
- **Smart Search:** Filter trips by Departure City, Arrival City, and Date.
- **Trip Details:** View departure/arrival times, duration, and pricing.
- **Seat Management:** Real-time check for available seats (Max 50 per bus).
- **Booking Flow:** Secure payment simulation and instant reservation confirmation.
- **PDF Tickets:** Automated generation of professional e-tickets using `laravel-dompdf`.

### 🛠 Technical Highlights
- **Advanced Eloquent Relationships:** Utilization of `hasManyThrough` to link Routes with Segments.
- **Database Normalization:** Structured schema connecting Cities (Villes), Stations (Gares), Routes, and Schedules (Programmes).
- **Validation:** Robust form validation for search inputs and payment details.
- **Responsive Design:** Mobile-first interface built with Tailwind CSS.

---

## 🛠 Tech Stack

| Component | Technology |
|-----------|------------|
| **Backend Framework** | Laravel 10/11 (PHP 8.2+) |
| **Frontend** | Blade Templates, Tailwind CSS, Alpine.js |
| **Database** | MySQL |
| **PDF Engine** | Barryvdh DomPDF |
| **Version Control** | Git & GitHub |

---

## 🗄 Database Schema Overview

The application relies on a relational database designed to handle complex transport logic:

- **Users:** System users and customers.
- **Villes & Gares:** Geographical data and stations.
- **Buses:** Fleet management.
- **Routes & Etapes:** Defining the path and stops for each journey.
- **Segments:** Sections of a route with specific pricing and duration.
- **Programmes:** Scheduled trips linked to specific routes and buses.
- **Reservations:** The bridge between Users and Programmes.

---

## 💻 Installation & Setup

Follow these steps to get the project running on your local machine.

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL
- Node.js & NPM

### 1. Clone the Repository
```bash
git clone [https://github.com/yassinmaftah/bookbus-laravel.git]
(https://github.com/your-username/satas-bus.git)
cd my-app


2. Install Dependencies
composer install
npm install

3. Environment Setup
Copy the .env.example file and configure your database credentials.
cp .env.example .env
php artisan key:generate

4. Database Configuration
Make sure your MySQL server is running and the database is created, then run:

php artisan migrate:fresh --seed
(Note: The seeder will populate the database with Cities, Routes, and Dummy Trips)

5. Compile Assets
npm run build

6. Run the Server
php artisan serve

Visit http://127.0.0.1:8000 in your browser


👨‍💻 Author -Yassine-Maftah

LinkedIn: https://www.linkedin.com/in/yassine-maftah-b5793933b/
GitHub: @yassinmaftah
Student at YouCode (UM6P)

Made with ❤️ and ☕ in Morocco - Safi.