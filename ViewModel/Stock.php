<?php
namespace Asad\Endingsoon\ViewModel;
use Magento\CatalogInventory\Api\StockStateInterface;
use Magento\Catalog\Block\Product\View\AbstractView;
use Magento\Framework\View\Element\Block\ArgumentInterface; //require to mark as viewmodel
use Asad\Endingsoon\Helper\Data;

Class Stock implements ArgumentInterface
{

    private $stockState,$productview;
    protected $helperData;

    public function __construct(
        StockStateInterface $stockConfiguration, 
        AbstractView $product,
        Data $helperData
    )
    {
        $this->stockState = $stockConfiguration;
        $this->productview = $product;
        $this->helperData = $helperData;
        
    }

    public function getProduct(){
        return $this->productview->getProduct();
    }

    public function getStatus(): string
    {
        $qty = $this->getStockQty($this->getProduct()->getId());
        $tqty = $this->helperData->getGeneralConfig('qty_threshold');
        $tqtyMsg = $this->helperData->getGeneralConfig('threshold_msg');

        if($qty <= (int)$tqty)
           return "{$qty} $tqtyMsg";

        else 
            return 'Available';  
    }

    public function getStockQty($productId, $websiteId = null): int
    {
        return $this->stockState->getStockQty($productId, $websiteId);
    }
}