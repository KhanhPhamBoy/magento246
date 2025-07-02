<?php
namespace Magenest\Conditions\Observer\Admin;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class AddNewConditionHandle implements ObserverInterface
{
    const CONDITION_MODEL_PATH = 'Magenest\Conditions\Model\Rule\Condition\\';

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $objectManager;

    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager
    ) {
        $this->objectManager = $objectManager;
    }

    /**
     * @param Observer $observer
     * @return $this
     */
    public function execute(Observer $observer)
    {
        $additional = $observer->getAdditional();
        $conditions = $additional->getConditions();
        if (!is_array($conditions)) {
            $conditions = [];
        }

        $attributes = [
            [
                'value' => self::CONDITION_MODEL_PATH . 'PhoneNumber|customer_phone_number',
                'label' => __('Customer Phone Number is New'),
            ]
        ];

        $conditions[] = [
            'value' => $attributes,
            'label' => __('Customer Conditions'),
        ];

        $additional->setConditions($conditions);

        return $this;
    }
}
