<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    public $timestamps = false;

    public function logs(){
        return $this -> hasMany("App\Log");
    }

    protected $fillable = [
        "name"
    ];

}
