<?php if (!defined('BASEPATH')) exit('No direct access allowed.');
class MY_Cart extends Add_cart
{
    var $CI;

    function MY_Cart()
    {

        $this->product_name_rules = '\.\:\-_ a-z0-9\\\(\)\/,';
    }
}