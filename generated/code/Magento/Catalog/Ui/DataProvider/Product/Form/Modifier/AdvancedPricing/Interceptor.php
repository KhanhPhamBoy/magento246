<?php
namespace Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AdvancedPricing;

/**
 * Interceptor class for @see \Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AdvancedPricing
 */
class Interceptor extends \Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AdvancedPricing implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Model\Locator\LocatorInterface $locator, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Customer\Api\GroupRepositoryInterface $groupRepository, \Magento\Customer\Api\GroupManagementInterface $groupManagement, \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder, \Magento\Framework\Module\Manager $moduleManager, \Magento\Directory\Helper\Data $directoryHelper, \Magento\Framework\Stdlib\ArrayManager $arrayManager, $scopeName = '', ?\Magento\Customer\Model\Customer\Source\GroupSourceInterface $customerGroupSource = null, ?\Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\CurrencySymbolProvider $currencySymbolProvider = null)
    {
        $this->___init();
        parent::__construct($locator, $storeManager, $groupRepository, $groupManagement, $searchCriteriaBuilder, $moduleManager, $directoryHelper, $arrayManager, $scopeName, $customerGroupSource, $currencySymbolProvider);
    }

    /**
     * {@inheritdoc}
     */
    public function modifyMeta(array $meta)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'modifyMeta');
        return $pluginInfo ? $this->___callPlugins('modifyMeta', func_get_args(), $pluginInfo) : parent::modifyMeta($meta);
    }
}
