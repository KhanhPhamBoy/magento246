<?php

namespace Magenest\CustomSchedule\Plugin\Ui\DataProvider\Product\Form\Modifier;

class AdvancedPricingModifierPlugin
{
    public function afterModifyMeta(
        \Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AdvancedPricing $subject,
        array $meta
    ) {
        $arrayManager = \Magento\Framework\Stdlib\ArrayManager::class;

        $arrayHelper = new $arrayManager();

        $pathFrom = $arrayHelper->findPath('special_from_date', $meta, null, 'children');
        $pathTo = $arrayHelper->findPath('special_to_date', $meta, null, 'children');

        if ($pathFrom && $pathTo) {
            foreach ([$pathFrom, $pathTo] as $path) {

                $meta = $arrayHelper->merge(
                    $path . '/arguments/data/config',
                    $meta,
                    [
                        'component' => 'Magento_Ui/js/form/element/date',
                        'dateFormat' => 'yyyy-MM-dd HH:mm:ss',
                        'time' => true,
                        'options' => [
                            'showsTime' => true,
                            'timeFormat' => 'HH:mm:ss'
                        ]
                    ]
                );
            }
        }
        return $meta;
    }

}
