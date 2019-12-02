<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function detail($text)
{
    $text = ("<center><a href='javascript:void(0)' class='btn btn-sm btn-warning' data-toggle='tooltip' data-placement='top' title='Detail' onclick='edit_data(".$text.")'><i class='fas fa-eye'></i></a> <a href='javascript:void(0)' class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='top' title='Cart' onclick='cart(".$text.")'><i class='fas fa-cart-arrow-down'></i></a></center>
    	");
 
    return $text;
}
 
?>