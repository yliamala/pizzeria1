<?php

namespace App\Order;

use app\order\payment\AbstractPayment;
use app\user\Employee;

class Order
{
    const SUBMITTED_STATUS = 1;
    const CONFIRMED_STATUS = 2;
    const DELIVERED_STATUS = 3;

    /**
     * @var Cart
     */
    private $cart;
    private $pizzeria;
    private $payment;
    private $status = self::SUBMITTED_STATUS;
    private $cook;
    private $manager;
    private $discount = 0;
    private $paid = false;

    private $discountStrategy;

    public function __construct(Cart $cart, DiscountStrategyInterface $discountStrategy)
    {
        $this->cart = $cart;
        $this->discountStrategy = $discountStrategy;
    }

    public function getSubTotalAmount()
    {
        return $this->cart->getTotalSum();
    }

    public function getDiscount()
    {
        return $this->discountStrategy->getDiscount();
    }

    public function getTotalAmount()
    {
        return ($this->cart->getTotalSum() - ($this->cart->getTotalSum() * $this->discountStrategy->getDiscount() / 100));
    }

    public function setPizzeria($pizzeria)
    {
        $this->pizzeria = $pizzeria;
    }

    public function getPizzeria()
    {
        return $this->pizzeria;
    }

    public function setPayment(AbstractPayment $pay)
    {
        $pay->enable($this);
        $this->payment = $pay;
    }

    public function getCart()
    {
        return $this->cart;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setCook($cook)
    {
        $this->cook = $cook;
    }

    public function getCook()
    {
        return $this->cook;
    }

    public function setManager($manager)
    {
        $this->manager = $manager;
    }

    public function getManager()
    {
        return $this->manager;
    }

    public function getPaid()
    {
        return $this->paid;
    }

    public function setPaid(Employee $employee)
    {
        if (!$this->payment->getSetPaid()) {
            throw new \Exception('For cash only.');
        }
        if (!$employee->getAllowPaid()) {
            throw new \Exception('You can not pay the order.');
        }

        $this->paid = true;
    }

    public function changeStatus(Employee $employee, $status)
    {
        // @todo change to state machine pattern with ACL
        if (!(($employee->getConfirmedOrder() && $status == self::CONFIRMED_STATUS) ||
            ($employee->getDeliveredOrder() && $status == self::DELIVERED_STATUS))) {
            throw new \Exception('You can not change status.');
        }

        $this->setStatus($status);
    }
}