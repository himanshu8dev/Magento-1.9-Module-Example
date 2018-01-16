<?php
class Himanshu_Example_Adminhtml_ExamplebackendController extends Mage_Adminhtml_Controller_Action
{

	protected function _isAllowed()
	{
		//return Mage::getSingleton('admin/session')->isAllowed('example/examplebackend');
		return true;
	}

	public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("example"));
	   $this->renderLayout();
    }
}