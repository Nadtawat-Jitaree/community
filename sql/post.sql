CREATE TABLE post(
	postid int AUTO_INCREMENT PRIMARY KEY NOT NULL,
	username varchar(255) NOT NULL,
	post varchar(63206) NOT NULL,
	namelink varchar(65),
	link varchar(255),
	image varchar(65),
	date timestamp NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;