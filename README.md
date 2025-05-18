# Sportshub Mini Project 🏆

![Sportshub Banner](https://via.placeholder.com/1200x400/0D47A1/FFFFFF?text=SportsHub+E-Commerce+Platform) *(Replace with actual banner)*

A full-stack sports e-commerce platform with user and admin interfaces.  
**Tech Stack**:  
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)
![License](https://img.shields.io/badge/License-Apache_2.0-blue.svg)

---

## 📌 Table of Contents
- [Features](#-features)
- [Screenshots](#-screenshots)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Usage](#-usage)
- [Tech Stack](#-tech-stack)
- [Contributing](#-contributing)
- [License](#-license)
- [Acknowledgments](#-acknowledgments)
- [Contact](#-contact)

---

## ✨ Features

### User Interface
- Product catalog with filters
- Shopping cart system
- User authentication
- Order tracking
- Search functionality

### Admin Panel
- Product management (CRUD)
- Order processing
- User management
- Inventory tracking
- Security monitoring

---

## 📸 Screenshots

### User Interface
| Page             | Preview                              | Description                     |
|------------------|--------------------------------------|---------------------------------|
| **Home**         | ![Home1](https://github.com/alansaji-01/sportshub-mini-project/blob/277b9780f3946a60fac084e3eba50776ec82927d/home1.png)      | Landing page          |
| **Home**         | ![Home2](screenshots/home5.png)      | homepage                        |
| **Home**         | ![Home3](screenshots/home6.png)      | homepage                        |
| **Products**     | ![Products](https://github.com/alansaji-01/sportshub-mini-project/blob/f80ce38b8e6097b3ec79e02988acf941b14fe420/products.png)   | product listing                 |
| **Cart**         | ![Cart](screenshots/home6.png)       | Shopping cart interface         |

### Admin Panel
| Section               | Preview                              | Description                     |
|-----------------------|--------------------------------------|---------------------------------|
| **Dashboard**         | ![Admin1](screenshots/admin1.png)    | Admin overview                  |
| **User Management**   | ![Admin2](screenshots/admin2.png)    | User control panel              |
| **Product Editor**    | ![Admin3](screenshots/admin3.png)    | Product modification interface  |
| **Order Overview**    | ![Admin4](screenshots/admin4.png)    | Order processing system         |


## 🛠️ Installation

### Prerequisites
- [XAMPP](https://www.apachefriends.org/download.html)
- Modern web browser
- Git (optional)

### Setup
1. Clone repository:
   ```bash
   git clone https://github.com/alansaji-01/sportshub-mini-project.git
Move to XAMPP's htdocs:

bash
mv sportshub-mini-project /opt/lampp/htdocs/SportsHub
Start Apache & MySQL via XAMPP

⚙️ Configuration
Create database:

sql
CREATE DATABASE sportshub;
Import SQL file:

bash
mysql -u root -p sportshub < database/sportshub.sql
Update config.php:

php
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "sportshub";
?>
🖥️ Usage
Access application:

http://localhost/SportsHub
Test credentials:

User: test@demo.com / demo123

Admin: admin@demo.com / admin123

🔧 Tech Stack
Component	Technologies
Frontend	HTML5, CSS3, JavaScript
Backend	PHP 7.4+
Database	MySQL 5.7+
Security	Custom validation, Input sanitization
Tools	XAMPP, VS Code, Git
🤝 Contributing
Fork the repository

Create feature branch:

bash
git checkout -b feature/amazing-feature
Commit changes:

bash
git commit -m 'Add amazing feature'
Push to branch:

bash
git push origin feature/amazing-feature
Open Pull Request

📜 License
Distributed under Apache 2.0 License. See LICENSE for details.

🙏 Acknowledgments
College mentors for guidance

Decathlon for design inspiration

XAMPP development team

📬 Contact
Alan Saji
GitHub Profile
Project Repository
