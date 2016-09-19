<?php

class HubCo_Suppliers_Model_Supplier extends Mage_Core_Model_Abstract
{
    protected function _construct(){

       $this->_init("suppliers/supplier");

    }

    public function toOptionList($multi = false)
    {
      $suppliers = array();
      $allSuppliersCollection = Mage::getModel('suppliers/supplier')
      ->getCollection();
      $allSuppliers = $allSuppliersCollection->load()->toArray();
      foreach ($allSuppliers['items'] as $supplier)
      {
        if (!isset($supplier['name'])) {
          continue;
        }
        if ($multi)
        {
          $suppliers[$supplier['supplier_id']] = array(
              'value' => $supplier['supplier_id'],
              'label' => $supplier['name']
          );
        }
        else
        {
          $suppliers[$supplier['supplier_id']] = $supplier['name'];
        }
      }

      return $suppliers;
    }

}
