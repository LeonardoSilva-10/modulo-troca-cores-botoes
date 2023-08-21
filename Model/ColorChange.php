<?php
namespace Leonardo\Test\Model;

use InvalidArgumentException;
use Magento\Store\Api\StoreRepositoryInterface;
use Leonardo\Test\Helper\Data;

class ColorChange
{
    /**
     * @var StoreRepositoryInterface
     */
    protected StoreRepositoryInterface $storeRepository;
    /**
     * @var Data
     */
    protected Data $dataHelper;
    /**
     * Constructor
     *
     * @param StoreRepositoryInterface $storeRepository
     * @param Data $dataHelper
     */
    public function __construct(
        StoreRepositoryInterface $storeRepository,
        Data $dataHelper
    ) {
        $this->storeRepository = $storeRepository;
        $this->dataHelper = $dataHelper;
    }

    /**
     * Function to change Color and Call validation
     *
     * @param $colorHex
     * @param $storeId
     * @return void
     * @throws \ErrorException
     * @throws \Exception
     */
    public function colorChange($colorHex, $storeId): void
    {
        $this->validateStoreId($storeId);
        $this->validateColor($colorHex);
        $this->dataHelper->setStoreId($storeId);
        $this->dataHelper->setColor($colorHex);
    }
    /**
     * Validate HEX Color
     *
     * @param $colorHex
     * @return bool|InvalidArgumentException
     */
    private function validateColor($colorHex): bool|InvalidArgumentException
    {
        if (ctype_xdigit($colorHex)) {
             return true;
        }
        throw new InvalidArgumentException('Invalid HEX Color');
    }
    /**
     * Verification if exists Store ID
     *
     * @param $storeId
     * @return bool|InvalidArgumentException
     */
    private function validateStoreId($storeId): bool|InvalidArgumentException
    {
        $storeManagerId = $this->storeRepository->getList();
        foreach ($storeManagerId as $ids) {
            if ($storeId == $ids->getId()) {
                return true;
            }
        }
        throw new InvalidArgumentException('Invalid Store Id');
    }
}
