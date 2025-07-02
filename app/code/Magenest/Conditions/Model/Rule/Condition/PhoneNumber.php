<?php
namespace Magenest\Conditions\Model\Rule\Condition;

use Magento\Rule\Model\Condition\Context;
use Magento\Rule\Model\Condition\AbstractCondition;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory as OrderCollectionFactory;
use Magento\Customer\Model\Session as CustomerSession;

class PhoneNumber extends AbstractCondition
{
    /**
     * @var OrderCollectionFactory
     */
    protected $orderCollectionFactory;

    /**
     * @var CustomerSession
     */
    protected $customerSession;

    public function __construct(
        Context $context,
        OrderCollectionFactory $orderCollectionFactory,
        CustomerSession $customerSession,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->customerSession = $customerSession;
    }

    /**
     * Load attribute options
     *
     * @return $this
     */
    public function loadAttributeOptions()
    {
        $this->setAttributeOption([
            'customer_phone_number' => __('Customer Phone Number Not Used')
        ]);
        return $this;
    }

    /**
     * Get input type
     *
     * @return string
     */
    public function getInputType()
    {
        return 'boolean';
    }

    /**
     * Get value element type
     *
     * @return string
     */
    public function getValueElementType()
    {
        return 'select';
    }

    /**
     * Get value select options
     *
     * @return array
     */
    public function getValueSelectOptions()
    {
        return [
            ['value' => 1, 'label' => __('True')],
            ['value' => 0, 'label' => __('False')]
        ];
    }

    /**
     * Validate condition
     *
     * @param \Magento\Framework\Model\AbstractModel $model
     * @return bool
     */
    public function validate(\Magento\Framework\Model\AbstractModel $model)
    {
        if (!$this->customerSession->isLoggedIn()) {
            return false;
        }

        $phoneNumber = $model->getQuote()->getBillingAddress()->getTelephone();
        if (!$phoneNumber) {
            $phoneNumber = $model->getQuote()->getShippingAddress()->getTelephone();
        }

        if (!$phoneNumber) {
            return false;
        }

        $orderCollection = $this->orderCollectionFactory->create()
            ->addFieldToFilter('customer_id', ['neq' => null])
            ->addFieldToSelect('customer_id')
            ->join(
                ['address' => 'sales_order_address'],
                'main_table.entity_id = address.parent_id AND address.address_type = "billing"',
                ['telephone']
            )
            ->addFieldToFilter('address.telephone', $phoneNumber);

        return $orderCollection->getSize() == 0;
    }
}
