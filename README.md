# Student Information System

A comprehensive PHP & MySQL web application for managing student records with a modern Bootstrap interface.

## 🚀 Features

- **Student Management**
  - Add new students with detailed information
  - Edit existing student records
  - Delete student entries
  - Advanced search with multiple criteria
  - Print individual student details
  - View all students in a responsive table

- **Technical Features**
  - Responsive Bootstrap 4 design
  - Secure database queries using prepared statements
  - Client-side and server-side form validation
  - Clean and maintainable code structure
  - Print-friendly layouts
  - Modern iconography with Font Awesome

## 📋 Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache web server
- XAMPP/WAMP/MAMP (for local development)

## 🛠️ Installation

1. **Database Setup**
   ```sql
   - Import the database schema from `database/studentdb.sql`
   - Create a new MySQL database named 'studentdb'
   ```

2. **Project Setup**
   - Clone or download the project
   - Place in your web server directory:
     ```
     C:\xampp\htdocs\student-information-system\
     ```
   - Configure database connection:
     ```php
     // Update credentials in includes/db_conn.php
     $host = "localhost";
     $user = "your_username";
     $pass = "your_password";
     $db = "studentdb";
     ```

3. **Access the System**
   - Start Apache and MySQL services
   - Open your browser and navigate to:
     ```
     http://localhost/student-information-system/
     ```

## 📁 Project Structure

```
student-information-system/
├── assets/
│   ├── css/
│   └── images/
├── database/
│   └── studentdb.sql
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── db_conn.php
├── pages/
│   ├── add_student.php
│   ├── edit_student.php
│   ├── view_students.php
│   ├── search_student.php
│   ├── delete_student.php
│   └── print_student.php
└── index.php
```

## 💡 Usage

1. **Adding Students**
   - Click "Add New Student" button
   - Fill in all required fields
   - Submit the form

2. **Managing Records**
   - View all students in the main table
   - Use search functionality to filter records
   - Edit or delete records using action buttons
   - Print individual student details

## 🔒 Security Features

- SQL injection prevention using prepared statements
- Input validation and sanitization
- Cross-Site Scripting (XSS) protection
- Form token validation

## 👥 Contributing

Feel free to fork this project and submit pull requests for any improvements.

## 📝 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 🤝 Support

For support, email [your-email@domain.com] or open an issue in the repository.

---

## 🎉 Ready to Use!

Need help with deployment or have questions? Feel free to reach out!