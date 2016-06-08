<?php
class HubCo_Suppliers_Block_Adminhtml_Supplier_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("suppliers_form", array("legend"=>Mage::helper("suppliers")->__("Item information")));

						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("suppliers")->__("Name"),
						"class" => "required-entry",
						"required" => true,
						"name" => "name",
						));


				if (Mage::getSingleton("adminhtml/session")->getSupplierData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getSupplierData());
					Mage::getSingleton("adminhtml/session")->setSupplierData(null);
				}
				elseif(Mage::registry("supplier_data")) {
				    $form->setValues(Mage::registry("supplier_data")->getData());
				}
				return parent::_prepareForm();
		}
}
