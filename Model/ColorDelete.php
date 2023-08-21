<?php
namespace Leonardo\Test\Model;

use Leonardo\Test\Helper\Data;
use Leonardo\Test\Model\Color;

class ColorDelete
{
    /**
     * @var Data
     */
    protected Data $helperData;
    /**
     * @var Color
     */
    protected Color $color;
    /**
     * Constructor
     *
     * @param Data $helperData
     * @param Color $color
     */
    public function __construct(
        Data $helperData,
        Color $color
    ) {
        $this->helperData = $helperData;
        $this->color = $color;
    }

    /**
     * Function to delete color by Store ID
     *
     * @param $storeId
     * @return bool|\InvalidArgumentException
     * @throws \Exception
     */
    public function colorDelete($storeId): bool|\InvalidArgumentException
    {
        $storeIdModel = [$this->helperData->getStoreId()];
        if (!in_array($storeId, $storeIdModel)) {
            return throw new \InvalidArgumentException('Store ID not found!');
        }
        $colorCollection = $this->color->getCollection()->getData();
        foreach ($colorCollection as $values) {
            if ($values['store_id'] == $storeId) {
                $this->color->deleteById($values['entity_id']);
                return true;
            }
        }
        return throw new \InvalidArgumentException('Can not Deleted Try Again!');
    }
}
