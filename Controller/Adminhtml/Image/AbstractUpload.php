<?php
/**
 * Created by Steven.
 */

namespace EBoost\Base\Controller\Adminhtml\Image;

use EBoost\Base\Model\ImageUploader;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action as BackendAction;
use Magento\Backend\App\Action\Context;


abstract class AbstractUpload extends BackendAction
{
    /**
     * Check admin permissions for this controller
     * Note: Override when extends this class
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Boolfly_Base::menu';

    /**
     * @var ImageUploader
     */
    protected $imageUploader;

    /**
     * Upload constructor.
     *
     * @param Context       $context
     * @param ImageUploader $imageUploader
     */
    public function __construct(
        Context $context,
        ImageUploader $imageUploader
    ) {
        parent::__construct($context);
        $this->imageUploader = $imageUploader;
    }

    /**
     * Upload file controller action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {
            $fileId           = $this->getRequest()->getParam('param_name');
            $result           = $this->imageUploader->saveFileToTmpDir($fileId);
            $result['cookie'] = [
                'name'     => $this->_getSession()->getName(),
                'value'    => $this->_getSession()->getSessionId(),
                'lifetime' => $this->_getSession()->getCookieLifetime(),
                'path'     => $this->_getSession()->getCookiePath(),
                'domain'   => $this->_getSession()->getCookieDomain(),
            ];
        } catch (\Exception $e) {
            $result = [
                'error'     => $e->getMessage(),
                'errorcode' => $e->getCode(),
            ];
        }

        /** @var \Magento\Framework\Controller\Result\Json $jsonResult */
        $jsonResult = $this->resultFactory->create(ResultFactory::TYPE_JSON);

        return $jsonResult->setData($result);
    }
}