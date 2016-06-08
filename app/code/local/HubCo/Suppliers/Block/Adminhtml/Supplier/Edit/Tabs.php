<?php
class HubCo_Suppliers_Block_Adminhtml_Supplier_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("supplier_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("suppliers")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("suppliers")->__("Item Information"),
				"title" => Mage::helper("suppliers")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("suppliers/adminhtml_supplier_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
