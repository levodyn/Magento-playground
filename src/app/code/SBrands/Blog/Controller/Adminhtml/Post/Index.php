<?php

declare(strict_types=1);

namespace SBrands\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    // This matches the 'resource' in menu.xml for security
    const ADMIN_RESOURCE = 'SBrands_Blog::post';

    public function __construct(
        Context $context,
        private readonly PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
    }

    public function execute(): Page
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('SBrands_Blog::post');
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Blog Posts'));

        return $resultPage;
    }
}
