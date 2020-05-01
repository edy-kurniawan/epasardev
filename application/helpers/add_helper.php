<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function add($text)
{
    $text = '<img src="'.base_url().'/assets/upload/barang/'.$text.'" style="width:80px;">';
    return $text;
}

?>

