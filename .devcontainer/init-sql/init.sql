CREATE TABLE IF NOT EXISTS Users (
    userID int NOT NULL AUTO_INCREMENT,
    userName varchar(255) NOT NULL,
    userPass varchar(255) NOT NULL,
    PRIMARY KEY (userID)
);