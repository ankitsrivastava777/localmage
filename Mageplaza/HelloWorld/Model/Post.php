<?php
namespace Mageplaza\HelloWorld\Model;

/**
 * Class Post
 */
class Post extends \Magento\Framework\Model\AbstractModel implements
    \Mageplaza\HelloWorld\Api\Data\PostInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'mageplaza_helloworld_post';

    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(\Mageplaza\HelloWorld\Model\ResourceModel\Post::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
