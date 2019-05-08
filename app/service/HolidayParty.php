<?php

namespace App\Service;

class HolidayParty implements ServiceInterface
{
    protected $date;
    protected $address;
    protected $qtyPeople;
    protected $phone;
    protected $description;

    public function __construct($date, $qtyPeople, $address, $phone)
    {
        $this->date = $date;
        $this->qtyPeople = $qtyPeople;
        $this->address = $address;
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getQtyPeople(): int
    {
        return $this->qtyPeople;
    }

    public function getHash()
    {
        return uniqid();
    }

    public function getPrice(): float
    {
        return (new DefaultPrice())->getPrice($this);
    }

    public function getName()
    {
        return self::class;
    }


}