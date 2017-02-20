<?php

$this->startSetup();

$this->run("

  ALTER TABLE `{$this->getTable('suppliers/supplier')}`
    ADD attr_qty VARCHAR(32) NOT NULL AFTER name,
    ADD attr_price VARCHAR(32) NOT NULL,
    ADD attr_part_num VARCHAR(32) NOT NULL;
");

$this->endSetup();
