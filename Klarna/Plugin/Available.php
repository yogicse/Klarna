<?php
namespace Ziffity\Klarna\Plugin;
/**
 * Class Available
 *
 * @package Ziffity\Klarna\Plugin
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */

use Magento\Checkout\Model\Session as CheckoutSession;
use Klarna\Kp\Model\Payment\Kp;

class Available
{
    /**
     * @var checkoutSession
     */
    protected $checkoutSession;

    /**
     * @param checkoutSession $checkoutSession
     */
    public function __construct(
        CheckoutSession $checkoutSession
    ) {
        $this->checkoutSession = $checkoutSession;
    }

    /**
     *
     * @param Kp $subject
     * @param $result
     * @return bool
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function afterIsAvailable(Kp $subject, $result): bool
    {
        $quote = $this->checkoutSession->getQuote();
        if($quote->getCouponCode() || $quote->getAppliedRuleIds()) {

            return false;
        }

        return true;

    }
}
