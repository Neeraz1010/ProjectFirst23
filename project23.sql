CREATE DATABASE medixoHospital;
USE medixoHospital;

CREATE TABLE userLogin (
		id INT NOT NULL AUTO_INCREMENT,
        userId VARCHAR(255) NOT NULL,
		fullName VARCHAR(255) NOT NULL,
		phoneNumber VARCHAR(255) NOT NULL,
        PRIMARY KEY(id)
);

INSERT INTO userLogin (userId, fullName, phoneNumber) 
VALUES ("2059", "Niraj Giri", "9847950672");
