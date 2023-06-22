<?php
/**
 * Created by Steven.
 */

namespace EBoost\Base\Block\Adminhtml\Edit\Button;


use Magento\Backend\Block\Template;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveAndContinue extends Template implements ButtonProviderInterface
{
    /**
     * Save and continue button
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save and Continue Edit'),
            'class' => 'save',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'saveAndContinueEdit']],
                'form-role' => 'save',
            ],
            'sort_order' => 20,
        ];
    }
}