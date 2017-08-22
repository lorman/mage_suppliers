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

						$fieldset->addField("po_supplier_id", "text", array(
						    "label" => Mage::helper("suppliers")->__("PO Supplier ID"),
						    "class" => "required-entry",
						    "required" => true,
						    "name" => "po_supplier_id",
						));

            $fieldset->addField("attr_qty", "text", array(
            "label" => Mage::helper("suppliers")->__("Qty Attribute"),
            "class" => "required-entry",
            "required" => true,
            "name" => "attr_qty",
            ));

            $fieldset->addField("attr_price", "text", array(
            "label" => Mage::helper("suppliers")->__("Price Attribute"),
            "class" => "required-entry",
            "required" => true,
            "name" => "attr_price",
            ));

            $fieldset->addField("attr_part_num", "text", array(
            "label" => Mage::helper("suppliers")->__("Part# Attribute"),
            "class" => "required-entry",
            "required" => true,
            "name" => "attr_part_num",
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
