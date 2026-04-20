<?php
declare(strict_types=1);

namespace SBrands\Blog\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use SBrands\Blog\Model\ResourceModel\Post\CollectionFactory;
use SBrands\Blog\Model\ResourceModel\Post\Collection;

/**
 * ViewModel for the Blog List page.
 * It implements ArgumentInterface to be recognized by Magento's layout system.
 */
class BlogList implements ArgumentInterface
{
    /**
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        private readonly CollectionFactory $collectionFactory
    ) {}

    /**
     * Retrieve a collection of all blog posts, sorted by creation date.
     *
     * @return Collection
     */
    public function getBlogPosts(): Collection
    {
        $collection = $this->collectionFactory->create();
        // Standard Magento collection method to sort by newest first
        $collection->setOrder('created_at', 'DESC');

        return $collection;
    }
}
