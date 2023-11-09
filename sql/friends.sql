CREATE TABLE friends(
    id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
	username varchar(255) NOT NULL,
	name varchar(255) NOT NULL,
	addname varchar(255) NOT NULL,
	verify varchar(60) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;