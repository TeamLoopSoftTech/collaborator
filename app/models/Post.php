<?php
class Post extends Eloquent
{
/**
* The database table used by the model.
*
* @var string
*/
protected $table = 'tbl_accounts';
/**
* Define guarded columns
*
* @var array
*/
protected $guarded = array('ID');
} 