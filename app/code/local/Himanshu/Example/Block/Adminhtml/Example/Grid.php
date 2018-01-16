<?php

class Himanshu_Example_Block_Adminhtml_Example_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("exampleGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("example/example")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("example")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));
                
				$this->addColumn("name", array(
				"header" => Mage::helper("example")->__("Name"),
				"index" => "name",
				));
				$this->addColumn("description", array(
				"header" => Mage::helper("example")->__("Description"),
				"index" => "description",
				));
						$this->addColumn('is_active', array(
						'header' => Mage::helper('example')->__('Active'),
						'index' => 'is_active',
						'type' => 'options',
						'options'=>Himanshu_Example_Block_Adminhtml_Example_Grid::getOptionArray2(),				
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
			$this->setMassactionIdField('id');
			$this->getMassactionBlock()->setFormFieldName('ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_example', array(
					 'label'=> Mage::helper('example')->__('Remove Example'),
					 'url'  => $this->getUrl('*/adminhtml_example/massRemove'),
					 'confirm' => Mage::helper('example')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray2()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray2()
		{
            $data_array=array();
			foreach(Himanshu_Example_Block_Adminhtml_Example_Grid::getOptionArray2() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}