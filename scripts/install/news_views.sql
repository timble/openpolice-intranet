DROP VIEW IF EXISTS
    `jos_news_view_articles_comments_latest`,
    `jos_news_view_articles_comments_total`,
    `jos_news_view_articles`;

CREATE ALGORITHM = MERGE VIEW `jos_news_view_articles_comments_latest` AS
    SELECT
        `comment`.`row` AS `news_article_id`,
        `comment`.`created_on`,
        `comment`.`created_by`,
        `comment`.`created_by_name`
    FROM
        `jos_comments_view_comments` AS `comment`
    LEFT JOIN
        `jos_comments_comments` AS `comment_helper` ON (`comment_helper`.`table` = 'news_articles' AND `comment_helper`.`row` = `comment`.`row` AND `comment`.`comments_comment_id` < `comment_helper`.`comments_comment_id`)
    WHERE
        `comment`.`table` = 'news_articles' AND
        `comment_helper`.`comments_comment_id` IS NULL
    GROUP BY `news_article_id`;

CREATE ALGORITHM = MERGE VIEW `jos_news_view_articles_comments_total` AS
    SELECT
        `row` AS `news_article_id`,
        COUNT(`comments_comment_id`) AS `total`
    FROM
        `jos_comments_view_comments`
    WHERE
        `table` = 'news_articles'
    GROUP BY
        `row`;

CREATE ALGORITHM = MERGE VIEW `jos_news_view_articles` AS
    SELECT
        `article`.*,
        `category`.`title` AS `category_title`,
        `category`.`slug` AS `category_slug`,
        `creator`.`name` AS `created_by_name`,
        `creator`.`email` AS `created_by_email`,
        `modifier`.`name` AS `modified_by_name`,
        `comment_latest`.`created_on` AS `last_commented_on`,
        `comment_latest`.`created_by` AS `last_commented_by`,
        `comment_latest`.`created_by_name` AS `last_commented_by_name`,
        IFNULL(`comment_total`.`total`, 0) AS `total_comments`
    FROM
        `jos_news_articles` AS `article`
    LEFT JOIN
        `jos_users` AS `creator` ON `article`.`created_by` = `creator`.`id`
    LEFT JOIN
        `jos_users` AS `modifier` ON `article`.`modified_by` = `modifier`.`id`
    LEFT JOIN
        `jos_news_categories` AS `category` USING (`news_category_id`)
    LEFT JOIN
        `jos_news_view_articles_comments_latest` AS `comment_latest` USING (`news_article_id`)
    LEFT JOIN
        `jos_news_view_articles_comments_total` AS `comment_total` USING (`news_article_id`)
    GROUP BY
        `article`.`news_article_id`;