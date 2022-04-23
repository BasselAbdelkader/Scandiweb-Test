<?php

class Product extends Db
{

    public $productAttributes;

    function __construct($host, $user, $password, $db)
    {
        parent::__construct($host, $user, $password, $db);
    }


    function getSKU()
    {
        return $this->getAttribute('SKU');
    }

    function getAttribute($attr)
    {
        if (isset($this->productAttributes[$attr])) {
            return $this->productAttributes[$attr];
        } else {
            return "No such attribute '" . $attr . "' exists for this product";
        }
    }

    function getProductName()
    {
        return $this->getAttribute('Name');
    }


    function getPrice()
    {

        return $this->getAttribute('Price');
    }


    function getAllAttributes($productId)
    {
        $productId = $this->sanitize($productId);
        if ($result = $this->query("SELECT * FROM items WHERE id=$productId")) {
            //return an associative array of all attributes
            $this->productAttributes = mysqli_fetch_assoc($result);
        } else {
            echo 'query error ' . $this->lastQuery;
        }
    }


}





