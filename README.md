# 🎓 Student Portal – Login Page with Validation

## 📌 Project Description

The **Login Page with Validation** is a web-based Student Portal application developed using **PHP, MySQL, HTML, CSS, and JavaScript**.

The application allows students to create an account and log in securely. During registration, the student's full name, email address, and password are collected and stored in a MySQL database.

The system validates user input and uses password hashing to improve security. After successful login, the student is redirected to a dashboard displaying a welcome message.

---

# 🚀 Features

* 🎓 Student registration.
* 🔐 Student login.
* 📧 Email-based authentication.
* 🔑 Password validation.
* 🔒 Password hashing.
* 🛡️ Password verification.
* 🗄️ MySQL database integration.
* 💾 Secure student data storage.
* 🔄 Session management.
* 🖥️ Student dashboard.
* 🚪 Logout functionality.
* ⚠️ Invalid login error messages.
* ⚠️ Duplicate email validation.
* 🔐 Minimum password length validation.
* 🎨 Modern login and registration interface.
* 🔄 Switch between Sign In and Sign Up forms.

---

# 🛠️ Technologies Used

## Frontend

* HTML
* CSS
* JavaScript

## Backend

* PHP

## Database

* MySQL

## Database Connection

* PDO

## Server

* XAMPP / Apache

---

# 📂 Project Structure

```text
Login Page with Validation/
│
└── exp10/
    │
    ├── index.php
    ├── auth.php
    ├── db.php
    ├── dashboard.php
    ├── logout.php
    ├── login.php
    ├── script.js
    └── style.css
```

---

# 📄 File Description

## 1. index.php

This is the main page of the Student Portal.

It contains both:

* Student Registration form.
* Student Login form.

The registration form collects:

* Full Name
* Email
* Password

The login form collects:

* Email
* Password

The page also displays:

* Registration success messages.
* Login error messages.
* Registration error messages.

Users can switch between the **Sign In** and **Sign Up** sections.

---

# 2. auth.php

The `auth.php` file handles the main authentication process.

It performs two operations:

* Registration
* Login

---

## Registration Process

During registration, the system:

1. Receives the student's full name.
2. Receives the email address.
3. Receives the password.
4. Hashes the password.
5. Stores the student information in the database.
6. Displays a success message.

The password is hashed using:

```php
password_hash($password, PASSWORD_BCRYPT);
```

The student information is inserted into the database using a prepared statement.

```php
$stmt = $pdo->prepare(
    "INSERT INTO students 
    (full_name, email, password_hash) 
    VALUES (?, ?, ?)"
);
```

---

## Duplicate Email Validation

The application prevents multiple accounts from using the same email address.

If an email already exists, the system displays:

```text
Email already exists.
```

---

# 3. Login Process

During login, the system:

1. Receives the email.
2. Receives the password.
3. Searches for the student in the database.
4. Retrieves the stored password hash.
5. Verifies the password.
6. Creates a session.
7. Redirects the student to the dashboard.

The user is searched using:

```php
SELECT * FROM students WHERE email = ?
```

The password is verified using:

```php
password_verify(
    $password,
    $user['password_hash']
);
```

---

# 4. db.php

The `db.php` file is responsible for connecting the application to the MySQL database.

The project uses **PDO** for database connectivity.

Database configuration:

```php
$host = '127.0.0.1';

$db = 'exp10';

$user = 'root';

$pass = '';
```

The application uses the following character set:

```text
utf8mb4
```

PDO is configured with:

* Exception error handling.
* Associative array fetch mode.
* Prepared statements.

---

# 5. dashboard.php

The `dashboard.php` page is displayed after successful login.

The page checks whether the student is logged in.

```php
if (!isset($_SESSION['user_id'])) {

    header("Location: index.php");

    exit;

}
```

If the user is not authenticated, they are redirected to the login page.

The dashboard displays:

```text
Welcome, Student Name!
```

The page also includes a logout button.

---

# 6. logout.php

The `logout.php` file handles user logout.

It removes the active session and redirects the student back to the login page.

---

# 7. script.js

The `script.js` file provides client-side functionality.

It performs:

* Sign Up form switching.
* Sign In form switching.
* Password length validation.

The user can switch between the two forms using buttons.

---

## Password Validation

The project validates the registration password.

The password must contain at least:

```text
6 Characters
```

The JavaScript validation checks:

```javascript
if (password.length < 6) {

    e.preventDefault();

    alert(
        'Password must be at least 6 characters long.'
    );

}
```

---

# 8. style.css

The `style.css` file provides the visual design for the application.

It controls:

* Page layout.
* Login form.
* Registration form.
* Buttons.
* Input fields.
* Overlay panels.
* Animations.
* Colors.
* Responsive design.

---

# 🗄️ Database Setup

Create a database named:

```text
exp10
```

Use the following SQL code:

```sql
CREATE DATABASE exp10;

USE exp10;

CREATE TABLE students (

    id INT AUTO_INCREMENT PRIMARY KEY,

    full_name VARCHAR(150) NOT NULL,

    email VARCHAR(150) NOT NULL UNIQUE,

    password_hash VARCHAR(255) NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);
```

---

# 📊 Database Table

The project uses a table named:

```text
students
```

The table contains the following fields:

| Field         | Description             |
| ------------- | ----------------------- |
| id            | Unique Student ID       |
| full_name     | Student's Full Name     |
| email         | Student's Email Address |
| password_hash | Encrypted Password      |
| created_at    | Account Creation Date   |

---

# 🔐 Validation Features

## Email Validation

The registration and login forms use:

```html
<input type="email">
```

This helps validate the email format.

---

## Required Fields

All important fields are required.

```html
required
```

The user must fill in all required information.

---

## Password Length Validation

