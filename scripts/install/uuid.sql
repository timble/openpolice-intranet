ALTER TABLE ADD `uuid` char(36) NOT NULL;

CREATE OR REPLACE ALGORITHM = MERGE VIEW `jos_news_view_articles` AS
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