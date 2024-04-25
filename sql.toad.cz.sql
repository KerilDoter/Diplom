-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'Users (Пользователи)'
-- 
-- ---

DROP TABLE IF EXISTS `Users (Пользователи)`;
		
CREATE TABLE `Users (Пользователи)` (
  `user_id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `full_name` MEDIUMTEXT NULL DEFAULT NULL,
  `user_type_id` INTEGER NULL DEFAULT NULL,
  `department` MEDIUMTEXT NULL DEFAULT NULL,
  `position` MEDIUMTEXT NULL DEFAULT NULL,
  `academic_degree` MEDIUMTEXT NULL DEFAULT NULL,
  `academic_title` MEDIUMTEXT NULL DEFAULT NULL,
  `email` MEDIUMTEXT NULL DEFAULT NULL,
  `phone` MEDIUMTEXT NULL DEFAULT NULL,
  `telegram` MEDIUMTEXT NULL DEFAULT NULL,
  `additional_info` MEDIUMTEXT NULL DEFAULT NULL,
  `username` MEDIUMTEXT NULL DEFAULT NULL,
  `password` MEDIUMTEXT NULL DEFAULT NULL,
  `is_administrator` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
);

-- ---
-- Table 'UserTypes'
-- 
-- ---

DROP TABLE IF EXISTS `UserTypes`;
		
CREATE TABLE `UserTypes` (
  `user_type_id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `type_name` MEDIUMTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`user_type_id`)
);

-- ---
-- Table 'Ideas'
-- 
-- ---

DROP TABLE IF EXISTS `Ideas`;
		
CREATE TABLE `Ideas` (
  `idea_id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `title` MEDIUMTEXT NULL DEFAULT NULL,
  `description` MEDIUMTEXT NULL DEFAULT NULL,
  `datetime` DATE NULL DEFAULT NULL,
  `author_user_id ` INTEGER NULL DEFAULT NULL,
  `coauthor_user_id` INTEGER NULL DEFAULT NULL,
  `attachment` MEDIUMTEXT NULL DEFAULT NULL,
  `status_id` INTEGER NULL DEFAULT NULL,
  `tags` MEDIUMTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`idea_id`)
);

-- ---
-- Table 'IdeaStatuses '
-- 
-- ---

DROP TABLE IF EXISTS `IdeaStatuses `;
		
CREATE TABLE `IdeaStatuses ` (
  `status_id ` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `status_name ` MEDIUMTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`status_id `)
);

-- ---
-- Table 'Discussions '
-- 
-- ---

DROP TABLE IF EXISTS `Discussions `;
		
CREATE TABLE `Discussions ` (
  `discussion_id ` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `idea_id ` INTEGER NULL DEFAULT NULL,
  `message_text` MEDIUMTEXT NULL DEFAULT NULL,
  `author_user_id ` INTEGER NULL DEFAULT NULL,
  `datetime` DATE NULL DEFAULT NULL,
  `attachment` MEDIUMTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`discussion_id `)
);

-- ---
-- Table 'Votes '
-- 
-- ---

DROP TABLE IF EXISTS `Votes `;
		
CREATE TABLE `Votes ` (
  `vote_id ` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `idea_id ` INTEGER NULL DEFAULT NULL,
  `user_id ` INTEGER NULL DEFAULT NULL,
  `vote_type ` ENUM NULL DEFAULT NULL,
  PRIMARY KEY (`vote_id `)
);

-- ---
-- Table 'Favorites '
-- 
-- ---

DROP TABLE IF EXISTS `Favorites `;
		
CREATE TABLE `Favorites ` (
  `favorite_id ` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `user_id ` INTEGER NULL DEFAULT NULL,
  `idea_id ` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`favorite_id `)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `Users (Пользователи)` ADD FOREIGN KEY (user_type_id) REFERENCES `UserTypes` (`user_type_id`);
ALTER TABLE `Ideas` ADD FOREIGN KEY (author_user_id ) REFERENCES `Users (Пользователи)` (`user_id`);
ALTER TABLE `Ideas` ADD FOREIGN KEY (coauthor_user_id) REFERENCES `Users (Пользователи)` (`user_id`);
ALTER TABLE `Ideas` ADD FOREIGN KEY (status_id) REFERENCES `IdeaStatuses ` (`status_id `);
ALTER TABLE `Discussions ` ADD FOREIGN KEY (idea_id ) REFERENCES `Ideas` (`idea_id`);
ALTER TABLE `Discussions ` ADD FOREIGN KEY (author_user_id ) REFERENCES `Users (Пользователи)` (`user_id`);
ALTER TABLE `Votes ` ADD FOREIGN KEY (idea_id ) REFERENCES `Ideas` (`idea_id`);
ALTER TABLE `Votes ` ADD FOREIGN KEY (user_id ) REFERENCES `Users (Пользователи)` (`user_id`);
ALTER TABLE `Favorites ` ADD FOREIGN KEY (user_id ) REFERENCES `Users (Пользователи)` (`user_id`);
ALTER TABLE `Favorites ` ADD FOREIGN KEY (idea_id ) REFERENCES `Ideas` (`idea_id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `Users (Пользователи)` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `UserTypes` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Ideas` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `IdeaStatuses ` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Discussions ` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Votes ` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Favorites ` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `Users (Пользователи)` (`user_id`,`full_name`,`user_type_id`,`department`,`position`,`academic_degree`,`academic_title`,`email`,`phone`,`telegram`,`additional_info`,`username`,`password`,`is_administrator`) VALUES
-- ('','','','','','','','','','','','','','');
-- INSERT INTO `UserTypes` (`user_type_id`,`type_name`) VALUES
-- ('','');
-- INSERT INTO `Ideas` (`idea_id`,`title`,`description`,`datetime`,`author_user_id `,`coauthor_user_id`,`attachment`,`status_id`,`tags`) VALUES
-- ('','','','','','','','','');
-- INSERT INTO `IdeaStatuses ` (`status_id `,`status_name `) VALUES
-- ('','');
-- INSERT INTO `Discussions ` (`discussion_id `,`idea_id `,`message_text`,`author_user_id `,`datetime`,`attachment`) VALUES
-- ('','','','','','');
-- INSERT INTO `Votes ` (`vote_id `,`idea_id `,`user_id `,`vote_type `) VALUES
-- ('','','','');
-- INSERT INTO `Favorites ` (`favorite_id `,`user_id `,`idea_id `) VALUES
-- ('','','');