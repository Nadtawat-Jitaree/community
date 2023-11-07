CREATE TABLE comments(
    comment_id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
	username varchar(255) NOT NULL,
	postid int NOT NULL,
    comment varchar(2500),
    comment_date timestamp
)ENGINE=InnoDB DEFAULT CHARSET=utf8;