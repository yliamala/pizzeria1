<?php

namespace App\Order;

use App\Order\Discount\DiscountStrategyInterface;
use App\Order\Payment\PaymentInterface;
use App\User\ACL;
use App\User\Customer\CustomerInterface;
use app\user\Employee;
use App\User\Employee\EmployeeInterface;

class Order
{
    const SUBMITTED_STATUS = 1; // принят
    const READY_STATUS = 2; // приготовлен
    const PAID_STATUS = 3; // оплачен
    const DELIVERED_STATUS = 4; // отдан


    /**
     * @var Cart
     */
    private $cart;
    private $pizzeria;
    /**
     * @var PaymentInterface
     */
    private $payment;
    private $status = self::SUBMITTED_STATUS;
    private $cook;
    private $manager;

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

    public function setPayment(PaymentInterface $pay, CustomerInterface $customer)
    {
        if (!$pay->enable($this, $customer)) {
            throw new \Exception('You can not pay cash.');
        }
        $this->payment = $pay;
    }

    public function getPayment()
    {
        return $this->payment;
    }

    public function getCart()
    {
        return $this->cart;
    }

    public function getStatus()
    {
        $status = '';
        switch ($this->status) {
            case 1:
                $status = 'Создан';
                break;
            case 2:
                $status = 'Приготовлен';
                break;
            case 3:
                $status = 'Оплачен';
                break;
            case 4:
                $status = 'Закрыт';
                break;
        }
        return $status;
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

    public function changeStatus($status, EmployeeInterface $employee)
    {

        if (!(ACL::checkStatus($status, $employee, $this))) {
            throw new \Exception('You can not change status.');
        }

        $this->setStatus($status);
    }
}