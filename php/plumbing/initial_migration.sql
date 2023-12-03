CREATE TABLE productcategories (
KeyCategory int NOT NULL AUTO_INCREMENT,
CategoryName varchar(100) NOT NULL,
PRIMARY KEY (KeyCategory)
);

CREATE TABLE products (
KeyProduct int NOT NULL AUTO_INCREMENT,
CategoryName varchar(100) NOT NULL,
Price Decimal(10,2),
ProductName varchar(100),
ImageURL varchar(200),
Description varchar(4000),
DateAdded DATETIME DEFAULT CURRENT_TIMESTAMP,
IsFeatured BIT,
Quantity INT,
IsSoldOut Bit,
PRIMARY KEY (KeyProduct)
);

CREATE TABLE cart (
CartID int NOT NULL AUTO_INCREMENT,
Quantity int,
KeyOrder int,
KeyProduct int,
PRIMARY KEY (CartID)
);

CREATE TABLE orders (
KeyOrder int NOT NULL AUTO_INCREMENT,
DatePaid DATETIME,
DateShipped DATETIME,
UserID int,
KeyCoupon int,
PRIMARY KEY (KeyOrder)
);

CREATE TABLE users (
UserID int NOT NULL AUTO_INCREMENT,
FirstName varchar(100),
LastName varchar(100),
PhoneNumber varchar(100),
Company varchar(100),
EmailAddress varchar(100),
HashPass varchar(2000),
DateOfBirth DATE,
PRIMARY KEY (UserID)
);

CREATE TABLE address (
AddressID int NOT NULL AUTO_INCREMENT,
Address1 varchar(100),
Address2 varchar(100),
City varchar(100),
State varchar(50),
Zip varchar(50),
UserID int NOT NULL,
PRIMARY KEY (AddressID)
);

CREATE TABLE coupon (
KeyCoupon int NOT NULL AUTO_INCREMENT,
DiscountAmount Decimal(10,2),
IsActive BIT,
CouponCode varchar(100),
PRIMARY KEY (KeyCoupon)
);

CREATE TABLE productimages (
KeyImage INT NOT NULL AUTO_INCREMENT,
KeyProduct int NOT NULL,
ImageURL varchar(200),
PRIMARY KEY (KeyImage)
);
