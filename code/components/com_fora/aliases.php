<?php
KService::setAlias('com://admin/attachments.controller.behavior.executable', 'com://site/fora.controller.behavior.executable');
KService::setAlias('com://admin/files.controller.behavior.executable', 'com://site/fora.controller.behavior.executable');

KService::setAlias('com://site/fora.database.table.comments', 'com://admin/fora.database.table.comments');

KService::setAlias('com://site/fora.model.categories', 'com://admin/fora.model.categories');
KService::setAlias('com://site/fora.model.comments', 'com://admin/fora.model.comments');
KService::setAlias('com://site/fora.model.forums', 'com://admin/fora.model.forums');
KService::setAlias('com://site/fora.model.subscriptions', 'com://admin/fora.model.subscriptions');
KService::setAlias('com://site/fora.model.topics', 'com://admin/fora.model.topics');
KService::setAlias('com://site/fora.model.votes', 'com://admin/fora.model.votes');

KService::setAlias('com://site/fora.model.activities', 'com://admin/fora.model.activities');

KService::setAlias('com://site/fora.template.helper.listbox', 'com://admin/fora.template.helper.listbox');