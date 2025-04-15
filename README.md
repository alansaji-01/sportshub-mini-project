# Sportshub Mini Project

A sports-related e-commerce platform to buy and sell sports items.  
Built using **HTML, CSS, JavaScript, PHP, and MySQL**.  
*(Project is under development)*

## Project Overview

Sportshub is a college mini-project demonstrating an e-commerce website for sports products. It allows users to browse, add items to a cart, and checkout, with backend support for authentication and product management.

## Features

- Product listings with details and images
- User registration and login
- Shopping cart and checkout
- Admin panel for product and order management
- Responsive design for multiple devices

## Installation

1. **Prerequisites**:  
   - [XAMPP](https://www.apachefriends.org/index.html) for Apache and MySQL  
   - A modern web browser  
   - Optional: [VS Code](https://code.visualstudio.com/) for editing

2. **Clone the Repository**:  
   ```bash
   git clone https://github.com/alansaji-01/sportshub-mini-project.git
3. **Set Up Files**:
   Move SportsHub to C:\xampp\htdocs\ (or your XAMPP htdocs folder)

## Configuration

1. **Start XAMPP**:
   - Launch Apache and MySQL from the XAMPP Control Panel
2. **Set Up Database**:
   - Go to http://localhost/phpmyadmin
   - Create a database named sportshub
   - Import sportshub.sql from the project folder
3. **Update Database Connection**:
   - Edit config.php with your database credentials:
   ```php
   <?php
   $host = "localhost";
   $user = "root";
   $password = "";
   $database = "sportshub";
   $conn = mysqli_connect($host, $user, $password, $database);
   if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
     }
   ?>

  ## Usage

  1. **Run the Application**:
     - Ensure Apache and MySQL are running
     - Visit http://localhost/SportsHub in your browser
  2. **Explore Features**:
     - Browse products, register/login, use the cart, or access the admin panel
  3. **Troubleshooting**:
     - Check XAMPP services, config.php, and database import if issues arise
    
  ## Technology Stack
  
  - Frontend: HTML, CSS, JavaScript
  - Backend: PHP
  - Database: MySQL
  - Server: Apache (via XAMPP)

  ## Contributing

  Contributions are welcome!

  - Fork the repo, create a branch, and submit a pull request
  - For major changes, open an issue first

  ## License

  [Apache License](http://www.apache.org/licenses/)

  ## Acknowledgments

  - College guide for support
  - Inspiration from Decathlon and Nike
  - Tools: XAMPP, VS Code, GitHub

 ## Contact

 GitHub: alansaji-01

Thank you for exploring Sportshub! 🏀⚽
