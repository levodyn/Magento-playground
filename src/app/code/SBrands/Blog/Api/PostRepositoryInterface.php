<?php
declare(strict_types=1);

namespace SBrands\Blog\Api;

interface PostRepositoryInterface
{
    /**
     * @param int $postId
     * @return \SBrands\Blog\Model\Post
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById(int $postId);
}
