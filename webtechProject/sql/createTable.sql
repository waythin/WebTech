CREATE TABLE admin (
    admin_id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(255) NOT NULL, 
    lastname VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    password VARCHAR(1000) NOT NULL,
    phone VARCHAR(100) NOT NULL,
    NID VARCHAR(100) NOT NULL, 
    dob DATE NOT NULL,
    gender VARCHAR(10) NOT NULL,
    address VARCHAR(1000),
    refno VARCHAR(255) NOT NULL,
    wokrexp VARCHAR(1000),
    image VARCHAR(1000)
);
CREATE TABLE manager (
    manager_id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(255) NOT NULL, 
    lastname VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    password VARCHAR(1000) NOT NULL,
    phone VARCHAR(100) NOT NULL,
    NID VARCHAR(100) NOT NULL, 
    dob DATE NOT NULL,
    gender VARCHAR(10) NOT NULL,
    address VARCHAR(1000),
    education VARCHAR(255),
    coverletter VARCHAR(1000) NOT NULL,
    image VARCHAR(1000)
);
CREATE TABLE customer (
	customer_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    password VARCHAR(1000) NOT NULL,
    dob DATE,
    gender VARCHAR(10),
    address VARCHAR(1000),
    favourite_foods VARCHAR(255)
);
CREATE TABLE rider (
    rider_id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(255) NOT NULL, 
    lastname VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    password VARCHAR(1000) NOT NULL,
    phone VARCHAR(100) NOT NULL,
    NID VARCHAR(100) NOT NULL, 
    dob DATE NOT NULL,
    gender VARCHAR(10) NOT NULL,
    address VARCHAR(1000),
    starting_time TIME NOT NULL,
    ending_time TIME NOT NULL,
    vehicle VARCHAR(1000) NOT NULL,
    image VARCHAR(1000)
);

CREATE TABLE Users (
    user_id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    role VARCHAR(100) NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    contact_no VARCHAR(255) NOT NULL,
    location VARCHAR(1000) NOT NULL,
    password VARCHAR(1000) NOT NULL,
    image VARCHAR(1000) NOT NULL
);
CREATE TABLE User_Order_List (
    user_order_id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT(5) NOT NULL,
    order_id INT(5) NOT NULL
);
CREATE TABLE User_Reservations_List (
    user_reservation_id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT(5) NOT NULL,
    reservation_id INT(5) NOT NULL
);
CREATE TABLE Orders (
    order_id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    items VARCHAR(5000) NOT NULL,
    date DATE,
    location VARCHAR(255),
    user INT(5) NOT NULL
);

CREATE TABLE Menu (
    menu_id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    subtitle VARCHAR(255),
    price INT(5),
    image VARCHAR(1000)
);

CREATE TABLE Reservations (
    reservation_id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date DATE,
    book_date DATE NOT NULL,
    table_no VARCHAR(255),
    reason VARCHAR(1000),
    user INT(5) NOT NULL
);

CREATE TABLE Complain (
    complain_id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    complain VARCHAR(100) NOT NULL,
    user INT(5) NOT NULL
);

CREATE TABLE Comments (
    comment_id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    comment VARCHAR(500) NOT NULL,
    date DATE NOT NULL,
    approved VARCHAR(10) DEFAULT 'false',
    user INT(5) NOT NULL,
    menu_id INT(5) NOT NULL
);

CREATE TABLE React (
    react_id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user INT(5) NOT NULL,
    menu_id INT(5) NOT NULL
);

ALTER TABLE User_Order_List ADD FOREIGN KEY (user_id) REFERENCES Users(user_id);
ALTER TABLE User_Order_List ADD FOREIGN KEY (order_id) REFERENCES Orders(order_id);
ALTER TABLE User_Reservations_List ADD FOREIGN KEY (user_id) REFERENCES Users(user_id);
ALTER TABLE User_Reservations_List ADD FOREIGN KEY (reservation_id) REFERENCES Reservations(reservation_id);
ALTER TABLE Orders ADD FOREIGN KEY (user) REFERENCES Users(user_id);
ALTER TABLE Reservations ADD FOREIGN KEY (user) REFERENCES Users(user_id);
ALTER TABLE Complain ADD FOREIGN KEY (user) REFERENCES Users(user_id);
ALTER TABLE Comments ADD FOREIGN KEY (menu_id) REFERENCES Menu(menu_id);
ALTER TABLE Comments ADD FOREIGN KEY (user) REFERENCES Users(user_id);
ALTER TABLE React ADD FOREIGN KEY (user) REFERENCES Users(user_id);
ALTER TABLE React ADD FOREIGN KEY (menu_id) REFERENCES Menu(menu_id);