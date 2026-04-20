<?php
declare(strict_types=1);

namespace SBrands\Blog\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\App\RequestInterface;
use SBrands\Blog\Api\PostRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class PostView implements ArgumentInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly PostRepositoryInterface $postRepository
    ) {}

    public function getPost()
    {
        $postId = (int)$this->request->getParam('id');
        try {
            return $this->postRepository->getById($postId);
        } catch (NoSuchEntityException $e) {
            return null;
        }
    }
}
