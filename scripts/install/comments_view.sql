CREATE ALGORITHM = MERGE VIEW `jos_comments_view_comments` AS 
	SELECT
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
	FROM
		`jos_comments_comments` AS `comment`
	LEFT JOIN `jos_users` `creator` ON `creator`.`id` = `comment`.`created_by`;