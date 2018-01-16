<?php
class Himanshu_Example_Block_Adminhtml_Example_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("example_form", array("legend"=>Mage::helper("example")->__("Item information")));

				
						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("example")->__("Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "name",
						));
					
						$fieldset->addField("description", "text", array(
						"label" => Mage::helper("example")->__("Description"),
						"name" => "description",
						));
									
						 $fieldset->addField('is_active', 'select', array(
						'label'     => Mage::helper('example')->__('Active'),
						'values'   => Himanshu_Example_Block_Adminhtml_Example_Grid::getValueArray2(),
						'name' => 'is_active',
						));

				if (Mage::getSingleton("adminhtml/session")->getExampleData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getExampleData());
					Mage::getSingleton("adminhtml/session")->setExampleData(null);
				} 
				elseif(Mage::registry("example_data")) {
				    $form->setValues(Mage::registry("example_data")->getData());
				}
				return parent::_prepareForm();
		}
}
