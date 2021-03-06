<?php
namespace Mageplaza\HelloWorld\Model\ResourceModel\Post;

/**
 * Class Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(
            \Mageplaza\HelloWorld\Model\Post::class,
            \Mageplaza\HelloWorld\Model\ResourceModel\Post::class
        );
    }
}
