<?php
namespace Leonardo\Test\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Color extends AbstractDb
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Construct.
     *
     * @param Context $context
     * @param string|null  $resourcePrefix
     */
    public function __construct(
        Context $context,
        string $resourcePrefix = null
    ) {
        parent::__construct($context, $resourcePrefix);
    }

    /**
     * Initialize resource model.
     */
    protected function _construct(): void
    {
        $this->_init('leonardo_test_color_button', 'entity_id');
    }
}
