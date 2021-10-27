<?php


class Team
{
    private $name;
    private $country;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    public function getFullName()
    {
        $fullName = $this->name;
        if (!empty($this->country)) $fullName .= ' (' . $this->country . ')';
        return $fullName;
    }
}