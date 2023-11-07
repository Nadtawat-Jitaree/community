CREATE TABLE users(
    id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
	username varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    role varchar(255) NOT NULL,
    start_date timestamp NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;