<?php

class Fruit
{
    // Properties of EIgenschappen
    protected $name;
    private $capsname;
    private $color;

    public function __construct( $name, $color )
    {
        $this->name = $name;
        $this->capsname = strtoupper($name);
        $this->color = $color;
    }

    public function getCapsname(): string
    {
        return $this->capsname;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color): void
    {
        $this->color = $color;
    }


}
