<?php
namespace Ziffity\Klarna\Test\Unit\Model;

class Kasper extends \PHPUnit\Framework\TestCase
{
    protected $_objectManager;
    protected $_desiredResult;
    protected $_actulResult;
    protected $_kp;

    /**
     * SetUp
     */
    public function setUp()
    {
        $this->_objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->_kp = $this->_objectManager->getObject("Ziffity\Klarna\Model\Kasper");
    }

    /**
     * TestOrderline
     */
    public function testOrderline()
    {
        $this->_actulResult = $this->_kp->addOrderLine($orderline = []);
    }
}
