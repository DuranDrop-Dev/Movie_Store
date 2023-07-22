DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

INSERT INTO `customer` VALUES (1,'Bob','Hope','bob@moviestore.com','password','1950-10-12','2023-04-08'),(2,'James','Dean','james@moviestore.com','password','1943-01-04','2023-04-08'),(3,'Mary','Lynn','mary@moviestore.com','password','1989-05-15','2023-04-08'),(4,'Joe','Smith','joe@moviestore.com','password','1999-02-28','2023-04-08'),(5,'Clerk','EMPLOYEE','clerk@moviestore.com','password','1977-06-14','2023-04-08'),(6,'Accountant','EMPLOYEE','accountant@moviestore.com','password','1994-10-31','2023-04-08'),(7,'Manager','EMPLOYEE','manager@moviestore.com','password','1970-04-29','2023-04-08'),(8,'Karen','Moreno','karen@moviestore.com','password','1993-05-02','2023-04-08'),(9,'Jane','Doe','jane@moviestore.com','password','1978-03-25','2023-04-08');

DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `movies_id` int unsigned NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(100) DEFAULT NULL,
  `main_characters` varchar(100) DEFAULT NULL,
  `directed_by` varchar(100) DEFAULT NULL,
  `release_date` varchar(45) DEFAULT NULL,
  `description` longtext,
  `image_name` varchar(45) DEFAULT NULL,
  `checked_out` tinyint DEFAULT NULL,
  PRIMARY KEY (`movies_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

INSERT INTO `movies` VALUES (1,'Matrix','Keanu Reeves','Lilly Wachowski & Lana Wachowski','1999','When a beautiful stranger leads computer hacker Neo to a forbidding underworld, he discovers the shocking truth--the life he knows is the elaborate deception of an evil cyber-intelligence.','matrix.jpg',1),(2,'Click','Adam Sandler','Frank Coraci','2006','A workaholic architect finds a universal remote that allows him to fast-forward and rewind to different parts of his life. Complications arise when the remote starts to overrule his choices.','click.jpg',0),(3,'Happy Gilmore','Adam Sandler','Dennis Dugan','1996','A rejected hockey player puts his skills to the golf course to save his grandmothers house.','happy.jpg',0),(4,'Reign Over Me','Adam Sandler & Don Cheadle','Mike Binder','2007','A man who lost his family in the September 11 attack on New York City runs into his old college roommate. Rekindling the friendship is the one thing that appears able to help the man recover from his grief.','reign.jpg',0),(5,'Beetlejuice','Michael Keaton','Tim Burton','1988','The spirits of a deceased couple are harassed by an unbearable family that has moved into their home, and hire a malicious spirit to drive them out.','beetle.jpg',0),(6,'Ghostbusters','Bill Murray, Dan Aykroyd, Sigourney Weaver','Ivan Reitman','1984','Three parapsychologists forced out of their university funding set up shop as a unique ghost removal service in New York City, attracting frightened yet skeptical customers.','ghost.jpg',0),(7,'Gremlins','Zach Galligan','Joe Dante','1984',' A young man inadvertently breaks three important rules concerning his new pet and unleashes a horde of malevolently mischievous monsters on a small town.','grem.jpg',0),(8,'Paul Blart','Kevin James',' Steve Carr','2009','When a shopping mall is taken over by a gang of organized crooks, it is up to a mild-mannered security guard to save the day.','paul.jpg',0),(9,'First Blood','Sylvester Stallone','Ted Kotcheff','1982','A veteran Green Beret is forced by a cruel Sheriff and his deputies to flee into the mountains and wage an escalating one-man war against his pursuers.','rambo.jpg',0),(10,'Hot Shots! Part Deux','Charlie Sheen','Jim Abrahams','1993','Rambo parody in which Topper Harley leads a rescue team into Iraq to save Iraqi war prisoners and all of their previous rescue teams.','hot.jpg',0);

DROP TABLE IF EXISTS `rental`;
CREATE TABLE `rental` (
  `rental_id` int unsigned NOT NULL AUTO_INCREMENT,
  `cust_id` int unsigned NOT NULL,
  `video_id` int unsigned NOT NULL,
  `due_date` date DEFAULT NULL,
  `checked_out` date DEFAULT NULL,
  `date_returned` date DEFAULT NULL,
  `first_day_rental_fee` decimal(10,0) DEFAULT NULL,
  `additional_fee_per_day` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`rental_id`,`cust_id`,`video_id`),
  KEY `customer_fk_idx` (`cust_id`),
  KEY `movie_fk_idx` (`video_id`),
  CONSTRAINT `customer_fk` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `movie_fk` FOREIGN KEY (`video_id`) REFERENCES `movies` (`movies_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

INSERT INTO `rental` VALUES (1,2,3,'2023-04-10','2023-04-08',NULL,4,2),(2,5,2,'2023-04-10','2023-04-08',NULL,4,2),(3,9,6,'2023-04-07','2023-04-05',NULL,4,2);