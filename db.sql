CREATE TABLE `comments` (
          `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
          `page_name` varchar(50) character set utf8 COLLATE utf8_general_ci NOT NULL,
          `text_comment` varchar(2048) character set utf8 COLLATE utf8_general_ci NOT NULL,
          `name` varchar(50) character set utf8 COLLATE utf8_general_ci NOT NULL);
        
CREATE TABLE `marks` (
          `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
          `mark` varchar(200) character set utf8 COLLATE utf8_general_ci NOT NULL,
          `start` varchar(2000) character set utf8 COLLATE utf8_general_ci NOT NULL,
          `text` text character set utf8 COLLATE utf8_general_ci NOT NULL,
          `photo` longblob NOT NULL);
          
CREATE TABLE `news` (
          `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
          `mark` varchar(50) character set utf8 COLLATE utf8_general_ci NOT NULL,
          `start` varchar(2000) character set utf8 COLLATE utf8_general_ci NOT NULL,
          `text` text character set utf8 COLLATE utf8_general_ci NOT NULL,
          `photo` longblob NOT NULL,
          `datetime` datetime NOT NULL);
          
CREATE TABLE `reviews` (
          `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
          `name` varchar(50) character set utf8 COLLATE utf8_general_ci NOT NULL,
          `text` text character set utf8 COLLATE utf8_general_ci NOT NULL,
          `stat` int(11)  NOT NULL);
          
  CREATE TABLE `suggestions_acc` (
          `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
          `name` varchar(50) character set utf8 COLLATE utf8_general_ci NOT NULL,
          `text` text character set utf8 COLLATE utf8_general_ci NOT NULL,
          `photo` longblob NOT NULL,
          `access` int(50) NULL);
    
  CREATE TABLE `users` (
          `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
          `login` varchar(50) character set utf8 COLLATE utf8_general_ci NOT NULL,
          `email` varchar(50) character set utf8 COLLATE utf8_general_ci NOT NULL,
          `password` varchar(200) character set utf8 COLLATE utf8_general_ci NOT NULL
          `admin` tinyint(1)  NULL);
