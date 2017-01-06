<?php
class HubCo_Suppliers_Model_Mysql4_Supplier extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("suppliers/supplier", "supplier_id");
    }
}