<?php
namespace Asad\Endingsoon\ViewModel;
use Magento\CatalogInventory\Api\StockStateInterface;
use Magento\Catalog\Block\Product\View\AbstractView;
use Magento\Framework\View\Element\Block\ArgumentInterface; //require to mark as viewmodel

Class Stock implements ArgumentInterface
{

    private $stockState,$productview;

    public function __construct(StockStateInterface $stockConfiguration, AbstractView $product)
    {
        $this->stockState = $stockConfiguration;
        $this->productview = $product;
    }

    public function getProduct(){
        return $this->productview->getProduct();
    }

    public function getStatus(): string
    {
        $qty = $this->getStockQty($this->getProduct()->getId());
        return "{$qty} items left";
    }

    public function getStockQty($productId, $websiteId = null): int
    {
        return $this->stockState->getStockQty($productId, $websiteId);
    }
}