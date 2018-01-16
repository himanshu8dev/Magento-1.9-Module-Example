<?php


class Himanshu_Example_Block_Adminhtml_Example extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_example";
	$this->_blockGroup = "example";
	$this->_headerText = Mage::helper("example")->__("Example Manager");
	$this->_addButtonLabel = Mage::helper("example")->__("Add New Item");
	parent::__construct();
	
	}

}