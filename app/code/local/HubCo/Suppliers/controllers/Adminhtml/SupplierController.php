<?php

class HubCo_Suppliers_Adminhtml_SupplierController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("suppliers/supplier")->_addBreadcrumb(Mage::helper("adminhtml")->__("Supplier  Manager"),Mage::helper("adminhtml")->__("Supplier Manager"));
				return $this;
		}
		public function indexAction()
		{
			    $this->_title($this->__("Suppliers"));
			    $this->_title($this->__("Manager Supplier"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{
			    $this->_title($this->__("Suppliers"));
				$this->_title($this->__("Supplier"));
			    $this->_title($this->__("Edit Item"));

				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("suppliers/supplier")->load($id);
				if ($model->getId()) {
					Mage::register("supplier_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("suppliers/supplier");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Supplier Manager"), Mage::helper("adminhtml")->__("Supplier Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Supplier Description"), Mage::helper("adminhtml")->__("Supplier Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("suppliers/adminhtml_supplier_edit"))->_addLeft($this->getLayout()->createBlock("suppliers/adminhtml_supplier_edit_tabs"));
					$this->renderLayout();
				}
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("suppliers")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("Suppliers"));
		$this->_title($this->__("Supplier"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("suppliers/supplier")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("supplier_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("suppliers/supplier");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Supplier Manager"), Mage::helper("adminhtml")->__("Supplier Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Supplier Description"), Mage::helper("adminhtml")->__("Supplier Description"));


		$this->_addContent($this->getLayout()->createBlock("suppliers/adminhtml_supplier_edit"))->_addLeft($this->getLayout()->createBlock("suppliers/adminhtml_supplier_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {



						$model = Mage::getModel("suppliers/supplier")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Supplier was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setSupplierData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					}
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setSupplierData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("suppliers/supplier");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					}
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}


		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('supplier_ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("suppliers/supplier");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}

		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'supplier.csv';
			$grid       = $this->getLayout()->createBlock('suppliers/adminhtml_supplier_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		}
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'supplier.xml';
			$grid       = $this->getLayout()->createBlock('suppliers/adminhtml_supplier_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
