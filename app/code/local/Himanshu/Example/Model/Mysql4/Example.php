<?php
class Himanshu_Example_Model_Mysql4_Example extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("example/example", "id");
    }
}