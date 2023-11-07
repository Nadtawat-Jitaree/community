CREATE TABLE emojis(
    id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
	likes int NOT NULL,
	idpost int NOT NULL,
	username varchar(255)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;