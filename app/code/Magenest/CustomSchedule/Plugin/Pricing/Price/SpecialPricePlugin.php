<?php
namespace Magenest\CustomSchedule\Plugin\Pricing\Price;

use Magento\Catalog\Pricing\Price\SpecialPrice;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Psr\Log\LoggerInterface;

class SpecialPricePlugin
{
      public function aroundisScopeDateInInterval(SpecialPrice $subject, \Closure $proceed) {
        $today = (new \DateTime('now', new \DateTimeZone('UTC')))->format('Y-m-d H:i:s');
        $fromDate = $subject->getSpecialFromDate();
        $toDate = $subject->getSpecialToDate();
        $origin = $proceed();
        $manualCheck= (!$fromDate || $fromDate <= $today) && (!$toDate || $toDate >= $today);
        return $manualCheck&&$origin;
    }
}
