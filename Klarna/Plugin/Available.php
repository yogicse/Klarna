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

    protected $curl;

    /**
     * Construct
     *
     * @param CheckoutSession                     $checkoutSession
     * @param \Magento\Framework\HTTP\Client\Curl $curl
     */
    public function __construct(
        CheckoutSession $checkoutSession,
        \Magento\Framework\HTTP\Client\Curl $curl
    ) {
        $this->checkoutSession = $checkoutSession;
        $this->curl = $curl;
    }

    /**
     * AfterIsAvailable
     *
     * @param  Kp     $subject
     * @param  [type] $result
     * @return [bool]
     */
    public function afterIsAvailable(Kp $subject, $result): bool
    {
        $quote = $this->checkoutSession->getQuote();
        if ($quote->getCouponCode() || $quote->getAppliedRuleIds()) {

            return false;
        }

        return true;
    }

    /**
     * AfterIsActive
     *
     * @param  Kp     $subject
     * @return bool
     */
    public function afterIsActive(Kp $subject): bool
    {
        $url = "http://magento236p1.local/";
        try {
            $this->curl->get($url);
            $result = $this->curl->getBody();

            return (bool) $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
