<?php

$this->startSetup();

$this->run("

  ALTER TABLE `{$this->getTable('suppliers/supplier')}`
    ADD po_supplier_id INT(3) DEFAULT 0 NOT NULL AFTER name ;
");

$this->endSetup();
