<?php
namespace Asad\Endingsoon\ViewModel;
use Magento\Framework\View\Element\Block\ArgumentInterface; //require to mark as viewmodel

Class Stock implements ArgumentInterface
{

    public function getStatus(): string
    {

        return "Ending Soon!";
    }
}