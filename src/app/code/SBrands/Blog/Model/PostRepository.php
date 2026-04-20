<?php
declare(strict_types=1);

namespace SBrands\Blog\Model;

use SBrands\Blog\Api\PostRepositoryInterface;
use SBrands\Blog\Model\PostFactory;
use SBrands\Blog\Model\ResourceModel\Post as PostResource;
use Magento\Framework\Exception\NoSuchEntityException;

class PostRepository implements PostRepositoryInterface
{
    public function __construct(
        private readonly PostFactory $postFactory,
        private readonly PostResource $postResource
    ) {}

    public function getById(int $postId): Post
    {
        $post = $this->postFactory->create();
        $this->postResource->load($post, $postId);

        if (!$post->getId()) {
            throw new NoSuchEntityException(__('Post with ID "%1" does not exist.', $postId));
        }

        return $post;
    }
}
