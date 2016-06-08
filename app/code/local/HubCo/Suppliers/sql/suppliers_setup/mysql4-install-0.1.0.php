<?php

$this->startSetup();

$this->run("

  DROP TABLE IF EXISTS `{$this->getTable('suppliers/supplier')}`;
  CREATE TABLE `{$this->getTable('suppliers/supplier')}` (
    `supplier_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(45) DEFAULT NULL,
    PRIMARY KEY (`supplier_id`),
    UNIQUE KEY `name` (`name`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$this->endSetup();
