<?php
namespace Leonardo\Test\Helper;

use Leonardo\Test\Model\Color as ColorModel;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Data extends AbstractHelper
{
    /**
     * @var ColorModel
     */
    protected ColorModel $colorModel;
    /**
     * Constructor
     *
     * @param ColorModel $colorModel
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        ColorModel $colorModel,
        Context $context,
        array $data = []
    ) {
        $this->colorModel = $colorModel;
        parent::__construct($context, $data);
    }
    /**
     * Function to Validate if Store id Has Color Saved
     *
     * @param $storeId
     * @return bool
     */
    private function validateStoreIdSaved($storeId): bool
    {
        $storeModel = [$this->getStoreId()];
        if (!empty($storeModel)) {
            if (in_array($storeId, $storeModel)) {
                return false;
            }
        }
        return true;
    }
    /**
     * Save Color
     *
     * @param $color
     * @return void
     * @throws \Exception
     */
    public function setColor($color): void
    {
        if (!str_contains($color, '#')) {
            $color = '#' . $color;
        }
        $this->colorModel->setColor($color);
        $this->colorModel->save();
    }
    /**
     * Color Return Associated with Store ID
     *
     * @param $storeId
     * @return string|bool
     */
    public function getColor($storeId): string|bool
    {
        $idModel = [$this->getStoreId()];
        if (in_array($storeId, $idModel)) {
            $data = $this->getCollection()->getData();
            foreach ($data as $storeIds) {
                if ($storeIds['store_id'] == $storeId) {
                    return $storeIds['color_hex'];
                }
            }
        }
        return false;
    }

    /**
     * Saved Store ID with Validation if Store ID has color attributed
     *
     * @param $storeId
     * @return void
     * @throws \ErrorException
     */
    public function setStoreId($storeId): void
    {
        if ($this->validateStoreIdSaved($storeId)) {
            $this->colorModel->setStoreId($storeId);
            $this->colorModel->save();
        } else {
            throw new \ErrorException(
                "ID has already with color saved.\nIf you want to save other color delete color saved in store id."
            );
        }
    }
    /**
     * Store ID Return
     *
     * @return mixed
     */
    public function getStoreId():mixed
    {
        $data = $this->getCollection()->getData();
        $storeId = '';
        foreach ($data as $storeIds) {
            $storeId = $storeIds['store_id'];
        }
        return $storeId;
    }

    /**
     * Return Data
     *
     * @return AbstractDb|AbstractCollection|null
     */
    public function getCollection(): AbstractDb|AbstractCollection|null
    {
        return $this->colorModel->getCollection();
    }
}
