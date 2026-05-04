<?php
declare(strict_types=1);

namespace SBrands\Blog\Plugin;

use Magento\Framework\Data\Tree\NodeFactory;
use Magento\Theme\Block\Html\Topmenu as MagentoTopmenu;

class Topmenu
{
    public function __construct(
        private readonly NodeFactory $nodeFactory
    ) {}

    public function beforeGetHtml(
        MagentoTopmenu $subject,
                       $outermostClass = '',
                       $childrenWrapClass = '',
                       $limit = 0
    ) {
        $node = $this->nodeFactory->create([
            'data' => [
                'name' => __('Blog'),
                'id' => 'sbrands-blog-link',
                'url' => $subject->getUrl('blog'),
                'is_active' => false
            ],
            'idField' => 'id',
            'tree' => $subject->getMenu()->getTree()
        ]);

        $subject->getMenu()->addChild($node);
    }
}
