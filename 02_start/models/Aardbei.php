<?php

class Aardbei extends Fruit
{

    private $smaak;

    public function getSmaak()
    {
        return $this->smaak;
    }

    public function setSmaak($smaak): void
    {
        $this->smaak = $smaak;
    }

    public function getName()
    {
        return strrev( $this->name );
    }

}