# Sportshub Mini Project 🏆

<img src="https://github.com/alansaji-01/sportshub-mini-project/blob/b062098ab38202b209040f55cf821a20cc5e4521/sportsHubLogo.png" alt="Sportshub Logo" width="200" align="right">

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
| **Home**         | ![Home2](https://github.com/alansaji-01/sportshub-mini-project/blob/412dd61bd9febac4e41da92c5e5f15ed563a2b40/home2.png)      | homepage                        |
| **Products**     | ![Products](https://github.com/alansaji-01/sportshub-mini-project/blob/f80ce38b8e6097b3ec79e02988acf941b14fe420/products.png)   | product listing                 |
| **Cart**         | ![Cart](https://github.com/alansaji-01/sportshub-mini-project/blob/d851254130b065103573559649c28c21f06823af/cart.png)       | Shopping cart interface         |

### Admin Panel
| Section               | Preview                              | Description                     |
|-----------------------|--------------------------------------|---------------------------------|
| **Dashboard**         | ![Admin1](https://github.com/alansaji-01/sportshub-mini-project/blob/d9b72ade7af1082375d6797824ac716dea90b51c/admin1.png)    | Admin overview                  |
| **User Management**   | ![Admin2](https://github.com/alansaji-01/sportshub-mini-project/blob/de1fa4caa37128f780b752231a63974e4cb140fb/userlist.png)    | User control panel              |
| **Product Editor**    | ![Admin3](https://github.com/alansaji-01/sportshub-mini-project/blob/06bc4acd2c91d9ed38c7d77d2495ef98e43b9480/admin4.png)    | Product modification interface  |
| **Order Overview**    | ![Admin4](https://github.com/alansaji-01/sportshub-mini-project/blob/44e1657bbf15ee3961157c5c8937fab86488759e/admin2.png)    | Order processing system         |


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
