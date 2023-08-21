<?php
namespace Leonardo\Test\Model;

use Leonardo\Test\Api\Data\ColorInterface;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;

class Color extends AbstractModel implements ColorInterface
{
    /**
     * Construct
     *
     * @param Context $context
     * @param Registry $registry
     * @param AbstractResource|null $resource
     * @param AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection,
            $data
        );
    }
    /**
     * Construct from AbstractModel
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init('Leonardo\Test\Model\ResourceModel\Color');
    }
    /**
     * Save Store ID in table
     *
     * @param $storeId
     * @return void
     */
    public function setStoreId($storeId): void
    {
        $this->setData(self::STORE_ID, $storeId);
    }
    /**
     * Get Store ID from table
     *
     * @return mixed
     */
    public function getStoreId(): mixed
    {
        return $this->getData(self::STORE_ID);
    }
    /**
     * Save Color in table
     *
     * @param $color
     * @return void
     */
    public function setColor($color): void
    {
        $this->setData(self::COLOR_HEX, $color);
    }
    /**
     * Get Color from table
     *
     * @return mixed
     */
    public function getColor(): mixed
    {
        return $this->getData(self::COLOR_HEX);
    }
    /**
     * Delete By ID
     *
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function deleteById($id): mixed
    {
        $this->load($id);
        if ($this->getId()) {
            $this->delete();
        }
        return $this;
    }
}
