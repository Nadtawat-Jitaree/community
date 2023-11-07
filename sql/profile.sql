CREATE TABLE profile(
    id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
	username varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    fname varchar(65),
    lname varchar(65),
	gender varchar(50),
    nickname varchar(65),
    description varchar(112),
    profile_image varchar(255),
    instagram varchar(255),
    threads varchar(255),
    facebook varchar(255)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;