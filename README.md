# Sportshub Mini Project 🏆

![Sportshub Banner](https://via.placeholder.com/1200x400/2D3748/FFFFFF?text=Sportshub+E-Commerce)  
*(Replace with your actual banner image)*

A fully functional e-commerce platform for sports enthusiasts.  
**Tech Stack**: HTML5, CSS3, JavaScript, PHP, MySQL  
*Status: Under active development*

---

## 🚀 Features
| Feature          | Description                                                                 |
|------------------|-----------------------------------------------------------------------------|
| **User System**  | Secure registration/login with form validation                              |
| **Product Catalog** | Filterable grid of sports items with detailed views                         |
| **Shopping Cart** | Add/remove items, quantity adjustment, and checkout process                |
| **Admin Panel**  | Manage products, orders, and users (see screenshot below)                   |

---

## 📸 Screenshots
*(Replace these placeholder links with your actual screenshots)*

| Page             | Preview                              |
|------------------|--------------------------------------|
| **Homepage**     | ![Home](https://via.placeholder.com/600x300?text=Homepage+Screenshot) |
| **Product Page** | ![Products](https://via.placeholder.com/600x300?text=Product+Listing) |
| **Admin Dashboard** | ![Admin](https://via.placeholder.com/600x300?text=Admin+Interface) |

---

## 🛠️ Setup Guide

### Prerequisites
- [XAMPP](https://www.apachefriends.org/download.html) (v3.3.0+ recommended)
- Modern browser (Chrome/Firefox/Edge)

### Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/alansaji-01/sportshub-mini-project.git
Move folder to XAMPP's htdocs:
bash

Copy
mv sportshub-mini-project /opt/lampp/htdocs/SportsHub  # Linux/Mac
# OR manually copy to C:\xampp\htdocs\ on Windows
Database setup:
Access phpMyAdmin at http://localhost/phpmyadmin
Create database sportshub
Import provided sportshub.sql file
Configure database connection:
php

Copy
// config.php
<?php
$host = "localhost";
$user = "root";          // Default XAMPP username
$password = "";           // Default XAMPP password
$database = "sportshub";
?>
🖥️ Usage
Start XAMPP services (Apache + MySQL)
Access in browser:
http://localhost/SportsHub
Test accounts:
User: email: user@demo.com | password: demo123
Admin: email: admin@demo.com | password: admin123
🧰 Tech Stack

Component	Technologies Used
Frontend	HTML5, CSS3, JavaScript (ES6)
Backend	PHP 7.4+
Database	MySQL 5.7+
Development	XAMPP, VS Code, Git
