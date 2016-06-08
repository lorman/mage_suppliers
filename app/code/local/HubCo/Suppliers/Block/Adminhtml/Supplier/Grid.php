<?php

class HubCo_Suppliers_Block_Adminhtml_Supplier_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("supplierGrid");
				$this->setDefaultSort("supplier_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("suppliers/supplier")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("supplier_id", array(
				"header" => Mage::helper("suppliers")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "supplier_id",
				));
                
				$this->addColumn("name", array(
				"header" => Mage::helper("suppliers")->__("Name"),
				"index" => "name",
				));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('supplier_id');
			$this->getMassactionBlock()->setFormFieldName('supplier_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_supplier', array(
					 'label'=> Mage::helper('suppliers')->__('Remove Supplier'),
					 'url'  => $this->getUrl('*/adminhtml_supplier/massRemove'),
					 'confirm' => Mage::helper('suppliers')->__('Are you sure?')
				));
			return $this;
		}
			

}