CREATE DATABASE medixoHospital;
USE medixoHospital;

-- Create table 'role' to store roles
CREATE TABLE role (
  roleId INT PRIMARY KEY,
  roleName VARCHAR(20)
);

-- Insert sample roles
INSERT INTO role (roleId, roleName) VALUES
(1, 'user'),
(2, 'admin');

-- Create table 'userLogin' to store user login details
CREATE TABLE userLogin (
  id INT PRIMARY KEY AUTO_INCREMENT,
  userId VARCHAR(20),
  fullName VARCHAR(50),
  phoneNumber VARCHAR(20),
  role INT,
  FOREIGN KEY (role) REFERENCES role (roleId)
);

-- Insert sample user data
INSERT INTO userLogin (userId, fullName, phoneNumber, role) VALUES
('210623', 'Anjan Baniya', '9882638310', 1);


SELECT * FROM userLogin;

