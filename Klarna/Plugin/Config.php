<?php
declare(strict_types=1);

namespace Ziffity\Klarna\Plugin;

class Config
{

    private const KP_CONIG_PATH = 'payment/klarna_kp/active';
    protected $curl;

    /**
     * Construct
     *
     * @param \Magento\Framework\HTTP\Client\Curl $curl
     */
    public function __construct(
        \Magento\Framework\HTTP\Client\Curl $curl
    ) {
        $this->curl = $curl;
    }

    /**
     * After Set Flag
     *
     * @param \Magento\Framework\App\Config $subject
     * @param bool $result
     * @param string $path
     * @return bool
     */
    public function afterIsSetFlag(
        \Magento\Framework\App\Config $subject,
        bool $result,
        string $path
    ): bool {

        if ($path == self::KP_CONIG_PATH) {
            return $this->isKlarnaEnabled() && $result;
        }
        return $result;
    }

    /**
     * Klarna Enable
     *
     * @param  Kp     $subject
     * @return bool
     */
    public function isKlarnaEnabled(): bool
    {
        $url = "http://localhost/api/";
        try {
            $this->curl->get($url);
            $result = $this->curl->getBody();

            return (bool) $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
