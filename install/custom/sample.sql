# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.13)
# Database: police_intranet
# Generation Time: 2014-07-04 11:50:50 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table jos_activities_activities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_activities_activities`;

CREATE TABLE `jos_activities_activities` (
  `activities_activity_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL DEFAULT '',
  `application` varchar(10) NOT NULL DEFAULT '',
  `type` varchar(3) NOT NULL DEFAULT '',
  `package` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `action` varchar(50) NOT NULL DEFAULT '',
  `row` bigint(20) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`activities_activity_id`),
  UNIQUE KEY `uuid` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jos_activities_activities` WRITE;
/*!40000 ALTER TABLE `jos_activities_activities` DISABLE KEYS */;

INSERT INTO `jos_activities_activities` (`activities_activity_id`, `uuid`, `application`, `type`, `package`, `name`, `action`, `row`, `title`, `status`, `created_on`, `created_by`)
VALUES
	(26,'4e3c77cec44c46eaa22c6b4de268996c','site','com','news','comment','add',1,'Lorem ipsum 1','created','2012-07-01 16:47:03',13287),
	(27,'50679ea34de94da599644d33c82ea42a','site','com','news','comment','add',2,'Lorem ipsum 1','created','2012-07-10 12:55:59',71),
	(28,'a84b3ebe80624805a29271a3f1dff70c','site','com','news','article','edit',1,'Lorem ipsum 1','updated','2012-07-10 12:57:22',71),
	(29,'5632c528da93406cb8224021900bc873','site','com','news','article','edit',1,'Lorem ipsum 1','updated','2012-10-12 10:06:17',71);

/*!40000 ALTER TABLE `jos_activities_activities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_attachments_attachments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_attachments_attachments`;

CREATE TABLE `jos_attachments_attachments` (
  `attachments_attachment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `container` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(255) NOT NULL DEFAULT '',
  `hash` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  PRIMARY KEY (`attachments_attachment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jos_attachments_attachments` WRITE;
/*!40000 ALTER TABLE `jos_attachments_attachments` DISABLE KEYS */;

INSERT INTO `jos_attachments_attachments` (`attachments_attachment_id`, `name`, `container`, `path`, `hash`, `description`)
VALUES
	(45,'leds.jpg','attachments-attachments','1cbb0e16c755852a9d89c499401505ee.jpg','d577b2c5efe99313970de8ea211b4d98','');

/*!40000 ALTER TABLE `jos_attachments_attachments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_attachments_relations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_attachments_relations`;

CREATE TABLE `jos_attachments_relations` (
  `attachments_attachment_id` int(10) unsigned NOT NULL,
  `table` varchar(255) NOT NULL DEFAULT '',
  `row` varchar(255) NOT NULL DEFAULT '',
  KEY `attachments_attachment_id` (`attachments_attachment_id`),
  CONSTRAINT `jos_attachments_relations_ibfk_1` FOREIGN KEY (`attachments_attachment_id`) REFERENCES `jos_attachments_attachments` (`attachments_attachment_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jos_attachments_relations` WRITE;
/*!40000 ALTER TABLE `jos_attachments_relations` DISABLE KEYS */;

INSERT INTO `jos_attachments_relations` (`attachments_attachment_id`, `table`, `row`)
VALUES
	(45,'news_articles','1');

/*!40000 ALTER TABLE `jos_attachments_relations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_calendar_days
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_calendar_days`;

CREATE TABLE `jos_calendar_days` (
  `calendar_day_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `calendar_event_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `year` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `hour` int(11) DEFAULT NULL,
  `minute` int(11) DEFAULT NULL,
  `second` int(11) DEFAULT NULL,
  `week` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`calendar_day_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jos_calendar_days` WRITE;
/*!40000 ALTER TABLE `jos_calendar_days` DISABLE KEYS */;

INSERT INTO `jos_calendar_days` (`calendar_day_id`, `calendar_event_id`, `date`, `year`, `month`, `day`, `hour`, `minute`, `second`, `week`, `level`)
VALUES
	(64,8,'2012-07-16 11:19:00',2012,7,16,11,19,0,29,2),
	(65,8,'2012-07-17 00:00:00',2012,7,17,0,0,0,29,2),
	(66,8,'2012-07-18 00:00:00',2012,7,18,0,0,0,29,2),
	(67,8,'2012-07-19 00:00:00',2012,7,19,0,0,0,29,2),
	(68,8,'2012-07-20 12:39:00',2012,7,20,12,39,0,29,2),
	(69,9,'2012-07-15 12:58:00',2012,7,15,12,58,0,28,1),
	(70,9,'2012-07-16 00:00:00',2012,7,16,0,0,0,29,1),
	(71,9,'2012-07-17 00:00:00',2012,7,17,0,0,0,29,1),
	(72,9,'2012-07-18 00:00:00',2012,7,18,0,0,0,29,1),
	(73,9,'2012-07-19 12:49:00',2012,7,19,12,49,0,29,1),
	(74,7,'2012-07-09 13:25:00',2012,7,9,13,25,0,28,1),
	(75,7,'2012-07-10 00:00:00',2012,7,10,0,0,0,28,1),
	(76,7,'2012-07-11 00:00:00',2012,7,11,0,0,0,28,1),
	(77,7,'2012-07-12 00:00:00',2012,7,12,0,0,0,28,1),
	(78,7,'2012-07-13 12:49:00',2012,7,13,12,49,0,28,1);

/*!40000 ALTER TABLE `jos_calendar_days` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_calendar_events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_calendar_events`;

CREATE TABLE `jos_calendar_events` (
  `calendar_event_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `locked_on` datetime DEFAULT NULL,
  `locked_by` int(10) unsigned DEFAULT NULL,
  `start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`calendar_event_id`),
  KEY `idx_enabled` (`enabled`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jos_calendar_events` WRITE;
/*!40000 ALTER TABLE `jos_calendar_events` DISABLE KEYS */;

INSERT INTO `jos_calendar_events` (`calendar_event_id`, `title`, `slug`, `description`, `ordering`, `enabled`, `created_on`, `created_by`, `modified_on`, `modified_by`, `locked_on`, `locked_by`, `start_date`, `end_date`)
VALUES
	(7,'Event 1','event-1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum sodales fringilla. Morbi eu congue erat.sss',0,1,'2012-06-20 10:49:05',13287,'2012-06-30 22:14:16',13287,'0000-00-00 00:00:00',0,'2012-07-09 13:25:00','2012-07-13 12:49:00'),
	(8,'Event 2','event-2','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum sodales fringilla. Morbi eu congue erat. ',0,1,'2012-06-20 10:49:20',13287,'2012-06-30 21:50:48',13287,'0000-00-00 00:00:00',0,'2012-07-16 11:19:00','2012-07-20 12:39:00'),
	(9,'Event 3','event-3','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum sodales fringilla. Morbi eu congue erat. ',0,1,'2012-06-20 10:49:40',13287,'2012-06-30 21:52:57',13287,'0000-00-00 00:00:00',0,'2012-07-15 12:58:00','2012-07-19 12:49:00');

/*!40000 ALTER TABLE `jos_calendar_events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_categories`;

CREATE TABLE `jos_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `section` varchar(50) NOT NULL DEFAULT '',
  `image_position` varchar(30) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor` varchar(50) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table jos_comments_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_comments_comments`;

CREATE TABLE `jos_comments_comments` (
  `comments_comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table` varchar(64) NOT NULL DEFAULT '',
  `row` int(10) unsigned NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `locked_on` datetime DEFAULT NULL,
  `locked_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`comments_comment_id`),
  KEY `idx_table_row` (`table`,`row`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jos_comments_comments` WRITE;
/*!40000 ALTER TABLE `jos_comments_comments` DISABLE KEYS */;

INSERT INTO `jos_comments_comments` (`comments_comment_id`, `table`, `row`, `text`, `created_on`, `created_by`, `modified_on`, `modified_by`, `locked_on`, `locked_by`)
VALUES
	(1,'news_articles',1,'<p><span>Phasellus gravida, libero vitae tincidunt consectetur, purus mi venenatis dolor, ac auctor ligula dui at turpis.</span></p>','2012-07-01 16:47:03',13287,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),
	(2,'news_articles',1,'<p>Test</p>','2012-07-10 12:55:59',71,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0);

/*!40000 ALTER TABLE `jos_comments_comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_components
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_components`;

CREATE TABLE `jos_components` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `menuid` int(11) unsigned NOT NULL DEFAULT '0',
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `admin_menu_link` varchar(255) NOT NULL DEFAULT '',
  `admin_menu_alt` varchar(255) NOT NULL DEFAULT '',
  `option` varchar(50) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `admin_menu_img` varchar(255) NOT NULL DEFAULT '',
  `iscore` tinyint(4) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `parent_option` (`parent`,`option`(32))
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `jos_components` WRITE;
/*!40000 ALTER TABLE `jos_components` DISABLE KEYS */;

INSERT INTO `jos_components` (`id`, `name`, `link`, `menuid`, `parent`, `admin_menu_link`, `admin_menu_alt`, `option`, `ordering`, `admin_menu_img`, `iscore`, `params`, `enabled`)
VALUES
	(20,'Articles','option=com_articles',0,0,'option=com_articles','Articles','com_articles',0,'components/com_docman/images/dm_spacer_16.png',1,'enabled=0\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_item_navigation=0\nshow_readmore=1\nshow_icons=1\nshow_print_icon=1\nfeed_summary=0\n\n',1),
	(19,'Media Manager','',0,0,'option=com_files','Media Manager','com_files',0,'',1,'upload_extensions=bmp,csv,doc,epg,gif,ico,jpg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,EPG,GIF,ICO,JPG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS\nupload_maxsize=10000000\nimage_path=images\nrestrict_uploads=1\ncheck_mime=1\nimage_extensions=bmp,gif,jpg,png\nignore_extensions=\nupload_mime=image/jpeg,image/gif,image/png,image/bmp,application/x-shockwave-flash,application/msword,application/excel,application/pdf,application/powerpoint,text/plain,application/x-zip\nupload_mime_illegal=text/html\nallowed_media_usergroup=3\nthumbnails=1\n\n',1),
	(21,'Configuration Manager','',0,0,'','Configuration','com_config',0,'components/com_docman/images/dm_spacer_16.png',1,'',1),
	(22,'Installation Manager','',0,0,'','Installer','com_installer',0,'components/com_docman/images/dm_spacer_16.png',1,'',1),
	(23,'Language Manager','',0,0,'','Languages','com_languages',0,'components/com_docman/images/dm_spacer_16.png',1,'administrator=en-GB\nsite=en-GB',1),
	(25,'Menu Editor','',0,0,'','Menu Editor','com_menus',0,'components/com_docman/images/dm_spacer_16.png',1,'',1),
	(28,'Modules Manager','',0,0,'','Modules','com_modules',0,'components/com_docman/images/dm_spacer_16.png',1,'',1),
	(29,'Plugin Manager','',0,0,'','Plugins','com_plugins',0,'components/com_docman/images/dm_spacer_16.png',1,'',1),
	(30,'Template Manager','',0,0,'','Templates','com_templates',0,'components/com_docman/images/dm_spacer_16.png',1,'site=jt-v6\n\n',1),
	(31,'User Manager','option=com_user',0,0,'','Users','com_users',0,'components/com_docman/images/dm_spacer_16.png',1,'allowUserRegistration=0\nnew_usertype=Registered\nuseractivation=0\nfrontend_userparams=0\n\n',1),
	(32,'Cache Manager','',0,0,'','Cache','com_cache',0,'components/com_docman/images/dm_spacer_16.png',1,'',1),
	(33,'Control Panel','',0,0,'','Control Panel','com_cpanel',0,'components/com_docman/images/dm_spacer_16.png',1,'',1),
	(35,'News','option=com_news',0,0,'option=com_news','Manage News','com_news',0,'',0,'',1),
	(7,'Contacts','option=com_contact',0,0,'','Edit contact details','com_contact',0,'js/ThemeOffice/component.png',1,'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n',1),
	(8,'Contacts','',0,7,'option=com_contact','Edit contact details','com_contact',0,'js/ThemeOffice/edit.png',1,'',1),
	(9,'Categories','',0,7,'option=com_categories&section=com_contact_details','Manage contact categories','',2,'js/ThemeOffice/categories.png',1,'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n',1),
	(34,'Extension Manager','',0,0,'','Extensions','com_extensions',0,'',1,'administrator=en-GB\nsite=en-GB\ntemplate_site=intranet\n\n',1),
	(36,'Activities','option=com_activities',0,0,'option=com_activities','Activities','com_activities',0,'js/ThemeOffice/component.png',0,'',1),
	(37,'Calendar','option=com_calendar',0,0,'option=com_calendar','Calendar','com_calendar',0,'',0,'',1),
	(39,'Downloads','option=com_downloads',0,0,'option=com_downloads','Downloads','com_downloads',0,'',0,'',1);

/*!40000 ALTER TABLE `jos_components` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_contact_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_contact_details`;

CREATE TABLE `jos_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `con_position` varchar(255) DEFAULT NULL,
  `address` text,
  `suburb` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `misc` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `imagepos` varchar(20) DEFAULT NULL,
  `email_to` varchar(255) DEFAULT NULL,
  `default_con` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `catid` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `webpage` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `jos_contact_details` WRITE;
/*!40000 ALTER TABLE `jos_contact_details` DISABLE KEYS */;

INSERT INTO `jos_contact_details` (`id`, `name`, `alias`, `con_position`, `address`, `suburb`, `state`, `country`, `postcode`, `telephone`, `fax`, `misc`, `image`, `imagepos`, `email_to`, `default_con`, `published`, `checked_out`, `checked_out_time`, `ordering`, `params`, `user_id`, `catid`, `access`, `mobile`, `webpage`)
VALUES
	(1,'Joomlatools','general','','','','','','','','','<h2>Contact Us</h2>\r\n\r\n<p>We\'d love to hear from you. If you have any questions, want to get in contact to request a project quote, or just want to tell us how excited you are about Joomlatools, fill out the form below.</p>','',NULL,'support@joomlatools.eu',0,1,0,'0000-00-00 00:00:00',1,'show_name=0\nshow_position=0\nshow_email=0\nshow_street_address=0\nshow_suburb=0\nshow_state=0\nshow_postcode=0\nshow_country=0\nshow_telephone=0\nshow_mobile=0\nshow_fax=0\nshow_webpage=0\nshow_misc=1\nshow_image=0\nallow_vcard=0\ncontact_icons=2\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=blank.png\nshow_email_form=1\nemail_description=We want to hear from you\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=',0,4,0,'','');

/*!40000 ALTER TABLE `jos_contact_details` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_content
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_content`;

CREATE TABLE `jos_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `title_alias` varchar(255) NOT NULL DEFAULT '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `sectionid` int(11) unsigned NOT NULL DEFAULT '0',
  `mask` int(11) unsigned NOT NULL DEFAULT '0',
  `catid` int(11) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` text NOT NULL,
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `parentid` int(11) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(11) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0',
  `metadata` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_section` (`sectionid`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table jos_content_frontpage
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_content_frontpage`;

CREATE TABLE `jos_content_frontpage` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table jos_content_rating
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_content_rating`;

CREATE TABLE `jos_content_rating` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(11) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(11) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table jos_core_acl_aro
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_core_acl_aro`;

CREATE TABLE `jos_core_acl_aro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_value` varchar(240) NOT NULL DEFAULT '0',
  `value` varchar(240) NOT NULL DEFAULT '',
  `order_value` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `hidden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `jos_section_value_value_aro` (`section_value`(100),`value`(100)),
  KEY `jos_gacl_hidden_aro` (`hidden`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `jos_core_acl_aro` WRITE;
/*!40000 ALTER TABLE `jos_core_acl_aro` DISABLE KEYS */;

INSERT INTO `jos_core_acl_aro` (`id`, `section_value`, `value`, `order_value`, `name`, `hidden`)
VALUES
	(19,'users','71',0,'Tom Janssens',0),
	(13229,'users','13286',0,'Demo',0),
	(13230,'users','13287',0,'Eddy Naessens',0),
	(13231,'users','13288',0,'Wilfried Pasmans',0);

/*!40000 ALTER TABLE `jos_core_acl_aro` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_core_acl_aro_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_core_acl_aro_groups`;

CREATE TABLE `jos_core_acl_aro_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `value` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `jos_gacl_parent_id_aro_groups` (`parent_id`),
  KEY `jos_gacl_lft_rgt_aro_groups` (`lft`,`rgt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `jos_core_acl_aro_groups` WRITE;
/*!40000 ALTER TABLE `jos_core_acl_aro_groups` DISABLE KEYS */;

INSERT INTO `jos_core_acl_aro_groups` (`id`, `parent_id`, `name`, `lft`, `rgt`, `value`)
VALUES
	(17,0,'ROOT',1,22,'ROOT'),
	(28,17,'USERS',2,21,'USERS'),
	(29,28,'Public Frontend',3,12,'Public Frontend'),
	(18,29,'Registered',4,11,'Registered'),
	(19,18,'Author',5,10,'Author'),
	(20,19,'Editor',6,9,'Editor'),
	(21,20,'Publisher',7,8,'Publisher'),
	(30,28,'Public Backend',13,20,'Public Backend'),
	(23,30,'Manager',14,19,'Manager'),
	(24,23,'Administrator',15,18,'Administrator'),
	(25,24,'Super Administrator',16,17,'Super Administrator');

/*!40000 ALTER TABLE `jos_core_acl_aro_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_core_acl_aro_map
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_core_acl_aro_map`;

CREATE TABLE `jos_core_acl_aro_map` (
  `acl_id` int(11) NOT NULL DEFAULT '0',
  `section_value` varchar(230) NOT NULL DEFAULT '0',
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`acl_id`,`section_value`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table jos_core_acl_aro_sections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_core_acl_aro_sections`;

CREATE TABLE `jos_core_acl_aro_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(230) NOT NULL DEFAULT '',
  `order_value` int(11) NOT NULL DEFAULT '0',
  `name` varchar(230) NOT NULL DEFAULT '',
  `hidden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `jos_gacl_value_aro_sections` (`value`),
  KEY `jos_gacl_hidden_aro_sections` (`hidden`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `jos_core_acl_aro_sections` WRITE;
/*!40000 ALTER TABLE `jos_core_acl_aro_sections` DISABLE KEYS */;

INSERT INTO `jos_core_acl_aro_sections` (`id`, `value`, `order_value`, `name`, `hidden`)
VALUES
	(10,'users',1,'Users',0);

/*!40000 ALTER TABLE `jos_core_acl_aro_sections` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_core_acl_groups_aro_map
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_core_acl_groups_aro_map`;

CREATE TABLE `jos_core_acl_groups_aro_map` (
  `group_id` int(11) NOT NULL DEFAULT '0',
  `section_value` varchar(240) NOT NULL DEFAULT '',
  `aro_id` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `group_id_aro_id_groups_aro_map` (`group_id`,`section_value`,`aro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `jos_core_acl_groups_aro_map` WRITE;
/*!40000 ALTER TABLE `jos_core_acl_groups_aro_map` DISABLE KEYS */;

INSERT INTO `jos_core_acl_groups_aro_map` (`group_id`, `section_value`, `aro_id`)
VALUES
	(18,'',13229),
	(18,'',13231),
	(24,'',13230),
	(25,'',19);

/*!40000 ALTER TABLE `jos_core_acl_groups_aro_map` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_core_log_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_core_log_items`;

CREATE TABLE `jos_core_log_items` (
  `time_stamp` date NOT NULL DEFAULT '0000-00-00',
  `item_table` varchar(50) NOT NULL DEFAULT '',
  `item_id` int(11) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table jos_core_log_searches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_core_log_searches`;

CREATE TABLE `jos_core_log_searches` (
  `search_term` varchar(128) NOT NULL DEFAULT '',
  `hits` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table jos_files_containers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_files_containers`;

CREATE TABLE `jos_files_containers` (
  `files_container_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `parameters` text NOT NULL,
  PRIMARY KEY (`files_container_id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jos_files_containers` WRITE;
/*!40000 ALTER TABLE `jos_files_containers` DISABLE KEYS */;

INSERT INTO `jos_files_containers` (`files_container_id`, `slug`, `title`, `path`, `parameters`)
VALUES
	(1,'files-files','Images','images','{\"thumbnails\": true,\"maximum_size\":\"10485760\",\"allowed_extensions\": [\"bmp\", \"csv\", \"doc\", \"gif\", \"ico\", \"jpg\", \"jpeg\", \"odg\", \"odp\", \"ods\", \"odt\", \"pdf\", \"png\", \"ppt\", \"swf\", \"txt\", \"xcf\", \"xls\"],\"allowed_mimetypes\": [\"image/jpeg\", \"image/gif\", \"image/png\", \"image/bmp\", \"application/x-shockwave-flash\", \"application/msword\", \"application/excel\", \"application/pdf\", \"application/powerpoint\", \"text/plain\", \"application/x-zip\"]}'),
	(2,'attachments-attachments','Attachments','attachments','{\"thumbnails\": true,\"maximum_size\":\"10485760\",\"allowed_extensions\": [\"bmp\", \"csv\", \"doc\", \"gif\", \"ico\", \"jpg\", \"jpeg\", \"odg\", \"odp\", \"ods\", \"odt\", \"pdf\", \"png\", \"ppt\", \"sql\", \"swf\", \"txt\", \"xcf\", \"xls\"],\"allowed_mimetypes\": [\"image/jpeg\", \"image/gif\", \"image/png\", \"image/bmp\", \"application/x-shockwave-flash\", \"application/msword\", \"application/excel\", \"application/pdf\", \"application/powerpoint\", \"text/plain\", \"application/x-zip\"]}'),
	(3,'downloads-downloads','Downloads','downloads','{\"thumbnails\": false,\"maximum_size\":\"10485760\",\"allowed_extensions\": [\"pdf\"],\"allowed_mimetypes\": [\"application/pdf\"]}');

/*!40000 ALTER TABLE `jos_files_containers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_files_paths
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_files_paths`;

CREATE TABLE `jos_files_paths` (
  `identifier` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `parameters` text,
  PRIMARY KEY (`identifier`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `jos_files_paths` WRITE;
/*!40000 ALTER TABLE `jos_files_paths` DISABLE KEYS */;

INSERT INTO `jos_files_paths` (`identifier`, `path`, `parameters`)
VALUES
	('files.files','images','{\"upload_extensions\":\"bmp,csv,doc,gif,ico,jpg,jpeg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls\",\"upload_maxsize\":\"10485760\",\"allowed_mimetypes\":\"image\\/jpeg,image\\/gif,image\\/png,imagee\\/bmp,application\\/x-shockwave-flash,application\\/msword,application\\/excel,application\\/pdf,application\\/powerpoint,text\\/plain,application\\/x-zip\",\"illegal_mimetypes\":\"text\\/html\",\"restrict_uploads\":1,\"check_mime\":1,\"allowed_media_usergroup\":3}');

/*!40000 ALTER TABLE `jos_files_paths` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_files_thumbnails
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_files_thumbnails`;

CREATE TABLE `jos_files_thumbnails` (
  `files_thumbnail_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `files_container_id` varchar(255) NOT NULL,
  `folder` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `thumbnail` text NOT NULL,
  PRIMARY KEY (`files_thumbnail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jos_files_thumbnails` WRITE;
/*!40000 ALTER TABLE `jos_files_thumbnails` DISABLE KEYS */;

INSERT INTO `jos_files_thumbnails` (`files_thumbnail_id`, `files_container_id`, `folder`, `filename`, `thumbnail`)
VALUES
	(15,'2','','1cbb0e16c755852a9d89c499401505ee.jpg','data:image/jpeg;base64,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');

/*!40000 ALTER TABLE `jos_files_thumbnails` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_groups`;

CREATE TABLE `jos_groups` (
  `id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `jos_groups` WRITE;
/*!40000 ALTER TABLE `jos_groups` DISABLE KEYS */;

INSERT INTO `jos_groups` (`id`, `name`)
VALUES
	(0,'Public'),
	(1,'Registered'),
	(2,'Special');

/*!40000 ALTER TABLE `jos_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_menu`;

CREATE TABLE `jos_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menutype` varchar(75) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) NOT NULL DEFAULT '',
  `link` text,
  `type` varchar(50) NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `componentid` int(11) unsigned NOT NULL DEFAULT '0',
  `sublevel` int(11) DEFAULT '0',
  `ordering` int(11) DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pollid` int(11) NOT NULL DEFAULT '0',
  `browserNav` tinyint(4) DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `utaccess` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `lft` int(11) unsigned NOT NULL DEFAULT '0',
  `rgt` int(11) unsigned NOT NULL DEFAULT '0',
  `home` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `componentid` (`componentid`,`menutype`,`published`,`access`),
  KEY `menutype` (`menutype`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `jos_menu` WRITE;
/*!40000 ALTER TABLE `jos_menu` DISABLE KEYS */;

INSERT INTO `jos_menu` (`id`, `menutype`, `name`, `alias`, `link`, `type`, `published`, `parent`, `componentid`, `sublevel`, `ordering`, `checked_out`, `checked_out_time`, `pollid`, `browserNav`, `access`, `utaccess`, `params`, `lft`, `rgt`, `home`)
VALUES
	(1,'mainmenu','Home','home','index.php?option=com_news&view=articles','component',1,0,35,0,1,71,'2014-07-04 10:20:45',0,0,1,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nsecure=0\n\n',0,0,0),
	(2,'footermenu','Login','login','index.php?option=com_users&view=login','component',1,0,31,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'show_login_title=1\nheader_login=\nlogin=/home\nlogin_message=0\ndescription_login=0\ndescription_login_text=\nimage_login=\nimage_login_align=right\nallowUserRegistration=\nnew_usertype=\nuseractivation=\nfrontend_userparams=\npage_title=\nshow_page_title=1\npageclass_sfx=\nsecure=0\n\n',0,0,1),
	(3,'mainmenu','Calendar','calendar','index.php?option=com_calendar&view=events','component',1,0,37,0,3,0,'0000-00-00 00:00:00',0,0,1,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nsecure=0\n\n',0,0,0),
	(4,'mainmenu','Activities','activities','index.php?option=com_news&view=activities','component',1,0,35,0,4,0,'0000-00-00 00:00:00',0,0,1,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nsecure=0\n\n',0,0,0),
	(5,'mainmenu','Profile','profile','index.php?option=com_users&view=user&layout=form','component',1,0,31,0,6,0,'0000-00-00 00:00:00',0,0,1,0,'allowUserRegistration=\nnew_usertype=\nuseractivation=\nfrontend_userparams=\npage_title=\nshow_page_title=1\npageclass_sfx=\nsecure=0\n\n',0,0,0),
	(6,'mainmenu','Downloads','downloads','index.php?option=com_downloads&view=downloads','component',1,0,39,0,5,0,'0000-00-00 00:00:00',0,0,1,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nsecure=0\n\n',0,0,0),
	(7,'mainmenu','News','news','index.php?option=com_news&view=articles','component',0,0,35,0,2,0,'0000-00-00 00:00:00',0,0,1,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nsecure=0\n\n',0,0,0),
	(8,'mainmenu','Login','login','index.php?option=com_users&view=login','component',-2,0,31,0,0,0,'0000-00-00 00:00:00',0,0,0,0,'show_login_title=1\nheader_login=\nlogin=\nlogin_message=0\ndescription_login=0\ndescription_login_text=\nimage_login=\nimage_login_align=right\nallowUserRegistration=\nnew_usertype=\nuseractivation=\nfrontend_userparams=\npage_title=\nshow_page_title=1\npageclass_sfx=\nsecure=0\n\n',0,0,0),
	(9,'footermenu','Logout','logout','index.php?option=com_users&view=logout','component',1,0,31,0,2,0,'0000-00-00 00:00:00',0,0,0,0,'show_logout_title=1\nheader_logout=\nlogout=\nlogout_message=1\ndescription_logout=1\ndescription_logout_text=\nimage_logout=\nallowUserRegistration=\nnew_usertype=\nuseractivation=\nfrontend_userparams=\npage_title=\nshow_page_title=1\npageclass_sfx=\nsecure=0\n\n',0,0,0);

/*!40000 ALTER TABLE `jos_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_menu_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_menu_types`;

CREATE TABLE `jos_menu_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menutype` varchar(75) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `menutype` (`menutype`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `jos_menu_types` WRITE;
/*!40000 ALTER TABLE `jos_menu_types` DISABLE KEYS */;

INSERT INTO `jos_menu_types` (`id`, `menutype`, `title`, `description`)
VALUES
	(1,'mainmenu','Main Menu','The main menu for the site'),
	(2,'footermenu','Footer Menu','Footer Menu');

/*!40000 ALTER TABLE `jos_menu_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_modules
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_modules`;

CREATE TABLE `jos_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) DEFAULT NULL,
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `numnews` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `showtitle` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `iscore` tinyint(4) NOT NULL DEFAULT '0',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  `control` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `jos_modules` WRITE;
/*!40000 ALTER TABLE `jos_modules` DISABLE KEYS */;

INSERT INTO `jos_modules` (`id`, `title`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `published`, `module`, `numnews`, `access`, `showtitle`, `params`, `iscore`, `client_id`, `control`)
VALUES
	(1,'Apps Menu','',15,'apps',0,'0000-00-00 00:00:00',1,'mod_mainmenu',0,1,0,'menutype=mainmenu\nmenu_style=list\nstartLevel=0\nendLevel=1\nshowAllChildren=0\nshow_whitespace=0\ncache=0\ntag_id=\nclass_sfx=nav nav-apps nav-stacked\nmoduleclass_sfx=\nmaxdepth=10\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nspacer=\nend_spacer=\n\n',1,0,''),
	(125,'Login','',21,'right',0,'0000-00-00 00:00:00',0,'mod_login',0,0,1,'cache=0\nmoduleclass_sfx=\npretext=\nposttext=\nlogin=\nlogout=\ngreeting=1\nname=0\nusesecure=0\n\n',0,0,''),
	(2,'Login','',6,'login',0,'0000-00-00 00:00:00',1,'mod_login',0,0,1,'',1,1,''),
	(4,'Recent added Articles','',20,'cpanel',0,'0000-00-00 00:00:00',1,'mod_latest',0,2,1,'ordering=c_dsc\nuser_id=0\ncache=0\n\n',0,1,''),
	(8,'Toolbar','',8,'toolbar',0,'0000-00-00 00:00:00',1,'mod_toolbar',0,2,1,'',1,1,''),
	(9,'Quick Icons','',9,'icon',0,'0000-00-00 00:00:00',1,'mod_quickicon',0,2,1,'',1,1,''),
	(10,'Logged in Users','',19,'cpanel',0,'0000-00-00 00:00:00',1,'mod_logged',0,2,1,'',0,1,''),
	(11,'Footer','',2,'footer',0,'0000-00-00 00:00:00',1,'mod_footer',0,0,1,'',1,1,''),
	(12,'Admin Menu','',10,'menu',0,'0000-00-00 00:00:00',1,'mod_menu',0,2,1,'',0,1,''),
	(13,'Admin SubMenu','',11,'submenu',0,'0000-00-00 00:00:00',1,'mod_submenu',0,2,1,'',0,1,''),
	(14,'User Status','',12,'status',0,'0000-00-00 00:00:00',1,'mod_status',0,2,1,'',0,1,''),
	(15,'Title','',13,'title',0,'0000-00-00 00:00:00',1,'mod_title',0,2,1,'',0,1,''),
	(62,'Breadcrumbs','',16,'breadcrumbs',0,'0000-00-00 00:00:00',0,'mod_breadcrumbs',0,1,0,'showHome=0\nhomeText=Home\nshowLast=1\nseparator=»\nmoduleclass_sfx=\ncache=0\n\n',0,0,''),
	(106,'Sub Menu','',1,'left',0,'0000-00-00 00:00:00',0,'mod_mainmenu',0,1,1,'menutype=mainmenu\nmenu_style=list\nstartLevel=1\nendLevel=0\nshowAllChildren=0\nshow_whitespace=0\ncache=0\ntag_id=\nclass_sfx= nav\nmoduleclass_sfx=\nmaxdepth=10\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nspacer=\nend_spacer=\n\n',0,0,''),
	(123,'Footer Menu','',18,'footermenu',0,'0000-00-00 00:00:00',1,'mod_mainmenu',0,1,0,'menutype=footermenu\nmenu_style=list\nstartLevel=0\nendLevel=1\nshowAllChildren=0\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=\nmaxdepth=10\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nspacer=\nend_spacer=\n\n',0,0,''),
	(124,'Access Level Switch	','',16,'access',0,'0000-00-00 00:00:00',1,'mod_access_select',0,1,0,'',0,0,''),
	(126,'Search','',16,'search',0,'0000-00-00 00:00:00',1,'mod_search',0,1,0,'moduleclass_sfx=\nwidth=20\ntext=\nbutton=1\nbutton_pos=right\nimagebutton=\nbutton_text=Search\nset_itemid=\n\n',0,0,'');

/*!40000 ALTER TABLE `jos_modules` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_modules_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_modules_menu`;

CREATE TABLE `jos_modules_menu` (
  `moduleid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`moduleid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `jos_modules_menu` WRITE;
/*!40000 ALTER TABLE `jos_modules_menu` DISABLE KEYS */;

INSERT INTO `jos_modules_menu` (`moduleid`, `menuid`)
VALUES
	(1,0),
	(62,0),
	(106,0),
	(123,0),
	(124,0),
	(125,0),
	(126,0);

/*!40000 ALTER TABLE `jos_modules_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_news_activities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_news_activities`;

CREATE TABLE `jos_news_activities` (
  `activities_activity_id` int(10) unsigned NOT NULL,
  `news_article_id` int(10) unsigned NOT NULL,
  `comments_comment_id` int(11) NOT NULL,
  KEY `activities_activity_id` (`activities_activity_id`),
  CONSTRAINT `jos_news_activities_ibfk_1` FOREIGN KEY (`activities_activity_id`) REFERENCES `jos_activities_activities` (`activities_activity_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jos_news_activities` WRITE;
/*!40000 ALTER TABLE `jos_news_activities` DISABLE KEYS */;

INSERT INTO `jos_news_activities` (`activities_activity_id`, `news_article_id`, `comments_comment_id`)
VALUES
	(26,1,1),
	(27,1,2),
	(28,1,0),
	(29,1,0);

/*!40000 ALTER TABLE `jos_news_activities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_news_articles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_news_articles`;

CREATE TABLE `jos_news_articles` (
  `news_article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_category_id` smallint(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `introtext` text NOT NULL,
  `fulltext` text NOT NULL,
  `commentable` tinyint(1) NOT NULL DEFAULT '1',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `locked_by` int(10) unsigned DEFAULT NULL,
  `locked_on` datetime DEFAULT NULL,
  PRIMARY KEY (`news_article_id`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_category_id` (`news_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jos_news_articles` WRITE;
/*!40000 ALTER TABLE `jos_news_articles` DISABLE KEYS */;

INSERT INTO `jos_news_articles` (`news_article_id`, `news_category_id`, `title`, `slug`, `introtext`, `fulltext`, `commentable`, `enabled`, `created_by`, `created_on`, `modified_by`, `modified_on`, `locked_by`, `locked_on`)
VALUES
	(1,1,'Lorem ipsum 1','lorem-ipsum','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum sodales fringilla. Morbi eu congue erat. In vitae sagittis nisl. Proin ante quam, egestas quis ullamcorper ac, pharetra facilisis dolor. Phasellus gravida, libero vitae tincidunt consectetur, purus mi venenatis dolor, ac auctor ligula dui at turpis.</p>','<h2>Sed terpis</h2>\r\n<p>Sed in turpis eu nisl sagittis eleifend. Curabitur arcu lacus, consectetur in auctor sed, congue in dui. Aenean blandit tellus ut sapien ultrices ut auctor sapien luctus. Etiam nec tellus eu erat aliquet cursus. Nullam non consectetur nisi. Etiam sollicitudin adipiscing enim, nec commodo ante pretium et. Fusce quis purus augue, at convallis sem. Quisque ultrices ligula sed libero molestie iaculis. Vestibulum laoreet viverra quam, ut vulputate sem convallis id. Sed justo nisl, rutrum vel auctor in, dapibus nec diam. Aliquam convallis enim felis. Cras rhoncus molestie vehicula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>',1,1,13287,'2012-06-17 13:12:51',71,'2012-10-12 10:06:17',0,'0000-00-00 00:00:00'),
	(2,2,'Lorem ipsum 2','lorem-ipsum','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum sodales fringilla. Morbi eu congue erat. In vitae sagittis nisl. Proin ante quam, egestas quis ullamcorper ac, pharetra facilisis dolor. Phasellus gravida, libero vitae tincidunt consectetur, purus mi venenatis dolor, ac auctor ligula dui at turpis.</p>','<h2>Sed terpis</h2>\r\n<p>Sed in turpis eu nisl sagittis eleifend. Curabitur arcu lacus, consectetur in auctor sed, congue in dui. Aenean blandit tellus ut sapien ultrices ut auctor sapien luctus. Etiam nec tellus eu erat aliquet cursus. Nullam non consectetur nisi. Etiam sollicitudin adipiscing enim, nec commodo ante pretium et. Fusce quis purus augue, at convallis sem. Quisque ultrices ligula sed libero molestie iaculis. Vestibulum laoreet viverra quam, ut vulputate sem convallis id. Sed justo nisl, rutrum vel auctor in, dapibus nec diam. Aliquam convallis enim felis. Cras rhoncus molestie vehicula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>',0,1,13287,'2012-06-17 13:12:51',13287,'2012-06-21 18:39:21',0,'0000-00-00 00:00:00'),
	(3,3,'Lorem ipsum 3','lorem-ipsum','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum sodales fringilla. Morbi eu congue erat. In vitae sagittis nisl. Proin ante quam, egestas quis ullamcorper ac, pharetra facilisis dolor. Phasellus gravida, libero vitae tincidunt consectetur, purus mi venenatis dolor, ac auctor ligula dui at turpis.</p>','<h2>Sed terpis</h2>\r\n<p>Sed in turpis eu nisl sagittis eleifend. Curabitur arcu lacus, consectetur in auctor sed, congue in dui. Aenean blandit tellus ut sapien ultrices ut auctor sapien luctus. Etiam nec tellus eu erat aliquet cursus. Nullam non consectetur nisi. Etiam sollicitudin adipiscing enim, nec commodo ante pretium et. Fusce quis purus augue, at convallis sem. Quisque ultrices ligula sed libero molestie iaculis. Vestibulum laoreet viverra quam, ut vulputate sem convallis id. Sed justo nisl, rutrum vel auctor in, dapibus nec diam. Aliquam convallis enim felis. Cras rhoncus molestie vehicula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>',1,1,13287,'2012-06-17 13:12:51',13287,'2012-06-20 14:51:15',0,'0000-00-00 00:00:00'),
	(4,4,'Lorem ipsum 4','lorem-ipsum','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum sodales fringilla. Morbi eu congue erat. In vitae sagittis nisl. Proin ante quam, egestas quis ullamcorper ac, pharetra facilisis dolor. Phasellus gravida, libero vitae tincidunt consectetur, purus mi venenatis dolor, ac auctor ligula dui at turpis.</p>','<h2>Sed terpis</h2>\r\n<p>Sed in turpis eu nisl sagittis eleifend. Curabitur arcu lacus, consectetur in auctor sed, congue in dui. Aenean blandit tellus ut sapien ultrices ut auctor sapien luctus. Etiam nec tellus eu erat aliquet cursus. Nullam non consectetur nisi. Etiam sollicitudin adipiscing enim, nec commodo ante pretium et. Fusce quis purus augue, at convallis sem. Quisque ultrices ligula sed libero molestie iaculis. Vestibulum laoreet viverra quam, ut vulputate sem convallis id. Sed justo nisl, rutrum vel auctor in, dapibus nec diam. Aliquam convallis enim felis. Cras rhoncus molestie vehicula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>',1,1,13287,'2012-06-17 13:12:51',13287,'2012-06-20 14:51:15',0,'0000-00-00 00:00:00'),
	(5,5,'Lorem ipsum 5','lorem-ipsum','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum sodales fringilla. Morbi eu congue erat. In vitae sagittis nisl. Proin ante quam, egestas quis ullamcorper ac, pharetra facilisis dolor. Phasellus gravida, libero vitae tincidunt consectetur, purus mi venenatis dolor, ac auctor ligula dui at turpis.</p>','<h2>Sed terpis</h2>\r\n<p>Sed in turpis eu nisl sagittis eleifend. Curabitur arcu lacus, consectetur in auctor sed, congue in dui. Aenean blandit tellus ut sapien ultrices ut auctor sapien luctus. Etiam nec tellus eu erat aliquet cursus. Nullam non consectetur nisi. Etiam sollicitudin adipiscing enim, nec commodo ante pretium et. Fusce quis purus augue, at convallis sem. Quisque ultrices ligula sed libero molestie iaculis. Vestibulum laoreet viverra quam, ut vulputate sem convallis id. Sed justo nisl, rutrum vel auctor in, dapibus nec diam. Aliquam convallis enim felis. Cras rhoncus molestie vehicula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>',1,1,13287,'2012-06-17 13:12:51',13287,'2012-06-20 14:51:15',0,'0000-00-00 00:00:00'),
	(6,6,'Lorem ipsum 6','lorem-ipsum','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum sodales fringilla. Morbi eu congue erat. In vitae sagittis nisl. Proin ante quam, egestas quis ullamcorper ac, pharetra facilisis dolor. Phasellus gravida, libero vitae tincidunt consectetur, purus mi venenatis dolor, ac auctor ligula dui at turpis.</p>','<h2>Sed terpis</h2>\r\n<p>Sed in turpis eu nisl sagittis eleifend. Curabitur arcu lacus, consectetur in auctor sed, congue in dui. Aenean blandit tellus ut sapien ultrices ut auctor sapien luctus. Etiam nec tellus eu erat aliquet cursus. Nullam non consectetur nisi. Etiam sollicitudin adipiscing enim, nec commodo ante pretium et. Fusce quis purus augue, at convallis sem. Quisque ultrices ligula sed libero molestie iaculis. Vestibulum laoreet viverra quam, ut vulputate sem convallis id. Sed justo nisl, rutrum vel auctor in, dapibus nec diam. Aliquam convallis enim felis. Cras rhoncus molestie vehicula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>',1,1,13287,'2012-06-17 13:12:51',13287,'2012-06-20 14:51:15',0,'0000-00-00 00:00:00'),
	(7,1,'Lorem ipsum 7','lorem-ipsum','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum sodales fringilla. Morbi eu congue erat. In vitae sagittis nisl. Proin ante quam, egestas quis ullamcorper ac, pharetra facilisis dolor. Phasellus gravida, libero vitae tincidunt consectetur, purus mi venenatis dolor, ac auctor ligula dui at turpis.</p>','<h2>Sed terpis</h2>\r\n<p>Sed in turpis eu nisl sagittis eleifend. Curabitur arcu lacus, consectetur in auctor sed, congue in dui. Aenean blandit tellus ut sapien ultrices ut auctor sapien luctus. Etiam nec tellus eu erat aliquet cursus. Nullam non consectetur nisi. Etiam sollicitudin adipiscing enim, nec commodo ante pretium et. Fusce quis purus augue, at convallis sem. Quisque ultrices ligula sed libero molestie iaculis. Vestibulum laoreet viverra quam, ut vulputate sem convallis id. Sed justo nisl, rutrum vel auctor in, dapibus nec diam. Aliquam convallis enim felis. Cras rhoncus molestie vehicula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>',1,1,13287,'2012-06-17 13:12:51',13287,'2012-06-20 14:51:15',0,'0000-00-00 00:00:00'),
	(8,2,'Lorem ipsum 8','lorem-ipsum','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum sodales fringilla. Morbi eu congue erat. In vitae sagittis nisl. Proin ante quam, egestas quis ullamcorper ac, pharetra facilisis dolor. Phasellus gravida, libero vitae tincidunt consectetur, purus mi venenatis dolor, ac auctor ligula dui at turpis.</p>','<h2>Sed terpis</h2>\r\n<p>Sed in turpis eu nisl sagittis eleifend. Curabitur arcu lacus, consectetur in auctor sed, congue in dui. Aenean blandit tellus ut sapien ultrices ut auctor sapien luctus. Etiam nec tellus eu erat aliquet cursus. Nullam non consectetur nisi. Etiam sollicitudin adipiscing enim, nec commodo ante pretium et. Fusce quis purus augue, at convallis sem. Quisque ultrices ligula sed libero molestie iaculis. Vestibulum laoreet viverra quam, ut vulputate sem convallis id. Sed justo nisl, rutrum vel auctor in, dapibus nec diam. Aliquam convallis enim felis. Cras rhoncus molestie vehicula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>',1,1,13287,'2012-06-17 13:12:51',13287,'2012-06-20 14:51:15',0,'0000-00-00 00:00:00'),
	(9,3,'Lorem ipsum 9','lorem-ipsum','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum sodales fringilla. Morbi eu congue erat. In vitae sagittis nisl. Proin ante quam, egestas quis ullamcorper ac, pharetra facilisis dolor. Phasellus gravida, libero vitae tincidunt consectetur, purus mi venenatis dolor, ac auctor ligula dui at turpis.</p>','<h2>Sed terpis</h2>\r\n<p>Sed in turpis eu nisl sagittis eleifend. Curabitur arcu lacus, consectetur in auctor sed, congue in dui. Aenean blandit tellus ut sapien ultrices ut auctor sapien luctus. Etiam nec tellus eu erat aliquet cursus. Nullam non consectetur nisi. Etiam sollicitudin adipiscing enim, nec commodo ante pretium et. Fusce quis purus augue, at convallis sem. Quisque ultrices ligula sed libero molestie iaculis. Vestibulum laoreet viverra quam, ut vulputate sem convallis id. Sed justo nisl, rutrum vel auctor in, dapibus nec diam. Aliquam convallis enim felis. Cras rhoncus molestie vehicula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>',1,1,13287,'2012-06-17 13:12:51',13287,'2012-06-20 14:51:15',0,'0000-00-00 00:00:00'),
	(10,4,'Lorem ipsum 10','lorem-ipsum','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum sodales fringilla. Morbi eu congue erat. In vitae sagittis nisl. Proin ante quam, egestas quis ullamcorper ac, pharetra facilisis dolor. Phasellus gravida, libero vitae tincidunt consectetur, purus mi venenatis dolor, ac auctor ligula dui at turpis.</p>','<h2>Sed terpis</h2>\r\n<p>Sed in turpis eu nisl sagittis eleifend. Curabitur arcu lacus, consectetur in auctor sed, congue in dui. Aenean blandit tellus ut sapien ultrices ut auctor sapien luctus. Etiam nec tellus eu erat aliquet cursus. Nullam non consectetur nisi. Etiam sollicitudin adipiscing enim, nec commodo ante pretium et. Fusce quis purus augue, at convallis sem. Quisque ultrices ligula sed libero molestie iaculis. Vestibulum laoreet viverra quam, ut vulputate sem convallis id. Sed justo nisl, rutrum vel auctor in, dapibus nec diam. Aliquam convallis enim felis. Cras rhoncus molestie vehicula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>',1,1,13287,'2012-06-17 13:12:51',13287,'2012-06-20 14:51:15',0,'0000-00-00 00:00:00'),
	(11,5,'Lorem ipsum 11','lorem-ipsum','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum sodales fringilla. Morbi eu congue erat. In vitae sagittis nisl. Proin ante quam, egestas quis ullamcorper ac, pharetra facilisis dolor. Phasellus gravida, libero vitae tincidunt consectetur, purus mi venenatis dolor, ac auctor ligula dui at turpis.</p>','<h2>Sed terpis</h2>\r\n<p>Sed in turpis eu nisl sagittis eleifend. Curabitur arcu lacus, consectetur in auctor sed, congue in dui. Aenean blandit tellus ut sapien ultrices ut auctor sapien luctus. Etiam nec tellus eu erat aliquet cursus. Nullam non consectetur nisi. Etiam sollicitudin adipiscing enim, nec commodo ante pretium et. Fusce quis purus augue, at convallis sem. Quisque ultrices ligula sed libero molestie iaculis. Vestibulum laoreet viverra quam, ut vulputate sem convallis id. Sed justo nisl, rutrum vel auctor in, dapibus nec diam. Aliquam convallis enim felis. Cras rhoncus molestie vehicula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>',1,1,13287,'2012-06-17 13:12:51',13287,'2012-06-20 14:51:15',0,'0000-00-00 00:00:00');

/*!40000 ALTER TABLE `jos_news_articles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_news_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_news_categories`;

CREATE TABLE `jos_news_categories` (
  `news_category_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL,
  `locked_on` datetime DEFAULT NULL,
  `locked_by` int(10) unsigned DEFAULT NULL,
  `params` text,
  PRIMARY KEY (`news_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jos_news_categories` WRITE;
/*!40000 ALTER TABLE `jos_news_categories` DISABLE KEYS */;

INSERT INTO `jos_news_categories` (`news_category_id`, `title`, `slug`, `description`, `ordering`, `enabled`, `created_on`, `created_by`, `modified_on`, `modified_by`, `locked_on`, `locked_by`, `params`)
VALUES
	(1,'Lorem','lorem','',2,1,'2012-03-13 14:39:17',12575,'2012-06-16 14:03:02',71,'0000-00-00 00:00:00',0,'{\"color\":\"pomegranate\"}'),
	(2,'Ipsum','ipsum','',3,1,'2012-03-14 10:57:00',64,'2012-06-16 14:06:03',71,'0000-00-00 00:00:00',0,'{\"color\":\"earls-green\"}'),
	(3,'Turpis','turpis','',4,1,'2012-03-14 10:57:11',64,'2012-06-16 14:06:18',71,'0000-00-00 00:00:00',0,'{\"color\":\"pacific-blue\"}'),
	(4,'Vehicula','vehicula','',5,1,'2012-03-14 10:57:24',64,'2012-06-21 09:38:12',71,'0000-00-00 00:00:00',0,'{\"color\":\"green-vogue\"}'),
	(5,'Luctus','luctus','',1,1,'2012-03-14 11:09:11',64,'2012-06-16 14:05:48',71,'0000-00-00 00:00:00',0,'{\"color\":\"tallow\"}'),
	(6,'Pretium','pretium','',0,1,'2012-05-28 12:34:25',71,'2012-06-16 14:05:27',71,'0000-00-00 00:00:00',0,'{\"color\":\"sea-buckthorn\"}');

/*!40000 ALTER TABLE `jos_news_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_news_subscriptions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_news_subscriptions`;

CREATE TABLE `jos_news_subscriptions` (
  `news_article_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`news_article_id`,`user_id`),
  KEY `idx_type_row` (`news_article_id`),
  CONSTRAINT `jos_news_subscriptions_ibfk_1` FOREIGN KEY (`news_article_id`) REFERENCES `jos_news_articles` (`news_article_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jos_news_subscriptions` WRITE;
/*!40000 ALTER TABLE `jos_news_subscriptions` DISABLE KEYS */;

INSERT INTO `jos_news_subscriptions` (`news_article_id`, `user_id`)
VALUES
	(1,71),
	(1,13287),
	(1,13288),
	(3,13288);

/*!40000 ALTER TABLE `jos_news_subscriptions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_plugins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_plugins`;

CREATE TABLE `jos_plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `element` varchar(100) NOT NULL DEFAULT '',
  `folder` varchar(100) NOT NULL DEFAULT '',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `iscore` tinyint(3) NOT NULL DEFAULT '0',
  `client_id` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_folder` (`published`,`client_id`,`access`,`folder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `jos_plugins` WRITE;
/*!40000 ALTER TABLE `jos_plugins` DISABLE KEYS */;

INSERT INTO `jos_plugins` (`id`, `name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`)
VALUES
	(1,'Authentication - Joomla','joomla','authentication',0,1,1,1,0,0,'0000-00-00 00:00:00',''),
	(5,'User - Joomla!','joomla','user',0,0,1,0,0,0,'0000-00-00 00:00:00','autoregister=1\n\n'),
	(6,'Search - Content','content','search',0,1,1,1,0,0,'0000-00-00 00:00:00','search_limit=50\nsearch_content=1\nsearch_uncategorised=1\nsearch_archived=1\n\n'),
	(7,'Search - Contacts','contacts','search',0,3,0,1,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),
	(8,'Search - Categories','categories','search',0,4,0,0,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),
	(9,'Search - Sections','sections','search',0,5,0,0,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),
	(10,'Search - Newsfeeds','newsfeeds','search',0,6,0,0,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),
	(11,'Search - Weblinks','weblinks','search',0,2,0,1,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),
	(12,'Content - Pagebreak','pagebreak','content',0,10000,0,1,0,0,'0000-00-00 00:00:00','enabled=1\ntitle=1\nmultipage_toc=1\nshowall=1\n\n'),
	(14,'Content - Email Cloaking','emailcloak','content',0,5,1,0,0,0,'0000-00-00 00:00:00','mode=1\n\n'),
	(16,'Content - Load Module','loadmodule','content',0,6,1,0,0,0,'0000-00-00 00:00:00','enabled=1\nstyle=xhtml\n\n'),
	(17,'Content - Page Navigation','pagenavigation','content',0,2,1,1,0,0,'0000-00-00 00:00:00','position=1\n\n'),
	(19,'Editor - TinyMCE','tinymce','editors',0,0,1,1,0,0,'0000-00-00 00:00:00','mode=advanced\nskin=0\ncompressed=0\ncleanup_startup=0\ncleanup_save=2\nentity_encoding=raw\nlang_mode=0\nlang_code=en\ntext_direction=ltr\ncontent_css=1\ncontent_css_custom=\nrelative_urls=1\nnewlines=0\ninvalid_elements=applet\nextended_elements=\ntoolbar=top\ntoolbar_align=left\nhtml_height=550\nhtml_width=750\nelement_path=1\nfonts=1\npaste=1\nsearchreplace=1\ninsertdate=1\nformat_date=%Y-%m-%d\ninserttime=1\nformat_time=%H:%M:%S\ncolors=1\ntable=1\nsmilies=1\nmedia=1\nhr=1\ndirectionality=1\nfullscreen=1\nstyle=1\nlayer=1\nxhtmlxtras=1\nvisualchars=1\nnonbreaking=1\ntemplate=0\nadvimage=1\nadvlink=1\nautosave=1\ncontextmenu=1\ninlinepopups=1\nsafari=1\ncustom_plugin=\ncustom_button=\n\n'),
	(21,'Editor Button - Image','image','editors-xtd',0,0,1,0,0,0,'0000-00-00 00:00:00',''),
	(22,'Editor Button - Pagebreak','pagebreak','editors-xtd',0,0,0,0,0,0,'0000-00-00 00:00:00',''),
	(23,'Editor Button - Readmore','readmore','editors-xtd',0,0,1,0,0,0,'0000-00-00 00:00:00',''),
	(26,'System - Koowa','koowa','system',0,1,1,1,0,0,'0000-00-00 00:00:00',''),
	(27,'System - SEF','sef','system',0,2,1,0,0,0,'0000-00-00 00:00:00',''),
	(28,'System - Debug','debug','system',0,3,0,0,0,0,'0000-00-00 00:00:00','queries=1\nmemory=1\nlangauge=1\n\n'),
	(29,'System - Legacy','legacy','system',0,4,1,1,0,0,'0000-00-00 00:00:00',''),
	(30,'System - Cache','cache','system',0,5,0,1,0,0,'0000-00-00 00:00:00','browsercache=0\ncachetime=15\n\n'),
	(31,'Authentication - Subscriptions','subscriptions','authentication',0,1,0,1,0,72,'2011-07-13 02:52:31',''),
	(32,'Editor - CodeMirror','codemirror','editors',0,0,1,0,0,0,'0000-00-00 00:00:00','linenumbers=0\ntabmode=indent\n\n'),
	(33,'Koowa - Subscriptions','subscriptions','koowa',0,0,1,0,0,0,'0000-00-00 00:00:00',''),
	(34,'System - Expire','expire','system',0,6,1,1,0,0,'0000-00-00 00:00:00',''),
	(35,'Koowa - Users','users','koowa',0,0,1,0,0,0,'0000-00-00 00:00:00',''),
	(36,'System - Access switch','access','system',0,0,1,0,0,0,'0000-00-00 00:00:00',''),
	(37,'Search - Events','events','search',0,0,1,0,0,0,'0000-00-00 00:00:00',''),
	(38,'Search - Articles','articles','search',0,0,1,0,0,0,'0000-00-00 00:00:00',''),
	(39,'Koowa - SSO','sso','koowa',0,0,0,0,0,0,'0000-00-00 00:00:00',''),
	(40,'Authentication - SSO','sso','authentication',0,0,1,0,0,0,'0000-00-00 00:00:00','');

/*!40000 ALTER TABLE `jos_plugins` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_sections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_sections`;

CREATE TABLE `jos_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `image` text NOT NULL,
  `scope` varchar(50) NOT NULL DEFAULT '',
  `image_position` varchar(30) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_scope` (`scope`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table jos_session
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_session`;

CREATE TABLE `jos_session` (
  `username` varchar(150) DEFAULT '',
  `time` varchar(14) DEFAULT '',
  `session_id` varchar(200) NOT NULL DEFAULT '0',
  `guest` tinyint(4) DEFAULT '1',
  `userid` int(11) DEFAULT '0',
  `usertype` varchar(50) DEFAULT '',
  `gid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `client_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `data` longtext,
  PRIMARY KEY (`session_id`(64)),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jos_session` WRITE;
/*!40000 ALTER TABLE `jos_session` DISABLE KEYS */;

INSERT INTO `jos_session` (`username`, `time`, `session_id`, `guest`, `userid`, `usertype`, `gid`, `client_id`, `data`)
VALUES
	('admin','1404474548','76383c71ca15341a27af97a1b5670ddd',0,71,'Super Administrator',25,0,'__default|a:5:{s:8:\"registry\";O:9:\"JRegistry\":3:{s:17:\"_defaultNameSpace\";s:7:\"session\";s:9:\"_registry\";a:1:{s:7:\"session\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:4:\"user\";O:5:\"JUser\":19:{s:2:\"id\";s:2:\"71\";s:4:\"name\";s:9:\"Steve Woz\";s:8:\"username\";s:5:\"admin\";s:5:\"email\";s:14:\"tom@timble.net\";s:8:\"password\";s:65:\"6d0069cf74f0284651022aaeaf579047:HC7ZG6dND56D3BTtau2chsGTcE3C3Bzg\";s:14:\"password_clear\";s:0:\"\";s:8:\"usertype\";s:19:\"Super Administrator\";s:5:\"block\";s:1:\"0\";s:9:\"sendEmail\";s:1:\"0\";s:3:\"gid\";s:2:\"25\";s:12:\"registerDate\";s:19:\"2009-12-05 17:28:41\";s:13:\"lastvisitDate\";s:19:\"2014-07-04 10:29:46\";s:10:\"activation\";s:0:\"\";s:6:\"params\";s:61:\"admin_language=en-GB\nlanguage=\neditor=codemirror\ntimezone=1\n\n\";s:3:\"aid\";i:2;s:5:\"guest\";i:0;s:7:\"_params\";O:10:\"JParameter\":7:{s:4:\"_raw\";s:0:\"\";s:4:\"_xml\";N;s:9:\"_elements\";a:0:{}s:12:\"_elementPath\";a:1:{i:0;s:97:\"/Users/Jannes/Sites/police/timble-belgian-police-intranet/libraries/joomla/html/parameter/element\";}s:17:\"_defaultNameSpace\";s:8:\"_default\";s:9:\"_registry\";a:1:{s:8:\"_default\";a:1:{s:4:\"data\";O:8:\"stdClass\":4:{s:14:\"admin_language\";s:5:\"en-GB\";s:8:\"language\";s:0:\"\";s:6:\"editor\";s:10:\"codemirror\";s:8:\"timezone\";s:1:\"1\";}}}s:7:\"_errors\";a:0:{}}s:9:\"_errorMsg\";N;s:7:\"_errors\";a:0:{}}s:13:\"session.token\";s:32:\"12505df3dffd817f923be45265b36565\";s:4:\"site\";s:7:\"default\";s:17:\"application.queue\";a:1:{i:0;a:2:{s:7:\"message\";s:21:\"You must log in first\";s:4:\"type\";s:7:\"message\";}}}'),
	('','1404474631','hnavejr9eka927u27c49fd29r4',1,0,'',0,1,'__default|a:3:{s:8:\"registry\";O:9:\"JRegistry\":3:{s:17:\"_defaultNameSpace\";s:7:\"session\";s:9:\"_registry\";a:1:{s:7:\"session\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:4:\"user\";O:5:\"JUser\":19:{s:2:\"id\";i:0;s:4:\"name\";N;s:8:\"username\";N;s:5:\"email\";N;s:8:\"password\";N;s:14:\"password_clear\";s:0:\"\";s:8:\"usertype\";N;s:5:\"block\";N;s:9:\"sendEmail\";i:0;s:3:\"gid\";i:0;s:12:\"registerDate\";N;s:13:\"lastvisitDate\";N;s:10:\"activation\";N;s:6:\"params\";N;s:3:\"aid\";i:0;s:5:\"guest\";i:1;s:7:\"_params\";O:10:\"JParameter\":7:{s:4:\"_raw\";s:0:\"\";s:4:\"_xml\";N;s:9:\"_elements\";a:0:{}s:12:\"_elementPath\";a:1:{i:0;s:97:\"/Users/Jannes/Sites/police/timble-belgian-police-intranet/libraries/joomla/html/parameter/element\";}s:17:\"_defaultNameSpace\";s:8:\"_default\";s:9:\"_registry\";a:1:{s:8:\"_default\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:9:\"_errorMsg\";N;s:7:\"_errors\";a:0:{}}s:13:\"session.token\";s:32:\"cf3c0b348802d58d650b901db7edf855\";}');

/*!40000 ALTER TABLE `jos_session` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_templates_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_templates_menu`;

CREATE TABLE `jos_templates_menu` (
  `template` varchar(255) NOT NULL DEFAULT '',
  `menuid` int(11) NOT NULL DEFAULT '0',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menuid`,`client_id`,`template`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `jos_templates_menu` WRITE;
/*!40000 ALTER TABLE `jos_templates_menu` DISABLE KEYS */;

INSERT INTO `jos_templates_menu` (`template`, `menuid`, `client_id`)
VALUES
	('jt-v5',0,0),
	('khepri',0,1);

/*!40000 ALTER TABLE `jos_templates_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_users`;

CREATE TABLE `jos_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `usertype` varchar(25) NOT NULL DEFAULT '',
  `block` tinyint(4) NOT NULL DEFAULT '0',
  `sendEmail` tinyint(4) DEFAULT '0',
  `gid` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `registerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `avatar` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `gid_block` (`gid`,`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `jos_users` WRITE;
/*!40000 ALTER TABLE `jos_users` DISABLE KEYS */;

INSERT INTO `jos_users` (`id`, `name`, `username`, `email`, `password`, `usertype`, `block`, `sendEmail`, `gid`, `registerDate`, `lastvisitDate`, `activation`, `params`, `avatar`)
VALUES
	(71,'Steve Woz','admin','admin@example.com','ad0549659d87c5032a8f45fd866a60ec:8jksmnlzW4lFmSosy0pj5bVW5gR0lXLX','Super Administrator',0,0,25,'2009-12-05 17:28:41','2014-07-04 11:50:31','','admin_language=en-GB\nlanguage=\neditor=codemirror\ntimezone=1\n\n','data:image/png;base64,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'),
	(13288,'Tim Burns','P0000000002','tim.burns@example.com','27756f2b709f5661f5fd482ddc950206:0m5mr00p99hhgrJFlBksZy875QCmjdd7','Registered',0,0,18,'2012-06-16 10:49:12','2012-06-27 14:18:47','','language=\ntimezone=1\n\n','data:image/png;base64,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'),
	(13287,'John Jobs','P0000000001','john.jobs@example.com','38ab987e7bd00536b938a72bd26a5d41:09xjD440XL0c4dY7yPlp63RFuQJJaDNC','Administrator',0,0,24,'2012-06-16 10:48:35','2012-06-27 14:18:48','','admin_language=\nlanguage=\neditor=\ntimezone=1\n\n','data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALYAAAC2CAYAAAB08HcEAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABV0RVh0Q3JlYXRpb24gVGltZQA2LzIwLzA4DqTMIgAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNAay06AAAAhqSURBVHic7d1Ra9tIGIXhk/WAQgUWqFjgEEMvfNf//yd6V2jABYMLKjHIVCCBQgUK3YuibJptEtuRPTrfnAd6tWU7KG/GI2ksXdR1/QsixvzjewAip6CwxSSFLSYpbDFJYYtJCltMUthiksIWkxS2mKSwxSSFLSYpbDFJYYtJCltMUthiksIWkxS2mKSwxSTnewChadsWP3/+fPa/tW0LAIjjGJPJBM45xHF8ziGaoLAP1DQNuq5DXdcAgK7r0DTNH3/n7u4OXdcN9m9GUYSrqyvM5/PB/p/WXejLvK9r2xa3t7coy/JhRvUhiiIsFgtkWeZtDCwU9gu6rsN2u0We576H8ockSbBcLhFFke+hjJbCfkZZlthsNl5n6Jc45/Dx40etv5+hsJ9o2xbr9RpVVfkeyl6yLEOapkjT1PdQRkVhA6iqCnd3d6iqCmVZ+h7OUZxzD4Er8sDD7tfPQ17BGAPnHGazGbIsC3apEmTYXdfh69evNMuNtwj1RDO4sLuuw83Nzf+uPVvmnMNyuQxqiRLcLfX1eh1U1MDvX+bVaoWiKHwP5WyCCjvPc9qTwyGs1+vRXZM/lWDCbpommB/qS/I8x3q99j2MkzO/V6TrOuR5ju1263soo9EvSZbLpeeRnI7psMd+99CnoigQx7HZjVUmw27bFpvNJuj19D42mw2m06nJa93mLvdZvelyKs45fPjwwdyOQTNht22L1WoV3KW8oSRJguvrayRJ4nsogzBzVaRtW0X9BlVVmbpxZSZsGYaVmzgKW/5g5YRbYcsf2rY1EbeZsHUVZDgWbmaZCLtpmiBuE59LVVX0W3rpw+66Duv1WjP2wL5//+57CG9CH3aI21DPoaoq6iUJddihb0M9tTzPaScN2rCrqtI21BPrv6DAuMyjDLtfV8vptW1LuSShDDvPc21FPaPtdks3a9OF3TQN5QzCrH/UGxO6sL99++Z7CEFi20NCFXbTNPQ3Dlix3WqnCpvt49AahX0iTAfWIqZPS5qw67qmOzO35vGrRMaOJuzn3tsi56WwB8ZyQK1j+dSkCVvGgWWdTRM262Yca/q3pY0dTdj39/e+hyD473WAY0cTtowHw6ytsOVgDOtshS0H04wtJjGcyCtsOcrY41bYcpSxX6VS2HKUyWTiewgvogl7Op36HoI8MvaHxdOELePB8AxthS0HY3gRqsKWgzEsCxW2HCSKotGvrwGisBkOZggY1tcAUdjOmXxzHx2GZQhAFLaMw+Xlpe8h7IUmbC1F5BA0YU8mEy1HZG80YQOatceA4dszAFnYLCculo19V1+PKmzN2LIvhS0mUYUdRRGiKPI9DCFAFTagWVv2o7Blb845ZFnmexh7oQubZa+CRfP5nGYpSBe2+MMyWwOEYf/48cP3EIKUJAnNbA2Qhd11HXa7ne9hBInhWzOPUYXN+L5BK1juOPbowhY/iqLA58+faSYWmrCLoqA5qFY1TUPz/nqasPXGsHHYbrcUr01R2HIwhT0QhsfWhoTh7i9F2DIezrnRP7cPIAmbYYYIBcvPgiJsfd9xPFi+xUQRNsBzQK3TjD0w7eobB5b9IjRha8YeB83YA4vjmGa2sIrpU5MmbIBvh5k179698z2EvVGF/f79e99DCJpm7BOZTqe67OcRy/oaIAsb0HLEF+cc1TmOwpa9MM3WAGnYWo6cH9vlVrqwAc3aPmjGPgO22cMChX0GbAeZHduJI6CwZQ+Mn5CUYQOK+5wYz2kUtryK8Y4vbdiMH4+M0jSl+CrYU7RhM+1bYMa4DAGIw46iiPags4iiiOoJq4/Rhg0Ai8XC9xBMYz6+1GHHcYzlcul7GCZlWUY7WwPARV3Xv3wP4q3qusZms6F7IugYOeewWCwwn899D+VNTITdU+BvkyQJlssl3V3GvzEVNgDc39/jy5cvivtAy+WSeunxFPUa+28mkwn9x+i5xXFsKmrAYNgAcHl56XsIVCwsPZ4yGTbjnTKfLG5PMBn2/f297yFQsXgX12TYmrEPoxmbhMUf1KmwbnJ6jcmwAcW9L2tXQ3pmw9YGqdc558weJ4UdsNls5nsIJ2M2bD2d9XVWlyGA4bABzdoviaLI9HmI6bAtz0hvZf2X3nTYWo48z/ovvemwAeDq6sr3EEbH+jIECCBs6x+5xwjhmJgPO4TZ6VAW94Y8ZT5sANqf/YjlmzKPBRG29mf/J5QHDQURdig/zH2EMFsDgYQN2PyWyDFCOd8IJmwtR35T2MZoxkZQ7+5R2AEJZbYGAgpbwhJM2CF9DEtAYYf0Mfycrut8D+Fsgglbjzz7fQyqqvI9jLMIIuymaZDnue9hjMLNzQ1WqxXatvU9lJMy91DKp7bbLfI8D+pjeF9JkuD6+trkpiiTYXddh91uh9vbW/Mz0xDiOMZ8Pjf15QMzYbdti7IsUVUVyrL0PRxKzrmHwNmv+1OH3TQNiqJAXdc6ORxYlmWYzWa0yxS6sMuyfPijdfPp9cuUNE2p7gVQhK2Y/eu/oLBYLCiWKaMNWzGPV5IkmM1moz7ZHFXYipmLcw6z2QxXV1ejm8W9h92fAJZlqUtzxNI0RZZlo/mGjpew+0tzus5sT/+aat+XDM8Wdtd1KMsS2+1Wl+YCkabpw59zX1E5edj9MkM3TcLVX1Hp/5zDScLWSaA851yRDxa2TgLlUKeM/E1h6yRQhjJ05AeH3Z8E7na7YDaty3kNEfneYfdr5qIojvqHRI5xbOQvht2vm3e7nU4CxbtDIv9f2G3boigKFEWhdbOMVh/5dDr963Xyi7quf+nmibB7ejPo4tOnT79080QsSdMU/yhqsaYsyzAevyDhUdhiksIWkxS2mKSwxSSFLSYpbDFJYYtJCltMUthiksIWk/4Fu86YRNLd+QsAAAAASUVORK5CYII='),
	(13286,'Demo','demo','demo@example.com','6d0069cf74f0284651022aaeaf579047:HC7ZG6dND56D3BTtau2chsGTcE3C3Bzg','Registered',0,0,18,'2012-06-12 12:47:21','2012-06-12 12:47:28','','admin_language=\nlanguage=\neditor=\ntimezone=1\n\n','data:image/png;base64,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');

/*!40000 ALTER TABLE `jos_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jos_versions_revisions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jos_versions_revisions`;

CREATE TABLE `jos_versions_revisions` (
  `table` varchar(64) NOT NULL,
  `row` bigint(20) unsigned NOT NULL,
  `revision` bigint(20) unsigned NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `data` longtext NOT NULL COMMENT '@Filter("json")',
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`table`,`row`,`revision`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
