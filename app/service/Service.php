<?php

namespace App\Service;


class Service implements ServiceInterface
{
    protected $date;
    protected $address;
    protected $qty;
    protected $phone;
    protected $description;

    public function __construct($date, $qty, $address,$phone)
    {
        $this->date = $date;
        $this->qty = $qty;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function getPrice()
    {
        if ($this->qty <= 10) {
            return $this->qty * 500;
        }
        if ($this->qty <= 20) {
            return $this->qty * 700;
        }

        throw new \Exception('The number of people can not be more than 20');
    }

    public function getDescription()
    {
        return $this->description;
    }


}