<?php

class Disk extends Product
{
    function __construct($host, $user, $password, $db)
    {
        parent::__construct($host, $user, $password, $db);
    }


    function getAttribute($productAttribute)
    {
        $result = parent::getAttribute($productAttribute);
        return $result;
    }

    function getAllAttributes($productId)
    {
        parent::getAllAttributes($productId);
        $this->productAttributes['Size'];
        return $this->productAttributes;
    }
}