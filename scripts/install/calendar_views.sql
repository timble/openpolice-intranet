DROP VIEW IF EXISTS
    `jos_calendar_view_events`;

CREATE ALGORITHM = MERGE VIEW `jos_calendar_view_events` AS
    SELECT
        `event`.*,
        `creator`.`name` AS `created_by_name`,
        `creator`.`email` AS `created_by_email`,
        `modifier`.`name` AS `modified_by_name`
    FROM
        `jos_calendar_events` AS `event`
    LEFT JOIN
        `jos_users` AS `creator` ON `event`.`created_by` = `creator`.`id`
    LEFT JOIN
        `jos_users` AS `modifier` ON `event`.`modified_by` = `modifier`.`id`;