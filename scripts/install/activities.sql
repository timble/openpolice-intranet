DROP TABLE IF EXISTS `jos_activities_activities`;
CREATE TABLE IF NOT EXISTS `jos_activities_activities` (
	`activities_activity_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36) NOT NULL DEFAULT '' UNIQUE,
	`application` VARCHAR(10) NOT NULL DEFAULT '',
	`type` VARCHAR(3) NOT NULL DEFAULT '',
	`package` VARCHAR(50) NOT NULL DEFAULT '',
	`name` VARCHAR(50) NOT NULL DEFAULT '',
	`action` VARCHAR(50) NOT NULL DEFAULT '',
	`row` BIGINT NOT NULL DEFAULT '0',
	`title` VARCHAR(255) NOT NULL DEFAULT '',
	`status` varchar(100) NOT NULL,
	`created_on` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`created_by` INT(11) NOT NULL DEFAULT '0',
	PRIMARY KEY(`activities_activity_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `jos_news_activities` (
    `activities_activity_id` INT UNSIGNED NOT NULL,
    `news_article_id` INT UNSIGNED NOT NULL,
    `comments_comment_id` INT NOT NULL,
    FOREIGN KEY (`activities_activity_id`)
        REFERENCES `jos_activities_activities` (`activities_activity_id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE ALGORITHM = MERGE VIEW `jos_news_view_activities` AS 
SELECT 
	`activity`.*,
	`user`.`name` AS `created_by_name`,
	`article`.`news_article_id` AS `news_article_id`,
	`article`.`text` AS `article_text`,
	`article`.`news_category_id`,
	`article`.`category_title`,
	`article`.`slug` AS `article_slug`,
	`article`.`category_slug`,
	`article`.`total_comments`,
	`article`.`last_commented_on`,
	IF(`activity`.`name` = 'comment', `comment`.`text`, `article`.`text`) AS `text`
	FROM
		`jos_activities_activities` AS `activity`
	RIGHT JOIN  
		`jos_news_activities` AS `news_activity` USING(`activities_activity_id`)
	LEFT JOIN
		`jos_users` AS `user` ON `activity`.`created_by` = `user`.`id`
	LEFT JOIN 
		`jos_news_view_articles` AS `article` ON `article`.`news_article_id` = `news_activity`.`news_article_id`
	LEFT JOIN 
		`jos_comments_comments` AS `comment` ON `comment`.`comments_comment_id` = `news_activity`.`comments_comment_id`;
    	