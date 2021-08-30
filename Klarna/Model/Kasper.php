<?php
namespace Ziffity\Klarna\Model;

/**
 * Class Kasper
 *
 * @package Klarna\Kp\Model\Api\Builder
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Kasper extends \Klarna\Kp\Model\Api\Builder\Kasper
{

    /**
     * @param array orderLine
     * return this
     */
    public function addOrderLine(array $orderLine)
    {
        $_isImagedisabled = $this->configHelper->isApiConfigFlag('inactiveimg', null);
        if($_isImagedisabled) {

            unset($orderLine['image_url']);
            unset($orderLine['product_url']);
        }

        $this->orderLines[] = $orderLine;
        return $this;
    }
}
