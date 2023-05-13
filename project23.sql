CREATE DATABASE medixoHospital;
USE medixoHospital;

CREATE TABLE userLogin (
		id INT NOT NULL AUTO_INCREMENT,
        userId VARCHAR(255) NOT NULL,
		fullName VARCHAR(255) NOT NULL,
		phoneNumber VARCHAR(255) NOT NULL,
        PRIMARY KEY(id)
);