<?php
declare(strict_types=1);

namespace SBrands\Blog\Controller\View;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\View\Result\PageFactory;
use SBrands\Blog\Api\PostRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class Index implements HttpGetActionInterface
{
    /**
     * @param PageFactory $pageFactory
     * @param RequestInterface $request
     * @param PostRepositoryInterface $postRepository
     * @param ForwardFactory $resultForwardFactory
     */
    public function __construct(
        private readonly PageFactory $pageFactory,
        private readonly RequestInterface $request,
        private readonly PostRepositoryInterface $postRepository,
        private readonly ForwardFactory $resultForwardFactory
    ) {}

    /**
     * View Blog Post Action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $postId = (int)$this->request->getParam('id');

        try {
            $post = $this->postRepository->getById($postId);

            $resultPage = $this->pageFactory->create();

            $resultPage->getConfig()->getTitle()->set($post->getTitle());

            return $resultPage;
        } catch (NoSuchEntityException $e) {
            $resultForward = $this->resultForwardFactory->create();
            return $resultForward->forward('noroute');
        }
    }
}
