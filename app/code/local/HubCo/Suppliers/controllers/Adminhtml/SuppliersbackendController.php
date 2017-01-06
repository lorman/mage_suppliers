<?php
class HubCo_Suppliers_Adminhtml_SuppliersbackendController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("Suupliers"));
	   $this->renderLayout();
    }
}