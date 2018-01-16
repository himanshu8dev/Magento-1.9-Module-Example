<?php
class Himanshu_Example_Block_Adminhtml_Example_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("example_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("example")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("example")->__("Item Information"),
				"title" => Mage::helper("example")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("example/adminhtml_example_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
