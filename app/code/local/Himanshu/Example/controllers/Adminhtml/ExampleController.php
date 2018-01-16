<?php

class Himanshu_Example_Adminhtml_ExampleController extends Mage_Adminhtml_Controller_Action
{
		protected function _isAllowed()
		{
		//return Mage::getSingleton('admin/session')->isAllowed('example/example');
			return true;
		}

		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("example/example")->_addBreadcrumb(Mage::helper("adminhtml")->__("Example  Manager"),Mage::helper("adminhtml")->__("Example Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("Example"));
			    $this->_title($this->__("Manager Example"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("Example"));
				$this->_title($this->__("Example"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("example/example")->load($id);
				if ($model->getId()) {
					Mage::register("example_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("example/example");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Example Manager"), Mage::helper("adminhtml")->__("Example Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Example Description"), Mage::helper("adminhtml")->__("Example Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("example/adminhtml_example_edit"))->_addLeft($this->getLayout()->createBlock("example/adminhtml_example_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("example")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("Example"));
		$this->_title($this->__("Example"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("example/example")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("example_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("example/example");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Example Manager"), Mage::helper("adminhtml")->__("Example Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Example Description"), Mage::helper("adminhtml")->__("Example Description"));


		$this->_addContent($this->getLayout()->createBlock("example/adminhtml_example_edit"))->_addLeft($this->getLayout()->createBlock("example/adminhtml_example_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						

						$model = Mage::getModel("example/example")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Example was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setExampleData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setExampleData($this->getRequest()->getPost());
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
						$model = Mage::getModel("example/example");
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
				$ids = $this->getRequest()->getPost('ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("example/example");
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
			$fileName   = 'example.csv';
			$grid       = $this->getLayout()->createBlock('example/adminhtml_example_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'example.xml';
			$grid       = $this->getLayout()->createBlock('example/adminhtml_example_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
