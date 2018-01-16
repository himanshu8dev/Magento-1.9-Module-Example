<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
CREATE TABLE IF NOT EXISTS `himanshu_example` (
        `id` int(13) NOT NULL AUTO_INCREMENT,
        `name` char(255) NOT NULL,
        `description` text,
        `is_active` tinyint(1) DEFAULT '0',
        `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 