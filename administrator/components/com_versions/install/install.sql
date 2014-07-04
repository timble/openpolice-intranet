-- $Id: install.sql 670 2010-10-27 01:09:24Z johanjanssens $

CREATE TABLE `jos_versions_revisions` (
  `table` varchar(64) NOT NULL,
  `row` bigint(20) unsigned NOT NULL,
  `revision` bigint(20) unsigned NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `data` longtext NOT NULL COMMENT '@Filter("json")',
  `status` varchar(100) NOT NULL,
  PRIMARY KEY  (`table`,`row`,`revision`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;