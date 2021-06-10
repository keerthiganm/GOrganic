databasename:signin

database name:order
table name:products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
)

INSERT INTO `products` (`id`, `name`, `code`, `price`, `image`) VALUES
(1, 'Apple', 'Apple', 50.00, 'product-images/app.jpg'),
(2, 'Orange', 'orange',100.00, 'product-images/org.jpg'),
(3, 'mango', 'mango', 10.00, 'product-images/mango.jpg');


database name:order
table name:customer_order
CREATE TABLE IF NOT EXISTS `customer_order` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `deliver_to` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `price` double NOT NULL,
  `phone` varchar(250) NOT NULL,
  `addr` varchar(250) NOT NULL,
  `ordertime` timestamp NOT NULL,
  PRIMARY KEY (`id`)
)


database name:order
table name:delivered
CREATE TABLE IF NOT EXISTS `delivered` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `deliver_to` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `price` double NOT NULL,
  `phone` varchar(250) NOT NULL,
  `addr` varchar(250) NOT NULL,
  `ordertime` timestamp NOT NULL,
  UNIQUE KEY `id` (`id`)
)


database name:order
table name:yet_to_deliver
CREATE TABLE IF NOT EXISTS `yet_to_deliver` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `deliver_to` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `price` double NOT NULL,
  `phone` varchar(250) NOT NULL,
  `addr` varchar(250) NOT NULL,
  `ordertime` timestamp NOT NULL,
  UNIQUE KEY `id` (`id`)
)


database name:order
table name:review
CREATE TABLE IF NOT EXISTS `review` (
  `username` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `reviewed_on` timestamp NOT NULL
)