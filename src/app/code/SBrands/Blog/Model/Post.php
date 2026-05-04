<?php

declare(strict_types=1);

namespace SBrands\Blog\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel implements IdentityInterface
{
    public const CACHE_TAG = 'sbrands_blog_post';

    /**
     * Initialize the model and connect it to the Resource Model
     */
    protected function _construct(): void
    {
        $this->_init(\SBrands\Blog\Model\ResourceModel\Post::class);
        $this->setIdFieldName('post_id');
    }

    /**
     * Return unique ID(s) for the object in cache
     *
     * @return string[]
     */
    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
