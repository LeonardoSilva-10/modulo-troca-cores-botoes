<?php
namespace Leonardo\Test\Model\ResourceModel\Color;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(
            \Leonardo\Test\Model\Color::class,
            \Leonardo\Test\Model\ResourceModel\Color::class
        );
    }
}
