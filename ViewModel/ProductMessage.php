<?php
namespace Asad\Endingsoon\ViewModel;
use Magento\Framework\View\Element\Block\ArgumentInterface; //require to mark as viewmodel
use Asad\Endingsoon\Helper\Data;

Class ProductMessage implements ArgumentInterface
{

    protected $helperData;

	public function __construct(
		Data $helperData

	)
	{
		$this->helperData = $helperData;
	}

    public function getMessage(): string
    {

        //return 'asdf asdf';
        return $this->helperData->getGeneralConfig('delivery_msg');
    }
}