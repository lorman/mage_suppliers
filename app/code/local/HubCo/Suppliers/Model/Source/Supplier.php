<?php
class HubCo_Suppliers_Model_Source_Suppliers
    extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    public function getAllOptions()
    {
        $supplierCollection = Mage::getModel('hubco_suppliers/supplier')->getCollection()
            ->setOrder('name', 'ASC');

        $options = array(
            array(
                'label' => '',
                'value' => '',
            ),
        );

        foreach ($supplierCollection as $_supplier) {
            $options[] = array(
                'label' => $_supplier->getName(),
                'value' => $_supplier->getId(),
            );
        }

        return $options;
    }
}