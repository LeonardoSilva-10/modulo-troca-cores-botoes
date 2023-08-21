<?php
namespace Leonardo\Test\Api\Data;

interface ColorInterface
{
    /**
     * @var string
     */
    public const STORE_ID = 'store_id';
    /**
     * @var string
     */
    public const COLOR_HEX = 'color_hex';
    /**
     * @var string
     */
    public const ID = 'entity_id';
    /**
     * @param $storeId
     * @return void
     */
    public function setStoreId($storeId): void;
    /**
     * @return mixed
     */
    public function getStoreId(): mixed;
    /**
     * @param $color
     * @return void
     */
    public function setColor($color): void;
    /**
     * @return mixed
     */
    public function getColor(): mixed;
    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function deleteById($id): mixed;
}
