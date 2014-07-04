# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.13)
# Database: police_intranet
# Generation Time: 2014-07-04 11:52:05 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table jos_calendar_view_days
# ------------------------------------------------------------

DROP VIEW IF EXISTS `jos_calendar_view_days`;

CREATE TABLE `jos_calendar_view_days` (
   `calendar_day_id` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `calendar_event_id` INT(11) NOT NULL,
   `date` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
   `year` INT(11) NULL DEFAULT NULL,
   `month` INT(11) NULL DEFAULT NULL,
   `day` INT(11) NULL DEFAULT NULL,
   `hour` INT(11) NULL DEFAULT NULL,
   `minute` INT(11) NULL DEFAULT NULL,
   `second` INT(11) NULL DEFAULT NULL,
   `week` INT(11) NULL DEFAULT NULL,
   `level` INT(11) NULL DEFAULT NULL,
   `title` VARCHAR(255) NULL DEFAULT NULL,
   `start_date` DATETIME NULL DEFAULT '0000-00-00 00:00:00',
   `end_date` DATETIME NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM;



# Dump of table jos_calendar_view_events
# ------------------------------------------------------------

DROP VIEW IF EXISTS `jos_calendar_view_events`;

CREATE TABLE `jos_calendar_view_events` (
   `calendar_event_id` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `title` VARCHAR(255) NOT NULL,
   `slug` VARCHAR(255) NULL DEFAULT NULL,
   `description` TEXT NOT NULL,
   `ordering` SMALLINT(6) NOT NULL DEFAULT '0',
   `enabled` TINYINT(1) NOT NULL DEFAULT '1',
   `created_on` DATETIME NULL DEFAULT NULL,
   `created_by` INT(10) UNSIGNED NULL DEFAULT NULL,
   `modified_on` DATETIME NULL DEFAULT NULL,
   `modified_by` INT(10) UNSIGNED NULL DEFAULT NULL,
   `locked_on` DATETIME NULL DEFAULT NULL,
   `locked_by` INT(10) UNSIGNED NULL DEFAULT NULL,
   `start_date` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
   `end_date` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
   `created_by_name` VARCHAR(255) NULL DEFAULT '',
   `created_by_email` VARCHAR(100) NULL DEFAULT '',
   `modified_by_name` VARCHAR(255) NULL DEFAULT ''
) ENGINE=MyISAM;



# Dump of table jos_comments_view_comments
# ------------------------------------------------------------

DROP VIEW IF EXISTS `jos_comments_view_comments`;

CREATE TABLE `jos_comments_view_comments` (
   `comments_comment_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',
   `table` VARCHAR(64) NOT NULL DEFAULT '',
   `row` INT(10) UNSIGNED NOT NULL DEFAULT '0',
   `text` TEXT NOT NULL,
   `created_on` DATETIME NULL DEFAULT NULL,
   `created_by` INT(10) UNSIGNED NULL DEFAULT NULL,
   `modified_on` DATETIME NULL DEFAULT NULL,
   `modified_by` INT(10) UNSIGNED NULL DEFAULT NULL,
   `locked_on` DATETIME NULL DEFAULT NULL,
   `locked_by` INT(10) UNSIGNED NULL DEFAULT NULL,
   `created_by_name` VARCHAR(255) NULL DEFAULT '',
   `created_by_email` VARCHAR(100) NULL DEFAULT ''
) ENGINE=MyISAM;



# Dump of table jos_news_view_activities
# ------------------------------------------------------------

DROP VIEW IF EXISTS `jos_news_view_activities`;

CREATE TABLE `jos_news_view_activities` (
   `activities_activity_id` INT(11) UNSIGNED NULL DEFAULT '0',
   `uuid` VARCHAR(36) NULL DEFAULT '',
   `application` VARCHAR(10) NULL DEFAULT '',
   `type` VARCHAR(3) NULL DEFAULT '',
   `package` VARCHAR(50) NULL DEFAULT '',
   `name` VARCHAR(50) NULL DEFAULT '',
   `action` VARCHAR(50) NULL DEFAULT '',
   `row` BIGINT(20) NULL DEFAULT '0',
   `title` VARCHAR(255) NULL DEFAULT '',
   `status` VARCHAR(100) NULL DEFAULT NULL,
   `created_on` DATETIME NULL DEFAULT '0000-00-00 00:00:00',
   `created_by` INT(11) NULL DEFAULT '0',
   `created_by_name` VARCHAR(255) NULL DEFAULT '',
   `news_article_id` INT(10) UNSIGNED NULL DEFAULT '0',
   `article_text` TEXT NULL DEFAULT NULL,
   `news_category_id` SMALLINT(5) NULL DEFAULT NULL,
   `category_title` VARCHAR(255) NULL DEFAULT NULL,
   `category_params` TEXT NULL DEFAULT NULL,
   `article_slug` VARCHAR(255) NULL DEFAULT NULL,
   `category_slug` VARCHAR(255) NULL DEFAULT NULL,
   `total_comments` BIGINT(21) NULL DEFAULT '0',
   `last_commented_on` DATETIME NULL DEFAULT NULL,
   `text` TEXT NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table jos_news_view_articles
# ------------------------------------------------------------

DROP VIEW IF EXISTS `jos_news_view_articles`;

CREATE TABLE `jos_news_view_articles` (
   `news_article_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',
   `news_category_id` SMALLINT(5) NOT NULL,
   `title` VARCHAR(255) NOT NULL,
   `slug` VARCHAR(255) NULL DEFAULT NULL,
   `introtext` TEXT NOT NULL,
   `fulltext` TEXT NOT NULL,
   `commentable` TINYINT(1) NOT NULL DEFAULT '1',
   `enabled` TINYINT(1) NOT NULL DEFAULT '1',
   `created_by` INT(10) UNSIGNED NULL DEFAULT NULL,
   `created_on` DATETIME NULL DEFAULT NULL,
   `modified_by` INT(10) UNSIGNED NULL DEFAULT NULL,
   `modified_on` DATETIME NULL DEFAULT NULL,
   `locked_by` INT(10) UNSIGNED NULL DEFAULT NULL,
   `locked_on` DATETIME NULL DEFAULT NULL,
   `category_title` VARCHAR(255) NULL DEFAULT NULL,
   `category_slug` VARCHAR(255) NULL DEFAULT NULL,
   `category_params` TEXT NULL DEFAULT NULL,
   `created_by_name` VARCHAR(255) NULL DEFAULT '',
   `created_by_email` VARCHAR(100) NULL DEFAULT '',
   `modified_by_name` VARCHAR(255) NULL DEFAULT '',
   `last_commented_on` DATETIME NULL DEFAULT NULL,
   `last_commented_by` INT(10) UNSIGNED NULL DEFAULT NULL,
   `last_commented_by_name` VARCHAR(255) NULL DEFAULT '',
   `total_comments` BIGINT(21) NOT NULL DEFAULT '0'
) ENGINE=MyISAM;



# Dump of table jos_news_view_articles_comments_latest
# ------------------------------------------------------------

DROP VIEW IF EXISTS `jos_news_view_articles_comments_latest`;

CREATE TABLE `jos_news_view_articles_comments_latest` (
   `news_article_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',
   `created_on` DATETIME NULL DEFAULT NULL,
   `created_by` INT(10) UNSIGNED NULL DEFAULT NULL,
   `created_by_name` VARCHAR(255) NULL DEFAULT ''
) ENGINE=MyISAM;



# Dump of table jos_news_view_articles_comments_total
# ------------------------------------------------------------

DROP VIEW IF EXISTS `jos_news_view_articles_comments_total`;

CREATE TABLE `jos_news_view_articles_comments_total` (
   `news_article_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',
   `total` BIGINT(21) NOT NULL DEFAULT '0'
) ENGINE=MyISAM;





# Replace placeholder table for jos_news_view_articles with correct view syntax
# ------------------------------------------------------------

DROP TABLE `jos_news_view_articles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`demo`@`localhost` SQL SECURITY DEFINER VIEW `jos_news_view_articles`
AS SELECT
   `article`.`news_article_id` AS `news_article_id`,
   `article`.`news_category_id` AS `news_category_id`,
   `article`.`title` AS `title`,
   `article`.`slug` AS `slug`,
   `article`.`introtext` AS `introtext`,
   `article`.`fulltext` AS `fulltext`,
   `article`.`commentable` AS `commentable`,
   `article`.`enabled` AS `enabled`,
   `article`.`created_by` AS `created_by`,
   `article`.`created_on` AS `created_on`,
   `article`.`modified_by` AS `modified_by`,
   `article`.`modified_on` AS `modified_on`,
   `article`.`locked_by` AS `locked_by`,
   `article`.`locked_on` AS `locked_on`,
   `category`.`title` AS `category_title`,
   `category`.`slug` AS `category_slug`,
   `category`.`params` AS `category_params`,
   `creator`.`name` AS `created_by_name`,
   `creator`.`email` AS `created_by_email`,
   `modifier`.`name` AS `modified_by_name`,
   `comment_latest`.`created_on` AS `last_commented_on`,
   `comment_latest`.`created_by` AS `last_commented_by`,
   `comment_latest`.`created_by_name` AS `last_commented_by_name`,ifnull(`comment_total`.`total`,0) AS `total_comments`
FROM (((((`jos_news_articles` `article` left join `jos_users` `creator` on((`article`.`created_by` = `creator`.`id`))) left join `jos_users` `modifier` on((`article`.`modified_by` = `modifier`.`id`))) left join `jos_news_categories` `category` on((`article`.`news_category_id` = `category`.`news_category_id`))) left join `jos_news_view_articles_comments_latest` `comment_latest` on((`article`.`news_article_id` = `comment_latest`.`news_article_id`))) left join `jos_news_view_articles_comments_total` `comment_total` on((`article`.`news_article_id` = `comment_total`.`news_article_id`))) group by `article`.`news_article_id`;


# Replace placeholder table for jos_calendar_view_days with correct view syntax
# ------------------------------------------------------------

DROP TABLE `jos_calendar_view_days`;

CREATE ALGORITHM=MERGE DEFINER=`demo`@`localhost` SQL SECURITY DEFINER VIEW `jos_calendar_view_days`
AS SELECT
   `day`.`calendar_day_id` AS `calendar_day_id`,
   `day`.`calendar_event_id` AS `calendar_event_id`,
   `day`.`date` AS `date`,
   `day`.`year` AS `year`,
   `day`.`month` AS `month`,
   `day`.`day` AS `day`,
   `day`.`hour` AS `hour`,
   `day`.`minute` AS `minute`,
   `day`.`second` AS `second`,
   `day`.`week` AS `week`,
   `day`.`level` AS `level`,
   `event`.`title` AS `title`,
   `event`.`start_date` AS `start_date`,
   `event`.`end_date` AS `end_date`
FROM (`jos_calendar_days` `day` left join `jos_calendar_events` `event` on((`day`.`calendar_event_id` = `event`.`calendar_event_id`)));


# Replace placeholder table for jos_news_view_activities with correct view syntax
# ------------------------------------------------------------

DROP TABLE `jos_news_view_activities`;

CREATE ALGORITHM=MERGE DEFINER=`demo`@`localhost` SQL SECURITY DEFINER VIEW `jos_news_view_activities`
AS SELECT
   `activity`.`activities_activity_id` AS `activities_activity_id`,
   `activity`.`uuid` AS `uuid`,
   `activity`.`application` AS `application`,
   `activity`.`type` AS `type`,
   `activity`.`package` AS `package`,
   `activity`.`name` AS `name`,
   `activity`.`action` AS `action`,
   `activity`.`row` AS `row`,
   `activity`.`title` AS `title`,
   `activity`.`status` AS `status`,
   `activity`.`created_on` AS `created_on`,
   `activity`.`created_by` AS `created_by`,
   `user`.`name` AS `created_by_name`,
   `article`.`news_article_id` AS `news_article_id`,
   `article`.`introtext` AS `article_text`,
   `article`.`news_category_id` AS `news_category_id`,
   `article`.`category_title` AS `category_title`,
   `article`.`category_params` AS `category_params`,
   `article`.`slug` AS `article_slug`,
   `article`.`category_slug` AS `category_slug`,
   `article`.`total_comments` AS `total_comments`,
   `article`.`last_commented_on` AS `last_commented_on`,if((`activity`.`name` = 'comment'),`comment`.`text`,
   `article`.`introtext`) AS `text`
FROM ((((`jos_news_activities` `news_activity` left join `jos_activities_activities` `activity` on((`activity`.`activities_activity_id` = `news_activity`.`activities_activity_id`))) left join `jos_users` `user` on((`activity`.`created_by` = `user`.`id`))) left join `jos_news_view_articles` `article` on((`article`.`news_article_id` = `news_activity`.`news_article_id`))) left join `jos_comments_comments` `comment` on((`comment`.`comments_comment_id` = `news_activity`.`comments_comment_id`)));


# Replace placeholder table for jos_calendar_view_events with correct view syntax
# ------------------------------------------------------------

DROP TABLE `jos_calendar_view_events`;

CREATE ALGORITHM=MERGE DEFINER=`demo`@`localhost` SQL SECURITY DEFINER VIEW `jos_calendar_view_events`
AS SELECT
   `event`.`calendar_event_id` AS `calendar_event_id`,
   `event`.`title` AS `title`,
   `event`.`slug` AS `slug`,
   `event`.`description` AS `description`,
   `event`.`ordering` AS `ordering`,
   `event`.`enabled` AS `enabled`,
   `event`.`created_on` AS `created_on`,
   `event`.`created_by` AS `created_by`,
   `event`.`modified_on` AS `modified_on`,
   `event`.`modified_by` AS `modified_by`,
   `event`.`locked_on` AS `locked_on`,
   `event`.`locked_by` AS `locked_by`,
   `event`.`start_date` AS `start_date`,
   `event`.`end_date` AS `end_date`,
   `creator`.`name` AS `created_by_name`,
   `creator`.`email` AS `created_by_email`,
   `modifier`.`name` AS `modified_by_name`
FROM ((`jos_calendar_events` `event` left join `jos_users` `creator` on((`event`.`created_by` = `creator`.`id`))) left join `jos_users` `modifier` on((`event`.`modified_by` = `modifier`.`id`)));


# Replace placeholder table for jos_news_view_articles_comments_latest with correct view syntax
# ------------------------------------------------------------

DROP TABLE `jos_news_view_articles_comments_latest`;

CREATE ALGORITHM=UNDEFINED DEFINER=`demo`@`localhost` SQL SECURITY DEFINER VIEW `jos_news_view_articles_comments_latest`
AS SELECT
   `comment`.`row` AS `news_article_id`,
   `comment`.`created_on` AS `created_on`,
   `comment`.`created_by` AS `created_by`,
   `comment`.`created_by_name` AS `created_by_name`
FROM (`jos_comments_view_comments` `comment` left join `jos_comments_comments` `comment_helper` on(((`comment_helper`.`table` = 'news_articles') and (`comment_helper`.`row` = `comment`.`row`) and (`comment`.`comments_comment_id` < `comment_helper`.`comments_comment_id`)))) where ((`comment`.`table` = 'news_articles') and isnull(`comment_helper`.`comments_comment_id`)) group by `comment`.`row`;


# Replace placeholder table for jos_comments_view_comments with correct view syntax
# ------------------------------------------------------------

DROP TABLE `jos_comments_view_comments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`demo`@`localhost` SQL SECURITY DEFINER VIEW `jos_comments_view_comments`
AS SELECT
   `comment`.`comments_comment_id` AS `comments_comment_id`,
   `comment`.`table` AS `table`,
   `comment`.`row` AS `row`,
   `comment`.`text` AS `text`,
   `comment`.`created_on` AS `created_on`,
   `comment`.`created_by` AS `created_by`,
   `comment`.`modified_on` AS `modified_on`,
   `comment`.`modified_by` AS `modified_by`,
   `comment`.`locked_on` AS `locked_on`,
   `comment`.`locked_by` AS `locked_by`,
   `creator`.`name` AS `created_by_name`,
   `creator`.`email` AS `created_by_email`
FROM (`jos_comments_comments` `comment` left join `jos_users` `creator` on((`creator`.`id` = `comment`.`created_by`)));


# Replace placeholder table for jos_news_view_articles_comments_total with correct view syntax
# ------------------------------------------------------------

DROP TABLE `jos_news_view_articles_comments_total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`demo`@`localhost` SQL SECURITY DEFINER VIEW `jos_news_view_articles_comments_total`
AS SELECT
   `jos_comments_view_comments`.`row` AS `news_article_id`,count(`jos_comments_view_comments`.`comments_comment_id`) AS `total`
FROM `jos_comments_view_comments` where (`jos_comments_view_comments`.`table` = 'news_articles') group by `jos_comments_view_comments`.`row`;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
