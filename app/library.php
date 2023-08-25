<?php
namespace App;
use illuminate\Database\Eloquent\Model;

class library extends Model {
    public $timestamp = false;
    protected $fillable = [
        "name"
    ];
}
