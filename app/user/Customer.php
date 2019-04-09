<?php

namespace App\User;

use App\Product\InterfaceProduct;

abstract class Customer
{
    const MIN_AMOUNT = 500;

    const GUEST = 'guest';
    const REGULAR = 'regular';
    const VIP = 'vip';

    protected $type;
    protected $name;
    protected $phone;
    protected $basicProduct = false;
    protected $additionalProduct = false;
    protected $uniqueProduct = false;

    protected $historyOrder = false;
    protected $viewStatusOrder = false;
    protected $minAmount = false;
    protected $alwaysCash = false;

    public function __construct($name, $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    public function getProductPerm($typeProduct)
    {
        switch ($typeProduct) {
            case InterfaceProduct::BASIC_PRODUCT_TYPE:
                return $this->basicProduct;
            case InterfaceProduct::UNIQUE_PRODUCT_TYPE:
                return $this->uniqueProduct;
            case InterfaceProduct::ADDITIONAL_PRODUCT_TYPE:
                return $this->additionalProduct;
            default:
                return false;
        }
    }

    public function getHistoryOrder()
    {
        return $this->historyOrder;
    }

    public function getViewStatusOrder()
    {
        return $this->viewStatusOrder;
    }

    public function getMinAmount()
    {
        return $this->minAmount;
    }

    public function getAlwaysCash()
    {
        return $this->alwaysCash;
    }

    public function getType()
    {
        return $this->type;
    }

    public function viewHistoryOrder()
    {
        if (!$this->getHistoryOrder()) throw new \Exception('You can not look history orders');

        echo 'View history' . "\n";
    }

    public function viewCurrentStatusOrder()
    {
        if (!$this->getViewStatusOrder()) throw new \Exception('You can not look current status orders');

        echo 'View order status' . "\n";
    }
}