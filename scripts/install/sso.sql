INSERT INTO  `police_intranet`.`jos_plugins` (`id` ,`name` ,`element` ,`folder` ,`access` ,`ordering` ,`published` ,`iscore` ,`client_id` ,`checked_out` ,`checked_out_time` ,`params`)
VALUES 
(NULL ,  'Koowa - SSO',  'sso',  'koowa',  '0',  '0',  '1',  '0',  '0',  '0',  '0000-00-00 00:00:00',  ''),
(NULL ,  'Authentication - SSO',  'sso',  'authentication',  '0',  '0',  '1',  '0',  '0',  '0',  '0000-00-00 00:00:00',  '');

INSERT INTO `jos_users` (`id`, `name`, `username`, `email`, `password`, `usertype`, `block`, `sendEmail`, `gid`, `registerDate`, `lastvisitDate`, `activation`, `params`) VALUES
(13287, 'Beheerder', 'P0000000001', 'P0000000001@intra.net', '38ab987e7bd00536b938a72bd26a5d41:09xjD440XL0c4dY7yPlp63RFuQJJaDNC', 'Super Administrator', 0, 0, 25, '2012-06-16 10:48:35', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\ntimezone=1\n\n'),
(13288, 'Gebruiker', 'P0000000002', 'P0000000002@intra.net', '27756f2b709f5661f5fd482ddc950206:0m5mr00p99hhgrJFlBksZy875QCmjdd7', 'Registered', 0, 0, 18, '2012-06-16 10:49:12', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\ntimezone=1\n\n');

INSERT INTO `jos_core_acl_aro` (`id`, `section_value`, `value`, `order_value`, `name`, `hidden`) VALUES 
(13230, 'users', '13287', 0, 'Beheerder', 0),
(13231, 'users', '13288', 0, 'Gebruiker', 0);

INSERT INTO `jos_core_acl_groups_aro_map` (`group_id`, `section_value`, `aro_id`) VALUES
(18, '', 13231),
(25, '', 13230);

UPDATE `jos_users` SET `name`='Wilfried Pasmans' WHERE `username` = 'P0000000002';
UPDATE `jos_users` SET `name`='Eddy Naessens' WHERE `username` = 'P0000000001';

