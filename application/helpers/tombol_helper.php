<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function tombol($text = null)
{
    
    $text = ("<a href='javascript:void(0)' class='btn btn-sm btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' onclick='edit_data(".$text.")'><i class='fas fa-edit'></i></a>
    	<a href='javascript:void(0)' class='btn btn-sm btn-danger' data-toggle='tooltip' data-placement='top' title='Hapus' onclick='delete_data(".$text.")'><i class='fas fa-trash-alt'></i></a>");
 
    return $text;
}

?>