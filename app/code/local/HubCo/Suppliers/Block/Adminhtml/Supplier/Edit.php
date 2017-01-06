<?php
	
class HubCo_Suppliers_Block_Adminhtml_Supplier_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "supplier_id";
				$this->_blockGroup = "suppliers";
				$this->_controller = "adminhtml_supplier";
				$this->_updateButton("save", "label", Mage::helper("suppliers")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("suppliers")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("suppliers")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("supplier_data") && Mage::registry("supplier_data")->getId() ){

				    return Mage::helper("suppliers")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("supplier_data")->getId()));

				} 
				else{

				     return Mage::helper("suppliers")->__("Add Item");

				}
		}
}