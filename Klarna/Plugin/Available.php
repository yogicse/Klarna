<?php
/**
 * @category Payment_Gateway
 * @author Yogendra <yogendrakumar.maurya@gmail.com>
 */
namespace Ziffity\Klarna\Plugin;

use Magento\Checkout\Model\Session as CheckoutSession;
use Klarna\Kp\Model\Payment\Kp;

/**
 * Class Available
 * Ziffity\Klarna\Plugin
 */
class Available
{
    /**
     * @var checkoutSession
     */
    protected $checkoutSession;

    /**
     * Construct
     *
     * @param CheckoutSession                     $checkoutSession
     */
    public function __construct(
        CheckoutSession $checkoutSession
    ) {
        $this->checkoutSession = $checkoutSession;
    }

    /**
     * AfterIsAvailable
     *
     * @param  Kp     $subject
     * @param  bool   $result
     * @return bool
     */
    public function afterIsAvailable(Kp $subject, $result): bool
    {
        $quote = $this->checkoutSession->getQuote();
        if ($quote->getCouponCode() || $quote->getAppliedRuleIds()) {

            return false;
        }

        return true;
    }
}
