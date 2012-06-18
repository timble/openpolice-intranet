INSERT INTO `jos_files_containers` (`files_container_id`, `slug`, `title`, `path`, `parameters`)
VALUES
	('', 'downloads-downloads', 'Downloads', 'downloads', '{\"thumbnails\": false,\"maximum_size\":\"10485760\",\"allowed_extensions\": [\"pdf\"],\"allowed_mimetypes\": [\"application/pdf\"]}');
	
INSERT INTO `jos_components` (`id`, `name`, `link`, `menuid`, `parent`, `admin_menu_link`, `admin_menu_alt`, `option`, `ordering`, `admin_menu_img`, `iscore`, `params`, `enabled`)
VALUES
	('', 'Downloads', 'option=com_downloads', 0, 0, 'option=com_downloads', 'Downloads', 'com_downloads', 0, '', 0, '', 1);