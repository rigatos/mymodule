<?php

namespace Vendor\Module;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Image\Adapter\Image;
use Magento\Framework\ObjectManagerInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Image\UrlBuilder;

class ImageSearchModule
{
    /**
     * @var ObjectManagerInterface
     */
    protected $objectManager;

    /**
     * @var AdapterFactory
     */
    protected $adapterFactory;

    /**
     * @var UrlBuilder
     */
    protected $urlBuilder;

    /**
     * @param ObjectManagerInterface $objectManager
     * @param AdapterFactory $adapterFactory
     * @param UrlBuilder $urlBuilder
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        AdapterFactory $adapterFactory,
        UrlBuilder $urlBuilder
    ) {
        $this->objectManager = $objectManager;
        $this->adapterFactory = $adapterFactory;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * Αναζητά φωτογραφίες στο Google Images με βάση το SKU του είδους.
     *
     * @param string $sku
     * @return array
     */
    public function searchImages(string $sku): array
    {
        $apiKey = $this->objectManager->get('Magento\Framework\App\Config\
