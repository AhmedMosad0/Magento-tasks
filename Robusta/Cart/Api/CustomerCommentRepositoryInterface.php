<?php

namespace Robusta\Cart\Api;
use Magento\Framework\View\Element\Block\ArgumentInterface;

interface CustomerCommentRepositoryInterface extends ArgumentInterface{

    public function getComment();
}