CREATE DATABASE IF NOT EXISTS student_portal; USE student_portal;
CREATE TABLE students (

id INT AUTO_INCREMENT PRIMARY KEY,
 
full_name VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL UNIQUE,
password_hash VARCHAR(255) NOT NULL,

created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

INSERT INTO students (full_name, email, password_hash)

VALUES ('Jane Doe', 'jane.doe@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
