<?php
/**
 * Created by Steven.
 */

namespace EBoost\Base\Block\Adminhtml\Edit\Button;

use Magento\Backend\Block\Template;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Save extends Template implements ButtonProviderInterface
{
    /**
     * Save button
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 100,
        ];
    }
}