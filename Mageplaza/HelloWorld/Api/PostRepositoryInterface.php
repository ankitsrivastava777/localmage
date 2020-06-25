<?php
namespace Mageplaza\HelloWorld\Api;

use Mageplaza\HelloWorld\Api\Data\PostInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface PostRepositoryInterface
 *
 * @api
 */
interface PostRepositoryInterface
{
    /**
     * Create or update a Post.
     *
     * @param PostInterface $page
     * @return PostInterface
     */
    public function save(PostInterface $page);

    /**
     * Get a Post by Id
     *
     * @param int $id
     * @return PostInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Post with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     * Retrieve Posts which match a specified criteria.
     *
     * @param SearchCriteriaInterface $criteria
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * Delete a Post
     *
     * @param PostInterface $page
     * @return PostInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Post with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(PostInterface $page);

    /**
     * Delete a Post by Id
     *
     * @param int $id
     * @return PostInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If customer with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
