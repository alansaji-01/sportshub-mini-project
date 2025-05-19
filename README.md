🏆 SportHub | Sports E-Commerce Platform
<div align="center">
  <img src="https://via.placeholder.com/1200x300/0A2463/FFFFFF?text=SportHub" alt="SportHub Banner" />
  <p><em>Where sports enthusiasts find their gear</em></p>
Show Image
Show Image
Show Image
</div>
📋 Overview
SportHub is a comprehensive e-commerce platform designed for sports enthusiasts to browse, select, and purchase sporting equipment with ease. The application features a responsive design, intuitive navigation, and secure transaction handling to provide a seamless shopping experience.
Key Highlights

User-friendly Interface: Clean, responsive design optimized for all devices
Secure Authentication: Robust user registration and login system
Dynamic Product Catalog: Filter and search capabilities with detailed product information
Full Shopping Experience: Cart management, checkout process, and order tracking
Administrative Control: Complete backend management for products, users, and orders

✨ Feature Breakdown
For Customers

Account creation and profile management
Advanced product search and filtering options
Wishlist functionality
Cart management with persistent storage
Secure checkout with multiple payment options
Order history and tracking

For Administrators

Comprehensive dashboard with sales analytics
Inventory management system
User account administration
Order processing workflow
Content management for product listings

🖼️ Interface Preview
<div align="center">
  <table>
    <tr>
      <td align="center"><strong>Home Page</strong></td>
      <td align="center"><strong>Product Catalog</strong></td>
    </tr>
    <tr>
      <td><img src="https://via.placeholder.com/450x250?text=SportHub+Homepage" alt="Home Page" /></td>
      <td><img src="https://via.placeholder.com/450x250?text=Product+Catalog" alt="Product Catalog" /></td>
    </tr>
    <tr>
      <td align="center"><strong>Shopping Cart</strong></td>
      <td align="center"><strong>Admin Dashboard</strong></td>
    </tr>
    <tr>
      <td><img src="https://via.placeholder.com/450x250?text=Shopping+Cart" alt="Shopping Cart" /></td>
      <td><img src="https://via.placeholder.com/450x250?text=Admin+Dashboard" alt="Admin Dashboard" /></td>
    </tr>
  </table>
</div>
🛠️ Technology Stack
LayerTechnologiesFrontendHTML5, CSS3, JavaScript (ES6+), Responsive DesignBackendPHP 7.4+, Server-side ValidationDatabaseMySQL 5.7+, Relational SchemaDevelopmentXAMPP, Git, VS CodeSecurityPassword Hashing, Form Validation, Session Management
📦 Installation Guide
System Requirements

XAMPP 3.3.0 or higher
Modern web browser (Chrome, Firefox, Edge)
Git (optional, for cloning)

Step-by-Step Setup

Get the code
bash# Clone the repository (or download ZIP)
git clone https://github.com/alansaji-01/sportshub-mini-project.git

Deploy to server environment
bash# For Linux/Mac
mv sportshub-mini-project /opt/lampp/htdocs/SportHub

# For Windows
# Copy files to C:\xampp\htdocs\SportHub

Database initialization

Launch XAMPP and start Apache and MySQL services
Open PhpMyAdmin: http://localhost/phpmyadmin
Create a new database named sportshub
Import the database schema from sportshub.sql


Configure connection
php// Edit config.php with your database details
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "sportshub";


🚀 Getting Started

Launch the application

Ensure Apache and MySQL services are running in XAMPP
Navigate to: http://localhost/SportHub in your browser


Test accounts
RoleEmailPasswordCustomeruser@demo.comdemo123Administratoradmin@demo.comadmin123

Explore the features

Browse the product catalog
Add items to cart
Process a test order
Login to admin panel to manage products and orders



👨‍💻 Development
The project follows a structured MVC-like architecture:

assets/ - CSS, JavaScript, and image files
includes/ - Reusable PHP components and libraries
admin/ - Administrator dashboard and management features
config/ - Configuration files and database connection

📄 License
This project is intended for educational purposes.

<div align="center">
  <p>Developed by Alan Saji</p>
</div>
