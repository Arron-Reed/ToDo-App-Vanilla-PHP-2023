-- Adminer 4.8.1 MySQL 5.5.5-10.4.27-MariaDB-1:10.4.27+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
  `taskId` int(11) NOT NULL AUTO_INCREMENT,
  `taskTitle` varchar(50) NOT NULL,
  `taskDescription` varchar(50) DEFAULT NULL,
  `taskDone` tinyint(1) DEFAULT NULL,
  `taskDate` date DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`taskId`),
  KEY `userId` (`userId`),
  CONSTRAINT `task_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `task` (`taskId`, `taskTitle`, `taskDescription`, `taskDone`, `taskDate`, `userId`) VALUES
(17,	'Put Jayden to bed',	'He is very tired',	0,	'2023-01-28',	1),
(28,	'Hand in my assignment',	'Its due in soon',	0,	'2023-01-29',	2),
(30,	'Fix the error here',	'Done isnt working?',	0,	'2023-01-29',	1),
(36,	'Show that this works',	'Does it work? Yes it does',	0,	'2023-01-29',	2);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) DEFAULT NULL,
  `userPassword` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `user` (`userId`, `userName`, `userPassword`) VALUES
(1,	'Arron',	'1234'),
(2,	'Maria',	'5678'),
(3,	'David',	'9876');

-- 2023-01-29 22:23:29