The registration password requires a minimum of:

```text
6 Characters
```

This validation is performed using:

* HTML validation.
* JavaScript validation.

---

## Duplicate Email Validation

The system prevents duplicate email registration.

Since the email column is unique, the database rejects duplicate email addresses.

---

## Login Validation

If the entered email or password is incorrect, the system displays:

```text
Invalid email or password.
```

---

# 🔒 Security Features

The project includes basic security features.

## Password Hashing

Passwords are not stored as plain text.

The application uses:

```php
password_hash()
```

to create a secure password hash.

---

## Password Verification

The entered password is verified using:

```php
password_verify()
```

---

## Prepared Statements

The application uses PDO prepared statements.

Example:

```php
$stmt = $pdo->prepare(

    "SELECT * FROM students 
     WHERE email = ?"

);
```

Prepared statements help reduce the risk of SQL Injection.

---

## Session Management

After successful login, the application stores:

```php
$_SESSION['user_id'];

$_SESSION['full_name'];
```

This keeps the student logged in while using the application.

---

## Protected Dashboard

The dashboard cannot be accessed without login.

If a student tries to access the dashboard without authentication, the system redirects the user to:

```text
index.php
```

---

# ⚙️ Installation and Setup

## Step 1: Install XAMPP

Install XAMPP on your computer.

XAMPP provides:

* Apache Server
* PHP
* MySQL
* phpMyAdmin

---

## Step 2: Extract the Project

Extract the project ZIP file.

Copy the `exp10` folder into:

```text
C:\xampp\htdocs\
```

The project location should be:

```text
C:\xampp\htdocs\exp10
```

---

## Step 3: Start XAMPP

Open the XAMPP Control Panel.

Start:

```text
Apache

MySQL
```

---

## Step 4: Create the Database

Open phpMyAdmin.

Create a database named:

```text
exp10
```

Run the following SQL code:

```sql
CREATE DATABASE exp10;

USE exp10;

CREATE TABLE students (

    id INT AUTO_INCREMENT PRIMARY KEY,

    full_name VARCHAR(150) NOT NULL,

    email VARCHAR(150) NOT NULL UNIQUE,

    password_hash VARCHAR(255) NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);
```

---

## Step 5: Configure Database Connection

Open:

```text
db.php
```

Verify the database details:

```php
$host = '127.0.0.1';

$db = 'exp10';

$user = 'root';

$pass = '';
```

---

# ▶️ Running the Application

Open your web browser and enter:

```text
http://localhost/exp10/
```

The Student Portal login page will open.

---

# 🔄 Working Flow

```text
Student
   │
   ▼
Open Student Portal
   │
   ├───────────────────┐
   │                   │
   ▼                   ▼
Sign Up             Sign In
   │                   │
   ▼                   ▼
Enter Details      Enter Email
   │               and Password
   ▼                   │
Validate Input         ▼
   │               Validate User
   ▼                   │
Hash Password          ▼
   │               Verify Password
   ▼                   │
Store in Database      │
   │                   ▼
   │              Create Session
   │                   │
   └───────────────────┘
           │
           ▼
       Dashboard
           │
           ▼
         Logout
```

---

# 📝 Registration Flow

```text
Student
   │
   ▼
Click Sign Up
   │
   ▼
Enter Full Name
   │
   ▼
Enter Email
   │
   ▼
Enter Password
   │
   ▼
Validate Password
   │
   ▼
Hash Password
   │
   ▼
Check Email
   │
   ├──────────────┐
   │              │
New Email     Existing Email
   │              │
   ▼              ▼
Create Account Show Error
   │
   ▼
Registration Successful
```

---

# 🔑 Login Flow

```text
Student
   │
   ▼
Enter Email
   │
   ▼
Enter Password
   │
   ▼
Submit Login Form
   │
   ▼
auth.php
   │
   ▼
Search Student
in MySQL Database
   │
   ├────────────────┐
   │                │
Valid User       Invalid User
   │                │
   ▼                ▼
Verify Password  Show Error
   │
   ▼
Create Session
   │
   ▼
Dashboard
```

---

# 🎯 Project Objective

The main objective of this project is to develop a secure and user-friendly student login and registration system.

The project demonstrates:

* HTML forms.
* CSS design.
* JavaScript validation.
* PHP programming.
* MySQL database connectivity.
* PDO.
* User registration.
* User authentication.
* Password hashing.
* Password verification.
* Session management.
* Form validation.
* Error handling.
* Database operations.

---

# 📋 Requirements

The following software is required:

* XAMPP
* PHP
* MySQL
* Apache Server
* phpMyAdmin
* Web Browser

Recommended browsers:

* Google Chrome
* Microsoft Edge
* Mozilla Firefox

---

# 🔮 Future Enhancements

The following features can be added in future versions:

* 📧 Email verification.
* 🔑 Forgot password.
* 🔄 Password reset.
* 👤 Student profile page.
* ✏️ Edit student information.
* 🖼️ Profile picture upload.
* 🔐 Two-factor authentication.
* 📱 Mobile responsive improvements.
* 🛡️ CAPTCHA validation.
* 🔒 Account locking after multiple failed attempts.
* 📧 Email notifications.
* 🎓 Student course information.
* 📊 Student academic dashboard.

---

# 👨‍💻 Conclusion

The **Login Page with Validation** project is a simple Student Portal authentication system developed using **PHP, MySQL, HTML, CSS, and JavaScript**.

The application allows students to register and log in securely. It validates user input, checks password length, prevents duplicate email registration, and securely stores passwords using password hashing.

After successful authentication, students can access a protected dashboard and securely log out.

This project demonstrates important web development concepts such as **form validation, user authentication, PHP sessions, password security, PDO, MySQL integration, and modern web interface design**.
