<?php

declare(strict_types=1);

namespace SBrands\Blog\Model\ResourceModel\Post;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use SBrands\Blog\Model\Post;

class Collection extends AbstractCollection implements IdentityInterface
{
    /**
     * Standard Magento collection initialization
     */
    protected function _construct(): void
    {
        $this->_init(
            Post::class,
            \SBrands\Blog\Model\ResourceModel\Post::class
        );
    }

    /**
     * Return cache identities for the whole collection
     *
     * @return string[]
     */
    public function getIdentities(): array
    {
        return [Post::CACHE_TAG];
    }
}
