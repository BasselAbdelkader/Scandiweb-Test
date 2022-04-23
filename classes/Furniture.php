<?php

class Furniture extends Product
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
        //append MB to the size attribute inside the associative array
        $this->productAttributes['Dimensions'];
        return $this->productAttributes;
    }
}