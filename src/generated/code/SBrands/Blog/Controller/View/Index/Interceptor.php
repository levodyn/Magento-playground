<?php
namespace SBrands\Blog\Controller\View\Index;

/**
 * Interceptor class for @see \SBrands\Blog\Controller\View\Index
 */
class Interceptor extends \SBrands\Blog\Controller\View\Index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\View\Result\PageFactory $pageFactory, \Magento\Framework\App\RequestInterface $request, \SBrands\Blog\Api\PostRepositoryInterface $postRepository, \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory)
    {
        $this->___init();
        parent::__construct($pageFactory, $request, $postRepository, $resultForwardFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }
}
