<?php
/**
 * @category Payment_Gateway
 * @author Yogendra <yogendrakumar.maurya@gmail.com>
 */
namespace Ziffity\Klarna\Model;

/**
 * Class Kasper
 *
 * Klarna\Kp\Model\Api\Builder
 */
class Kasper extends \Klarna\Kp\Model\Api\Builder\Kasper
{

    /**
     * AaddOrderLine Order Line Items
     *
     * @param array $orderLine
     */
    public function addOrderLine(array $orderLine) : Kasper
    {
        $_isImagedisabled = $this->configHelper
            ->isApiConfigFlag('inactiveimg', null);
        if ($_isImagedisabled) {

            unset($orderLine['image_url']);
            unset($orderLine['product_url']);
        }

        $this->orderLines[] = $orderLine;

        return $this;
    }
}
