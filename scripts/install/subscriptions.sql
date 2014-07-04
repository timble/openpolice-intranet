CREATE TABLE `jos_news_subscriptions` (
  `news_article_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`news_article_id`,`user_id`),
  KEY `idx_type_row` (`news_article_id`),
  CONSTRAINT `jos_news_subscriptions_ibfk_1` FOREIGN KEY (`news_article_id`) REFERENCES `jos_news_articles` (`news_article_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 
