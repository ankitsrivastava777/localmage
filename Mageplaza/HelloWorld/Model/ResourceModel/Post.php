<?php
namespace Mageplaza\HelloWorld\Model\ResourceModel;

/**
 * Class Post
 */
class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init('mageplaza_helloworld_post', 'post_id');
    }
}
