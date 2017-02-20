<?php

/**
 *  Copyright © 2016 Bkademy. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */
namespace Bkademy\Webpos\Model\Repository\Catalog;

use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Framework\Api\SortOrder;
use Magento\Catalog\Api\Data\ProductExtension;
use Bkademy\Webpos\Api\Data\Catalog\Product\ConfigOptionsInterface;
use Bkademy\Webpos\Model\Repository\Catalog\Product\ConfigOptionsBuilder;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class ProductRepository extends \Magento\Catalog\Model\ProductRepository
    implements \Bkademy\Webpos\Api\Catalog\ProductRepositoryInterface
{
    /** @var */
    protected $_productCollection;

    /**
     * {@inheritdoc}
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        if (empty($this->_productCollection)) {
            $collection = \Magento\Framework\App\ObjectManager::getInstance()->get(
                '\Bkademy\Webpos\Model\ResourceModel\Catalog\Product\Collection'
            );

            /** Integrate webpos **/
            $eventManage = \Magento\Framework\App\ObjectManager::getInstance()->get(
                '\Magento\Framework\Event\ManagerInterface'
            );

            $request = \Magento\Framework\App\ObjectManager::getInstance()->get(
                '\Magento\Framework\App\RequestInterface'
            );

            $this->extensionAttributesJoinProcessor->process($collection);
            $collection->addAttributeToSelect('*');
            $collection->joinAttribute('status', 'catalog_product/status', 'entity_id', null, 'inner');
            $collection->addAttributeToFilter('status', \Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED);
            //Add filters from root filter group to the collection

            if ($request->getParam('searchKey')) {
                $collection->addAttributeToFilter('name', array('like' => '%'.$request->getParam('searchKey').'%')); // Note the spaces
            }
            foreach ($searchCriteria->getFilterGroups() as $group) {
                $this->addFilterGroupToCollection($group, $collection);
            }
            $collection->addVisibleFilter();
            $this->_productCollection = $collection;
        }
        $this->_productCollection->setCurPage($searchCriteria->getCurrentPage());
        $this->_productCollection->setPageSize($searchCriteria->getPageSize());
        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($this->_productCollection->getItems());
        $searchResult->setTotalCount($this->_productCollection->getSize());
        return $searchResult;
    }
}