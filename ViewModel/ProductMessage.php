<?php
namespace Asad\Endingsoon\ViewModel;
use Magento\Framework\View\Element\Block\ArgumentInterface; //require to mark as viewmodel

Class ProductMessage implements ArgumentInterface
{

    public function getMessage(): string
    {
        return "Hello from the viewModel";
    }
}