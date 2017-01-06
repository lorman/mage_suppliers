<?php


class HubCo_Suppliers_Block_Adminhtml_Supplier extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_supplier";
	$this->_blockGroup = "suppliers";
	$this->_headerText = Mage::helper("suppliers")->__("Supplier Manager");
	$this->_addButtonLabel = Mage::helper("suppliers")->__("Add New Item");
	parent::__construct();
	
	}

}