<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function pesanan($text)
{
    $text = ("
    <a href='javascript:void(0)' class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='top' title='Pembayaran' onclick='img_data(".$text.")'><i class='fas fa-file-image'></i></a>
    <a href='javascript:void(0)' class='btn btn-sm btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' onclick='edit_data(".$text.")'><i class='fas fa-list-ol'></i></a>
    <a href='javascript:void(0)' class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='top' title='Detail' onclick='detail_data(".$text.")'><i class='fas fa-search'></i></a>
    ");
 
    return $text;
}

?>